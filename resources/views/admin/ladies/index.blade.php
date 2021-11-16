@extends('admin.master')

@section('title')
	Ladies
@endsection

@section('content')
	<div class="container ">
		<div class="table-responsive bg-white p-5">
        <table id="customDataTable" class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Age</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php
                $i = 1
            @endphp
            @foreach ($ladies as $lady)
            <tr>
              <th scope="row">{{$i++}}</th>
              <td><a href="{{route('admin.ladies.details', encrypt($lady->id))}}">{{$lady->name}}</a></td>
              <td>{{$lady->email}}</td>
              <td>{{$lady->phn_no}}</td>
              <td>{{$lady->age}} years</td>
              <td>
                  <a href="{{route('admin.ladies.edit', encrypt($lady->id))}}" title="edit"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
                  <a href="{{route('admin.ladies.delete', encrypt($lady->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
	</div>
@endsection