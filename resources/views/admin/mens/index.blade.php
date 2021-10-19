@extends('admin.master')

@section('title')
	Mens
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
                    <th scope="col">Country</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1
                  @endphp
                  @foreach ($mens as $men)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td><a href="{{route('admin.mens.details', encrypt($men->id))}}">{{$men->name}}</a></td>
                    <td>{{$men->email}}</td>
                    <td>{{$men->country->name}}</td>
                    <td>
                        <a href="{{route('admin.mens.edit', encrypt($men->id))}}" title="edit"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="{{route('admin.mens.delete', encrypt($men->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
	</div>
@endsection