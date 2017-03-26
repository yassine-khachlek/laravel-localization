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
    public function index($language)
    {
        $files = array_map(function($file) use ($language) {
            return basename($file, '.php');
        }, File::files(resource_path('lang/'.$language)));

        return view('Yk\LaravelLocalization::files.index', compact('language', 'files'));
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
}
