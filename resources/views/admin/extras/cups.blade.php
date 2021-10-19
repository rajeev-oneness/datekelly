@extends('admin.master')

@section('title')
	Cupsize
@endsection

@section('content')
	<div class="container">
    <button class="btn btn-primary mb-4 float-right" data-toggle="modal" data-target="#addMoreModal">+ Add More</button>
    <!--Add Modal -->
    <div class="modal fade" id="addMoreModal" tabindex="-1" role="dialog" aria-labelledby="addMoreModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addMoreModalLabel">Add More</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.cup.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="size">Size</label>
                <input type="text" name="size" id="size" class="form-control" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
          </div>
        </div>
      </div>
    </div>
		<div class="table-responsive bg-white p-5">
      <table id="customDataTable" class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cup Size</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i = 1
          @endphp
          @foreach ($cups as $key => $cup)
          <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$cup->size}}</td>
            <td>
                <a href="javascript:void(0);" title="edit" data-toggle="modal" data-target="#editModal-{{$cup->id}}"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="{{route('admin.cup.delete', $cup->id)}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <!-- Edit Modal -->
          <div class="modal fade" id="editModal-{{$cup->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal-{{$cup->id}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModal-{{$cup->id}}Label">Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('admin.cup.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="cupId" value="{{$cup->id}}">
                    <div class="form-group">
                      <label for="size">Size</label>
                      <input type="text" name="size" id="size" class="form-control" value="{{$cup->size}}" required>
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>
    </div>
	</div>
  

  
@endsection