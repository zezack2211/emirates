<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Applications;
use App\Models\Programs;
use App\Models\Documents;
use App\Models\Statuses;
use App\Enums\Enums\StatusEnum;

class Application extends Component
{
    use WithFileUploads;

    public $isModalOpen = false;
    public $name, $email, $phone, $address, $date_of_birth;
    public $program_id, $realtive_name, $relative_phone;
    public $photo, $certificate, $identity_card;
    public $programs;
    public $hasSubmitted = false;

    public function mount()
    {
        $this->programs = Programs::all();
        $this->hasSubmitted = Applications::where('user_id', Auth::id())->exists();
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset([
            'name',
            'email',
            'phone',
            'address',
            'date_of_birth',
            'program_id',
            'realtive_name',
            'relative_phone',
            'photo',
            'certificate',
            'identity_card'
        ]);
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'date_of_birth' => 'required|date',
            'program_id' => 'required|exists:programs,id',
            'realtive_name' => 'required|string',
            'relative_phone' => 'required|string',
            'photo' => 'required|image|max:2048',
            'certificate' => 'required|image|max:2048',
            'identity_card' => 'required|image|max:2048',
        ]);

        $application = Applications::create([
            'user_id' => Auth::id(),
            'program_id' => $this->program_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'date_of_birth' => $this->date_of_birth,
            'realtive_name' => $this->realtive_name,
            'relative_phone' => $this->relative_phone,
        ]);

        $photoPath = $this->photo->store( 'public');
$certificatePath = $this->certificate->store( 'public');
$idCardPath = $this->identity_card->store(' 'public');

Documents::create([
    'application_id' => $application->id,
    'photo' => $photoPath,
    'certificate' => $certificatePath,
    'national_id' => $idCardPath,
]);

        Statuses::create([
            'application_id' => $application->id,
            'status' => StatusEnum::Pending->value, // أو 'pending' إذا لم تكن تستخدم enum
        ]);


        $this->hasSubmitted = true; // ✅ Update UI instantly

        session()->flash('message', 'Your application has been submitted successfully.');
    }

    public function render()
    {
        return view('livewire.student.application');
    }
}
