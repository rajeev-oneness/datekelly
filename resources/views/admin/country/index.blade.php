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
                    <th scope="col">Country Code</th>
                    <th scope="col">Phone Code</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1
                  @endphp
                  @foreach ($countries as $country)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$country->name}}</td>
                    <td>{{$country->country_code}}</td>
                    <td>{{$country->phone_code}}</td>
                    <td>
                        <a href="{{route('admin.country.edit', encrypt($country->id))}}" title="edit"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="{{route('admin.country.delete', encrypt($country->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
	</div>
@endsection