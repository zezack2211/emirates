<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Applications;
use Illuminate\Support\Facades\Auth;

class Applied extends Component
{
    /**
     * The student's application
     * @var \App\Models\Applications|null
     */
    public $application;

    /**
     * All application status history
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $statusHistory;

    /**
     * All application notes
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $notes;

    /**
     * All application documents
     * @var \Illuminate\Database\Eloquent\Collection
     */
    public $documents;

    /**
     * Initialize the component
     */
    public function mount()
    {
        $this->application = Applications::with([
            'program.department',
            'statuses' => fn($query) => $query->latest(),
            'notes' => fn($query) => $query->latest(),
            'documents'
        ])->where('user_id', Auth::id())->first();

        if ($this->application) {
            $this->statusHistory = $this->application->statuses;
            $this->notes = $this->application->notes;
            $this->documents = $this->application->documents;
        }
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.student.applied')->with('compact');
    }
}
