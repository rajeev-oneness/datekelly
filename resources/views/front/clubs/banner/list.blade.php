@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
        <div class="col-12"><a href="{{route('club.business.banner.add')}}" class="login-btn float-right">Add <i class="fas fa-plus"></i></a></div>
    </div>
    <div class="row m-0 dashboard align-items-center">
        <div class="table-responsive bg-white">
            <table id="customDataTable" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Images</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($banners as $banner)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td><img src="{{asset($banner->picture)}}" alt="" width="100"></td>
                    <td>
                        <a href="{{route('club.business.banner.delete', base64_encode($banner->id))}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>   
@endsection