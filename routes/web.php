<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\SecurityQuestionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile');
    Route::post('/perfil', [ProfileController::class, 'update']);
});

// Mostrar formulario de recuperación de contraseña
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

// Enviar enlace de recuperación de contraseña
Route::post('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
    ->middleware('guest')->name('password.email');

// Mostrar formulario de restablecimiento de contraseña
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// Procesar el restablecimiento de contraseña
Route::post('/reset-password', [\App\Http\Controllers\Auth\NewPasswordController::class, 'store'])
    ->middleware('guest')->name('password.update');

Route::get('password/security', [SecurityQuestionController::class, 'showEmailForm'])->name('password.security');
Route::post('password/security', [SecurityQuestionController::class, 'checkEmail'])->name('password.security.check');
Route::post('password/security/verify', [\App\Http\Controllers\Auth\SecurityQuestionController::class, 'verifyAnswer'])->name('password.security.verify');

// Ruta del CMS protegidas por el middleware de autentificadr de roles
Route::middleware(['auth'])->group(function () {
    Route::resource('cms/pages', PageController::class)->middleware('role:Admin|Publicador');
});

                            //RUTAS COMUNES
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/cms/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/cms/pages', [PageController::class, 'index'])->name('cms.pages.index');   //index.pages.php 




Route::middleware(['role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});






                          /////RUTAS DEL BLOG
Route::get('/cms/blog', [BlogController::class, 'index'])->name('cms.blog.index');  // Esto es cms.blog.index
Route::get('cms/blog/{id}/edit', [BlogController::class, 'edit'])->name('cms.blog.edit');
Route::put('cms/blog/{id}', [BlogController::class, 'update'])->name('cms.blog.update');
Route::post('cms/blog', [BlogController::class, 'store'])->name('cms.blog.store');
Route::get('/cms/blog/create', [BlogController::class, 'create'])->name('cms.blog.create');
Route::delete('cms/blog/{id}', [BlogController::class, 'destroy'])->name('cms.blog.destroy');
Route::get('/cms/blog/{id}', [BlogController::class, 'show'])->name('cms.blog.show');






Route::middleware(['auth', 'role:Admin,Publicador'])->prefix('cms/blog')->name('cms.blog.')->group(function () {
    
   
});


                         //////RUTAS DEL USUARIO 
Route::resource('/cms/usuarios', UserController::class);
Route::post('/cms/usuarios/asignar-rol', [UserController::class, 'asignarRol'])->name('usuarios.asignarRol');
Route::get('/cms/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/cms/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
Route::delete('/cms/usuarios/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');