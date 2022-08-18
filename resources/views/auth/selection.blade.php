<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')

</head>

<body>

    <div class="wrapper">

        <section class="height-100vh d-flex align-items-center page-section-ptb login"
                 style="background-image: url('{{ asset('assets/images/sativa.png')}}');">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">حدد طريقة الدخول</h3>
                            <div class="form-inline">
                                <a class="btn btn-default col-lg-3" title="طالب" href="{{route('login.show','student')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/student.png')}}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="ولي امر" href="{{route('login.show','parent')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/parent.png')}}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="معلم" href="{{route('login.show','teacher')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/teacher.png')}}">
                                </a>
                                <a class="btn btn-default col-lg-3" title="ادمن" href="{{route('login.show','admin')}}">
                                    <img alt="user-img" width="100px;" src="{{URL::asset('assets/images/admin.png')}}">
                                </a>
                            </div>

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
