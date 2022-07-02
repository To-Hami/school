<!--=================================
 header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="#"><img src="{{asset('assets/images/logo-dark.png')}}" alt=""></a>

    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
               href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>

    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
        <div class="btn-group mb-1">


        </div>
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>

        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('assets/images/default.png')}}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h5>
                            <span>{{auth()->user()->email}}</span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('logout') }}" class=" dropdown-item btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"> <i class="text-danger ti-unlock"></i>تسجيل الخروج</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">  @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>

<!--=================================
header End-->
