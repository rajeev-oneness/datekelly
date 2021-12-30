@extends('admin.master')

@section('title')
	Clubs
@endsection

@section('content')
	<div class="container ">
		<div class="table-responsive bg-white p-5">
            <table id="customDataTable" class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Country</th>
                    <th scope="col">City</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clubs as $club)
                      <tr>
                        <th scope="row">{{$club->id}}</th>
                        <td><a href="{{route('admin.clubs.details', encrypt($club->id))}}">{{$club->name}}</a></td>
                        <td>{{$club->email}}</td>
                        <td>
                          @if($club->country)
                            {{$club->country->name}}
                          @else
                              {{('N/A')}}
                          @endif
                        </td>
                        <td>
                          @if($club->city)
                            {{$club->city->name}}
                          @else
                              {{('N/A')}}
                          @endif
                        </td>
                        <td>
                            <a href="{{route('admin.clubs.edit', encrypt($club->id))}}" title="edit"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
                            <a href="{{route('admin.clubs.delete', encrypt($club->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
	</div>
@endsection