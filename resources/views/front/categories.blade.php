@php
    $categories = \App\Models\Category::select('*')->latest()->get();
    $count = count($categories);
@endphp

<section class="pt-2 pb-2 shadow-sm">
    <div class="container-fluid">
        <div class="row m-0 justify-content-center">
            <ul class="home-lefft-nav">
                <li>
                    <form id="submitCityFilterr" action="{{url()->current()}}" method="get">
                        <span class="d-flex input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-left-rd">City</span>
                            </div>
                            <input type="text" class="form-control" value="{{request()->search_by_city}}" placeholder="Type City" name="search_by_city">
                            <div class="input-group-append" onclick="document.getElementById('submitCityFilterr').submit();"><span class="input-group-text border-right-rd"><i class="fas fa-map-marker-alt"></i></span></div>
                        </span>
                    </form>
                </li>
                @foreach($categories as $index => $cat)
                    <li><a href="{{route('advertisement.category.list', [base64_encode($cat->id),$cat->name])}}">{{$cat->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</section>