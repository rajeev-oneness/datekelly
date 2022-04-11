@extends('admin.master')

@section('title')
	Origin
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
            <form action="{{route('admin.origin.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="origin_name">Origin name</label>
                <input type="text" name="origin_name" id="origin_name" class="form-control" required>
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
            <th scope="col">Origin</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i = 1
          @endphp
          @foreach ($origins as $key => $origin)
          <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$origin->origin_name}}</td>
            <td>
                <a href="javascript:void(0);" title="edit" data-toggle="modal" data-target="#editModal-{{$origin->id}}"><i class="fas fa-pen"></i></a>&nbsp;&nbsp;&nbsp;
                <a href="{{route('admin.origin.delete', $origin->id)}}" title="delete" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <!-- Edit Modal -->
          <div class="modal fade" id="editModal-{{$origin->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal-{{$origin->id}}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModal-{{$origin->id}}Label">Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{route('admin.origin.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="originId" value="{{$origin->id}}">
                    <div class="form-group">
                      <label for="origin_name">Origin name</label>
                      <input type="text" name="origin_name" id="origin_name" class="form-control" value="{{$origin->origin_name}}" required>
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