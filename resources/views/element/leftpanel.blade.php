 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel -->
     <!--  <div class="user-panel">
        <div class="pull-left image">
          <img src="{!!URL::to('/images/user2-160x160.jpg')!!}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{!!Session::get('name')!!}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->


      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
       <!--  <li class="header">MAIN NAVIGATION</li> -->
        <li><a href="{!!URL::to('/admin/dashboard')!!}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="active treeview">
          <a href="javascript:void(0)">
            <i class="fa fa-cog"></i> <span>Settings management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            @if($user_view_composer->hasRole('admin/languagecapability',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'languagecapability' ? 'active' : null }}"><a href="{!!URL::to('/admin/languagecapability')!!}"><i class="fa fa-circle-o"></i>Language capability</a></li>@endif
            @if($user_view_composer->hasRole('admin/procedure',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'procedure' ? 'active' : null }}"><a href="{!!URL::to('/admin/procedure')!!}"><i class="fa fa-circle-o"></i>Procedure management</a></li>@endif
            @if($user_view_composer->hasRole('admin/treatment',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'treatment' ? 'active' : null }}" ><a href="{!!URL::to('/admin/treatment')!!}"><i class="fa fa-circle-o"></i>Treatment management</a></li>@endif
            @if($user_view_composer->hasRole('admin/accrediation',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'accrediation' ? 'active' : null }}" ><a href="{!!URL::to('/admin/accrediation')!!}"><i class="fa fa-circle-o"></i>Accrediation management</a></li>@endif
            @if($user_view_composer->hasRole('admin/accomodation',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'accomodation' ? 'active' : null }}" ><a href="{!!URL::to('/admin/accomodation')!!}"><i class="fa fa-circle-o"></i>Accomodation management</a></li>@endif
            @if($user_view_composer->hasRole('admin/cuisine',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'cuisine' ? 'active' : null }}" ><a href="{!!URL::to('/admin/cuisine')!!}"><i class="fa fa-circle-o"></i>Cuisine management</a></li>@endif
            @if($user_view_composer->hasRole('admin/specificservice',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'specificservice' ? 'active' : null }}" ><a href="{!!URL::to('/admin/specificservice')!!}"><i class="fa fa-circle-o"></i>Specific service management</a></li>@endif
            @if($user_view_composer->hasRole('admin/banner',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'banner' ? 'active' : null }}" ><a href="{!!URL::to('/admin/banner')!!}"><i class="fa fa-circle-o"></i>Banner management</a></li>@endif
            @if($user_view_composer->hasRole('admin/role',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'role' ? 'active' : null }}"><a href="/admin/role"><i class="fa fa-circle-o"></i>Role management</a></li>@endif
            @if($user_view_composer->hasRole('admin/degree',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'degree' ? 'active' : null }}" ><a href="{!!URL::to('/admin/degree')!!}"><i class="fa fa-circle-o"></i>Degree management</a></li>@endif
            @if($user_view_composer->hasRole('admin/medicalfacility',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'medicalfacility' ? 'active' : null }}" ><a href="{!!URL::to('/admin/medicalfacility')!!}"><i class="fa fa-circle-o"></i>Medical facility management</a></li>@endif
            @if($user_view_composer->hasRole('admin/providertype',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'providertype' ? 'active' : null }}" ><a href="{!!URL::to('/admin/providertype')!!}"><i class="fa fa-circle-o"></i>Provider type management</a></li>@endif
            @if($user_view_composer->hasRole('admin/paymenttype',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'paymenttype' ? 'active' : null }}" ><a href="{!!URL::to('/admin/paymenttype')!!}"><i class="fa fa-circle-o"></i>Payment type management</a></li>@endif
            @if($user_view_composer->hasRole('admin/connectivity',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'connectivity' ? 'active' : null }}" ><a href="{!!URL::to('/admin/connectivity')!!}"><i class="fa fa-circle-o"></i>Connectivity master management</a></li>@endif
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-hotel"></i> <span>Hotel management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             @if($user_view_composer->hasRole('admin/hotel',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'hotel' ? 'active' : null }}"><a href="{!!URL::to('/admin/hotel')!!}"><i class="fa fa-circle-o"></i>hotel list</a></li>@endif
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>News & Events management</span>
            <i class="fa fa-picture-o"></i> <span>User management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_view_composer->hasRole('admin/news',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'news' ? 'active' : null }}"><a href="{!!URL::to('/admin/news')!!}"><i class="fa fa-circle-o"></i>News management</a></li>@endif
            @if($user_view_composer->hasRole('admin/adminuser',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'adminuser' ? 'active' : null }}" ><a href="{{ url('/admin/adminuser')}}"><i class="fa fa-circle-o"></i>Manage user</a></li>@endif
            @if($user_view_composer->hasRole('admin/permission',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'permission' ? 'active' : null }}" ><a href="{{ url('/admin/permission')}}"><i class="fa fa-circle-o"></i>Manage permission</a></li>@endif
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i> <span>User management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_view_composer->hasRole('admin/adminuser',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'adminuser' ? 'active' : null }}" ><a href="{{ url('/admin/adminuser')}}"><i class="fa fa-circle-o"></i>Manage user</a></li>@endif
            @if($user_view_composer->hasRole('admin/permission',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'permission' ? 'active' : null }}" ><a href="{{ url('/admin/permission')}}"><i class="fa fa-circle-o"></i>Manage permission</a></li>@endif
          </ul>
        </li>

        <li class="treeview">
          <a href="javascript:void(0)">
            <i class="fa fa-picture-o"></i> <span>Hospital management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            @if($user_view_composer->hasRole('admin/doctors',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'doctors' ? 'active' : null }}" ><a href="{{ url('/admin/doctors')}}"><i class="fa fa-circle-o"></i>Manage doctors</a></li>@endif
            @if($user_view_composer->hasRole('admin/providerconnectivity',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'providerconnectivity' ? 'active' : null }}" ><a href="{{ url('/admin/providerconnectivity')}}"><i class="fa fa-circle-o"></i>Manage connectivity</a></li>@endif
            @if($user_view_composer->hasRole('admin/doctors',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'doctors' ? 'active' : null }}" ><a href="{{ url('/admin/doctors')}}"><i class="fa fa-circle-o"></i>Manage doctors</a></li>@endif
          </ul>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
