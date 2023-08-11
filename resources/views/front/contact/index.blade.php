@extends('front.layout.master')
@section('title', )
@section('body')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Contact Us</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact area start-->
    <div class="contact_area" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>contact us</h3>
                        <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum
                            est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum
                            formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 NewYork City</li>
                            <li><i class="fa fa-phone"></i> <a href="#">demo@example.com</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="tel:0123456789">0123456789</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        @if(auth()->check())
                            <h3>Tell us your Feedback</h3>
                            <form method="POST" action="{{url('/contact/save')}}">
                                @csrf
                                <p>
                                    <label> Your Name (required)</label>
                                    <input name="name" placeholder="Name *" value="{{auth()->user()->first_name." ".auth()->user()->last_name}}" type="text" required>
                                </p>
                                <p>
                                    <label> Your Email (required)</label>
                                    <input name="email" placeholder="Email *" type="email" value="{{auth()->user()->email}}" required>
                                </p>
                                <p>
                                    <label> Phone</label>
                                    <input name="phone" placeholder="Phone *" type="text" value="{{auth()->user()->phone}}" required>
                                </p>
                                <div class="contact_textarea">
                                    <label> Your Message</label>
                                    <textarea placeholder="Message *" name="message" class="form-control2" required></textarea>
                                    @error("message")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                                <button type="submit"> Send</button>
                            </form>
                        @else
                            <h3>Tell us your Feedback. <span style="color: red;font-size: 16px">(Please login to submit the form)</span>  </h3>
                            <form method="POST" action="{{url('/contact/save')}}">
                                @csrf
                                <p>
                                    <label> Your Name (required)</label>
                                    <input name="name" placeholder="Name *" type="text" readonly>
                                </p>
                                <p>
                                    <label> Your Email (required)</label>
                                    <input name="email" placeholder="Email *" type="email" readonly>
                                </p>
                                <p>
                                    <label> Phone</label>
                                    <input name="phone" placeholder="Phone *" type="text" readonly>
                                </p>
                                <div class="contact_textarea">
                                    <label> Your Message</label>
                                    <textarea placeholder="Message *" name="message" class="form-control2" readonly></textarea>
                                </div>
                                @error("message")
                                <p class="text-danger"><i>{{$message}}</i></p>
                                @enderror
                                <p></p>
                                <a class="btn btn-success" href="{{url("/account/login")}}">Send</a>

                            </form>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--contact area end-->

    <!--contact map start-->
    <div class="contact_map mt-100">
        <div class="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.096949073262!2d105.7797142752526!3d21.028806487776915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b32b842a37%3A0xe91a56573e7f9a11!2zOGEgVMO0biBUaOG6pXQgVGh1eeG6v3QsIE3hu7kgxJDDrG5oLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSAxMDAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1691563689634!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
    </div>
    <!--contact map end-->

    <!--brand area start-->
    <div class="brand_area brand__three">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand5.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand6.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="front/assets/img/brand/brand2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
@endsection
