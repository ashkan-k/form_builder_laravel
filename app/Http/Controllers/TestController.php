<?php

namespace App\Http\Controllers;

use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Forms\SongForm::class, [
            'method' => 'POST',
            'url' => route('song.store')
        ]);

        return view('song.create', compact('form'));
    }
}
