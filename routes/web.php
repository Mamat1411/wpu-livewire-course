<?php

use App\Livewire\About;
use App\Livewire\Contact;
use App\Livewire\Counter;
use App\Livewire\Home;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/users', function () {
//     return view('users');
// });

// full page component
Route::get('/', Home::class)->name('home');
Route::get('/counter', Counter::class);
Route::get('/users', Users::class)->name('users');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');
