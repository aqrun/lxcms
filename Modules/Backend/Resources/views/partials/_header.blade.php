<header class="main-header">
  <!-- Logo -->
  <a href="{{ \Backend::baseUrl() }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>LX</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>LX</b>CMS</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-language"></i>&nbsp;{{LaravelLocalization::getCurrentLocaleNative()}}
          </a>
          <ul class="dropdown-menu">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              @if(LaravelLocalization::getCurrentLocale() != $localeCode)
              <li>
                <a rel="alternate" hreflang="{{ $localeCode }}"
                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                  {{ $properties['native'] }}
                </a>
              </li>
              @endif
            @endforeach
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ \Backend::user()->avatar??config('backend.anonymous_avatar') }}" class="user-image"
                 alt="User Image">
            <span class="hidden-xs">{{ Backend::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ \Backend::user()->avatar??config('backend.anonymous_avatar') }}" class="img-circle" alt="User Image">

              <p>
                {{ Backend::user()->name }} - {{ \Backend::user()->roles[0]->roleData->title }}
                <small>@lang('backend::common.member_since') {{ Backend::user()->created_at->toFormattedDateString() }}</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">@lang('backend::common.profile')</a>
              </div>
              <div class="pull-right">
                <a href="#" onclick="javascript:$('#frm_header_logout').submit()"
                   class="btn btn-default btn-flat">@lang('backend::common.sign_out')</a>
                <form style="display:none" id="frm_header_logout"
                      action="{{ \Backend::baseUrl('/logout')  }}"
                      method="post">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>