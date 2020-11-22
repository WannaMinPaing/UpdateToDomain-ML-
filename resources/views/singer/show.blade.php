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

          <h2>Singer Detail</h2>

          <div class="card my-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{asset($singer->photo)}}" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">

                <h5 class="card-title">{{$singer->name}}</h5>
                  <p class="card-text">Type:{{$singer->type}}</p>
                  <p class="card-text">Gender:{{$singer->gender}}</p>
                  
                  
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </main>
@endsection