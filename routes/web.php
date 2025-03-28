<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Member\BlogController;

Route::get('/', function () {
    return view('components.front.home-page');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //member
    Route::controller(BlogController::class)->group(function () {
        Route::get('/member/blogs/trash', 'trash')->name('member.blogs.trash');
        Route::get('/member/blogs/{id}/restore', 'restore')->name('member.blogs.restore');
        Route::delete('/member/blogs/{id}/force-delete', 'forceDelete')->name('member.blogs.force-delete');
    });
    Route::resource('/member/blogs', BlogController::class)->names([
        'index' => 'member.blogs.index',
        'create' => 'member.blogs.create',
        'store' => 'member.blogs.store',
        'show' => 'member.blogs.show',
        'edit' => 'member.blogs.edit',
        'update' => 'member.blogs.update',
        'destroy' => 'member.blogs.destroy',
    ])->parameters([
        'blogs' => 'posts'
    ]);
});

require __DIR__ . '/auth.php';
