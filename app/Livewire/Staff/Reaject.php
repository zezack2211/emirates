<?php

namespace App\Livewire\Staff;

use Livewire\Component;
use App\Models\Applications;
use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Log;

class Reaject extends Component
{
    public $applications;

    public function mount()
    {
        $this->applications = Applications::with(['user', 'program', 'department', 'latestStatus'])
            ->whereHas('latestStatus', fn($q) => $q->where('status', 'rejected'))
            ->latest()
            ->get();
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
        return view('livewire.staff.reaject');
    }
}
