@extends('admin.master')

@section('title')
	Add City
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Add City</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.city.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}" />
                            @if ($errors->has('name'))
                                <span style="color: red;">{{ $errors->first('name') }}</span>
                            @endif
                            <b class="m-2">Or</b><br>
                            <label>Upload Excel File:</label>
                            <input type="file" name="file" class="form-control" id="customFile">
                            @if ($errors->has('file'))
                                    <span style="color: red;">{{ $errors->first('file') }}</span>
                            @endif
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Country name:</label>
                            {{-- <input type="text" class="form-control" name="country_id" placeholder="Enter country code" /> --}}
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">select</option>
                            </select>
                            @if ($errors->has('country_id'))
                                <span style="color: red;">{{ $errors->first('country_id') }}</span>
                            @endif
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                    </div>
                    <!-- end: Example Code-->
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-color mr-2">Submit</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
	</div>
@endsection

@section('script')
    <script>
        $("#country_id").one('focus', function() {
            // alert('hi');
            $.ajax({
                url: "{{route('get.country')}}",
                method: 'POST',
                data:{'_token': '{{csrf_token()}}'},
                success: function(data) {
                    var country = '';
                    $.each(data.data, function(index, val) {
                        country += "<option value='"+val.id+"'>"+val.name+"</option>";
                    });
                    $("#country_id").append(country);
                }
            })
        });
    </script>
@endsection