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

        <li class="treeview {{ Request::segment(2) === 'languagecapability' || Request::segment(2) === 'procedure' || Request::segment(2) === 'treatment' || Request::segment(2) === 'genericmedicine' || Request::segment(2) === 'medicaltestcategories' || Request::segment(2) === 'medicaltest' || Request::segment(2) === 'degree' || Request::segment(2) === 'providertype' || Request::segment(2) === 'accomodation' || Request::segment(2) === 'cuisine' || Request::segment(2) === 'paymenttype' || Request::segment(2) === 'connectivity' || Request::segment(2) === 'connectivityservices' || Request::segment(2) === 'accrediation' || Request::segment(2) === 'specificservice' || Request::segment(2) === 'medicalfacility' || Request::segment(2) === 'banner' || Request::segment(2) === 'role'  ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-cog"></i> <span>Settings management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            @if($user_view_composer->hasRole('admin/languagecapability',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'languagecapability' ? 'active' : null }}"><a href="{!!URL::to('/admin/languagecapability')!!}"><i class="fa fa-language"></i>Language capability master</a></li>@endif
            @if($user_view_composer->hasRole('admin/procedure',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'procedure' ? 'active' : null }}"><a href="{!!URL::to('/admin/procedure')!!}"><i class="fa fa-medkit"></i>Procedure master</a></li>@endif
            @if($user_view_composer->hasRole('admin/treatment',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'treatment' ? 'active' : null }}" ><a href="{!!URL::to('/admin/treatment')!!}"><i class="fa fa-stethoscope"></i>Treatment master</a></li>@endif
            @if($user_view_composer->hasRole('admin/genericmedicine',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'genericmedicine' ? 'active' : null }}" ><a href="{!!URL::to('/admin/genericmedicine')!!}"><i class="fa fa-plus-square"></i>Generic Medicine</a></li>@endif
            @if($user_view_composer->hasRole('admin/medicaltestcategories',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'medicaltestcategories' ? 'active' : null }}" ><a href="{!!URL::to('/admin/medicaltestcategories')!!}"><i class="fa fa-plus-square"></i>Medical Test Category</a></li>@endif
            @if($user_view_composer->hasRole('admin/medicaltest',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'medicaltest' ? 'active' : null }}" ><a href="{!!URL::to('/admin/medicaltest')!!}"><i class="fa fa-plus-square"></i>Medical Test</a></li>@endif
			@if($user_view_composer->hasRole('admin/degree',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'degree' ? 'active' : null }}" ><a href="{!!URL::to('/admin/degree')!!}"><i class="fa fa-certificate"></i>Degree master</a></li>@endif
            @if($user_view_composer->hasRole('admin/providertype',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'providertype' ? 'active' : null }}" ><a href="{!!URL::to('/admin/providertype')!!}"><i class="fa fa-circle-o"></i>Provider type master</a></li>@endif
            @if($user_view_composer->hasRole('admin/accomodation',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'accomodation' ? 'active' : null }}" ><a href="{!!URL::to('/admin/accomodation')!!}"><i class="fa fa-bed"></i>Accomodation master</a></li>@endif
            @if($user_view_composer->hasRole('admin/cuisine',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'cuisine' ? 'active' : null }}" ><a href="{!!URL::to('/admin/cuisine')!!}"><i class="fa fa-cutlery"></i>Cuisine master</a></li>@endif
            @if($user_view_composer->hasRole('admin/paymenttype',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'paymenttype' ? 'active' : null }}" ><a href="{!!URL::to('/admin/paymenttype')!!}"><i class="fa fa-money"></i>Payment type master</a></li>@endif
            @if($user_view_composer->hasRole('admin/connectivity',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'connectivity' ? 'active' : null }}" ><a href="{!!URL::to('/admin/connectivity')!!}"><i class="fa fa-connectdevelop"></i>Connectivity master</a></li>@endif
            @if($user_view_composer->hasRole('admin/connectivityservices',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'connectivityservices' ? 'active' : null }}" ><a href="{!!URL::to('/admin/connectivityservices')!!}"><i class="fa fa-sitemap"></i>Connectivity service master</a></li>@endif
            @if($user_view_composer->hasRole('admin/accrediation',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'accrediation' ? 'active' : null }}" ><a href="{!!URL::to('/admin/accrediation')!!}"><i class="fa fa-circle-o"></i>Accrediation management</a></li>@endif
            @if($user_view_composer->hasRole('admin/specificservice',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'specificservice' ? 'active' : null }}" ><a href="{!!URL::to('/admin/specificservice')!!}"><i class="fa fa-circle-o"></i>Specific service master</a></li>@endif
            @if($user_view_composer->hasRole('admin/medicalfacility',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'medicalfacility' ? 'active' : null }}" ><a href="{!!URL::to('/admin/medicalfacility')!!}"><i class="fa fa-circle-o"></i>Medical facility master</a></li>@endif
            @if($user_view_composer->hasRole('admin/banner',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'banner' ? 'active' : null }}" ><a href="{!!URL::to('/admin/banner')!!}"><i class="fa fa-image"></i>Banner management</a></li>@endif
            @if($user_view_composer->hasRole('admin/role',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'role' ? 'active' : null }}"><a href="/admin/role"><i class="fa fa-tasks"></i>Role management</a></li>@endif                     
          </ul>
        </li>

        <li class="treeview {{ Request::segment(2) === 'hotel' ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-hotel"></i> <span>Hotel management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             @if($user_view_composer->hasRole('admin/hotel',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'hotel' ? 'active' : null }}"><a href="{!!URL::to('/admin/hotel')!!}"><i class="fa fa-circle-o"></i>hotel list</a></li>@endif
          </ul>
        </li>

        <li class="treeview {{ Request::segment(2) === 'news' ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-newspaper-o"></i> <span>News & Events management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_view_composer->hasRole('admin/news',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'news' ? 'active' : null }}"><a href="{!!URL::to('/admin/news')!!}"><i class="fa fa-circle-o"></i>News management</a></li>@endif
          </ul>
        </li>



        <li class="treeview {{ Request::segment(2) === 'adminuser' || Request::segment(2) === 'permission' ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-users"></i> <span>User management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_view_composer->hasRole('admin/adminuser',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'adminuser' ? 'active' : null }}" ><a href="{{ url('/admin/adminuser')}}"><i class="fa fa-group"></i>Manage user</a></li>@endif
            @if($user_view_composer->hasRole('admin/permission',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'permission' ? 'active' : null }}" ><a href="{{ url('/admin/permission')}}"><i class="fa fa-roles"></i>Manage permission</a></li>@endif
          </ul>
        </li>


        <li class="treeview {{ Request::segment(2) === 'doctors' || Request::segment(2) === 'providerconnectivity' || Request::segment(2) === 'providerconnectivityservices' || Request::segment(2) === 'hospitals' || Request::segment(2) === 'package-types'  ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-hospital-o"></i> <span>Hospital management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_view_composer->hasRole('admin/doctors',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'doctors' ? 'active' : null }}" ><a href="{{ url('/admin/doctors')}}"><i class="fa fa-user-md"></i>Manage doctors</a></li>@endif
            @if($user_view_composer->hasRole('admin/providerconnectivity',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'providerconnectivity' ? 'active' : null }}" ><a href="{{ url('/admin/providerconnectivity')}}"><i class="fa fa-connectdevelop"></i>Manage connectivity</a></li>@endif
            @if($user_view_composer->hasRole('admin/providerconnectivityservices',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'providerconnectivityservices' ? 'active' : null }}" ><a href="{{ url('/admin/providerconnectivityservices')}}"><i class="fa fa-connectdevelop"></i>Manage Connectivity to services</a></li>@endif
            @if($user_view_composer->hasRole('admin/hospitals',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'hospitals' ? 'active' : null }}" ><a href="{{ url('/admin/hospitals')}}"><i class="fa fa-hospital-o"></i>Manage hospitals</a></li>@endif
            @if($user_view_composer->hasRole('admin/package-types',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'package-types' ? 'active' : null }}" ><a href="{{ url('/admin/package-types')}}"><i class="fa fa-hospital-o"></i>Manage package types</a></li>@endif
          </ul>
        </li>

        <li class="treeview {{ Request::segment(2) === 'successstories' ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-thumbs-up"></i> <span>Success story management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_view_composer->hasRole('admin/successstories',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'successstories' ? 'active' : null }}"><a href="{!!URL::to('/admin/successstories')!!}"><i class="fa fa-thumbs-up"></i>Success story</a></li>@endif
          </ul>
        </li>
        <li class="treeview {{ Request::segment(2) === 'contact' ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-envelope"></i> <span>Contact</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             @if($user_view_composer->hasRole('admin/contact',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'contact' ? 'active' : null }}"><a href="{!!URL::to('/admin/contact')!!}"><i class="fa fa-envelope"></i>Contact list</a></li>@endif
          </ul>
        </li>

        <li class="treeview {{ Request::segment(2) === 'faqcategories' || Request::segment(2) === 'faq' ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-question"></i> <span>FAQ </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_view_composer->hasRole('admin/faqcategories',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'faqcategories' ? 'active' : null }}"><a href="{!!URL::to('/admin/faqcategories')!!}"><i class="fa fa-question"></i>Faq category</a></li>@endif
            @if($user_view_composer->hasRole('admin/faqs',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'faqs' ? 'active' : null }}"><a href="{!!URL::to('/admin/faq')!!}"><i class="fa fa-question"></i>FAQs</a></li>@endif
          </ul>
        </li>

        <li class="treeview {{ Request::segment(2) === 'immigration' ? 'active' : null || Request::segment(2) === 'countryvisa' ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-briefcase"></i> <span>Accomodation </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_view_composer->hasRole('admin/immigration',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'immigration' ? 'active' : null }}"><a href="{!!URL::to('/admin/immigration')!!}"><i class="fa fa-address-card"></i>Immigration</a></li>@endif
            @if($user_view_composer->hasRole('admin/countryvisa',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'countryvisa' ? 'active' : null }}"><a href="{!!URL::to('/admin/countryvisa')!!}"><i class="fa fa-address-card"></i>Visa</a></li>@endif
          </ul>
        </li>

        <li class="treeview {{ Request::segment(2) === 'homepagecontent' ? 'active' : null || Request::segment(2) === 'cmspagedetail' ? 'active' : null }}">
          <a href="javascript:void(0)">
            <i class="fa fa-briefcase"></i> <span>CMS Mgmt </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if($user_view_composer->hasRole('admin/homepagecontent',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'homepagecontent' ? 'active' : null }}"><a href="/admin/homepagecontent"><i class="fa fa-tasks"></i>Homepage Content</a></li>@endif 
            @if($user_view_composer->hasRole('admin/cmspagedetail',Auth::guard('admin')->user()->id))<li class="{{ Request::segment(2) === 'cmspagedetail' ? 'active' : null }}"><a href="{!!URL::to('/admin/cmspagedetail')!!}"><i class="fa fa-address-card"></i>CMS Page</a></li>@endif
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
