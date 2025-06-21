<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Programs;
use App\Models\Departments;
use Livewire\Component;

class Dashboard extends Component
{
    public $studentCount;
    public $staffCount;
    public $programCount;
    public $departmentCount;

    public function mount()
    {
        $this->studentCount = User::where('role', 'student')->count();
        $this->staffCount = User::where('role', 'user')->count();
        $this->programCount = Programs::count();
        $this->departmentCount = Departments::count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')
            ->with([
                'studentCount' => $this->studentCount,
                'staffCount' => $this->staffCount,
                'programCount' => $this->programCount,
                'departmentCount' => $this->departmentCount,
            ]);
    }
}
