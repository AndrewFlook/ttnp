<?php

namespace App\Http\Controllers\Admin;

use App\Preferences;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreferencesController extends Controller
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
    public function create()
    {
        return view('layouts.admin.create.holidays');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Preferences::create(['key' => $request->key], ['value' => $request->value]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preferences  $preferences
     * @return \Illuminate\Http\Response
     */
    public function show(Preferences $preferences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preferences  $preferences
     * @return \Illuminate\Http\Response
     */
    public function edit(Preferences $preferences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preferences  $preferences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preferences $preferences)
    {
        if($request->key == 'menu_status') {
            $preference = Preferences::where('key', $request->key)->first();
            $preference->key = $request->key;
            if($request->value == 'on') {
                $preference->value = $request->value;
            } else {
                $preference->value = 'off';
            }
            $preference->save();
            return back();
        } else {
            $preference = Preferences::where('key', $request->key)->first();
            $preference->key = $request->key;
            $preference->value = $request->value;
            $preference->save();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preferences  $preferences
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preferences $preferences)
    {
        Preferences::remove('key', $preferences->key);
    }
}
