@extends('layouts.master')
@section('css')
    @toastr_css

@endsection
@section('page-header')
    <!-- breadcrumb -->

@section('title')
تفاصيل المدرسة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h3 style="margin: 10px"> تفاصيل المدرسة :</h3>
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

                            <form method="post" action="{{ route('history.update',$history->id) }}"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('patch')}}

                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>اسم المدرسة : <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$history->name}}">
                                            <input type="hidden" name="id" class="form-control"
                                                   value="{{$history->id}}">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

{{--                                    <div class="col-md-4">--}}

{{--                                        <div class="form-group">--}}
{{--                                            <label> تاريخ التأسيس : <span--}}
{{--                                                    class="text-danger">*</span></label>--}}
{{--                                            <input type="text" name="history" class="form-control"--}}
{{--                                                   value="{{$history->history}}">--}}
{{--                                        </div>--}}
{{--                                        @error('history')--}}
{{--                                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                        @enderror--}}

{{--                                    </div>--}}
                                    <div class="col-md-4">
                                        <label for="title"> المرحلة الدراسية :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control" value="{{$history->grade}}"
                                                   name="grade" required/>
                                        </div>
                                        @error('grade')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label for="title"> اسم مدير المدرسة :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   name="manager_name" value="{{$history->manager_name}}" required/>
                                        </div>
                                        @error('manager_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label for="title"> البريد الالكتروني :</label>
                                        <div class='input-group'>

                                            <input type="text" class=" form-control"
                                                   name="manager_email" required value="{{$history->manager_email}}"/>
                                        </div>
                                        @error('manager_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
{{--                                    <div class="col-md-4">--}}
{{--                                        <label for="title"> الجوال :</label>--}}
{{--                                        <div class='input-group'>--}}

{{--                                            <input type="number" value="{{$history->manager_phone}}"--}}
{{--                                                   class="  form-control"--}}
{{--                                                   name="manager_phone" required/>--}}
{{--                                        </div>--}}
{{--                                        @error('manager_phone')--}}
{{--                                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}


                                    <div class="col-md-4">
                                        <label for="title"> الرقم الوزاري :</label>
                                        <div class='input-group'>

                                            <input type="number" value="{{$history->number}}" class=" form-control"
                                                   name="number" required/>
                                        </div>
                                        @error('number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-md-12" style="margin-top: 20px">
                                        <label for="title"> موقع المدرسة :</label>
                                        <div class='input-group'>

                                            <input type="text" class="form-control"
                                                   id="pac-input" placeholder="  " name="address">
                                        </div>
                                        @error('text')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-10">
                                        <div id="map" style="height: 500px;width: 1000px;"></div>
                                    </div>

                                    @if (auth()->user()->hasPermission('edit_history'))
                                    <div class="col-md-10">
                                        <button style="margin-top: 100px"
                                                class="btn btn-success btn-lg nextBtn btn-lg pull-right"
                                                type="submit">{{trans('Students_trans.submit')}}
                                        </button>
                                    </div>
                                        @endif
                                </div>

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

            <script>
                $("#pac-input").focusin(function () {
                    $(this).val('');
                });
                $('#latitude').val('');
                $('#longitude').val('');
                // This example adds a search box to a map, using the Google Place Autocomplete
                // feature. People can enter geographical searches. The search box will return a
                // pick list containing a mix of places and predicted search terms.
                // This example requires the Places library. Include the libraries=places
                // parameter when you first load the API. For example:
                // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
                function initAutocomplete() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 24.740691, lng: 46.6528521},
                        zoom: 13,
                        mapTypeId: 'roadmap'
                    });
                    // move pin and current location
                    infoWindow = new google.maps.InfoWindow;
                    geocoder = new google.maps.Geocoder();
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            var pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };
                            map.setCenter(pos);
                            var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(pos),
                                map: map,
                                title: 'موقعك الحالي'
                            });
                            markers.push(marker);
                            marker.addListener('click', function () {
                                geocodeLatLng(geocoder, map, infoWindow, marker);
                            });
                            // to get current position address on load
                            google.maps.event.trigger(marker, 'click');
                        }, function () {
                            handleLocationError(true, infoWindow, map.getCenter());
                        });
                    } else {
                        // Browser doesn't support Geolocation
                        console.log('dsdsdsdsddsd');
                        handleLocationError(false, infoWindow, map.getCenter());
                    }
                    var geocoder = new google.maps.Geocoder();
                    google.maps.event.addListener(map, 'click', function (event) {
                        SelectedLatLng = event.latLng;
                        geocoder.geocode({
                            'latLng': event.latLng
                        }, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    deleteMarkers();
                                    addMarkerRunTime(event.latLng);
                                    SelectedLocation = results[0].formatted_address;
                                    console.log(results[0].formatted_address);
                                    splitLatLng(String(event.latLng));
                                    $("#pac-input").val(results[0].formatted_address);
                                }
                            }
                        });
                    });

                    function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
                        var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                        /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                        $('#latitude').val(markerCurrent.position.lat());
                        $('#longitude').val(markerCurrent.position.lng());
                        geocoder.geocode({'location': latlng}, function (results, status) {
                            if (status === 'OK') {
                                if (results[0]) {
                                    map.setZoom(8);
                                    var marker = new google.maps.Marker({
                                        position: latlng,
                                        map: map
                                    });
                                    markers.push(marker);
                                    infowindow.setContent(results[0].formatted_address);
                                    SelectedLocation = results[0].formatted_address;
                                    $("#pac-input").val(results[0].formatted_address);
                                    infowindow.open(map, marker);
                                } else {
                                    window.alert('No results found');
                                }
                            } else {
                                window.alert('Geocoder failed due to: ' + status);
                            }
                        });
                        SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());
                    }

                    function addMarkerRunTime(location) {
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map
                        });
                        markers.push(marker);
                    }

                    function setMapOnAll(map) {
                        for (var i = 0; i < markers.length; i++) {
                            markers[i].setMap(map);
                        }
                    }

                    function clearMarkers() {
                        setMapOnAll(null);
                    }

                    function deleteMarkers() {
                        clearMarkers();
                        markers = [];
                    }

                    // Create the search box and link it to the UI element.
                    var input = document.getElementById('pac-input');
                    $("#pac-input").val("أبحث هنا ");
                    var searchBox = new google.maps.places.SearchBox(input);
                    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
                    // Bias the SearchBox results towards current map's viewport.
                    map.addListener('bounds_changed', function () {
                        searchBox.setBounds(map.getBounds());
                    });
                    var markers = [];
                    // Listen for the event fired when the user selects a prediction and retrieve
                    // more details for that place.
                    searchBox.addListener('places_changed', function () {
                        var places = searchBox.getPlaces();
                        if (places.length == 0) {
                            return;
                        }
                        // Clear out the old markers.
                        markers.forEach(function (marker) {
                            marker.setMap(null);
                        });
                        markers = [];
                        // For each place, get the icon, name and location.
                        var bounds = new google.maps.LatLngBounds();
                        places.forEach(function (place) {
                            if (!place.geometry) {
                                console.log("Returned place contains no geometry");
                                return;
                            }
                            var icon = {
                                url: place.icon,
                                size: new google.maps.Size(100, 100),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(17, 34),
                                scaledSize: new google.maps.Size(25, 25)
                            };
                            // Create a marker for each place.
                            markers.push(new google.maps.Marker({
                                map: map,
                                icon: icon,
                                title: place.name,
                                position: place.geometry.location
                            }));
                            $('#latitude').val(place.geometry.location.lat());
                            $('#longitude').val(place.geometry.location.lng());
                            if (place.geometry.viewport) {
                                // Only geocodes have viewport.
                                bounds.union(place.geometry.viewport);
                            } else {
                                bounds.extend(place.geometry.location);
                            }
                        });
                        map.fitBounds(bounds);
                    });
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
                    infoWindow.open(map);
                }

                function splitLatLng(latLng) {
                    var newString = latLng.substring(0, latLng.length - 1);
                    var newString2 = newString.substring(1);
                    var trainindIdArray = newString2.split(',');
                    var lat = trainindIdArray[0];
                    var Lng = trainindIdArray[1];
                    $("#latitude").val(lat);
                    $("#longitude").val(Lng);
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=SA
         async defer"></script>
            @toastr_js
            @toastr_render
@endsection
