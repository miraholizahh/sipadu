<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Staf\UserController;
use App\Http\Controllers\Staf\SymptomController;
use App\Http\Controllers\Staf\DiseaseController;
use App\Http\Controllers\Staf\KnowledgeBaseController;
use App\Http\Controllers\Staf\DempsterShaferController;
use App\Http\Controllers\Patient\DiagnosisController;
use App\Http\Controllers\Staf\LaporanController;
use App\Http\Controllers\Staf\SolutionController;
use App\Http\Controllers\User\Controller;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/profilenav', function () {
    return view('profilenav');
});

Route::get('/homenav', function () {
    return view('homenav');
});

Route::get('/contactnav', function () {
    return view('contactnav');
});



Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/profile/user-edit', [ProfileController::class, 'edit2'])->name('profile.user-edit');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/symptom', [SymptomController::class, 'index'])->name('symptom.index');
    Route::get('/symptom/create', [SymptomController::class, 'create'])->name('symptom.create');
    Route::post('/symptom', [SymptomController::class, 'store'])->name('symptom.store');
    Route::get('/symptom/{id}/edit', [SymptomController::class, 'edit'])->name('symptom.edit');
    Route::put('/symptom/{id}', [SymptomController::class, 'update'])->name('symptom.update');
    Route::delete('/symptom/{id}', [SymptomController::class, 'destroy'])->name('symptom.destroy');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/disease', [DiseaseController::class, 'index'])->name('disease.index');
    Route::get('/disease/create', [DiseaseController::class, 'create'])->name('disease.create');
    Route::post('/disease', [DiseaseController::class, 'store'])->name('disease.store');
    Route::get('/disease/{id}/edit', [DiseaseController::class, 'edit'])->name('disease.edit');
    Route::put('/disease/{id}', [DiseaseController::class, 'update'])->name('disease.update');
    Route::delete('/disease/{id}', [DiseaseController::class, 'destroy'])->name('disease.destroy');

});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/knowledgebase', [KnowledgeBaseController::class, 'index'])->name('knowledge_base.index');
    Route::get('/knowledgebase/create', [KnowledgeBaseController::class, 'create'])->name('knowledge_base.create');
    Route::post('/knowledgebase', [KnowledgeBaseController::class, 'store'])->name('knowledge_base.store');
    Route::get('/knowledgebase/{id}/edit', [KnowledgeBaseController::class, 'edit'])->name('knowledge_base.edit');
    Route::put('/knowledgebase/{id}', [KnowledgeBaseController::class, 'update'])->name('knowledge_base.update');
    Route::delete('/knowledgebase/{id}', [KnowledgeBaseController::class, 'destroy'])->name('knowledge_base.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/diagnosis', [DiagnosisController::class, 'create'])->name('diagnosis.form');
    Route::post('/diagnosis', [DiagnosisController::class, 'store'])->name('diagnosis.store');
    Route::get('/diagnosis/riwayat', [DiagnosisController::class, 'riwayat'])->name('diagnosis.riwayat');
    Route::get('/diagnosis/result/{id}', [DiagnosisController::class, 'show'])->name('diagnosis.result');
    Route::get('/riwayat-diagnosa/print/{id}', [DiagnosisController::class, 'print'])->name('riwayat.diagnosa.print');


});

Route::middleware(['auth'])->group(function () {
    Route::get('/dempstershafer', [DempsterShaferController::class, 'index'])->name('dempstershafer.index');
    Route::get('/dempstershafer/create', [DempsterShaferController::class, 'create'])->name('dempstershafer.create');
    Route::post('/dempstershafer', [DempsterShaferController::class, 'store'])->name('dempstershafer.store');
});

Route::get('/laporan/diagnosa', [LaporanController::class, 'diagnosa'])->name('laporan.diagnosa');
Route::get('/laporan/diagnosa/search', [LaporanController::class, 'search'])->name('laporan.search');
Route::get('/laporan/diagnosa/print', [LaporanController::class, 'print'])->name('laporan.diagnosa.print');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/solution', [SolutionController::class, 'index'])->name('solution.index');
    Route::get('/solution/create', [SolutionController::class, 'create'])->name('solution.create');
    Route::post('/solution', [SolutionController::class, 'store'])->name('solution.store');
    Route::get('/solution/{id}/edit', [SolutionController::class, 'edit'])->name('solution.edit');
    Route::put('/solution/{id}', [SolutionController::class, 'update'])->name('solution.update');
    Route::delete('/solution/{id}', [SolutionController::class, 'destroy'])->name('solution.destroy');

});

require __DIR__.'/auth.php';
