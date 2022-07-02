@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.add_student')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.add_student')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <h3>   اضافة ملف  ايكسل :</h3>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{ route('Students.import.file') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue"></h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اختر ملف الاكسيل : <span class="text-danger">*</span></label>
                                    <input  type="file" name="file"  class="form-control">
                                </div>
                            </div>
                        </div>




                    <button class="btn btn-success btn-lg nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                </form>

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
        $(function () {

            initDefault();

        });

        function initDefault() {
            $("#hijri-picker").hijriDatePicker({
                hijri:true,
                showSwitcher:false
            });
        }
    </script>

@endsection
