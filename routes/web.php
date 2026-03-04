<?php

use App\Http\Controllers\ProfileController;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Route;

Route::redirect('/login', '/admin/login')->name('login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/organisations', [App\Http\Controllers\PublicController::class, 'index'])->name('public.organisations.index');
Route::get('/merchants', [App\Http\Controllers\PublicController::class, 'indexMerchants'])->name('public.merchants.index');
Route::get('/organisations/{organisation}', [App\Http\Controllers\PublicController::class, 'showOrganisation'])->name('public.organisations.show');

Route::middleware('auth')->group(function () {
    Route::get('/purchase/{plan}', [App\Http\Controllers\StripeController::class, 'checkout'])->name('public.membership.purchase');
});

Route::post('/webhooks/stripe', [App\Http\Controllers\StripeController::class, 'webhook'])->name('public.stripe.webhook');

Route::get('/p/{slug}', [App\Http\Controllers\PublicController::class, 'showPage'])->name('public.page.show');

Route::get('/dashboard', function () {
    $user = auth()->user();

    // Redirect each role to their own Filament panel
    return match ($user->role) {
        UserRole::SUPER_ADMIN => redirect('/admin'),
        UserRole::ORGANISATION => redirect('/organisation'),
        UserRole::MERCHANT => redirect('/merchant'),
        UserRole::CUSTOMER => redirect('/customer'),
        default => redirect('/customer'),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
