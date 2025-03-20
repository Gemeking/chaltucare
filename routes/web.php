<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/loginandsignup', function () {
    return view('pages.loginandsignup');
});

Route::get('/prison', function () {
    return view('pages.prison');
});



Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/blog', function () {
    return view('pages.blog');
});

// routes/web.php

// Admin Dashboard Route (No Auth Middleware)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// User Dashboard Route (No Auth Middleware)
Route::get('/user', function () {
    return view('user');
})->name('user');

Route::get('/user/payments/', function () {
    return view('user.payments.index');
});
Route::get('/user/profile/', function () {
    return view('user.profile.index');
});

Route::get('/user/appointments/', function () {
    return view('user.appointments.index');
});
Route::get('/user/messages/', function () {
    return view('user.messages.index');
});





Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/users/index', function () {
    return view('admin.users.index');
});

Route::get('/admin/payments/index', function () {
    return view('admin.payments.index');
});

Route::get('/admin/appointments/index', function () {
    return view('admin.appointments.index');
});

Route::get('/admin/blogs/index', function () {
    return view('admin.blogs.index');
});

Route::get('/admin/history/index', function () {
    return view('admin.history.index');
});

Route::get('/admin/settings', function () {
    return view('admin.settings');
});

Route::get('/admin/messages/index', function () {
    return view('admin.messages.index');
});

Route::get('/admin/videocall/index', function () {
    return view('admin.videocall.index');
});

Route::get('/admin/files/index', function () {
    return view('admin.files.index');
});

Route::get('/components/{component}', function ($component) {
    return view("components.{$component}");
});


// user Dashboard Route (No Auth Middleware)
Route::get('/user/index', function () {
    return view('user.index');
})->name('user.index');
