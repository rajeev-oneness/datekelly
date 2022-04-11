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
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1
                  @endphp
                  @foreach ($categories as $category)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a href="{{route('admin.category.edit', encrypt($category->id))}}" title="edit"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="{{route('admin.category.delete', encrypt($category->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
	</div>
@endsection