<?php

namespace App\Livewire\Admin;

use App\Models\Programs;
use App\Models\Departments;
use Livewire\Component;
use Livewire\WithPagination;

class Program extends Component
{
    use WithPagination;

    public $program_id;
    public $department_id;
    public $name;
    public $search = '';
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'department_id' => 'required|exists:departments,id',
    ];

    public function save()
    {
        $this->validate();

        if ($this->isEdit && $this->program_id) {
            $program = Programs::findOrFail($this->program_id);
            $program->update([
                'name' => $this->name,
                'department_id' => $this->department_id,
            ]);
            session()->flash('message', 'Program updated successfully.');
        } else {
            Programs::create([
                'name' => $this->name,
                'department_id' => $this->department_id,
            ]);
            session()->flash('message', 'Program added successfully.');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $program = Programs::findOrFail($id);
        $this->program_id = $program->id;
        $this->name = $program->name;
        $this->department_id = $program->department_id;
        $this->isEdit = true;
    }

    public function delete($id)
    {
        Programs::findOrFail($id)->delete();
        session()->flash('message', 'Program deleted.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['program_id', 'name', 'department_id', 'isEdit']);
    }

    public function render()
    {
        return view('livewire.admin.program', [
            'departments' => Departments::all(),
            'programs' => Programs::with('department')
                ->where('name', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(10),
        ]);
    }
}
