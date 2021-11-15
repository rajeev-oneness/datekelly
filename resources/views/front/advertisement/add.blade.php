@extends('front.layouts.master')
@section('dashboard-content')

<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
        <div class="col-12"><a href="{{route('advertisement.list')}}" class="login-btn float-right">Back <i class="fas fa-step-backward"></i></a></div>
    </div>
    <div class="row m-0 dashboard align-items-center">
    	<div class="col-12">
	    	<form action="{{route('advertisement.store')}}" method="POST" enctype="multipart/form-data" class="w-100">
	    		@csrf
	    		<input type="hidden" name="lat" id="selectedLatitude" value="{{old('lat')}}">
				<input type="hidden" name="lng" id="selectedLongitude" value="{{old('lng')}}">
	    		<h5>Create Advertisement</h5><hr>
				<div class="form-group row">
	    			<div class="col-lg-6 d-flex flex-column">
	                    <label class="" for="country">Country where I work:</label>
	                    <select name="country" id="country" class="sumoSelect form-control @error('country'){{('is-invalid')}}@enderror" onchange="getCity(this);">
	                    	@foreach ($data->countries as $couIndex => $country)
	                            <option value="{{$country->id}}" @if(old('country') == $country->id){{('selected')}}@endif>{{$country->name}}</option>
	                        @endforeach
	                    </select>
	                    @error('country')<span class="text-danger">{{$message}}</span>@enderror
	                </div>
	    		</div>

	    		<div class="form-group row">
	    			<div class="col-lg-6 d-flex flex-column">
	                    <label class="" for="city">City:</label>
	                    <select name="city" id="city" class="sumoSelect form-control @error('city'){{('is-invalid')}}@enderror"></select>
	                    @error('city')<span class="text-danger">{{$message}}</span>@enderror
	                </div>
	    		</div>
	    		<div class="form-group row">
	    			<div class="col-lg-6 d-flex flex-column">
	                    <label class="" for="address">Address:</label>
	                    <textarea name="address" class="form-control @error('address'){{('is-invalid')}}@enderror">{{old('address')}}</textarea>
	                    @error('address')<span class="text-danger">{{$message}}</span>@enderror
	                </div>
	    		</div>
	    		<div class="form-group row">
	    			<div class="col-lg-6 d-flex flex-column">
	                    <label class="" for="telephone_number">Telephone Number:</label>
	                    <input type="text" name="telephone_number" value="{{old('telephone_number')}}" class="form-control @error('telephone_number'){{('is-invalid')}}@enderror" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
	                    @error('telephone_number')<span class="text-danger">{{$message}}</span>@enderror
	                </div>
	                <div class="col-lg-6 d-flex flex-column">
	                    <label class="" for="whatsapp_number">Whatsapp Number:</label>
	                    <input type="text" name="whatsapp_number" value="{{old('whatsapp_number')}}" class="form-control @error('whatsapp_number'){{('is-invalid')}}@enderror" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
	                    @error('whatsapp_number')<span class="text-danger">{{$message}}</span>@enderror
	                </div>
	    		</div>
				<div class="form-group row">
					<div class="col-lg-6 d-flex flex-column">
						<label class="" for="myservice">My Service:</label>
						<div class="d-flex">
							<input type="radio" name="my_service" value="private_visit" checked=""><p class="ml-2">Private Visit - Client can visit me</p>
						</div>
					</div>
					<div class="col-lg-6 d-flex flex-column">
						<label class="" for="myservice">&nbsp;</label>
						<div class="d-flex">
							<input type="radio" name="my_service" value="escort"><p class="ml-2">Escort - I will visit the client</p>
						</div>
					</div>
					@error('my_service')<span class="text-danger">{{$message}}</span>@enderror
				</div>
				<div class="form-group row">
					<div class="col-lg-6 d-flex flex-column">
						<label class="" for="myworkingName">My Working Name:</label>
						<input type="text" name="my_working_name" maxlength="200" class="form-control @error('my_working_name'){{('is-invalid')}}@enderror">
						@error('my_working_name')<span class="text-danger">{{$message}}</span>@enderror
					</div>

					<div class="col-lg-6 d-flex flex-column">
						<label class="" for="advertisement_price">Price in (EURO):</label>
						<input type="text" name="advertisement_price" maxlength="8" class="form-control @error('advertisement_price'){{('is-invalid')}}@enderror" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Price In Euro" value="{{old('advertisement_price')}}">
						@error('advertisement_price')<span class="text-danger">{{$message}}</span>@enderror
					</div>
				</div>

				<div class="form-group row">
					<div class="col-lg-6 d-flex flex-column">
						<label class="" for="sex">Sex:</label>
						<div class="d-flex">
							<input type="radio" name="sex" value="lady" checked><p class="ml-2">Lady</p>
						</div>
					</div>
					<div class="col-lg-6 d-flex flex-column">
						<label class="" for="sex">&nbsp;</label>
						<div class="d-flex">
							<input type="radio" name="sex" value="transsexual_TS"><p class="ml-2">Transsexual TS</p>
						</div>
					</div>
					@error('sex')<span class="text-danger">{{$message}}</span>@enderror
				</div>

				<div class="form-group row">
	    			<div class="col-lg-6 d-flex flex-column">
	                    <label class="" for="age">Age:</label>
	                    <select name="age" id="age" class="sumoSelect form-control @error('age'){{('is-invalid')}}@enderror">
	                    	@for($ageGroup = 18; $ageGroup <= 60; $ageGroup++)
		                    	<option value="{{$ageGroup}}" @if(old('age') == $ageGroup){{('selected')}}@endif>{{$ageGroup}} Years</option>
	                    	@endfor
	                    </select>
	                    @error('age')<span class="text-danger">{{$message}}</span>@enderror
	                </div>
	    		</div>

	    		<div class="form-group row">
	    			<div class="col-lg-6 d-flex flex-column">
	                    <label class="" for="length">Length (In CM):</label>
	                    <input type="text" name="length" class="form-control @error('length'){{('is-invalid')}}@enderror" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{old('length')}}" placeholder="Length in CM" maxlength="4">
	                    @error('length')<span class="text-danger">{{$message}}</span>@enderror
	                </div>
	                <div class="col-lg-6 d-flex flex-column">
	                    <label class="" for="weight">Weight (In KG):</label>
	                    <input type="text" name="weight" class="form-control @error('weight'){{('is-invalid')}}@enderror" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{old('weight')}}" placeholder="Weight in KG" maxlength="5">
	                    @error('weight')<span class="text-danger">{{$message}}</span>@enderror
	                </div>
	    		</div>

				<div class="form-group">
					<label class="" for="cup_size">Cup Size:</label>
					<div>
						@foreach($data->cup_size as $cupIndex => $cupSize)
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="cup_size" type="radio" id="inlineCheckbox{{$cupIndex}}" value="{{$cupSize->size}}">
								<label class="form-check-label" for="inlineCheckbox{{$cupIndex}}">{{$cupSize->size}}</label>
							</div>
						@endforeach
					</div>
				</div>
				<div class="form-group">
					<label class="" for="body_size">Body Size:</label>
					<div>
						@foreach($data->body_size as $bodyIndex => $bodySize)
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="body_size" type="radio" id="inlineCheckboxBodySize{{$bodyIndex}}" value="{{$bodySize->size}}">
								<label class="form-check-label" for="inlineCheckboxBodySize{{$bodyIndex}}">{{$bodySize->size}}</label>
							</div>
						@endforeach
					</div>
				</div>

				<div class="form-group">
					<label class="" for="descent">Descent:</label>
					<div>
						@foreach($data->descents as $descentIndex => $descentData)
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="descent" type="radio" id="inlineCheckboxDescent{{$descentIndex}}" value="{{$descentData->title}}">
								<label class="form-check-label" for="inlineCheckboxDescent{{$descentIndex}}">{{$descentData->title}}</label>
							</div>
						@endforeach
					</div>
				</div>

				<div class="form-group">
					<label class="" for="length">Language: (select max. 3)</label>
					<div>
						@foreach($data->language as $languageIndex => $languageData)
							<div class="form-check form-check-inline">
								<input class="form-check-input" name="language[]" type="checkbox" id="inlineCheckboxLanguage{{$languageIndex}}" value="{{$languageData->id}}">
								<label class="form-check-label" for="inlineCheckboxLanguage{{$languageIndex}}">{{$languageData->name}}</label>
							</div>
						@endforeach
					</div>
				</div>

				<div class="form-group row">
	    			<div class="col-lg-12 d-flex flex-column">
	                    <label class="" for="advertisement_text">Advertisement Text:</label>
	                    <textarea style="min-height: 100px;" name="advertisement_text" class="form-control @error('advertisement_text'){{('is-invalid')}}@enderror" placeholder="About me !">{{old('advertisement_text')}}</textarea>
	                    @error('advertisement_text')<span class="text-danger">{{$message}}</span>@enderror
	                </div>
	    		</div>

	    		<div class="form-group row">
	                <div class="col-sm-12">
	                    <label>Upload images: (select min. 3 photos)</label>
	                    <input type="file" class="form-control" name="images[]" multiple>
	                </div>
	            </div>

	            <div class="form-group row">
	                <div class="col-sm-12">
	                    <label>Upload videos:</label>
	                    <input type="file" class="form-control" name="video[]" multiple>
	                </div>
	            </div>

	            <div class="form-group row">
	                <div class="col-sm-12">
	                    <label>Prices: (select min. 3 prices)</label>
						<table class="table" id="timePriceTable">
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
						</table>
						<table class="table">
							<tr>
								<td>Extra price for Escort: </td>
								<td>
									<input type="text" class="form-control @error('extraprice_for_escort'){{('is-invalid')}}@enderror" name="extraprice_for_escort" value="{{old('extraprice_for_escort')}}" placeholder="Price in EUR (€)">
									@error('extraprice_for_escort')<span class="text-danger">{{$message}}</span>@enderror
								</td>
							</tr>
						</table>
	                </div>
	            </div>

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
	                    	@foreach($data->servicesAndExtra as $indexServices => $services)
		                    	<tr>
		                    		<td>
		                    			<input type="hidden" name="services[{{$indexServices}}]" value="">
		                    			<input type="checkbox" name="services[{{$indexServices}}]" value="{{$services->title}}">
		                    		</td>
		                    		<td>{{$services->title}}</td>
		                    		<td>
		                    			<select class="form-control" name="servicesInclude[]" onchange="markAsBlur(this)">
			                    			<option value="0">Not Include</option>
			                    			<option value="1">Include</option>
			                    		</select>
			                    	</td>
		                    		<td>
		                    			<input type="text" name="servicesPrice[]" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Price" maxlength="3">
		                    		</td>
		                    	</tr>
	                    	@endforeach
	                    </table>
	                </div>
	            </div>

	            <div class="form-group row">
	                <div class="col-sm-12">
	                    <label>Working Hours:</label>
	                    <table class="table">
	                    	@foreach($data->workingDays as $indexWorking => $workingDays)
		                    	<tr>
		                    		<td>
		                    			<input type="checkbox" name="workingDays[]" value="{{$workingDays}}">
		                    			{{$workingDays}}
		                    		</td>
		                    		<td>From : <input type="time" name="workingTimeFrom[]" class="form-control"></td>
		                    		<td>Till : <input type="time" name="workingTimeTill[]" class="form-control"></td>
		                    	</tr>
	                    	@endforeach
	                    </table>
	                </div>
	            </div>

				<div class="form-group row">
					<div class="col-sm-12">
						<input type="checkbox" name="terms_and_condition" value="1">&nbsp;&nbsp;I agree with the Terms & Condition of DateKelly
					</div>
				</div>

	    		<div class="col-12 mt-5">
	                <button type="submit" class="login-btn float-left">Add Advertisement</button>
	            </div>
	    	</form>
    	</div>
    </div>
</div>

@section('sub-script')
<script type="text/javascript">
	$('.sumoSelect').SumoSelect({search: true, searchText: 'Select.'});
	
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

	function markAsBlur(event){
		if(event.value == 1){
			$(event).closest('tr').find('input').prop('readonly',true);
		}else{
			$(event).closest('tr').find('input').prop('readonly',false);
		}
	}

	coutryByDefault('{{$data->firstCountryId}}');
	function coutryByDefault(countryId){
		var cityData = '';
		if(parseInt(countryId) > 0){
			$.ajax({
				url: "{{route('get.country-wise.city')}}",
	            method: 'POST',
	            data: {
	                '_token': '{{csrf_token()}}',
	                'country_id': countryId,
	            },
	            success:function(response) {
					$.each(response.data, function(index, value) {
						cityData += "<option value='"+value.id+"'>"+value.name+"</option>";
					});
					$('#city').empty().append(cityData);
					$("#city").SumoSelect().sumo.reload();
	            }
			});
		}else{
			$('#city').empty().append(cityData);
			$("#city").SumoSelect().sumo.reload();
		}
	}

	function getCity(event){
		if(event.value != '' && event.value > 0){
			coutryByDefault(event.value);
		}
	}
</script>
@stop
@endsection