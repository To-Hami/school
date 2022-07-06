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
    <h3>الطلاب :</h3>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                @if (auth()->user()->hasPermission('edit_grades'))

                                <a href="{{route('Students.create')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">{{trans('main_trans.add_student')}}
                                </a>
                                @endif


                                <a href="{{route('Students.import')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">رفع ملف ايكسل</a>
                                <br><br>
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
                                        @foreach($students as $student)
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
                                                        @if (auth()->user()->hasPermission('edit_grades'))

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
                                                            @endif

                                                    </div>

                                                </td>
                                            </tr>
                                        @include('pages.Students.Delete')
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
