@extends('admin.master')

@section('title')
	Site Settings
@endsection

@section('content')
	<div class="container">
		<div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Site Settings</h3>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{route('admin.site-settings.update')}}" enctype="multipart/form-data">
                @csrf
				<input type="hidden" name="id" value="{{encrypt($settings->id)}}" required/>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Name:</label>
                            <input type="text" class="form-control" placeholder="Website name" name="site_name" value="{{$settings->site_name}}" required/>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Phone:</label>
                            <input type="number" class="form-control" placeholder="Webiste contact no." name="phn_no" value="{{$settings->phn_no}}" required/>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-4">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Website email" name="site_email" value="{{$settings->site_email}}" required/>
                            {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Address:</label>
                            <textarea type="text" class="form-control" placeholder="Address" name="address" required>{{$settings->address}}</textarea>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Copyright:</label>
                            <textarea type="text" class="form-control" id="ckeditor_section" name="copyright">{{$settings->copyright}}</textarea>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Terms & Conditions:</label>
                            <textarea type="text" class="form-control" id="ckeditor_section1" name="terms_conditons">{{$settings->terms_conditons}}</textarea>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Cancellation Policy:</label>
                            <textarea type="text" class="form-control" id="ckeditor_section2" name="cancellation_policy">{{$settings->cancellation_policy}}</textarea>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <label>Google Map:</label>
                            <textarea type="text" class="form-control" placeholder="Google Map" name="google_map" required>{{$settings->google_map}}</textarea>
                            {{-- <span class="form-text text-muted">Please enter your email</span> --}}
                        </div>
                        <div class="col-lg-6">
                            <div class="gutter-b example example-compact">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">Site Logo</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="image-input image-input-outline" id="kt_image_1">
                                                <div class="image-input-wrapper" style="background-image: url({{asset($settings->logo)}})"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="site_logo" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="profile_avatar_remove" />
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-color mr-2" >Update Settings</button>
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
    ClassicEditor
            .create( document.querySelector( '#ckeditor_section' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    // console.error( error );
            } );
    ClassicEditor
            .create( document.querySelector( '#ckeditor_section1' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    // console.error( error );
            } );
    ClassicEditor
            .create( document.querySelector( '#ckeditor_section2' ) )
            .then( editor => {
                    // console.log( editor );
            } )
            .catch( error => {
                    // console.error( error );
            } );
</script>
@endsection