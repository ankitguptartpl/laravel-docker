<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin.dashboard')}}" class="site_title">
                <img src="{{asset('theme/images/logo.png')}}" alt="logo">
            </a>
        </div>

        <div class="clearfix"></div>
        <br />
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li class="{{menuActive('admin.dashboard')}}"><a href="{{route('admin.dashboard')}}"> Dashboard </a>
            </li>
            <li class="{{ Request::segment(2) == "cms-pages" ? 'active' :'' }}"><a>CMS<span class="chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.cms.list')}}">List</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(2) == "faqs" ? 'active' :'' }}"><a>FAQ<span class="chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.faq.add')}}">Add</a></li>
                    <li><a href="{{route('admin.faq.list')}}">List</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>
    </div>
</div>