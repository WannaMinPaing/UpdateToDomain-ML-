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
            

          	<h2>Singer Create Form</h2>
          	<form method="post" action="{{route('singer.store')}}" enctype="multipart/form-data">
              @csrf



            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control" @error('name') is-invalid @enderror  name   ="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="     Enter Name"  >
                                     
                @error('name')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


           <div class="form-group">
              <label>Gender:</label>
                <div class="col-sm-10">
                     <select class="form-control" name="gender">
                        
                          <option value="Male"> Male </option>
                          <option value="Female"> Female</option>
                       
                      </select>
                  </div>

            </div>



            <div class="form-group">
              <label>Type:</label>


              <div class="col-sm-10">
                     <select class="form-control" name="type">
                        
                          <option value="Local"> Local </option>
                          <option value="Internation"> Internation</option>
                          <option value="Kpop"> Kpop</option>
                       
                      </select>
                  </div>


            </div>


           



            <div class="form-group">
              <label>Photo:(<small class="text-danger">jpeg|bmp|png</small>)</label>
              <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
               @error('photo')
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