<?php

namespace App\Http\Controllers;

use App\Song;
use App\Singer;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        $singers=Singer::all();
        return view('song.index',compact('singers','songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::all();  
        $singers = Singer::all(); 
        return view('song.create',compact('songs','singers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     "name"=>"required|min:5",
        //     "song_url"=>"required|mimes:mp3",
        //     "writer_name"=>"required|min:5",
            
        // ]);


        if($request->file()) 
        {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->song_url->getClientOriginalName();

            // brandimg/624872374523_a.jpg
            $filePath = $request->file('song_url')->storeAs('all_song', $fileName, 'public');

            $path = '/storage/'.$filePath;
        }
        
        $song = new Song;
        $song->name=$request->name;
        $song->song_url=$path;
        $song->singer_id=$request->singer_id;
        $song->writer_name=$request->writer_name;
        $song->save();

        return redirect()->route('song.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        
        $singers = Singer::all();
             
      
        return view('song.show',compact('song','singers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
         $singers = Singer::all();
       
        return view('song.edit',compact('song','singers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        

          $request->validate([
            "name"=>"required|min:5",
            "song_url"=>"sometimes|required|mimes:mp3",
            "writer_name"=>"required|min:5",
            "oldsong"=>"required"
            
        ]);



        if($request->file()) 
        {
            // 624872374523_a.jpg
            //delete old photo
            $fileName = time().'_'.$request->song_url->getClientOriginalName();

            // brandimg/624872374523_a.jpg
            $filePath = $request->file('song_url')->storeAs('all_song', $fileName, 'public');

            $path = '/storage/'.$filePath;
        }else
        {
           $path = $request->oldsong;
        }



        $song->name=$request->name;
        $song->writer_name=$request->writer_name;
        $song->singer_id=$request->singer_id;
        $song->song_url=$path;
        $song->save();

         return redirect()->route('song.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('song.index');
    }


        public function count(Request $request){
        $songid = $request->songb;
        $song = Song::where('id', $songid)->increment('count', 1);
        return $song_count;
    }


}
