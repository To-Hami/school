@extends('layouts.master')


@section('title')
    {{ trans('Grades_trans.title_page') }}
@stop


@section('PageTitle')
    {{ trans('main_trans.Grades') }}
@stop
@section('content')

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                                    <span class="text-primary">
                                        <i class="fa fa-graduation-cap highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-left text-left">
                            <h3 class="card-text text-dark"><a href="{{route('Students.index')}}">الطلاب</a> </h3>
                            <h4>{{$studants->count()}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                                    <span class="text-info">
                                        <i class="fa fa fa-pencil-square highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-left text-left">
                            <h3 class="card-text text-dark"><a href="{{route('Teachers.index')}}">المعلمين</a></h3>
                            <h4>{{$teachers->count()}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                                    <span class="text-success">
                                        <i class="fa fa-file-pdf-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-left text-left">
                            <h3 class="card-text text-dark"><a href="{{route('books.index')}}">المكتبة</a></h3>
                            <h4>{{$Books->count()}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                                    <span class="text-danger">
                                        <i class="fa fa-heart-o highlight-icon" aria-hidden="true"></i>
                                    </span>
                        </div>
                        <div class="float-left text-left">
                            <h3 class="card-text text-dark"><a href="{{route('programs.index')}}">البرامج</a></h3>
                            <h4>{{$programs->count()}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row container">
        <br>
        <h3>اجراءات الطلاب :</h3>
        <br>
        <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                   data-page-length="50"
                   style="text-align: center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('Students_trans.name')}}</th>
                    <th>الهوية</th>
                    <th>{{trans('Students_trans.address')}}</th>
                    <th>{{trans('Students_trans.Grade')}}</th>
                    <th>{{trans('Students_trans.classrooms')}}</th>
                    <th>{{trans('Students_trans.section')}}</th>
                    <th>{{trans('Students_trans.Processes')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($student_problems as $student)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->Id_Number}}</td>
                        <td>{{$student->address}}</td>
                        <td>{{ $student->grade->Name ?? '---'  }}</td>
                        <td>{{$student->classroom->Name_Class ?? '---' }}</td>
                        <td>{{$student->section->Name_Section ?? '---' }}</td>
                        <td>

                            <div class="dropdown show">


                                <a class="btn btn-outline-info btn-sm"
                                   href="{{route('Students.problems',$student->id)}}"
                                   role="button"><i
                                        class="fa fa-eye">
                                    </i>&nbsp;
                                </a>
                                <a class="btn btn-outline-success btn-sm"
                                   href="{{route('Students.edit',$student->id)}}"
                                   role="button">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-outline-danger btn-sm"
                                   data-target="#Delete_Student{{ $student->id }}"
                                   data-toggle="modal"
                                   href="##Delete_Student{{ $student->id }}"><i
                                        class="fa fa-trash"></i>

                                </a>

                            </div>

                        </td>
                    </tr>
                @include('pages.Students.Delete')
                @endforeach
            </table>
        </div>
    </div>
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
