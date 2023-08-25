@extends('layouts.web_master')
@section('title', 'Contact Us')
@section('main_content')

    <div class="inner-banner inner-bg8">
        <div class="container">
            <div class="inner-title text-center">
                <h3>Contact Us</h3>
                <ul>
                    <li>
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li>
                        <i class='bx bxs-chevron-right'></i>
                    </li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="contact-section pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-4">
                    <div class="contact-card">
                        <i class='bx bxs-phone'></i>
                        <div class="content">
                            <h3>Contact Number</h3>
                            <p><a href="tel:{{ $content->phone }}">{{ $content->phone }}</a></p>
                            <span><a href="tel:{{ $content->phone_two }}">{{ $content->phone_two }}</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4">
                    <div class="contact-card">
                        <i class='bx bx-map'></i>
                        <div class="content">
                            <h3>Address</h3>
                            <p>{{ $content->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-4 offset-lg-0 offset-md-0 offset-sm-3">
                    <div class="contact-card">
                        <i class='bx bx-envelope'></i>
                        <div class="content">
                            <h3>Email</h3>
                            <p><a
                                    href="mailto:{{ $content->email }}"><span
                                        class="__cf_email__"
                                        data-cfemail="670e09010827010e0902044904080a">{{ $content->email }}</span></a>
                            </p>
                            <span><a href="mailto:{{ $content->email1 }}"><span class="__cf_email__"
                                        data-cfemail="3f575a5353507f5956515a5c115c5052">{{ $content->email1 }}</span></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="leader-area">
        <div class="container">
            <div class="leader-content">
                <div class="section-title text-center">
                    <h2>Expand Your Presence And Be A Leader Of The World</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-area pb-4">
        <div class="container">
            <div class="contact-area-bg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <h2>Consulting Quote</h2>
                            </div>
                            {{-- <form id=""> --}}
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                            <span class="text-danger" id="nameErr"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                            <span class="text-danger" id="emailErr"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                            <span class="text-danger" id="phoneErr"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="subject" id="subject" class="form-control" required data-error="Please enter your subject"
                                                placeholder="Your Subject">
                                            <span class="text-danger" id="subjectErr"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea id="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message"
                                                placeholder="Your Message"></textarea>
                                            <span class="text-danger" id="msgErr"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn" onclick="sendMesssage()">
                                            Submit
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="map-area">
        <div class="container-fluid m-0 p-0">
            <iframe src="{{ $content->map }}"></iframe>
        </div>
    </div>

@endsection

@push('web_script')
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ----- Clear Data -----
    function clearData(){
        $("#name").val('');
        $("#email").val('');
        $("#phone").val('');
        $("#subject").val('');
        $("#message").val('');
        $("#nameErr").text('');
        $("#emailErr").text('');
        $("#phoneErr").text('');
        // $("#subjectErr").text('');
        $("#msgErr").text('');
    }

    function sendMesssage(){

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var subject = $("#subject").val();
        var message = $("#message").val();
        var url = "{{ route('send.message') }}";

        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: {name:name, email:email, phone:phone, subject:subject, message:message},
            success: function(data){
                clearData();
                const Msg = Swal.mixin({
                    toast:true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })

                Msg.fire({
                    type: 'success',
                    title: 'Message Send Successfully',
                })
                // console.log('successfully Added');
            },
            error: function(error){
                $("#nameErr").text(error.responseJSON.errors.name);
                $("#emailErr").text(error.responseJSON.errors.email);
                $("#phoneErr").text(error.responseJSON.errors.phone);
                // $("#subjectErr").text(error.responseJSON.errors.subject);
                $("#msgErr").text(error.responseJSON.errors.message);
                // console.log(error.responseJSON.errors.name);
            }
        });
    }
</script>
@endpush