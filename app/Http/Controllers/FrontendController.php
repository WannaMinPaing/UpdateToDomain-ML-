<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Song;
use App\Singer;


class FrontendController extends Controller
{
    public function home($value='')
    {
        $latest_one_song = Song::orderby('id', 'desc')
                            ->take(1)
                            ->get();
        $songs = Song::all();

        $singers = Singer::all();

         $songsDesc = Song::orderby('count','desc')->get();
        
        return view('frontend.mainpage', compact('latest_one_song', 'songs', 'singers','songsDesc'));
    }
    public function songsbysinger($id)
    {
        $mysinger = Singer::find($id);
        $latest_one_song = Song::orderby('id', 'desc')
                            ->take(1)
                            ->get();
        $songs = Song::all();
        $singers = Singer::all();
        // dd($mysinger);
        return view('frontend.mainpage', compact('latest_one_song', 'songs', 'singers', 'mysinger'));
    }


    public function filterSongOfSinger(Request $request)
    {
        $sid=$request->sid;
        $songs=Song::where('singer_id',$sid)->get();
        //dd( $songs);
        return $songs;
    }

    public function song($value='')
    {
        $songs = Song::all();
        return view('frontend.songs', compact('songs'));
    }

    public function isongs(Request $request)
    {
        $intersongs = $request->songtype;//song type(inter or local)

        $type_of_singer = Singer::where('type',$intersongs)->get();
        
        $v = [];
        foreach ($type_of_singer as $key => $value) {
            $a = Song::where('singer_id',$value->id)->with('singer')->get();
            
                array_push($v, $a);
            
        }

        return $v;
    }






    public function lsongs(Request $request)
    {
        $local = $request->songtype;//song type(inter or local)

        $type_of_singer = Singer::where('type',$local)->get();
        
        $v = [];
        foreach ($type_of_singer as $key => $value) {
            $a = Song::where('singer_id',$value->id)->with('singer')->get();
            
                array_push($v, $a);
            
        }

        return $v;
    }


    public function ksongs(Request $request)
    {
        $ksong = $request->songtype;//song type(inter or local)

        $type_of_singer = Singer::where('type',$ksong)->get();
        
        $v = [];
        foreach ($type_of_singer as $key => $value) {
            $a = Song::where('singer_id',$value->id)->with('singer')->get();
            
                array_push($v, $a);
            
        }

        return $v;
    }


    public function msongs(Request $request)
    {
        $msong = $request->songtype;//song type(inter or local)

        $type_of_singer = Singer::where('gender',$msong)->get();
        
        $v = [];
        foreach ($type_of_singer as $key => $value) {
            $a = Song::where('singer_id',$value->id)->with('singer')->get();
            
                array_push($v, $a);
            
        }

        return $v;
    }

    public function fsongs(Request $request)
    {
        $msong = $request->songtype;//song type(inter or local)

        $type_of_singer = Singer::where('gender',$msong)->get();
        
        $v = [];
        foreach ($type_of_singer as $key => $value) {
            $a = Song::where('singer_id',$value->id)->with('singer')->get();
            
                array_push($v, $a);
            
        }

        return $v;
    }




    public function asongs(Request $request)
    {
        $songs = Song::with('singer')->get();
        return $songs;
    }

    //wanna mainpage change

    public function SongsByOneSingerOnePage($id)
    {
        $Onesinger = Singer::find($id);
        $Allsong=Song::all();
        $Allsinger=Singer::all();
        
        return view('frontend.SongsByOneSingerOnePage',compact('Onesinger','Allsong','Allsinger'));
    }


////////////////////////////////////
     public function AllClassMusicOnePage($type)
    {
        $Singers = Singer::where('gender', $type)->get();        
        return view('frontend.AllClassMusicOnePage',compact('Singers'));
    }


      public function AllClassMusicOnePage2($type)
    {
        $Singers = Singer::where('type', $type)->get();        
        return view('frontend.AllClassMusicOnePage2',compact('Singers'));
    }

     public function OneSingerSongs($id)
    {
        $Singers = Singer::where('id', $id)->get();        
        return view('frontend.OneSingerSongs',compact('Singers'));
    }
    ///////////////////////////////////////////




    //wanna end

    public function contact($value='')
    {
        return view('frontend.comment');
    }


    public function Heart($value='')
    {
        return view('frontend.Heart');
    }



    public function search(Request $request)
    {
        $keyword = $request->key;

        $songs = Song::where('name', 'like', '%' . $keyword . '%')->with('singer')->get();

        return $songs;
            
        


    }


    

}