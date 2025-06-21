<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class StudentManager extends Component
{
    use WithPagination;

    public $search = '';
    public $student_id, $name, $email, $password;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->isEdit && $this->student_id) {
            $student = User::findOrFail($this->student_id);
            $student->update([
                'name' => $this->name,
                'email' => $this->email,
                // تحديث كلمة المرور فقط إذا تم إدخالها
                'password' => $this->password ? Hash::make($this->password) : $student->password,
            ]);
            session()->flash('message', 'تم تعديل بيانات الطالب بنجاح.');
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'student',
            ]);
            session()->flash('message', 'تم إضافة الطالب بنجاح.');
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $student = User::findOrFail($id);
        $this->student_id = $student->id;
        $this->name = $student->name;
        $this->email = $student->email;
        $this->isEdit = true;
        $this->resetValidation();
    }

    public function delete($id)
    {
        User::where('role', 'student')->where('id', $id)->delete();
        session()->flash('message', 'تم حذف الطالب بنجاح.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['student_id', 'name', 'email', 'password', 'isEdit']);
        $this->resetValidation();
    }

    public function render()
    {
        $students = User::where('role', 'student')
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.student-manager', [
            'students' => $students,
        ]);
    }
}
