@extends('layouts.master')
@section('css')
    @toastr_css

@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    مكتبة الارشاد

@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h3>اضافة مرجع :</h3>
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
                    <div class="details" style="overflow: hidden">
                        <div class="print">
                            <button class="btn btn-success btn-lg  btn-lg " type="reset" style="margin: 10px 0">
                                اضافة مرجع جديد :
                            </button>
                            <form method="post" action="{{ route('books.store') }}"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('post')}}

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>اسم المرجع : <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control">
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="title">  تفاصيل المرجع :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   name="details" required/>
                                        </div>
                                        @error('details')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="attachment"><h5>أضف المرجع :</h5></label>
                                            <input type="file" name="attachment"  class="form-control" accept=".pdf,.jpg, .png, image/jpeg, image/png">
                                        </div>
                                    </div>


                                </div>

                                <button style="margin-top: 100px"
                                        class="btn btn-success btn-lg nextBtn btn-lg pull-right"
                                        type="submit">{{trans('Students_trans.submit')}}
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
        @endsection
        @section('js')
            <script>

                $(function () {

                    initDefault();

                });

                function initDefault() {
                    $("#hijri_picker").hijriDatePicker({
                        hijri: true,
                        showSwitcher: false
                    });
                }

                $(document).on('click', '.print_ptn', function () {

                    $('.print').printThis();

                });
            </script>
            @toastr_js
            @toastr_render
@endsection
