@extends('backendtemplate')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
          <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">


             <h2>Song Create Form</h2>
              <form method="post" action="{{route('song.store')}}" enctype="multipart/form-data">
              @csrf


            <div class="form-group">
              <label>Name:</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{  $message }}</strong>
                  </span>
                @enderror
            </div>



            <div class="form-group row">
              <label for="singer_name" class="col-sm-2 col-form-label"> Choose Singer Name </label>
                  <div class="col-sm-10">
                     <select class="form-control" name="singer_id">
                        @foreach($singers as $row)
                          <option value="{{$row->id}}"> {{$row->name}} </option>
                        @endforeach
                      </select>
                  </div>
            </div>


            <div class="form-group">
              <label>Writer Name:</label>
              <input type="text" name="writer_name" class="form-control @error('writer_name') is-invalid @enderror">
                @error('writer_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{  $message }}</strong>
                  </span>
                @enderror
            </div>


            <div class="form-group">
              <label>Song URL:(<small class="text-danger">only Mp3</small>)</label>
              <input type="file" name="song_url" class="form-control-file @error('song_url') is-invalid @enderror">
               @error('song_url')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{  $message }}</strong>
                  </span>
                @enderror
            </div>


            <div class="form-group">
              <input type="submit" name="btnsubmit" value="Save" class="btn btn-success">
            </div>
            
          </form>





          </div>
        </div>
      </div>
    </main>

@endsection