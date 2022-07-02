@extends('layouts.master')
@section('css')
    @toastr_css

@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')

@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h3>تعديل البرامج :</h3>
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
                                تعديل البرنامج الحالي :
                            </button>
                            <form method="post" action="{{ route('programs.update',$programs->id) }}"
                                  enctype="multipart/form-data">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label>اسم البرنامج : <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="name"
                                                   value="{{ $programs->name }}">
                                            <input class="form-control" type="hidden" name="id"
                                                   value="{{ $programs->id }}">
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="title"> مسؤول التنفيذ :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control" value="{{ $programs->manager }}"
                                                   name="manager" required/>
                                        </div>
                                        @error('manager')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title">تاريخ الاحداث :</label>
                                        <div class='input-group'>

                                            <input id="hijri_picker" type="text" class="hijri-date-input  form-control"
                                                   name="date" value="{{ $programs->date }}" required/>
                                        </div>
                                        @error('date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title">  الحهة الداعمة :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control" value="{{ $programs->support }}"
                                                   name="support" required/>
                                        </div>
                                        @error('support')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title">  المستهدفون :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control" value="{{ $programs->targets }}"
                                                   name="targets" required/>
                                        </div>
                                        @error('targets')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="col-md-12">
                                        <label for="title">تفاصيل البرنامج :</label>
                                        <input style="height: 100px" value="{{ $programs->details }}"
                                               class='form-control' name="details"> </input>
                                        @error('details')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-success btn-lg  btn-lg " type="reset"
                                                style="margin: 10px 10px;position: relative;right: 20px;display: block">
                                            اضافة المرفقات :
                                        </button>

                                    </div>

                                    <br>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photos"><h5>أضف صور البرنامج :</h5></label>
                                            <input type="file" name="images[]" multiple class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photos"><h5>أضف رابط الفيديو الخاض بالبرنامج :</h5></label>
                                            <input value="{{ $programs->video }}" type="url" name="video"
                                                   class="form-control">
                                        </div>
                                    </div>


                                </div>
                                @php
                                    use function App\Http\Controllers\programs\getYoutubeId;$url = getYoutubeId($programs->video);
                                @endphp
                                @if($url)
                                    <div class="col-md-12">
                                        <iframe width="840" height="615"
                                                src="https://www.youtube.com/embed/{{$url}}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>

                                    </div>
                                @endif
                                    <div class="col-md-12 row">
                                        @foreach($programs->images as $img)
                                            <div class="col-md-4">
                                                <img style="width: 400px;height: 400px" class="img-thumbnail"
                                                     src="{{asset('attachments/programs/'.$programs->name . '/'.$img->images)}}">

                                            </div>
                                        @endforeach
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
