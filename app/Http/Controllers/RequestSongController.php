<?php

namespace App\Http\Controllers;

use App\Request_song;
use Illuminate\Http\Request;
use Auth;

class RequestSongController extends Controller
{
    public function __construct($value='')

{
    $this->middleware('role:admin')->except('store');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request_songs = Request_song::all();
        return view('request_song.index', compact('request_songs'));
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
        $request_date = date('Y-m-d');
        $request_song = new Request_song;
        $request_song->request_msg = $request->request_msg;
        $request_song->request_date = $request_date;
        $request_song->user_id = Auth::id();
        $request_song->save();

        return 'Request successful!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request_song  $request_song
     * @return \Illuminate\Http\Response
     */
    public function show(Request_song $request_song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request_song  $request_song
     * @return \Illuminate\Http\Response
     */
    public function edit(Request_song $request_song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request_song  $request_song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Request_song $request_song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request_song  $request_song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request_song $request_song)
    {
        $request_song->delete();
        return redirect()->route('request_song.index');
    }
}
