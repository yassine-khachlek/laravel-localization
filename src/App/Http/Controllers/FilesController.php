<?php

namespace Yk\LaravelLocalization\App\Http\Controllers;

use Illuminate\Http\Request;

use File;

class FilesController extends Controller
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

        return view('Yk\LaravelLocalization::index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($language, $file)
    {
        $file = File::get(resource_path('lang/'.$language.'/'.$file.'.php'));

        return view('Yk\LaravelLocalization::files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($language, $file)
    {
        $translations = include resource_path('lang/'.$language.'/'.$file.'.php');

        $translations = array_filter(array_dot($translations), function ($translation) {
            return gettype($translation) === 'string';
        });

        return view('Yk\LaravelLocalization::files.edit', compact('language', 'file', 'translations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $language, $file)
    {
        //dd($request->all());

        $localization = [];

        foreach ($request->all() as $key => $value) {
            if (!starts_with($key, 'KEY_')) {
                continue;
            }
            
            array_set($localization, $request->get($key), $request->get(str_replace('KEY_', 'VALUE_', $key)));
        }

        File::put(resource_path('lang/'.$language.'/'.$file.'.php'), view('Yk\LaravelLocalization::scaffolds.language', ['array' => var_export($localization, true)]));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
