<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/dddd', function () {
    $fields = [
        'username' => ['name' => 'UserName', 'required' => true],
        'password' => ['name' => 'Password', 'required' => false],
    ];

    $form = '';

    foreach ($fields as $f) {
        $field = "
            <br>
            <label for='${f['name']}'>${f['name']}</label>
            <br>
            <input name='${f['name']}' id='${f['name']}'>
        ";
//        if ($f['required']){
//            $field .= ' required';
//        }

        $form .= $field;
    }

    return view('a', compact('form'));
});
