<?php

use App\Http\Controllers\Admin\TaskController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Open;

Route::get('/', static function () {
    return view('layouts.layoutpublic');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get("/projects", [Open\ProjectController::class, "index"])->name("open.projects.index");
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::group(["middleware" => ["role:teacher|admin|student"]], static function () {
    Route::view("admin", "layouts.layoutadmin")->name("admin");
    Route::get('/admin/projects/{project}/delete',
        [ProjectController::class, 'delete'])
        ->name('projects.delete');

    Route::get('/admin/tasks/{task}/delete',
        [TaskController::class, 'delete'])
        ->name('tasks.delete');

    Route::resource('/admin/projects', ProjectController::class);
    Route::resource("/admin/tasks", TaskController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
