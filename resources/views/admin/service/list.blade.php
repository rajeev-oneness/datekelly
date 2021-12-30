@extends('admin.master')
@section('title','Services')
@section('content')
	<div class="container">
		<h2>Service List</h2>
		<div class="table-responsive bg-white p-5">

			<table id="customDataTable" class="table table-hover">
				<thead>
					<tr>
						<th> #ID</th>
						<th> Title</th>
						<th> Popularity</th>
						<th> Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($service as $key => $servi)
						<tr>
							<td>#{{$servi->id}}</td>
							<td>{{$servi->title}}</td>
							<td>
								@if($servi->popularity == 1)
									{{('Yes')}}
								@else
									{{('No')}}
								@endif
							</td>
							<td>
								<a href="javascript:void(0)" class="editService" data-id="{{$servi->id}}" data-title="{{$servi->title}}" data-popular="{{$servi->popularity}}"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
								<a href="javascript:void(0)" class="deleteServices" data-id="{{$servi->id}}"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<!--Add Services Modal -->
	<div class="modal fade" id="addServicesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
	                <button type="button" class="btn-close"></button>
	            </div>
	            <form method="post" action="{{route('admin.service.store')}}">
	                @csrf
	                <input type="hidden" name="form_type" value="add">
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="title">Service Name</label>
	                        <input type="text" name="title" id="title" class="form-control @error('title'){{('is-invalid')}}@enderror" placeholder="Service title" maxlength="255" value="{{old('title')}}" required="">
	                        @error('title')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
	                    </div>
	                    <div class="form-group">
	                        <label for="title">Popularity</label>
	                        <select name="popularity" class="form-control @error('popularity'){{('is-invalid')}}@enderror">
	                        	<option value="0" @if(old('popularity') == 0){{('selected')}}@endif>No</option>
	                        	<option value="1" @if(old('popularity') == 1){{('selected')}}@endif>Yes</option>
	                        </select>
	                        @error('popularity')
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

	<!--Edit Services Modal -->
	<div class="modal fade" id="editServicesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Edit Service</h5>
	                <button type="button" class="btn-close"></button>
	            </div>
	            <form method="post" action="{{route('admin.service.update')}}">
	                @csrf
	                <input type="hidden" name="form_type" value="edit">
	                <input type="hidden" name="serviceId" value="{{old('serviceId')}}">
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="title">Service Name</label>
	                        <input type="text" name="title" id="title" class="form-control @error('title'){{('is-invalid')}}@enderror" placeholder="Service title" maxlength="255" value="{{old('title')}}" required="">
	                        @error('title')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
	                    </div>

	                    <div class="form-group">
	                        <label for="title">Popularity</label>
	                        <select name="popularity" class="form-control @error('popularity'){{('is-invalid')}}@enderror">
	                        	<option value="0" @if(old('popularity') == 0){{('selected')}}@endif>No</option>
	                        	<option value="1" @if(old('popularity') == 1){{('selected')}}@endif>Yes</option>
	                        </select>
	                        @error('popularity')
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
	                $('#addServicesModal').modal('show');
	            @enderror
	            @if(old('form_type') == 'edit')
	                $('#editServicesModal').modal('show');
	            @enderror
	        });

	        $(document).on('click','.editService',function(){
	            var id = $(this).attr('data-id'),title = $(this).attr('data-title'),popular = $(this).attr('data-popular');
	            $('.form-control').removeClass('is-invalid');
	            $('.invalid-feedback').remove();
	            $('#editServicesModal input[name=serviceId]').val(id);
	            $('#editServicesModal input[name=title]').val(title);
	            $('#editServicesModal select[name=popularity]').val(popular);
	            $('#editServicesModal').modal('show');
	        });

	        $(document).on('click','.deleteServices',function(){
	            var thisClickedbtn = $(this);
	            var serviceId = $(this).attr('data-id');
	            swal({
	                title: "Are you sure?",
	                text: "Once deleted, you will not be able to recover this Service!",
	                buttons: true,
	                dangerMode: true,
	            })
	            .then((willDelete) => {
	                if (willDelete) {
	                    $.ajax({
	                        type:'POST',
	                        dataType:'JSON',
	                        url:"{{route('admin.service.delete')}}",
	                        data: {serviceId:serviceId,'_token': '{{csrf_token()}}'},
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