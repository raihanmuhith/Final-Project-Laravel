<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        return view('profile.index',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Umur' => 'required|integer',
            'alamat' => 'required',
            'bio' => 'required ',
        ]);

        Profile::create([
            'Umur' => $request->Umur,
            'alamat' => $request->alamat,
            'bio' => $request->bio,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/profile')->with('success','Your Profile has been created!');
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
        $profile = Profile::find($id);
        return view('profile.edit',compact('profile'));
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
        Profile::where('id', $id)->update([
        'Umur' => $request->Umur,
        'alamat' => $request->alamat,
        'bio' => $request->bio,
        'user_id' => Auth::user()->id]);

        return redirect('/profile')->with('success','Your Profile Has Been Updated!');
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
