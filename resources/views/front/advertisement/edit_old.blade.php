@extends('front.layouts.master')

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
        <div class="col-12"><a href="{{route('advertisement.list')}}" class="login-btn float-right">Back <i class="fas fa-step-backward"></i></a></div>
    </div>
    <div class="row m-0 dashboard align-items-center">
        <form action="{{route('advertisement.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="advertisement_id" value="{{base64_encode($advertisement->id)}}">
            <h5>General</h5>
            <hr>
            <div class="form-row">
                <div class="col-sm-6">
                    <label>Title:</label>
                    <input type="text" class="form-control" name="title" value="{{$advertisement->title}}" placeholder="Title">
                </div>
                <div class="col-sm-3">
                    <label>Price:</label>
                    <input type="number" class="form-control" name="price" value="{{$advertisement->price}}" placeholder="Price">
                </div>
                <div class="col-sm-3">
                    <label>Category:</label>
                    <select name="category" id="category" class="form-control">
                        <option value="" hidden>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{($advertisement->category == $category->id)? 'selected': '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="b-img-select">
                    <a class="button secondary url" href="javascript:void(0);"><img src="{{asset('storage/advertiseImages').'/'.$advertisement->image}}"></a>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>Phone Number:</label>
                    <input type="number" class="form-control" name="phn_no" value="{{$advertisement->phn_no}}" placeholder="Phone Number">
                </div>
                <div class="col-sm-4">
                    <label>Whatsapp Number:</label>
                    <input type="number" class="form-control" name="whatsapp" value="{{$advertisement->whatsapp}}" placeholder="Whatsapp Number">
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <label>Sex:</label>
                    <select name="sex" id="assigned_club" class="form-control">
                        <option value="" hidden>Select Sex</option>
                        <option value="Female" {{($advertisement->sex == 'Female')? 'selected': '' }}>Female</option>
                        <option value="Male" {{($advertisement->sex == 'Male')? 'selected': '' }}>Male</option>
                        <option value="Others" {{($advertisement->sex == 'Others')? 'selected': '' }}>Others</option>
                    </select>
                    {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                </div>
                <div class="col-4">
                    <label>Country:</label>
                    <select name="country_id" id="country_id" class="form-control">
                        <option value="" hidden>Select</option>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}" {{($advertisement->country_id == $country->id)? 'selected' : ''}}>{{$country->name}}</option>
                        @endforeach
                    </select>
                    {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                </div>
                <div class="col-4">
                    <label>City:</label>
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="{{$advertisement->city->id}}" selected>{{$advertisement->city->name}}</option>
                    </select>
                    {{-- <span class="form-text text-muted">Please enter your username</span> --}}
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4">
                    <label>Age:</label>
                    <input type="text" class="form-control" name="age" value="{{$advertisement->age}}" placeholder="Age">
                </div>
                <div class="col-sm-4">
                    <label>Length(in cm):</label>
                    <input type="number" class="form-control" name="length" value="{{$advertisement->length}}" placeholder="Length">
                </div>
                <div class="col-sm-4">
                    <label>Cup Size:</label>
                    <input type="text" class="form-control" name="cup_size" value="{{$advertisement->cup_size}}" placeholder="Cup Size">
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-4">
                    <label>Weight (In Kg):</label>
                    <input type="text" class="form-control" name="weight" value="{{$advertisement->weight}}" placeholder="Weight">
                </div>
                <div class="col-sm-4">
                    <label>Body Size:</label>
                    <input type="text" class="form-control" name="body_size" value="{{$advertisement->body_size}}" placeholder="Body Size">
                </div>
                <div class="col-sm-4">
                    <label>Descent:</label>
                    <input type="text" class="form-control" name="descent" value="{{$advertisement->descent}}" placeholder="Descent">
                </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <label>Language:</label>
                    <select name="language" id="language" class="form-control">
                        <option value="" hidden>Select Language</option>
                        @foreach ($languages as $language)
                        <option value="{{$language->id}}" {{($advertisement->language == $language->id)? 'selected': '' }}>{{$language->name}}</option>
                        @endforeach
                    </select>
                    {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                </div>
                <div class="col-4">
                    <label>About:</label>
                    <textarea name="about" class="form-control" name="about" placeholder="About">{{$advertisement->about}}</textarea>
                    {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                </div>
                <div class="col-4">
                    <label>Message:</label>
                    <textarea name="message" class="form-control" name="message" placeholder="Message">{{$advertisement->message}}</textarea>
                    {{-- <span class="form-text text-muted">Please enter your username</span> --}}
                </div>
            </div>
            <br>
            <h5>Images</h5>
            <hr>
            <div class="b-img-select">
                @php
                    $i = 0;
                    $gallery = explode(',', $advertisement->image_gallery->img);
                @endphp
                @foreach ($gallery as $key => $img)
                    <a class="button secondary url" href="javascript:void(0);"><img src="{{asset('storage/advertiseImages').'/'.$img}}"></a>
                @endforeach
            </div>
            <div class="form-row">
                <div class="col-sm-12">
                    <label>Upload images:</label>
                    <input type="file" class="form-control" name="ad_imgs[]" multiple>
                </div>
            </div>
            <br>
            <h5>Services</h5>
            <hr>
            @forelse ($advertisement->services as $key => $service)
                <div class="form-row mt-2" id="service-row-{{$key+1}}">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="service_name[]" placeholder="Service Name" value="{{$service->service_name}}" id="service_name">
                    </div>
                    <div class="col-sm-4">
                        <select name="include[]" id="" class="form-control">
                            <option value="1" {{($service->include == 1)? 'selected': '' }}>Included</option>
                            <option value="0" {{($service->include == 0)? 'selected': '' }}>Not Included</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="service_incl_price[]" placeholder="Price(If not included)" value="{{$service->price}}">
                    </div>
                    <div class="col-sm-1">
                        @if( $key == count($advertisement->services)-1)
                        <button type="button" id="add_service_button" data-id="{{$key+1}}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                        @else
                        <button type="button" id="{{$key+1}}" class="btn btn-danger btn-sm" onclick="removeServiceRow(this.id)"><i class="fas fa-trash"></i></button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="form-row mt-2" id="service-row-1">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="service_name[]" placeholder="Service Name" id="service_name">
                    </div>
                    <div class="col-sm-4">
                        <select name="include[]" id="" class="form-control">
                            <option value="1">Included</option>
                            <option value="0">Not Included</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="service_incl_price[]" placeholder="Price(If not included)">
                    </div>
                    <div class="col-sm-1">
                        <button type="button" id="add_service_button" data-id="1" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            @endforelse
            <div id="add_services"></div>
            <br>
            <h5>Duration</h5>
            <hr>
            @forelse ($advertisement->service_duration as $key => $duration)
                <div class="form-row mt-2" id="duration-row-{{$key+1}}"">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="duration[]" value="{{$duration->time}}" id="duration" placeholder="Weight">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="duration_price[]" placeholder="Price" value="{{$duration->price}}">
                    </div>
                    <div class="col-sm-1">
                        @if( $key == count($advertisement->service_duration)-1)
                        <button type="button" id="add_duration_button" data-id="{{$key+1}}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                        @else
                        <button type="button" id="{{$key+1}}" class="btn btn-danger btn-sm" onclick="removeDurationRow(this.id)"><i class="fas fa-trash"></i></button>
                        @endif
                        
                    </div>
                </div>
            @empty
                <div class="form-row mt-2" id="duration-row-1">
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="duration[]" value="{{$duration->time}}" id="duration" placeholder="Weight">
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="duration_price[]" placeholder="Price" value="{{$duration->price}}">
                    </div>
                    <div class="col-sm-1">
                        <button type="button" id="add_duration_button" data-id="1" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            @endforelse
            <div id="add_durations"></div>
            <div class="col-12 mt-5">
                <button type="submit" class="login-btn float-right">Update Advertisement</button>
            </div>
        </form>
    </div>
</div>   
@endsection

@section('sub-script')
<script>
    $("#country_id").on('change', function() {
        var country_id = $("#country_id").val();
        $.ajax({
            url: "{{route('get.country-wise.city')}}",
            method: 'POST',
            data: {
                '_token': '{{csrf_token()}}',
                'country_id': country_id
            },
            success:function(data) {
                console.log(data);
                var city = '';
                $("#city_id").empty();
                $.each(data.data, function(index, value) {
                    city += "<option value='"+value.id+"'>"+value.name+"</option>"
                });
                $("#city_id").append(city);
            }
        });
    });

    counter = 1;
    $("#add_service_button").click(function() {
        add = $(this).data('id');
        let newRow = '<div class="form-row mt-2" id="service-row-'+(add+counter)+'"><div class="col-sm-4"><input type="text" class="form-control" name="service_name[]" placeholder="Service Name" id="service_name"></div><div class="col-sm-4"><select name="include[]" id="" class="form-control"><option value="1">Included</option><option value="0">Not Included</option></select></div><div class="col-sm-3"><input type="number" class="form-control" name="service_incl_price[]" placeholder="Price(If not included)"></div><div class="col-sm-1"><button type="button" id="'+(add+counter)+'" class="btn btn-danger btn-sm" onclick="removeServiceRow(this.id)"><i class="fas fa-trash"></i></button></div></div>';
        $("#add_services").append(newRow);
        counter += 1;
    })

    $("#add_duration_button").click(function() {
        add = $(this).data('id');
        let newRow = '<div class="form-row mt-2" id="duration-row-'+(counter+add)+'"><div class="col-sm-5"><input type="text" class="form-control" name="duration[]" id="duration" placeholder="Service Duration"></div><div class="col-sm-6"><input type="number" class="form-control" name="duration_price[]" placeholder="Price"></div><div class="col-sm-1"><button type="button" id="'+(counter+add)+'" class="btn btn-danger btn-sm" onclick="removeDurationRow(this.id)"><i class="fas fa-trash"></i></button></div></div>';
        $("#add_durations").append(newRow);
        counter += 1;
    })

    function removeServiceRow(id) {
        $("#service-row-"+id).remove();
    }
    function removeDurationRow(id) {
        $("#duration-row-"+id).remove();
    }
</script>
@endsection