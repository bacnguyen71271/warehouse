@if($configData["mainLayoutType"] == 'horizontal' && isset($configData["mainLayoutType"]))
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu {{ $configData['navbarColor'] }} navbar-fixed">
  <div class="navbar-header d-xl-block d-none">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item"><a class="navbar-brand" href="dashboard-analytics">
          <div class="brand-logo"></div>
        </a></li>
    </ul>
  </div>
  @else
  <nav
    class="header-navbar navbar-expand-lg navbar navbar-with-menu {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
    @endif
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <div class="navbar-collapse" id="navbar-mobile">
          <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav">
              <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                  href="#"><i class="ficon feather icon-menu"></i></a></li>
            </ul>
            {{-- <ul class="nav navbar-nav bookmark-icons">
              <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo" data-toggle="tooltip"
                  data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>
              <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat" data-toggle="tooltip"
                  data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
              <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email" data-toggle="tooltip"
                  data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>
              <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender" data-toggle="tooltip"
                  data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li>
            </ul>
            <ul class="nav navbar-nav">
              <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i
                    class="ficon feather icon-star warning"></i></a>
                <div class="bookmark-input search-input">
                  <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                  <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0"
                    data-search="laravel-search-list" />
                  <ul class="search-list search-list-bookmark"></ul>
                </div>
                <!-- select.bookmark-select-->
                <!--   option 1-Column-->
                <!--   option 2-Column-->
                <!--   option Static Layout-->
              </li>
            </ul> --}}
          </div>
          <ul class="nav navbar-nav float-right">
            {{-- <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag"
                href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                  class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
              <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"
                  data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#"
                  data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"
                  data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#"
                  data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
            </li> --}}
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                  class="ficon feather icon-maximize"></i></a></li>
            {{-- <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i
                  class="ficon feather icon-search"></i></a>
              <div class="search-input">
                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
                  data-search="laravel-search-list" />
                <div class="search-input-close"><i class="feather icon-x"></i></div>
                <ul class="search-list search-list-main"></ul>
              </div>
            </li> --}}
            @php 
              $count = App\Http\Controllers\StaticController::getNotificationCount(Auth::user()->id);
              $notification = App\Http\Controllers\StaticController::getNotification(Auth::user()->id);
            @endphp
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                <i class="ficon feather icon-bell"></i>
                @if($count > 0)
                  <span class="badge badge-pill badge-primary badge-up">{{ $count }}</span>
                @endif
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <div class="dropdown-header m-0 p-2">
                    <h3 class="white">{{ $count }} Thông báo mới</h3>
                  </div>
                </li>
                <li class="scrollable-container media-list">
                @if( count($notification) > 0)
                  @foreach ($notification as $ntf)
                    <a data="{{ $ntf->id }}" class="notification_item d-flex justify-content-between @if($ntf->status == 0) no-read @endif" href="{{ $ntf->ntf_link }}">
                      <div class="media d-flex align-items-start">
                        <div class="media-left">
                          <i class="feather icon-plus-square font-medium-5 {{ $ntf->ntf_style }}"></i>
                        </div>
                        <div class="media-body">
                          <h6 class="{{ $ntf->ntf_style }} media-heading">{{ $ntf->ntf_title }}</h6>
                          <small class="notification-text">{{ $ntf->ntf_content }}</small>
                        </div>
                        <small>
                          <time class="media-meta" datetime="{{ $ntf->ntf_title }}">{{ $ntf->time }}</time>
                        </small>
                      </div>
                    </a>
                  @endforeach
                @else
                  <a class="d-flex justify-content-between p-3" href="javascript:void(0)">
                    Không có thông báo
                  </a>
                @endif
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Xem hết thông báo</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#"
                data-toggle="dropdown">
                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{ Auth::User()->name }}</span><span class="user-status">Hoạt động</span></div><span><img class="round"
                    src="{{asset('images/portrait/small/avatar-default.png') }}" alt="avatar" height="40"
                    width="40" /></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ url('/user-edit') }}/{{ Auth::user()->email }}"><i class="feather icon-user"></i> Edit Profile</a>
                <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="feather icon-power"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                {{-- <form id="logout-form" action="login" method="POST" style="display: none;">
                  @csrf
                </form> --}}
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  {{-- Search Start Here --}}
  <ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center">
      <a class="pb-25" href="#">
        <h6 class="text-primary mb-0">Files</h6>
      </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
      <a class="d-flex align-items-center justify-content-between w-100" href="#">
        <div class="d-flex">
          <div class="ml-0 mr-50"><img src="{{ asset('images/icons/xls.png') }}" alt="png" height="32" />
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
              Manager</small>
          </div>
        </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
      </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
      <a class="d-flex align-items-center justify-content-between w-100" href="#">
        <div class="d-flex">
          <div class="ml-0 mr-50"><img src="{{ asset('images/icons/jpg.png') }}" alt="png" height="32" />
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
              Developer</small>
          </div>
        </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
      </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
      <a class="d-flex align-items-center justify-content-between w-100" href="#">
        <div class="d-flex">
          <div class="ml-0 mr-50"><img src="{{ asset('images/icons/pdf.png') }}" alt="png" height="32" />
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
              Marketing Manager</small>
          </div>
        </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
      </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
      <a class="d-flex align-items-center justify-content-between w-100" href="#">
        <div class="d-flex">
          <div class="ml-0 mr-50"><img src="{{ asset('images/icons/doc.png') }}" alt="png" height="32" />
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
              Designer</small>
          </div>
        </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
      </a>
    </li>
    <li class="d-flex align-items-center">
      <a class="pb-25" href="#">
        <h6 class="text-primary mb-0">Members</h6>
      </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
        <div class="d-flex align-items-center">
          <div class="avatar mr-50"><img src="{{ asset('images/portrait/small/avatar-s-8.jpg') }}" alt="png"
              height="32" /></div>
          <div class="search-data">
            <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
          </div>
        </div>
      </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
        <div class="d-flex align-items-center">
          <div class="avatar mr-50"><img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}" alt="png"
              height="32" /></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
              Developer</small>
          </div>
        </div>
      </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
        <div class="d-flex align-items-center">
          <div class="avatar mr-50"><img src="{{ asset('images/portrait/small/avatar-s-14.jpg') }}" alt="png"
              height="32" /></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
              Manager</small>
          </div>
        </div>
      </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
        <div class="d-flex align-items-center">
          <div class="avatar mr-50"><img src="{{ asset('images/portrait/small/avatar-s-6.jpg') }}" alt="png"
              height="32" /></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
          </div>
        </div>
      </a>
    </li>
  </ul>
  <ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer">
      <a class="d-flex align-items-center justify-content-between w-100 py-50">
        <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No
            results found.</span></div>
      </a>
    </li>
  </ul>
  {{-- Search Ends --}}
  <!-- END: Header-->
