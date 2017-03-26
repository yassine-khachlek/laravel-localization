<?php

namespace Yk\LaravelLocalization\App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use File;

class KeysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($language, $file)
    {
        $translations = include resource_path('lang/'.$language.'/'.$file.'.php');

        $translations = array_dot($translations);

        $translations = array_filter($translations, function ($translation) {
            return gettype($translation) === 'string';
        });

        return view('Yk\LaravelLocalization::keys.index', compact('language', 'file', 'translations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($language, $file)
    {
        $languages = array_map(function($directory){
            return basename($directory);
        }, File::directories(resource_path('lang')));

        return view('Yk\LaravelLocalization::keys.create', compact('language', 'file', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $language, $file)
    {
        $translations = include resource_path('lang/'.$language.'/'.$file.'.php');

        $translations = array_dot($translations);

        $validator = Validator::make($request->all(), [
            'key' => 'required|min:1|not_in:'.implode(',', array_keys($translations)),
            'value' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            if($request->ajax())
            {
                return Response::json($validator->messages(), 400);
            }else{
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
        }

        $translations[$request->get('key')] = $request->get('value');

        $array = array();

        foreach ($translations as $key => $value) {
            array_set($array, $key, $value);
        }

        File::put(resource_path('lang/'.$language.'/'.$file.'.php'), view('Yk\LaravelLocalization::scaffolds.language', ['array' => var_export($array, true)]));

        return redirect(route('localization.keys.index', compact('language', 'file')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($language, $file, $key)
    {
        $translations = include resource_path('lang/'.$language.'/'.$file.'.php');

        $translations = array_dot($translations);

        $value = $translations[$key];

        return view('Yk\LaravelLocalization::keys.edit', compact('language', 'file', 'key', 'value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $language, $file, $key)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            if($request->ajax())
            {
                return Response::json($validator->messages(), 400);
            }else{
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
        }

        $translations = include resource_path('lang/'.$language.'/'.$file.'.php');

        $translations = array_dot($translations);

        $translations[$key] = $request->get('value');

        $array = [];

        foreach ($translations as $key => $value) {

            array_set($array, $key, $value);

        }

        File::put(resource_path('lang/'.$language.'/'.$file.'.php'), view('Yk\LaravelLocalization::scaffolds.language', ['array' => var_export($array, true)]));

        return redirect(route('localization.keys.index', compact('language', 'file')));
    }
}
