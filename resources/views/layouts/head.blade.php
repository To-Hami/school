<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

<!--- Style css -->
<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/css/plugins/fileupload.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/css/plugins/fancy_fileupload.css') }}" rel="stylesheet" />

<link href="{{ URL::asset('css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
<!-- CSS only -->
<link href="{{ URL::asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@yield('css')
<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

<style>
    body, h1, h2, h3, h4, h5, h6 {
        font-family: 'Cairo', sans-serif !important ;
    }

    .side_links{
        font-size: 19px;
    }.side_links .icon{
         margin: 0px 3px 0px 15px;
     }

    .datepicker{
        left: 20.5px !important;

    }
</style>
