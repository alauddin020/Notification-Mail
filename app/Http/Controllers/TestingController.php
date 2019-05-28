<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;
class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->hasFile('profile_image')) {
        //get filename with extension
        $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('profile_image')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
 
        //Upload File
        $request->file('profile_image')->storeAs('public/images', $filenametostore);
        $request->file('profile_image')->storeAs('public/thumbnail', $filenametostore);
 
        //Resize image here

        $thumbnailpath = public_path('storage/thumbnail/'.$filenametostore);
        $img = Image::make($thumbnailpath)->resize(150, 150, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
        
        $original = public_path('storage/images/'.$filenametostore);
        $img1 = Image::make($original)->resize(720, 720, function($constraint) {
            $constraint->aspectRatio();
        });
        $img1->save($original);

        return redirect('/')->with('success', "Image uploaded successfully.");
    }

    }
    public function money()
    {
        // $number = 1234.56;
        // // let's print the international format for the en_US locale
        // setlocale(LC_MONETARY, 'en_US');
        // echo money_format('%i', $number) . "\n";
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
    public function edit($id)
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
    public function update(Request $request, $id)
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
