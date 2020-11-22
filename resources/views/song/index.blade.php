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
            
         	

          <h2 class="d-inline-block">Song List</h2>
          <a href="{{route('song.create')}}" class="btn btn-info float-right">Add New</a>
          <table class="table mt-3 table-bordered dataTable">
          		<thead>
          			<tr>
          				<td>No</td>
          				<td>Name</td>
          				<td>Singer Name</td>                
          				<td>Action</td>
          				
          			</tr>
          		</thead>
          		<tbody>

                @php
                $i=1;
                @endphp
                @foreach($songs as $row)

          			<tr>
          				<td>{{$i++}}</td>
          				<td>{{$row->name}}</td>

                  @foreach($singers as $row2)
                    @if($row2->id == $row->singer_id)
                    <td>{{$row2->name}}</td>
                    @endif
                 @endforeach

                  	

          				
          				<td>
          					
                  <a href="{{route('song.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                 <a href="{{route('song.show',$row->id)}}" class="btn btn-info">Show</a>


                 <form method="post" action="{{route('song.destroy',$row->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                  </form>
          				
                  </td>		

          			
              </tr>
              @endforeach
          		</tbody>
          		
          	</table>



          </div>
        </div>
      </div>
    </main>

@endsection