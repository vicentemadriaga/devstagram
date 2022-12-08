<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;

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

Route::get('/', HomeController::class)->name('home');
//registro de cuentas
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);
//inicio de sesion
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
//rutas de eicion del perfil
Route::get('/editar-perfil',[PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class, 'store'])->name('perfil.store');
//link de los post y del dashboard
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class , 'destroy'])->name('post.destroy');
Route::post('/{user:username}/post/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');
//imagenes de los post
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
//likes a las fotos
Route::post('/posts/{post}/likes',[LikeController::class, 'store'])->name('post.likes.store');
Route::delete('/posts/{post}/likes',[LikeController::class, 'destroy'])->name('post.likes.destroy');

Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
//seguir a gente
Route::post('/{user:username}/follow', [FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class,'destroy'])->name('users.unfollow');