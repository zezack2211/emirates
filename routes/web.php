<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::view('admin/student', 'admin.student')->name('admin.student');
    Route::view('admin/staff', 'admin.Staff')->name('admin.staff');
    Route::view('admin/department', 'admin.department')->name('admin.department');
    Route::view('admin/program', 'admin.program')->name('admin.program');
    Route::view('admin/setting', 'admin.settings')->name('admin.settings');
});

Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::view('staff/dashboard', 'staff.dashboard')->name('staff.dashboard');
    Route::view('staff/settings', 'staff.settings')->name('staff.settings');
    Route::view('staff/applicationpending', 'staff.applicationpending')->name('staff.applicationpending');
    Route::view('staff/accepted', 'staff.accepted')->name('staff.accepted');
    Route::view('staff/rejected', 'staff.rejected')->name('staff.rejected');
});


Route::middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('application', 'applications')->name('application');
    Route::view('applied', 'applied')->name('applied');
});
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
