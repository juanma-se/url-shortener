<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AngularController;
use App\Http\Controllers\ShortenedLinkController;

Route::prefix('react')->group(function() {

    Route::get("/", [ShortenedLinkController::class, "index"])->name("shortener.home");
    Route::post("/", [ShortenedLinkController::class, "store"])->name("shortener.store");
    Route::delete("/{slug}", [ShortenedLinkController::class, "destroy"])->name("shortener.destroy");

    // Autenticanción GitHub
    Route::get("/auth/github", [AuthController::class, "authGithub"])->name("auth.github");

    // Autenticación Google
    Route::get("/auth/google", [AuthController::class, "authGoogle"])->name("auth.google");

    // Logout
    Route::post("/logout", [AuthController::class, "logout"])->name("auth.logout");

    // Redirección de enlaces acortados
    Route::get("/{slug}", [ShortenedLinkController::class, "show"])->name("shortener.redirect");
});

Route::prefix('angular')->group(function() {
    Route::any('/{any}', [AngularController::class, 'index'])->where('any', '^(?!api).*$');
});

//Auth Callbacks
Route::get("/auth/github-callback", [AuthController::class, "authGithubCallback"])->name("auth.github-callback");
Route::get("/auth/google-callback", [AuthController::class, "authGoogleCallback"])->name("auth.google-callback");
