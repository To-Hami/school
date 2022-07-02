@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة مادة دراسية
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('title')
    المواد الدراسية
@stop

@section('content')
    <!-- row -->
    <h3>  اضافة مادة دراسية  </h3>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('subjects.store')}}" method="post" autocomplete="off">
                                @csrf

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">اسم المادة باللغة العربية</label>
                                        <input type="text" name="Name" class="form-control">
                                    </div>

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputState">المرحلة الدراسية</label>
                                        <select class="custom-select my-1 mr-sm-2 form-control" name="Grade_id" style="height: 50px">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col">
                                        <label for="inputState">الصف الدراسي</label>
                                        <select name="Class_id" class="custom-select form-control"  style="height: 50px">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>

                                            @foreach($classrooms as $classroom)
                                                <option value="{{$classroom->id}}">{{$classroom->Name_Class}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col">
                                        <label for="inputState">اسم المعلم</label>
                                        <select class="custom-select my-1 mr-sm-2 form-control" name="teacher_id" style="height: 50px">
                                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" type="submit">حفظ
                                    البيانات
                                </button>
                            </form>
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
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
