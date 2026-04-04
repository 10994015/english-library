<?php

use App\Livewire\CreateVocabularyComponent;
use App\Livewire\DashboardComponent;
use App\Livewire\ExamComponent;
use App\Livewire\VocabularyComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/vocabulary/create', CreateVocabularyComponent::class)->name('vocabulary.create');
    Route::get('/vocabulary/{id}/edit', CreateVocabularyComponent::class)->name('vocabulary.edit');
    Route::get('/', VocabularyComponent::class)->name('vocabulary.index');
    Route::get('/exam', ExamComponent::class)->name('exam');
    Route::get('/exam/srs', ExamComponent::class)
    ->name('exam.srs')
    ->defaults('srs', true);
    Route::get('/dashboard', DashboardComponent::class)
    ->name('dashboard');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});
