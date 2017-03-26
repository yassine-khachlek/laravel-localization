<?php

namespace Yk\LaravelLocalization\App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($language)
    {
        $languages = array_map(function($directory){
            return basename($directory);
        }, File::directories(resource_path('lang')));

        return view('Yk\LaravelLocalization::files.create', compact('language', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $language)
    {
        $files = array_map(function($file){
            return basename($file, '.php');
        }, File::files(resource_path('lang/'.$language)));

        $validator = Validator::make($request->all(), [
            'file' => 'required|min:1|not_in:'.implode(',', $files),
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

        foreach ($languages as $language) {
            $array = array();
            File::put(resource_path('lang/'.$language.'/'.$request->get('file').'.php'), view('Yk\LaravelLocalization::scaffolds.language', ['array' => var_export($array, true)]));
        }

        return redirect(route('localization.files.index', compact('language')));
    }
}
