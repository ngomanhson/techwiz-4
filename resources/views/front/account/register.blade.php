@extends('front.account.master')
@section('title','Login')
@section('body')
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="front/assets/img/login.png" alt="login" class="login-card-img" />
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="front/assets/img/logo/logo.png" alt="logo" class="logo" />
                            </div>
                            <p class="login-card-description">Register account</p>
                            <form action="#!">
                                <div class="form-group">
                                    <label for="fullname" class="sr-only">Email</label>
                                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter full name" />
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address" />
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" />
                                </div>

                                <label class="input-check">
                                    Show Password <input type="checkbox" onclick="showPassword()" />
                                    <span class="checkmark"></span>
                                </label>
                                <button type="submit" class="btn btn-block login-btn mb-4">Register</button>
                            </form>
                            <p class="login-card-footer-text">Have already an account? <a href="{{url("/account/login")}}" class="text-reset">Login now</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
