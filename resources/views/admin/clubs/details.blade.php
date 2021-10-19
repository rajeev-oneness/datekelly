@extends('admin.master')

@section('title')
{{$club->name}}
@endsection

@section('content')
<div class="container ">
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label"><a href="{{ route('admin.clubs') }}"><i class="fas fa-arrow-left text-primary mr-2"></i>{{$club->name}}</a></h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_2">Basic Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_2">Advertisements</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="kt_tab_pane_1_2" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row mb-3">
                                <div class="col-3"><strong>Name</strong></div>
                                <div class="col-9">{{$club->name}}</div>
                            </div>
                            {{-- <div class="row mb-3">
                                <div class="col-3"><strong>Assigend Club</strong></div>
                                <div class="col-9">
                                    @if ($lady->lady_club)
                                        {{$lady->lady_club->name}}
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <div class="col-3"><strong>Country</strong></div>
                                <div class="col-9">{{$club->country->name}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>City</strong></div>
                                <div class="col-9">{{$club->city->name}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Email</strong></div>
                                <div class="col-9">{{$club->email}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>Phone</strong></div>
                                <div class="col-9">{{$club->phn_no}}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-3"><strong>WhatsApp</strong></div>
                                <div class="col-9">{{$club->whatsapp_no}}</div>
                            </div>
                            <div class="row">
                                <div class="col-3"><strong>Website</strong></div>
                                <div class="col-9">{{$club->website_address}}</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-4">
                                <img src="{{asset('/storage/clubs/profile_pic') .'/'. $club->profile_pic}}" alt="Profile Picture" width="150px">
                            </div>
                            <div class="row">
                                <strong>About</strong>
                                {{$club->about}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_2_2" role="tabpanel">
                    <div class="table-responsive bg-white p-5">
                        <table id="customDataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Is Verified</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($club->clubs_ad as $key => $advertisement)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td><a href="{{route('admin.advertisement.show', base64_encode($advertisement->id))}}">{{$advertisement->title}}</a></td>
                                    <td>{!!($advertisement->is_verified == 1)? "<span class='badge badge-success'>Verified</span>" : "<span class='badge badge-danger'>Not Verified</span>"!!}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection