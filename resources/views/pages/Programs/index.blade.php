@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    برامج المدرسة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    برامج المدرسة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <h3>البرامج :</h3>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                @if (auth()->user()->hasPermission('edit_grades'))

                                <a href="{{route('programs.create')}}" class="btn btn-success btn-lg" role="button"
                                   aria-pressed="true">اضافة برنامج : </a><br><br>
                                @endif
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان البرنامج</th>
                                            <th> مسؤول التنفيذ</th>
                                            <th> الجهة الداعمة</th>
                                            <th>تاريخ البرنامج</th>

                                            <th>المزيد من التفاصيل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($programs as $index=>$program)
                                            <tr>
                                                <td>{{$index+1 }}</td>
                                                <td>{{$program->name}}</td>
                                                <td>{{$program->manager}}</td>
                                                <td>{{$program->support}}</td>
                                                <td>{{$program->date}}</td>

                                                <td>
                                                    <div class="dropdown show">
                                                        <a href="{{route('programs.show',$program->id)}}">
                                                            <i style="    display: inline;
                                                                   color: #17a2b8;
                                                                    width: 10px;
                                                                    height: 10px;
                                                                    border: 2px solid #17a2b8;
                                                                    padding: 6px;

                                                                    border-radius: 5px;" class="fa fa-eye"></i>
                                                            <input type="hidden" name="id" value="{{$program->id}}">

                                                        </a>
                                                        @if (auth()->user()->hasPermission('edit_grades'))

                                                        <a data-target="#Delete_Student{{ $program->id }}"
                                                           data-toggle="modal"
                                                           href="##Delete_Student{{ $program->id }}">
                                                            <i style="color: red;    display: inline;
                                                                width: 10px;
                                                                height: 10px;
                                                                border: 2px solid red;
                                                                padding: 6px;

                                                                border-radius: 5px;" class="fa fa-trash"></i>
                                                        </a>
                                                        @endif
                                                        <a href="{{route('programs.edit',$program->id)}}">
                                                            <i style="    display: inline;
                                                                   color: #17a2b8;
                                                                    width: 10px;
                                                                    height: 10px;
                                                                    border: 2px solid #17a2b8;
                                                                    padding: 6px;

                                                                    border-radius: 5px;" class="fa fa-edit"></i>
                                                            <input type="hidden" name="id" value="{{$program->id}}">

                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Delete_Student{{$program->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">هل انت متأكد
                                                                من رغبتك بالحزف ؟ </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('programs.destroy',$program->id)}}"
                                                                  method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <input type="hidden" name="id" value="{{$program->id}}">


                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{trans('Students_trans.Close')}}</button>
                                                                    <button
                                                                        class="btn btn-danger">{{trans('Students_trans.submit')}}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
