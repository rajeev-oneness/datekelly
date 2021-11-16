@extends('admin.master')

@section('title')
{{$men->name}}
@endsection

@section('content')
<div class="container ">
    <div class="card card-custom card-sticky" id="kt_page_sticky_card">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label"><a href="{{ route('admin.mens') }}"><i class="fas fa-arrow-left text-primary mr-2"></i>{{$men->name}}</a></h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_2">Basic Info</a>
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
                                <div class="col-9">{{$men->name}}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-3"><strong>Email</strong></div>
                                <div class="col-9">{{$men->email}}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-3"><strong>Phone</strong></div>
                                <div class="col-9">{{$men->phn_no}}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-3"><strong>Date of Birth</strong></div>
                                <div class="col-9">
                                    @if($men->dob == '0000-00-00')
                                        {{('N/A')}}
                                    @else
                                        {{date('d M, Y',strtotime($men->dob))}}
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-3"><strong>Age</strong></div>
                                <div class="col-9">{{$men->age}}</div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="row mb-4">
                                <img src="{{asset($men->profile_pic)}}" alt="Profile Picture" width="150px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection