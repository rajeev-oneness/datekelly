@extends('admin.master')

@section('title')
	Categories
@endsection

@section('content')
	<div class="container">
		<div class="table-responsive bg-white p-5">
            <table id="customDataTable" class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Country</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1
                  @endphp
                  @foreach ($cities as $city)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$city->name}}</td>
                    <td>{{$city->country->name}}</td>
                    <td>
                        <a href="{{route('admin.city.edit', encrypt($city->id))}}" title="edit"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="{{route('admin.city.delete', encrypt($city->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
	</div>
@endsection