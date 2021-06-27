<header class="navbar">
    <div class="container-fluid">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-danger" style="float: left;margin: 10px 5px;border-radius: 6px;" type="submit">X</button>
        </form>

        <a href="{{ route('account.setting') }}" style="float: left;display: block;margin-left: 30px;width: 43px;margin-top: 9px;height: 38px;box-shadow: 1px 2px 7px 3px #ccc;border-radius: 10px;">
            <i class="fa fa-user-circle-o" style="color: chocolate;text-align: center;display: block;padding: 6px 0px;font-size: 26px;"></i>
        </a>

        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
            </li>
        </ul>
    </div>
</header>
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="icon-speedometer"></i> داشبرد <span style="color: cornflowerblue;padding-right: 15px">{{ Auth::User()->name }}</span></a>
            </li>
            @if (Auth::user()->category == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>مدریت دسته مادر</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.index') }}"><i class="icon-puzzle"></i> لیست دسته ها</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->subcategory == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>مدریت زیر دسته</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subcategory.index') }}"><i class="icon-puzzle"></i> لیست زیر دسته</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->district == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>مدریت استان</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('district.index') }}"><i class="icon-puzzle"></i> لیست استان ها</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->subdistrict == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>مدریت شهر</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subdistrict.index') }}"><i class="icon-puzzle"></i> لیست شهر ها</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->post == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>مدریت مطالب</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.index') }}"><i class="icon-puzzle"></i> لیست مطالب</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.create') }}"><i class="icon-puzzle"></i> ایجاد مطالب</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->social == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>مدریت شبکه اجتماعی</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('social.index') }}"><i class="icon-puzzle"></i> لیست شبکه اجتماعی </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="nav-item nav-dropdown">
                <a class="nav-link " href="{{ route('seo.create') }}"><i class="icon-puzzle"></i>مدریت SEO</a>
            </li>
            @if (Auth::user()->prayer == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link " href="{{ route('prayer.create') }}"><i class="icon-puzzle"></i>مدریت نماز</a>
                </li>
            @endif
            @if (Auth::user()->livetv == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link " href="{{ route('livetv.create') }}"><i class="icon-puzzle"></i>مدریت لایو</a>
                </li>
            @endif
            @if (Auth::user()->notice == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link " href="{{ route('notice.create') }}"><i class="icon-puzzle"></i>مدریت اطلاع</a>
                </li>
            @endif
            @if (Auth::user()->gallery == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>مدریت گالری</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('photo.index') }}"><i class="icon-puzzle"></i>لیست گالری</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 1)
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i>سطح دسترسی</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('writer.create') }}"><i class="icon-puzzle"></i>ایجاد کاربر</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('writer.index') }}"><i class="icon-puzzle"></i>لیست کاربران</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
</div>