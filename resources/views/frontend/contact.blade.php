@extends('frontend.layouts.app')
@section('title', 'Services')
@section('page')
<section class="page-title-section hero-height">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="breadcrumb-area">
            <h2 class="page-title">Contact Us</h2>
            <ul class="breadcrumbs-link">
              <li><a href="{{'/'}}">Home</a></li>
              <li class="active">Contact Us</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="contact-section pdt-110 pdb-110" data-background="images/bg/abs-bg7.png" data-overlay-light="2">
    <div class="container">
      <div class="row mrb-80">
        <div class="col-md-12 col-lg-12 col-xl-4">
          <h5 class="side-line-left text-primary-color mrt-0 mrb-5">Get In Touch</h5>
          <h2 class="faq-title mrb-30 info-cont">For more information and inquiries, contact us</h2>
          <ul class="social-list list-lg list-primary-color list-flat mrb-lg-60 clearfix">
            <li>
              <a href="#"><i class="fab fa-facebook"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
            <li>
              <a href="#"><i class="fab fa-google-plus"></i></a>
            </li>
          </ul>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-8">
          <div class="row">


            <div class="col-lg-6 col-xl-6">
              <div class="contact-block d-flex mrb-30">
                <div class="contact-icon">
                  <i class="base-icon-094-email-2"></i>
                </div>
                <div class="contact-details mrl-30">
                  <h5 class="icon-box-title mrb-10">Email Us</h5>
                  <p class="mrb-0">example@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-6">
              <div class="contact-block d-flex mrb-30">
                <div class="contact-icon">
                  <i class="base-icon-phone-2"></i>
                </div>
                <div class="contact-details mrl-30">
                  <h5 class="icon-box-title mrb-10">Phone Number</h5>
                  <p class="mrb-0">+96 223-528-8542</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6">
            @include('admin.message')
          <div class="contact-form">
            <form action="{{ route('frontend.contact.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mrb-25">
                            <input style="background-color: #f0f9ff;!important" type="text" name="name"
                                placeholder="Name" class="form-control" value="{{ old('name') }}"  {{ $errors->any() ? 'autofocus' : '' }}>
                            @error('name')
                                <span class="text-danger text-sm">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mrb-25">
                            <input style="background-color: #f0f9ff;!important" type="text" name="phone"
                                placeholder="Phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger text-sm">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mrb-25">
                            <input style="background-color: #f0f9ff;!important" type="email" name="email"
                                placeholder="Email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger text-sm">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mrb-25">
                            <textarea style="background-color: #f0f9ff;!important" rows="5" name="message" placeholder="Messages"
                                class="form-control">{{ old('message') }}</textarea>
                            @error('message')
                                <span class="text-danger text-sm">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <button style="border: 1px solid black;" type="submit"
                                class="animate-btn-style3 btn-md mrb-lg-60">Submit Now</button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
        <div class="col-xl-6">
          <!-- Google Map Start -->
          <div class="mapouter fixed-height">
            <div class="gmap_canvas">
              <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Graz&t=&z=11&ie=UTF8&iwloc=&output=embed"></iframe>
              <a href="https://www.whatismyip-address.com"></a>
            </div>
          </div>
          <!-- Google Map End -->
        </div>
      </div>
    </div>
  </section>

  @endsection

