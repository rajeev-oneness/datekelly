@extends('front.master')

@section('title')
    About Us
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h4 class="mb-4">About Us</h4>
            </div>
        </div>
        <div class="row justify-content-center login-body">
            <div class="col-12 col-md-9">
                <div class="card shadow-sm">
                    <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida et lorem ac tincidunt. Integer blandit urna ullamcorper massa mollis, eu iaculis metus elementum. Curabitur eget accumsan ipsum. In in dictum nulla. Aliquam erat volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Interdum et malesuada fames ac ante ipsum primis in faucibus. In ut eros velit. Mauris at diam et magna iaculis faucibus.
                        Praesent sed leo risus. Vivamus sit amet facilisis massa. Pellentesque laoreet nulla enim, porttitor viverra nulla maximus quis. Mauris ornare malesuada odio. Nunc massa neque, commodo vel vestibulum non, pharetra vulputate neque. Suspendisse tincidunt, metus et tincidunt fringilla, elit turpis euismod mauris, eu efficitur quam sem in magna. Aenean nec suscipit ipsum.
                    </div>
                </div>
            </div>
            @include('front.faq')
        </div>
    </div>
</section>
@endsection