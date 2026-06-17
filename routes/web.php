<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dokumen/{file}/view', function ($file) {

    $path = storage_path('app/private/' . str_replace('|', '/', $file));

    abort_unless(file_exists($path), 404);

    return response()->file($path);
})->name('dokumen.view');

Route::get('/dokumen/{file}/download', function ($file) {

    $path = storage_path('app/private/' . str_replace('|', '/', $file));

    abort_unless(file_exists($path), 404);

    return response()->download($path);
})->name('dokumen.download');