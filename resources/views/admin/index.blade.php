@extends('admin.master')

@section('title')
	Dashboard
@endsection

@section('content')
	<div class="container">
		{{-- <h1>Dashboard</h1> --}}
		<div class="row">
			<div class="col-lg-4">
				<!--begin::Card-->
				<div class="card card-custom card-stretch">
					<div class="card-header" style="background-color: #fdcde6;">
						<div class="card-title">
							<h3 class="card-label">Ladies <small><i class="fas fa-venus"></i></small></h3>
						</div>
					</div>
					<div class="card-body">
						<h2>
						@if ($ladies == 0)
							No Ladies!
						@elseif($ladies == 1)
							1 Lady
						@else
							{{$ladies}} Ladies
						@endif
						</h2>
					</div>
				</div>
				<!--end::Card-->
			</div>
			<div class="col-lg-4">
				<!--begin::Card-->
				<div class="card card-custom card-stretch">
					<div class="card-header" style="background-color: #fcefab;">
						<div class="card-title">
							<h3 class="card-label">Clubs <small><i class="fas fa-building"></i></small></h3>
						</div>
					</div>
					<div class="card-body">
						<h2>
						@if ($clubs == 0)
							No Clubs!
						@elseif($clubs == 1)
							1 Club
						@else
							{{$clubs}} Clubs
						@endif
						</h2>
					</div>
				</div>
				<!--end::Card-->
			</div>
			<div class="col-lg-4">
				<!--begin::Card-->
				<div class="card card-custom card-stretch">
					<div class="card-header" style="background-color: #add6ff;">
						<div class="card-title">
							<h3 class="card-label">Mens <small><i class="fas fa-mars"></i></small></h3>
						</div>
					</div>
					<div class="card-body">
						<h2>
						@if ($men == 0)
							No Mens!
						@elseif($men == 1)
							1 Man
						@else
							{{$men}} Mens
						@endif
						</h2>
					</div>
				</div>
				<!--end::Card-->
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-lg-4">
				<!--begin::Card-->
				<div class="card card-custom card-stretch">
					<div class="card-header bg-primary">
						<div class="card-title">
							<h3 class="card-label">Total Advertisements </h3>
						</div>
					</div>
					<div class="card-body">
						<h2>
						@if ($total_advertisements == 0)
							No Advertisements!
						@elseif($total_advertisements == 1)
							1 Advertisement
						@else
							{{$total_advertisements}} Advertisements
						@endif
						</h2>
					</div>
				</div>
				<!--end::Card-->
			</div>
			<div class="col-lg-4">
				<!--begin::Card-->
				<div class="card card-custom card-stretch">
					<div class="card-header bg-success">
						<div class="card-title">
							<h3 class="card-label">Active Advertisements</h3>
						</div>
					</div>
					<div class="card-body">
						<h2>
						@if ($active_advertisements == 0)
							No Advertisement!
						@elseif($active_advertisements == 1)
							1 Advertisement
						@else
							{{$active_advertisements}} Advertisements
						@endif
						</h2>
					</div>
				</div>
				<!--end::Card-->
			</div>
			<div class="col-lg-4">
				<!--begin::Card-->
				<div class="card card-custom card-stretch">
					<div class="card-header bg-danger">
						<div class="card-title">
							<h3 class="card-label">Inactive Advertisements</h3>
						</div>
					</div>
					<div class="card-body">
						<h2>
						@if ($inactive_advertisements == 0)
							No Advertisement!
						@elseif($inactive_advertisements == 1)
							1 Advertisement
						@else
							{{$inactive_advertisements}} Advertisements
						@endif
						</h2>
					</div>
				</div>
				<!--end::Card-->
			</div>
		</div>
		<div class="mt-5">
			<div class="card card-custom gutter-b">
				<div class="card-header" style="background-color: #fdcde6;">
					<div class="card-title">
						<h3 class="card-label">Latest Advertisements</h3>
					</div>
				</div>
				<div class="card-body">				 
					<table id="customDataTable" class="table table-hover">
						<thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">Title</th>
							  <th scope="col">Is Verified</th>
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
						</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
@endsection