@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_students')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                    {{trans('Students_trans.UndoAll')}}
                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('Students_trans.name')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.PreviousSchoolStage')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.AcademicYear')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.PreviousClass')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.PreviousAcademicSection')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.CurrentGradeLevel')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.CurrentSchoolYear')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.CurrentClass')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.CurrentAcademicSection')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->f_classroom->name_nlass}}</td>
                                                <td>{{$promotion->f_section->name_section}}</td>
                                                <td>{{$promotion->t_grade->name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->t_classroom->name_class}}</td>
                                                <td>{{$promotion->t_section->name_section}}</td>
                                                <td>

                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">{{trans('Students_trans.BackStudent')}}</button>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Soft_delete{{$promotion->student_id}}">{{trans('Students_trans.StudentGraduation')}}</button>
                                                </td>
                                            </tr>
                                        @include('pages.Students.promotion.Delete_all')
                                        @include('pages.Students.promotion.Delete_one')
                                        @include('pages.Students.promotion.Soft_delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
