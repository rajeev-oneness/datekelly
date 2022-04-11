@extends('admin.master')
@section('title','Descent')
@section('content')
	<div class="container">
		<h2>Descent List</h2>
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
					@foreach($descentes as $key => $descent)
						<tr>
							<td>#{{$descent->id}}</td>
							<td>{{$descent->title}}</td>
							
							<td>
								<a href="javascript:void(0)" class="editDescent" data-id="{{$descent->id}}" data-title="{{$descent->title}}"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
								<a href="javascript:void(0)" class="deleteDescent" data-id="{{$descent->id}}"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<!--Add Descent Modal -->
	<div class="modal fade" id="addDescentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Add Descent</h5>
	                <button type="button" class="btn-close"></button>
	            </div>
	            <form method="post" action="{{route('admin.descent.store')}}">
	                @csrf
	                <input type="hidden" name="form_type" value="add">
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="title">Descent Name</label>
	                        <input type="text" name="title" id="title" class="form-control @error('title'){{('is-invalid')}}@enderror" placeholder="Descent title" maxlength="255" value="{{old('title')}}" required="">
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

	<!--Edit Descent Modal -->
	<div class="modal fade" id="editDescentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Edit Descent</h5>
	                <button type="button" class="btn-close"></button>
	            </div>
	            <form method="post" action="{{route('admin.descent.update')}}">
	                @csrf
	                <input type="hidden" name="form_type" value="edit">
	                <input type="hidden" name="descentId" value="{{old('descentId')}}">
	                <div class="modal-body">
	                    <div class="form-group">
	                        <label for="title">descent Name</label>
	                        <input type="text" name="title" id="title" class="form-control @error('title'){{('is-invalid')}}@enderror" placeholder="Descent title" maxlength="255" value="{{old('title')}}" required="">
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
	                $('#addDescentModal').modal('show');
	            @enderror
	            @if(old('form_type') == 'edit')
	                $('#editDescentModal').modal('show');
	            @enderror
	        });

	        $(document).on('click','.editDescent',function(){
	            var id = $(this).attr('data-id'),title = $(this).attr('data-title'),popular = $(this).attr('data-popular');
	            $('.form-control').removeClass('is-invalid');
	            $('.invalid-feedback').remove();
	            $('#editDescentModal input[name=descentId]').val(id);
	            $('#editDescentModal input[name=title]').val(title);
	            $('#editDescentModal').modal('show');
	        });

	        $(document).on('click','.deleteDescent',function(){
	            var thisClickedbtn = $(this);
	            var descentId = $(this).attr('data-id');
	            swal({
	                title: "Are you sure?",
	                text: "Once deleted, you will not be able to recover this Descent!",
	                buttons: true,
	                dangerMode: true,
	            })
	            .then((willDelete) => {
	                if (willDelete) {
	                    $.ajax({
	                        type:'POST',
	                        dataType:'JSON',
	                        url:"{{route('admin.descent.delete')}}",
	                        data: {descentId:descentId,'_token': '{{csrf_token()}}'},
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