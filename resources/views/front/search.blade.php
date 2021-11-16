@extends('front.master')
@section('title','Search') 
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-10">
                <h4 class="mb-4">Search your favourite</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 border pt-3 pb-3">
                <form action="{{route('get.search.results')}}" method="POST" enctype="multipart/form-data" class="w-100">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-6 d-flex flex-column">
                            <label class="" for="address">Location:</label>
                            <input name="address" id="address" class="form-control @error('address'){{('is-invalid')}}@enderror" value="{{old('address')}}" placeholder="Location">
                        </div>
                        <!-- <div class="col-lg-6 d-flex flex-column">
                            <label class="" for="distance">Distance in (KM):</label>
                            <input name="distance" id="distance" class="form-control @error('distance'){{('is-invalid')}}@enderror" value="{{old('distance')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="4" placeholder="Distance in Kilo Meter">
                            @error('distance')<span class="text-danger">{{$message}}</span>@enderror
                        </div> -->
                    </div>

                    <div class="form-group row">
                        @php $myServices = (old('my_service') ?? []); @endphp
                        <div class="col-lg-12 d-flex flex-column">
                            <label class="" for="myservice">Service:</label>
                            <div class="d-flex">
                                <input type="checkbox" name="my_service[]" value="private_visit" @if(in_array('private_visit',$myServices)){{('checked')}}@endif><p class="ml-2">Private Visit</p>
                                    &nbsp;
                                <input type="checkbox" name="my_service[]" value="escort" @if(in_array('escort',$myServices)){{('checked')}}@endif><p class="ml-2">Escort</p>
                            </div>
                        </div>
                        @error('my_service')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    
                    <div class="form-group row">
                        @php $mySex = (old('sex') ?? []); @endphp
                        <div class="col-lg-12 d-flex flex-column">
                            <label class="" for="sex">Sex:</label>
                            <div class="d-flex">
                                <input type="checkbox" name="sex[]" value="lady" @if(in_array('lady',$mySex)){{('checked')}}@endif><p class="ml-2">Lady</p>
                                    &nbsp;
                                <input type="checkbox" name="sex[]" value="transsexual_TS" @if(in_array('transsexual_TS',$mySex)){{('checked')}}@endif><p class="ml-2">Transsexual TS</p>
                            </div>
                        </div>
                        @error('sex')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Age:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="ageFrom" id="ageFrom" class="sumoSelect form-control @error('ageFrom'){{('is-invalid')}}@enderror">
                                        @for($ageGroup = 15; $ageGroup <= 80; $ageGroup+=5)
                                            <option value="{{$ageGroup}}" @if(old('ageFrom') == $ageGroup){{('selected')}}@endif>{{$ageGroup}} Years</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2"> to</div>
                                <div class="col-md-4">
                                    <select name="ageTo" id="ageTo" class="sumoSelect form-control @error('ageTo'){{('is-invalid')}}@enderror">
                                        @for($ageGroup = 15; $ageGroup <= 80; $ageGroup+=5)
                                            <option value="{{$ageGroup}}" @if(old('ageTo') == $ageGroup){{('selected')}}@elseif($ageGroup == 80){{('selected')}}@endif>{{$ageGroup}} Years</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Length:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="lengthFrom" id="lengthFrom" class="sumoSelect form-control @error('lengthFrom'){{('is-invalid')}}@enderror">
                                        @for($lengthGroup = 100; $lengthGroup <= 250; $lengthGroup+=5)
                                            <option value="{{$lengthGroup}}" @if(old('lengthFrom') == $lengthGroup){{('selected')}}@endif>{{$lengthGroup}} CM</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2"> to</div>
                                <div class="col-md-4">
                                    <select name="lengthTo" id="lengthTo" class="sumoSelect form-control @error('lengthTo'){{('is-invalid')}}@enderror">
                                        @for($lengthGroup = 100; $lengthGroup <= 250; $lengthGroup+=5)
                                            <option value="{{$lengthGroup}}" @if(old('lengthTo') == $lengthGroup){{('selected')}}@elseif($lengthGroup == 250){{('selected')}}@endif>{{$lengthGroup}} CM</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6 d-flex flex-column">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Weight:</label>
                                </div>
                                <div class="col-md-4">
                                    <select name="weightFrom" id="weightFrom" class="sumoSelect form-control @error('weightFrom'){{('is-invalid')}}@enderror">
                                        @for($weightGroup = 30; $weightGroup <= 120; $weightGroup+=5)
                                            <option value="{{$weightGroup}}" @if(old('weightFrom') == $weightGroup){{('selected')}}@endif>{{$weightGroup}} KG</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-2"> to</div>
                                <div class="col-md-4">
                                    <select name="weightTo" id="weightTo" class="sumoSelect form-control @error('weightTo'){{('is-invalid')}}@enderror">
                                        @for($weightGroup = 30; $weightGroup <= 120; $weightGroup+=5)
                                            <option value="{{$weightGroup}}" @if(old('weightTo') == $weightGroup){{('selected')}}@elseif($weightGroup == 120){{('selected')}}@endif>{{$weightGroup}} KG</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        @php $cupSizeOLD = (old('cup_size') ?? []); @endphp
                        <label class="" for="cup_size">Cup Size:</label>
                        <div class="d-flex justify-content-start align-items-center option-cont">
                            @foreach($data->cup_size as $cupIndex => $cupSize)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="cup_size[]" type="checkbox" id="inlineCheckbox{{$cupIndex}}" value="{{$cupSize->size}}" @if(in_array($cupSize->size,$cupSizeOLD)){{('checked')}}@endif>
                                    <label class="form-check-label" for="inlineCheckbox{{$cupIndex}}">{{$cupSize->size}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        @php $bodySizeOLD = (old('body_size') ?? []); @endphp
                        <label class="" for="body_size">Body Size:</label>
                        <div class="d-flex justify-content-start align-items-center option-cont">
                            @foreach($data->body_size as $bodyIndex => $bodySize)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="body_size[]" type="checkbox" id="inlineCheckboxBodySize{{$bodyIndex}}" value="{{$bodySize->size}}" @if(in_array($bodySize->size,$bodySizeOLD)){{('checked')}}@endif>
                                    <label class="form-check-label" for="inlineCheckboxBodySize{{$bodyIndex}}">{{$bodySize->size}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        @php $decentOLD = (old('descent') ?? []); @endphp
                        <label class="" for="descent">Descent:</label>
                        <div class="d-flex justify-content-start align-items-center option-cont">
                            @foreach($data->descents as $descentIndex => $descentData)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="descent[]" type="checkbox" id="inlineCheckboxDescent{{$descentIndex}}" value="{{$descentData->title}}" @if(in_array($descentData->title,$decentOLD)){{('checked')}}@endif>
                                    <label class="form-check-label" for="inlineCheckboxDescent{{$descentIndex}}">{{$descentData->title}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        @php $languageOLD = (old('language') ?? []); @endphp
                        <label class="" for="length">Language:</label>
                        <div class="d-flex justify-content-start align-items-center option-cont">
                            @foreach($data->language as $languageIndex => $languageData)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="language[]" type="checkbox" id="inlineCheckboxLanguage{{$languageIndex}}" value="{{$languageData->id}}" @if(in_array($languageData->id,$languageOLD)){{('checked')}}@endif>
                                    <label class="form-check-label" for="inlineCheckboxLanguage{{$languageIndex}}">{{$languageData->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row">
                        @php $serviceExtraOLD = (old('services') ?? []); @endphp
                        <div class="col-sm-12">
                            <label>Services & Extras:</label>
                            <div class="row">
                                @foreach($data->servicesAndExtra as $indexServices => $services)
                                    <div class="col-md-4">
                                        <input class="form-check-input d-none" type="checkbox" name="services[]" value="{{$services->title}}" id="services{{$indexServices}}" @if(in_array($services->title,$serviceExtraOLD)){{('checked')}}@endif>&nbsp;
                                        <label for="services{{$indexServices}}" class="form-check-label">{{$services->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="searchTrue" value="true">
                    @error('searchTrue')<span class="text-danger">{{$message}}</span>@endif
                    <div class="col-12 mt-5">
                        <a href="{{url()->full()}}" class="btn">Reset</a>
                        <button type="submit" class="login-btn float-left">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@section('script')
<script type="text/javascript">
    $('.sumoSelect').SumoSelect({search: true, searchText: 'Select.'});
</script>
@stop
@endsection