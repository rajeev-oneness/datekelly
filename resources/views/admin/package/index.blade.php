@extends('admin.master')

@section('title')
	Categories
@endsection

@section('content')
	<div class="container ">
		<div class="table-responsive bg-white p-5">
            <table id="customDataTable" class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Offer Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1
                  @endphp
                  @foreach ($packages as $package)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$package->name}}</td>
                    <td>{{$package->price}}</td>
                    <td>{{(($package->offer_price == '')? 'No offers!' : $package->offer_price)}}</td>
                    <td>{{$package->description}}</td>
                    <td>{{(($package->status == 0)? 'Blocked' : 'Active')}}</td>
                    <td>
                        <a href="{{route('admin.package.edit', encrypt($package->id))}}" title="edit"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="{{route('admin.package.delete', encrypt($package->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
	</div>
@endsection