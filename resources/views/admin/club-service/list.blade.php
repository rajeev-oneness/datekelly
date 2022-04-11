@extends('admin.master')
@section('title','Club-Services')
@section('content')
	<div class="container">
		<h2>Club Service List</h2>
		<div class="table-responsive bg-white p-5">

			<table id="customDataTable" class="table table-hover">
				<thead>
					<tr>
						<th> #ID</th>
						<th> Title</th>
						<th> Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($clubservices as $key => $servi)
						<tr>
							<td>#{{$servi->id}}</td>
							<td>{{$servi->title}}</td>
							
							<td>
								<a href="javascript:void(0)" class="editClubService" data-id="{{$servi->id}}" data-title="{{$servi->title}}"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
								<a href="javascript:void(0)" class="deleteClubServices" data-id="{{$servi->id}}"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<!--Add Services Modal -->
	<div class="modal fade" id="addClubServicesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Add Club Service</h5>
	                <button type="button" class="btn-close"></button>
	            </div>
	            <form method="post" action="{{route('admin.club.store')}}">
	                @csrf
	                <input type="hidden" name="form_type" value="add">
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="title">Club Service Name</label>
	                        <input type="text" name="title" id="title" class="form-control @error('title'){{('is-invalid')}}@enderror" placeholder="Club Service title" maxlength="255" value="{{old('title')}}" required="">
	                        @error('title')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
	                    </div>
	                </div>
	                <div class="modal-footer">
	                    <button type="submit" class="btn btn-primary">Create</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>

	<!--Edit Club Services Modal -->
	<div class="modal fade" id="editClubServicesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Edit Club Service</h5>
	                <button type="button" class="btn-close"></button>
	            </div>
	            <form method="post" action="{{route('admin.club.update')}}">
	                @csrf
	                <input type="hidden" name="form_type" value="edit">
	                <input type="hidden" name="clubserviceId" value="{{old('clubserviceId')}}">
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="title">Club Service Name</label>
	                        <input type="text" name="title" id="title" class="form-control @error('title'){{('is-invalid')}}@enderror" placeholder="Club Service title" maxlength="255" value="{{old('title')}}" required="">
	                        @error('title')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
	                    </div>

	                </div>
	                <div class="modal-footer">
	                    <button type="submit" class="btn btn-primary">Update</button>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
	@section('script')
		<script type="text/javascript">
			$(document).ready(function(){
	            @if(old('form_type') == 'add' || request()->form_type == 'add')
	                $('#addClubServicesModal').modal('show');
	            @enderror
	            @if(old('form_type') == 'edit')
	                $('#editClubServicesModal').modal('show');
	            @enderror
	        });

	        $(document).on('click','.editClubService',function(){
	            var id = $(this).attr('data-id'),title = $(this).attr('data-title'),popular = $(this).attr('data-popular');
	            $('.form-control').removeClass('is-invalid');
	            $('.invalid-feedback').remove();
	            $('#editClubServicesModal input[name=clubserviceId]').val(id);
	            $('#editClubServicesModal input[name=title]').val(title);
	            $('#editClubServicesModal').modal('show');
	        });

	        $(document).on('click','.deleteClubServices',function(){
	            var thisClickedbtn = $(this);
	            var clubserviceId = $(this).attr('data-id');
	            swal({
	                title: "Are you sure?",
	                text: "Once deleted, you will not be able to recover this Club Service!",
	                buttons: true,
	                dangerMode: true,
	            })
	            .then((willDelete) => {
	                if (willDelete) {
	                    $.ajax({
	                        type:'POST',
	                        dataType:'JSON',
	                        url:"{{route('admin.club.delete')}}",
	                        data: {clubserviceId:clubserviceId,'_token': '{{csrf_token()}}'},
	                        success:function(data){
	                            if(data.error == false){
	                                thisClickedbtn.closest('tr').remove();
	                                swal('Success',data.message);
	                            }else{
	                                swal('Error',data.message);
	                            }
	                        }
	                    });
	                    
	                }
	            });
	        });
		</script>
	@stop
@endsection