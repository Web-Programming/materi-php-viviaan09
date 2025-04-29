<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('beranda',['name'=> 'Vivian' ,
    'email' =>'ngvivian682@gmail.com', 
    'alamat' => 'lrg kulit no.1443C']);
});

Route::get('/berita/{id}/{judul?}', function ($id, $judul = null) {
    return view('berita', ['id' => $id], ['judul' =>$judul]);
});