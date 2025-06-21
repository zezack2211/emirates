<?php

namespace App\Livewire\Staff;

use App\Models\Applications;
use App\Models\Statuses;
use Livewire\Component;

class Dashboard extends Component
{
    public $completedCount;
    public $pendingCount;
    public $incompleteCount;
    public $allCount;

    public function mount()
    {

        $this->allCount = Applications::all()->count();
        $this->completedCount = Statuses::where('status', 'accepted')->count();
        $this->pendingCount = Statuses::where('status', 'pending')->count();
        $this->incompleteCount = Statuses::where('status', 'rejected')->count();
    }

    public function render()
    {
        return view('livewire.staff.dashboard');
    }
}
