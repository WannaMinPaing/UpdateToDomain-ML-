<?php

namespace App\Http\Controllers;

use App\Singer;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $singers = Singer::all();
        return view('singer.index',compact('singers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('singer.create');
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
            "name"=>"required",
            "photo"=>"required|mimes:jpeg,bmp,png",
        ]);

          // if include file, upload
        if($request->file()) 
        {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // brandimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('singerimg', $fileName, 'public');

            $path = '/storage/'.$filePath;
        }

        $singer = new Singer;
        $singer->name = $request->name;
        $singer->gender = $request->gender;
        $singer->type = $request->type;
        $singer->photo = $path;
        $singer->save();

        // redirect
        return redirect()->route('singer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function show(Singer $singer)
    {
       return view('singer.show',compact('singer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function edit(Singer $singer)
    {
        return view('singer.edit',compact('singer'));
       // $brand = Brand::find($id);
        //return view('brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Singer $singer)
    {

        $request->validate([
            "name"=>"required",
            "newphoto"=>"sometimes|required|mimes:jpeg,bmp,png",
            "oldphoto"=>"required"
            
        ]);



        if($request->file()) 
        {
            // 624872374523_a.jpg
            //delete old photo
            $fileName = time().'_'.$request->newphoto->getClientOriginalName();

            // brandimg/624872374523_a.jpg
            $filePath = $request->file('newphoto')->storeAs('singerimg', $fileName, 'public');

            $path = '/storage/'.$filePath;
        }else
        {
           $path = $request->oldphoto;
        }



        $singer->name=$request->name;
        $singer->gender=$request->gender;
        $singer->type=$request->type;
        $singer->photo=$path;
        $singer->save();

         return redirect()->route('singer.index');
       


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Singer  $singer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Singer $singer)
    {
        
        $singer->delete();
        return redirect()->route('singer.index');
    }
}
