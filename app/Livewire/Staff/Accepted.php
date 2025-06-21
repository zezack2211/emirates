<?php

namespace App\Livewire\Staff;

use App\Models\Applications;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Accepted extends Component
{
    public $applications;
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $listeners = ['refreshApplications' => 'refreshData'];

    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->applications = Applications::with(['user', 'program', 'department', 'latestStatus'])
            ->whereHas('latestStatus', fn($q) => $q->where('status', 'accepted'))
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->whereHas('user', fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
                        ->orWhere('application_id', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
        $this->refreshData();
    }

    public function download($applicationId): StreamedResponse
    {
        try {
            $application = Applications::with([
                'user',
                'program',
                'department',
                'latestStatus'
            ])->findOrFail($applicationId);

            $pdf = Pdf::loadView('pdf.application', compact('application'));

            // تحديث حالة التنزيل
            $application->update(['downloaded' => true]);

            return response()->streamDownload(
                fn() => print($pdf->output()),
                "application_{$application->id}_{$application->user->name}.pdf"
            );
        } catch (\Exception $e) {
            Log::error('PDF download failed: ' . $e->getMessage());
            $this->dispatch('error', message: 'فشل تنزيل PDF: ' . $e->getMessage());
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.staff.accepted', [
            'applications' => $this->applications,
        ]);
    }
}
