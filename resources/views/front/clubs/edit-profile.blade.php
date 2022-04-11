@extends('front.layouts.master')

@section('dashboard-content')
<style>
.form-check .form-check-input {
	display: none;
}
</style>

<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <h4>Update Club</h4>
    <div class="row mb-3 dashboard align-items-center"></div>
    <form class="form" method="POST" action="{{route('club.account.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{encrypt(auth()->guard(get_guard())->user()->id)}}">
        <div class="form-group row">
            <div class="col-lg-6">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$club->name}}" required/>
                @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="col-lg-6">
                <label>Address + House Number:</label>
                <textarea type="text" class="form-control" name="address" placeholder="Address">{{$club->address}}</textarea>
                @error('address')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="col-lg-6">
                <label>Country:</label>
                <select name="country_id" id="country_id" class="form-control">
                    <option value="">Select</option>
                    @foreach ($countries as $country)
                        <option value="{{$country->id}}" {{($club->country_id == $country->id) ? 'selected' : ''}}>{{$country->name}}</option>
                    @endforeach
                </select>
                @error('country_id')<span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="col-lg-6">
                <label>City:</label>
                <select name="city_id" id="city_id" class="form-control">
                    <option value="{{$club->city->id}}">{{$club->city->name}}</option>
                </select>
                @error('city_id')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="col-lg-6">
                <label>Email:</label>
                <input type="text" class="form-control" name="email" placeholder="Enter Phone no" value="{{$club->email}}" required/>
                @error('email')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="col-lg-6">
                <label>Phone No:</label>
                <input type="text" class="form-control" name="phn_no" placeholder="Enter Phone no" value="{{$club->phn_no}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required/>
                @error('phn_no')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="col-lg-6">
                <label>Website:</label>
                <input type="text" class="form-control" name="website" placeholder="Club Website" value="{{$club->website_address}}"/>
                @error('website')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="col-lg-6">
                <label>About us</label>
                <textarea type="text" class="form-control" name="about" placeholder="About">{{$club->about}}</textarea>
                @error('about')<span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        
        <div class="form-group row">
            
            <div class="col-lg-6">
                <label>New Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" />
                @error('password')<span class="form-text text-muted">{{$message}}</span>@enderror
            </div>

            <div class="col-lg-6">
                <label>Confirm Password:</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" >
                @error('password_confirmation')<span class="form-text text-muted">{{$message}}</span>@enderror
            </div>

        </div>

        <div class="form-group row">
            <div class="col-sm-6 p-3">
                <img src="{{asset($club->profile_pic)}}" alt="Profile Pic" width="200">
            </div>
            
            <div class="col-sm-12">
                <label>Update picture:</label>
                <input type="file" class="form-control" name="profile_pic" accept=".png, .jpg, .jpeg"/>
            </div>
        </div>

        {{-- uploaded images --}}
        <div class="row">
            @if($data->info != null)
                @foreach($data->info->advertisement_image as $adImageIndex => $adImageObject)
                    @if($adImageObject->type == 'Image')
                        <div class="col-md-3 imageForDelete">
                            <img src="{{asset($adImageObject->img)}}" class="img-thumbnail">
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteImage" data-details="{{json_encode($adImageObject)}}">X</a>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        {{-- multiple images upload --}}
        <div class="form-group row">
            <div class="col-sm-12">
                <label>Upload Free images: (select min. 3 photos)</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>
        </div>

        {{-- services --}}
        <div class="form-group row">
            <div class="col-lg-6 d-flex flex-column">
                <label class="" for="myservice">Our Service:</label>
                <div class="d-flex">
                    
                    <input type="radio" name="my_service" value="private_visit" @if($data->info != null) @if($data->info->my_service =='private_visit'){{('checked')}} @endif @endif><p class="ml-2">Private Visit - You can visit us</p>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-column">
                <label class="" for="myservice">&nbsp;</label>
                <div class="d-flex">
                    <input type="radio" name="my_service" value="escort" @if($data->info != null) @if($data->info->my_service =='escort'){{('checked')}} @endif @endif><p class="ml-2">Escort - Our ladies visit you</p>
                </div>
            </div>
            @error('my_service')<span class="text-danger">{{$message}}</span>@enderror
        </div>

        {{-- language --}}
        <div class="form-group">
            <label class="" for="length">Language: (select max. 3)</label>
            <div>
                @if($data->info != null)
                    @php $languageIdArray = explode(',', $data->info->language); @endphp
                    @foreach($data->language as $languageIndex => $languageData)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="language[]" type="checkbox" id="inlineCheckboxLanguage{{$languageIndex}}" value="{{$languageData->id}}" @if(in_array($languageData->id,$languageIdArray)){{('checked')}}@endif>
                            <label class="form-check-label" for="inlineCheckboxLanguage{{$languageIndex}}">{{$languageData->name}}</label>
                        </div>
                    @endforeach
                @else
                    @foreach($data->language as $languageIndex => $languageData)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="language[]" type="checkbox" id="inlineCheckboxLanguage{{$languageIndex}}" value="{{$languageData->id}}">
                            <label class="form-check-label" for="inlineCheckboxLanguage{{$languageIndex}}">{{$languageData->name}}</label>
                        </div>
                    @endforeach
                @endif

                @error('language')<p class="small text-danger"> <i class="fas fa-info-circle"></i> {{$message}}</p>@enderror
            </div>
        </div>

        {{-- Time & Price --}}
        <div class="form-group row">
            <div class="col-sm-12">
                <label>Prices: (select min. 3 prices)</label>
                <table class="table" id="timePriceTable">
                    @if ($data->info != null)
                        @forelse($data->info->service_duration as $serviceDurationIndex => $serviceDurationValue)
                        <tr>
                            <td>Time: &nbsp;</td>
                            <td>
                                <select class="form-control" name="time[]">
                                    @foreach($data->time as $timeIndex => $timeData)
                                        <option value="{{$timeData}}" @if($serviceDurationValue->time == $timeData){{('selected')}}@endif>{{$timeData}}</option>
                                    @endforeach	
                                </select>
                            </td>
                            <td>Price: &nbsp;</td>
                            <td><input type="text" name="price[]" class="form-control" placeholder="Price in €" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3" value="{{$serviceDurationValue->price}}"></td>
                            <td><a class="btn btn-sm btn-success actionTimebtn addNewTime">+</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td>Time: &nbsp;</td>
                            <td>
                                <select class="form-control" name="time[]">
                                    @foreach($data->time as $timeIndex => $timeData)
                                        <option value="{{$timeData}}">{{$timeData}}</option>
                                    @endforeach	
                                </select>
                            </td>
                            <td>Price: &nbsp;</td>
                            <td><input type="text" name="price[]" class="form-control" placeholder="Price in €" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3"></td>
                            <td><a class="btn btn-sm btn-success actionTimebtn addNewTime">+</a></td>
                        </tr>
                    @endforelse

                    @else
                    <tr>
                        <td>Time: &nbsp;</td>
                        <td>
                            <select class="form-control" name="time[]">
                                @foreach($data->time as $timeIndex => $timeData)
                                    <option value="{{$timeData}}">{{$timeData}}</option>
                                @endforeach	
                            </select>
                        </td>
                        <td>Price: &nbsp;</td>
                        <td><input type="text" name="price[]" class="form-control" placeholder="Price in €" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="3"></td>
                        <td><a class="btn btn-sm btn-success actionTimebtn addNewTime">+</a></td>
                    </tr>
                    @endif

                </table>
                <table class="table">
                    <tr>
                        <td>Extra price for Escort: </td>
                        <td>
                            <input type="text" class="form-control @error('extraprice_for_escort'){{('is-invalid')}}@enderror" name="extraprice_for_escort" value="{{($data->info != null) ? $data->info->extraprice_for_escort : ''}}" placeholder="Price in EUR (€)">
                            @error('extraprice_for_escort')<span class="text-danger">{{$message}}</span>@enderror
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- services --}}
        @if($data->info != null)
        <div class="form-group row">
            <div class="col-sm-12">
                <label>Services & Extras:</label>
                <table class="table">
                    <tr>
                        <th>Add</th>
                        <th>Service Name</th>
                        <th>Include or Extra Service</th>
                        <th>Extra Price</th>
                    </tr>
                    @php
                        $takenServicesAndExtra = $data->info->services;
                    @endphp
                    @foreach($data->servicesAndExtra as $indexServices => $services)
                        @php
                            $markedServiced = checkServicesTaken($takenServicesAndExtra,$services);
                        @endphp
                        <tr>
                            <td>
                                <input type="hidden" name="services[{{$indexServices}}]" value="">
                                <input type="checkbox" name="services[{{$indexServices}}]" @if(count($markedServiced) > 0){{('checked')}}@endif value="{{$services->title}}">
                            </td>
                            <td>{{$services->title}}</td>
                            <td>
                                <select class="form-control" name="servicesInclude[]" onchange="markAsBlur(this)">
                                    <option value="1" @if(count($markedServiced) > 0 && $markedServiced['include'] == 1){{('selected')}}@endif>Include</option>
                                    <option value="0" @if(count($markedServiced) > 0 && $markedServiced['include'] == 0){{('selected')}}@endif>Not Include</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="servicesPrice[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Price" maxlength="3" @if(count($markedServiced) > 0 && $markedServiced['price'] > 0) value="{{$markedServiced['price']}}" @else {{('readonly')}} @endif>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @else
        <div class="form-group row">
            <div class="col-sm-12">
                <label>Services & Extras:</label>
                <table class="table">
                    <tr>
                        <th>Add</th>
                        <th>Service Name</th>
                        <th>Include or Extra Service</th>
                        <th>Extra Price</th>
                    </tr>
                    @php $selectedServicesInclude = (old('servicesInclude') ?? []); @endphp
                    @foreach($data->servicesAndExtra as $indexServices => $services)
                        <tr>
                            <td>
                                <input type="hidden" name="services[{{$indexServices}}]" value="">
                                <input type="checkbox" name="services[{{$indexServices}}]" value="{{$services->title}}" @if(old('services') && in_array($services->title,old('services'))){{('checked')}}@endif>
                            </td>
                            <td>{{$services->title}}</td>
                            <td>
                                <select class="form-control" name="servicesInclude[]" onchange="markAsBlur(this)">
                                    <option value="0" @if(in_array(0,$selectedServicesInclude)){{('selected')}}@endif>Not Include</option>
                                    <option value="1" @if(in_array(1,$selectedServicesInclude)){{('selected')}}@endif>Include</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="servicesPrice[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Price" maxlength="3" value="{{old('servicesPrice') ? old('servicesPrice')[$indexServices] : ''}}">
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @endif

        {{-- Working Hours --}}
        @if($data->info != null)
        <div class="form-group row">
            <div class="col-sm-12">
                <label>Working Hours:</label>
                <table class="table">
                    @php
                        $selectedWorkingDays = $data->info->service_working_days;
                    @endphp
                    @foreach($data->workingDays as $indexWorking => $workingDays)
                        @php
                            $markedSelectedDays = checkWorkingDaysTaken($selectedWorkingDays,$workingDays);
                        @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="workingDays[]" value="{{$workingDays}}" @if(count($markedSelectedDays) > 0){{('checked')}}@endif>
                                {{$workingDays}}
                            </td>
                            <td>From : <input type="time" name="workingTimeFrom[]" class="form-control" @if(count($markedSelectedDays) > 0) value="{{$markedSelectedDays['from']}}" @endif></td>
                            <td>Till : <input type="time" name="workingTimeTill[]" class="form-control" @if(count($markedSelectedDays) > 0) value="{{$markedSelectedDays['till']}}" @endif></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @else
        <div class="form-group row">
            <div class="col-sm-12">
                <label>Working Hours:</label>
                <table class="table">
                    @foreach($data->workingDays as $indexWorking => $workingDays)
                        <tr>
                            <td>
                                <input type="checkbox" name="workingDays[]" value="{{$workingDays}}" @if(old('workingDays') && count(old('workingDays') > 0) && in_array($workingDays,old('workingDays'))){{('checked')}}@endif>
                                {{$workingDays}}
                            </td>
                            <td>From : <input type="time" name="workingTimeFrom[]" class="form-control" value="{{old('workingTimeFrom') ? old('workingTimeFrom')[$indexWorking]: ''}}"></td>
                            <td>Till : <input type="time" name="workingTimeTill[]" class="form-control" value="{{old('workingTimeTill') ? old('workingTimeTill')[$indexWorking] : ''}}"></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <a href="javascript:void(0)" class="deleteMyAccount text-danger">Delete my account</a>
            </div>

            <div class="col-lg-12">
                <button type="submit" class="btn login-btn float-right">Update</button>
            </div>
        </div>
    </form>
</div>   
@endsection


@section('sub-script')
<script>
    $(document).on('click','.addNewTime',function(){
		var thisClickedBtn = $(this);
		thisClickedBtn.removeClass(['addNewTime','btn-success']);
		thisClickedBtn.addClass(['removeTimePrice','btn-danger']).text('X');
		var toAppend = `<tr><td>Time: &nbsp;</td><td><select class="form-control" name="time[]">@foreach($data->time as $timeIndex => $timeData)<option value="{{$timeData}}">{{$timeData}}</option>@endforeach</select></td><td>Price: &nbsp;</td><td><input type="text" name="price[]" class="form-control" placeholder="Price in €" maxlength="3"></td><td><a class="btn btn-sm btn-success actionTimebtn addNewTime">+</a></td></tr>`;
		$('#timePriceTable').append(toAppend);
	});

	$(document).on('click','.removeTimePrice',function(){
		var thisClickedBtn = $(this);
		thisClickedBtn.closest('tr').remove();
	});

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

    function markAsBlur(event){
		if(event.value == 1){
			$(event).closest('tr').find('input').prop('readonly',true);
		}else{
			$(event).closest('tr').find('input').prop('readonly',false);
		}
	}

    $(document).on('click','.deleteImage',function(){
		var thisObject = $(this);
		var details = JSON.parse(thisObject.attr('data-details'));
		var r = confirm("Are you sure you want to delete");
		if (r == true) {
			$.ajax({
				url : "{{route('advertisement.image.delete')}}",
				type : 'POST',
				dataType : 'JSON',
				data : {
					_token : '{{csrf_token()}}',
					advertisement_id : details.advertisement_id,
					imageId : details.id,
				},
				success:function(response){
					if(response.error == false){
						thisObject.closest('.imageForDelete').remove();
					}else{
						alert(response.message);
					}
				}
			});
		}
	});
</script>
@endsection