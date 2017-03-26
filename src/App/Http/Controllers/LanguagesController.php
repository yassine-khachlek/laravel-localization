<?php

namespace Yk\LaravelLocalization\App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
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

    /**
     * Show the form for copying a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function copy($language)
    {
        return view('Yk\LaravelLocalization::languages.copy', compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $language)
    {
        $languages = array_map(function($directory){
            return basename($directory);
        }, File::directories(resource_path('lang')));

        $validator = Validator::make($request->all(), [
            'language_iso_code' => 'required|min:2|max:5|not_in:'.implode(',', $languages),
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

        File::copyDirectory(resource_path('lang/'.$language), resource_path('lang/'.$request->get('language_iso_code')));

        return redirect(route('localization.languages.index', compact('language')));
    }
}
