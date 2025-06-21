<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class StaffManager extends Component
{
    use WithPagination;

    public $search = '';
    public $staff_id;
    public $name;
    public $email;
    public $password;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetForm()
    {
        $this->staff_id = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->isEdit = false;
        $this->resetValidation();
    }

    public function create()
    {
        $this->resetForm();
    }

    public function edit($id)
    {
        $staff = User::where('role', 'user')->findOrFail($id);
        $this->staff_id = $staff->id;
        $this->name = $staff->name;
        $this->email = $staff->email;
        $this->password = '';
        $this->isEdit = true;
    }

    public function save()
    {
        $validated = $this->validate(
            $this->isEdit
                ? [
                    'name' => 'required|string|min:3',
                    'email' => 'required|email|unique:users,email,' . $this->staff_id,
                ]
                : $this->rules
        );

        if ($this->isEdit) {
            $staff = User::where('role', 'user')->findOrFail($this->staff_id);
            $staff->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : $staff->password,
            ]);
            session()->flash('message', 'تم تحديث بيانات الموظف بنجاح.');
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'user',
            ]);
            session()->flash('message', 'تم إضافة موظف جديد.');
        }

        $this->resetForm();
    }

    public function delete($id)
    {
        User::where('role', 'user')->where('id', $id)->delete();
        session()->flash('message', 'تم حذف الموظف بنجاح.');
    }

    public function render()
    {
        $staff = User::where('role', 'user')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.staff-manager', [
            'staffList' => $staff,
        ]);
    }
}
