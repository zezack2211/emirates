<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Departments;

class Department extends Component
{
    protected $updatesQueryString = ['search'];
    public $department_id;
    public $name;
    public $search = '';
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function render()
    {
        $departments = Departments::where('name', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.admin.department', [
            'departments' => $departments,
        ]);
    }
    public function save()
    {
        $this->validate();

        if ($this->isEdit && $this->department_id) {
            $department = Departments::find($this->department_id);
            $department->update([
                'name' => $this->name,
            ]);
            session()->flash('message', 'Department updated successfully.');
        } else {
            Departments::create([
                'name' => $this->name,
                'user_id' => Auth::id(), // ✅ إضافة user_id
            ]);
            session()->flash('message', 'Department added successfully.');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $department = Departments::findOrFail($id);
        $this->department_id = $department->id;
        $this->name = $department->name;
        $this->isEdit = true;
    }

    public function delete($id)
    {
        Departments::findOrFail($id)->delete();
        session()->flash('message', 'Department deleted successfully.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['name', 'department_id', 'isEdit']);
    }
}
