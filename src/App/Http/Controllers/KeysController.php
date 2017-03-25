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
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'key' => 'required|min:1',
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

        $languages = array_map(function($directory){

            return basename($directory);

        }, File::directories(resource_path('lang')));

        foreach ($languages as $lang) {
            
            $translations = include resource_path('lang/'.$lang.'/'.$file.'.php');

            $translations = array_dot($translations);
            
            if (! array_key_exists($request->get('key'), $translations)) {

                $translations[$request->get('key')] = '';

            }

            $output = [];

            foreach ($translations as $key => $value) {

                array_set($output, $key, $value);

            }

            File::put(resource_path('lang/'.$lang.'/'.$file.'.php'), view('Yk\LaravelLocalization::scaffolds.language', ['array' => var_export($translations, true)]));

        }

        return redirect(route('localization.files.edit', ['language' => $language, 'file' => $file]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
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
