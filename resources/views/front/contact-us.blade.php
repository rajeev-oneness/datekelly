@extends('front.master')

@section('title')
    Contact Us
@endsection

@section('content')
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">
                <h4 class="mb-4">Contact Us</h4>
            </div>
        </div>
        <div class="row justify-content-center login-body">
            <div class="col-12 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group row m-0 mb-4">
                                <label class="col-sm-4">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 mb-4">
                                <label class="col-sm-4">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 mb-4">
                                <label class="col-sm-4">Subject</label>
                                <div class="col-sm-8">
                                    <input type="text" name="sub" id="sub" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row m-0 mb-4">
                                <label class="col-sm-4">Message</label>
                                <div class="col-sm-8">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row m-0">
                                <div class="col-sm-3">
                                    <button class="btn login-btn" id="send-button">Send</button>
                                </div>
                                <div class="col-sm-9" id="msg">
                                    {{-- <div class="border border-success text-success p-1 pl-3">
                                        abc
                                    </div> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 log-r-card">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Address</h5>
                      <ul>
                          <li><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur at interdum neque. Aenean aliquam quis lectus vel efficitur. Aliquam vitae massa tortor. Duis sit amet tempus lacus. Vivamus a elit id augue ultricies suscipit</a></li>
                          {{-- <li><a href="">You want to give likes?</a></li>
                          <li><a href="">You want to leave a review?</a></li>
                          <li><a href="">You want to become a member?</a></li> --}}
                      </ul>
                    </div>
                  </div>
            </div>
            @include('front.faq')

        </div>
    </div>
</section>
@endsection

@section('script')
<script>
$("#send-button").click(function(evt) {
    evt.preventDefault();
    $("#msg").empty();
    $.ajax({
        url: "{{route('submit.contact')}}",
        method: "POST",
        data: {
            '_token': '{{csrf_token()}}', 
            'name': $('#name').val(),
            'email': $('#email').val(),
            'sub': $('#sub').val(),
            'message': $('#message').val()},
        success: function(data) {
            console.log(data);
            var alert = "<div class='border border-success text-success p-1 pl-3'>Mesage sent successfully! </div>";
            $("#msg").append(alert);
            $('form').trigger("reset");
        },
        error: function() {
            var alert = "<div class='border border-danger text-danger p-1 pl-3'>Failed! </div>";
            $("#msg").append(alert);
        }
    })
})
</script>
@endsection