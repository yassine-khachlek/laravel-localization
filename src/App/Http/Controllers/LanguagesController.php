<?php

namespace Yk\LaravelLocalization\App\Http\Controllers;

use Illuminate\Http\Request;

use File;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = array_map(function($directory){
            return basename($directory);
        }, File::directories(resource_path('lang')));

        return view('Yk\LaravelLocalization::languages.index', compact('languages'));
    }
}
