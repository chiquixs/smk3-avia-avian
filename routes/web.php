<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dokumen/{file}/view', function ($file) {

    $path = str_replace('|', '/', $file);

    return redirect(env('SUPABASE_PUBLIC_URL') . '/' . $path);
})->name('dokumen.view');

Route::get('/dokumen/{file}/download', function ($file) {

    $path = str_replace('|', '/', $file);

    return redirect(env('SUPABASE_PUBLIC_URL') . '/' . $path);
})->name('dokumen.download');