<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\NoteController;
use App\Models\Note;
use App\Models\Type;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/notes/{id}', function ($id) {
    $note = Note::findOrFail($id);
    return Inertia::render('ViewNote', [
        'note' => $note,
    ]);
});
Route::get('/notes', [NoteController::class, 'index']);
Route::get('/notes/search/{searchterm}', [NoteController::class, 'search']);
Route::get('/create/note', function () {
    $types = Type::all();
    return Inertia::render('CreateNote', [
        'types' => $types,
    ]);
});
Route::post('/notes/store', [NoteController::class, 'store']);


Route::get('/notes/edit/{id}', function ($id) {
    $note = Note::findOrFail($id);
    $types = Type::all();
    return Inertia::render('EditNote', [
        'note' => $note,
        'types' => $types,
    ]);
});
Route::put('/notes/{id}', [NoteController::class, 'update']);
Route::delete('/notes/{id}', [NoteController::class, 'destroy']);

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
