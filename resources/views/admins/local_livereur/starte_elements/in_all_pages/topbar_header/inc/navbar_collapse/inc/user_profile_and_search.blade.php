<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="{{url('admins/'.$template)}}/assets/images/users/2.jpg" alt="user" class="rounded-circle" width="40">
        <span class="m-l-5 font-medium d-none d-sm-inline-block">{{Auth::guard('local_livereur')->user()->name}} <i class="mdi mdi-chevron-down"></i></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
        <span class="with-arrow">
            <span class="bg-primary"></span>
        </span>
        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
            <div class="">
                <img src="{{url('admins/'.$template)}}/assets/images/users/2.jpg" alt="user" class="rounded-circle" width="60">
            </div>
            <div class="m-l-10">
                <h4 class="m-b-0">{{Auth::guard('local_livereur')->user()->name}}</h4>
                <p class=" m-b-0">{{Auth::guard('local_livereur')->user()->email}}</p>
            </div>
        </div>
        <div class="profile-dis scrollable">
            <a class="dropdown-item" href="javascript:void(0)">
                <i class="ti-user m-r-5 m-l-5"></i> ملفي الشخصي</a>
            <a class="dropdown-item" href="javascript:void(0)">
                <i class="ti-wallet m-r-5 m-l-5"></i> أرباحي</a>
            <a class="dropdown-item" href="javascript:void(0)">
                <i class="ti-email m-r-5 m-l-5"></i> الرسائل</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)">
                <i class="ti-settings m-r-5 m-l-5"></i> إعدادات الحساب</a>
            <div class="dropdown-divider"></div>
            {{-- <a class="dropdown-item" href="javascript:void(0)"> --}}
                <a class="dropdown-item" href="{{route('local-livereur.logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off m-r-5 m-l-5"></i> تسجيل الخروج</a>
                <form id="logout-form" action="{{route('local-livereur.logout')}}" method="post">
                @csrf
                </form>
            <div class="dropdown-divider"></div>
        </div>
        <div class="p-l-30 p-10">
            <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
        </div>
    </div>
</li>