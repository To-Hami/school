<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.1.2/moment-hijri.min.js"></script>

<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-hijri-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap-hijri-datetimepicker.js')}}"></script>


<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
<!-- plugins-jquery -->
<script type="text/javascript">


    $(function () {

        initHijrDatePicker();

        initHijrDatePickerDefault();

        $('.disable-date').hijriDatePicker({

            minDate:"2020-01-01",
            maxDate:"2021-01-01",
            viewMode:"years",
            hijri:true,
            debug:true
        });

    });

    function initHijrDatePicker() {

        $(".hijri-date-input").hijriDatePicker({
            locale: "ar-sa",
            format: "DD-MM-YYYY",
            hijriFormat:"iYYYY-iMM-iDD",
            dayViewHeaderFormat: "MMMM YYYY",
            hijriDayViewHeaderFormat: "iMMMM iYYYY",
            showSwitcher: true,
            allowInputToggle: true,
            showTodayButton: false,
            useCurrent: true,
            isRTL: false,
            viewMode:'months',
            keepOpen: false,
            hijri: false,
            debug: true,
            showClear: true,
            showTodayButton: true,
            showClose: true
        });
    }

    function initHijrDatePickerDefault() {

        $(".hijri-date-default").hijriDatePicker();
    }

</script>
<!-- plugin_path -->
<script type="text/javascript">

    var plugin_path = '{{asset('assets/js')}}/';

</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<script src="{{ URL::asset('assets/js/printThis.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
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
