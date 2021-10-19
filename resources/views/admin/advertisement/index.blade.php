@extends('admin.master')

@section('title')
	Advertisements
@endsection

@section('content')
	<div class="container">
		<div class="table-responsive bg-white p-5">
      <table id="customDataTable" class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Is Verified</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i = 1
          @endphp
          @foreach ($advertisements as $advertisement)
          <tr>
            <th scope="row">{{$i++}}</th>
            <td><a href="{{route('admin.advertisement.show', base64_encode($advertisement->id))}}">{{$advertisement->title}}</a></td>
            <td>{!!($advertisement->is_verified == 1)? "<span class='badge badge-success'>Verified</span>" : "<span class='badge badge-danger'>Not Verified</span>"!!}</td>
            <td>
                <a href="{{route('admin.advertisement.verify', encrypt($advertisement->id))}}" title="Verification status change" onclick="return confirm('Are you really want to change the verification status?')"><i class="fas fa-certificate"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="{{route('admin.advertisement.delete', encrypt($advertisement->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
	</div>
@endsection