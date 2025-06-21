<?php

namespace App\Livewire\Staff;

use App\Models\Documents;
use App\Models\Applications;
use App\Models\Notes;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Statuses;

class ManageApplications extends Component
{
    public $applications;
    public $selectedApplication;
    public $noteText = '';
    public $document;
    public $statuses;
    public bool $hideTable = false;


    public function mount()
    {
        $this->applications = Applications::with(['user', 'program', 'department', 'latestStatus'])
            ->withCount('documents')
            ->whereHas('latestStatus', function ($query) {
                $query->where('status', 'pending');
            })
            ->latest()
            ->get();
    }

    public function viewApplication($id)
    {
        $this->selectedApplication = Applications::with(['program', 'user', 'documents', 'latestStatus', 'department'])->get()->find(intval($id));
    }

    public function approve()
    {
        $this->selectedApplication->latestStatus->status = 'accepted';
        $this->selectedApplication->latestStatus->save();

        $this->sendEmail('Your application has been approved!');
        $this->resetView();
        $this->hideTable = true;
    }

    public function reject()
    {
        // Update the status of the selected application
        $this->selectedApplication->latestStatus->status = 'rejected';
        $this->selectedApplication->latestStatus->save();

        $this->sendEmail('Your application has been rejected.');
        $this->resetView();
        $this->hideTable = true;
    }

    public function sendNote()
    {
        $this->validate(['noteText' => 'required|string|max:1000']);

        Notes::create([
            'application_id' => $this->selectedApplication->id,
            'user_id' => auth('')->user()->id,
            'name' => $this->noteText,

        ]);

        $this->noteText = '';
        $this->selectedApplication->refresh();
    }

    public function sendEmail($message)
    {
        $user = $this->selectedApplication->user;

        Mail::raw($message, function ($mail) use ($user) {
            $mail->to($user->email)
                ->subject('Application Status Update');
        });
    }

    public function resetView()
    {
        $this->selectedApplication = null;
        $this->applications = Applications::with(['user', 'program', 'department', 'latestStatus'])
            ->withCount('documents')
            ->whereHas('latestStatus', function ($query) {
                $query->where('status', 'pending');
            })
            ->latest()
            ->get();
    }


    public function render()
    {
        return view('livewire.staff.manage-applications');
    }
}
