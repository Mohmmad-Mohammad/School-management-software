<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @section('title')
    @if($type == 'student')
        تسجيل دخول طالب
    @elseif($type == 'parent')
        تسجيل دخول ولي امر
    @elseif($type == 'teacher')
    تسجيل دخول معلم
    @else
    تسجيل دخول ادمن
    @endif
    @stop
    @include('layouts.head')
    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">


</head>

<body>

<div class="wrapper">
    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="{{URL::asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
    </div>

    <!--=================================
preloader -->

    <!--=================================
login-->

    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background-image: url('{{ asset('assets/images/sativa.png')}}');">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                     style="background-image: url('{{ asset('assets/images/login-inner-bg.jpg')}}');">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">Hello world!</h2>
                        <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose
                            responsive template along with powerful features.</p>
                        <ul class="list-unstyled  pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        @if($type == 'student')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول طالب</h3>
                        @elseif($type == 'parent')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول ولي امر</h3>
                        @elseif($type == 'teacher')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول معلم</h3>
                        @else
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">تسجيل دخول ادمن</h3>
                        @endif
                        <form method="POST" action="{{route('login')}}">
                            @csrf

                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">البريدالالكتروني*</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <input type="hidden" value="{{$type}}" name="type">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">كلمة المرور * </label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control" name="two" id="two" />
                                    <label for="two"> تذكرني</label>
                                    <a href="#" class="float-right">هل نسيت كلمةالمرور ؟</a>
                                </div>
                            </div>
                            <button class="button"><span>دخول</span><i class="fa fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
login-->

</div>
<!-- jquery -->
@include('layouts.footer-scripts')

</body>

</html>
