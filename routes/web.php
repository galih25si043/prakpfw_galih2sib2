<?php


use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\AuthController;






Route::get('/', function () {
    return view('welcome');
});


Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});


Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);


Route::get('/about', function () {
    return view('halaman-about');
});








// Route untuk menampilkan data matakuliah
Route::get('/matakuliah', [MatakuliahController::class, 'index']);
// Route untuk menampilkan form tambah
Route::get('/matakuliah/create', [MatakuliahController::class, 'create']);
// Route untuk menyimpan data baru
Route::get('/matakuliah/store', [MatakuliahController::class, 'store']);
// Route untuk menampilkan detail matakuliah
Route::get('/matakuliah/show/{id?}', [MatakuliahController::class, 'show']);
// Route untuk menampilkan form edit
Route::get('/matakuliah/edit/{id}', [MatakuliahController::class, 'edit']);
// Route untuk memperbarui data
Route::put('/matakuliah/update/{id}', [MatakuliahController::class, 'update']);
// Route untuk menghapus data
Route::delete('/matakuliah/delete/{id}', [MatakuliahController::class, 'destroy']);


Route::get('/home', [HomeController::class, 'index']);


Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');


Route::get('question', [QuestionController::class, 'index'])
    ->name('question.index');


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');




//routes resource
Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);


Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('auth.logout');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['checkislogin']], function () {


    // Route User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');


});
Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkrole:Super Admin'])->group(function () {
        Route::resource('user', UserController::class);
    });


    Route::middleware(['checkrole:Super Admin,mitra'])->group(function () {
        Route::resource('pelanggan', PelangganController::class);
    });
});


Route::get('/auth/redirect-google',
    [AuthController::class, 'redirectToGoogle']
)->name('redirect.google');


Route::get('/google/callback',
    [AuthController::class, 'handleGoogleCallback']
)->name('google.callback');

Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
