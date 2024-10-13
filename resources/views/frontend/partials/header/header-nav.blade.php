<header class="main-header">
    <div class="header-upper py-25" style="padding-top: 5px !important; padding-bottom: 5px !important;">
        <div class="container clearfix">
            <div class="header-inner">
                <div class="logo-outer">
                    <div class="logo">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('assets/admin/img/' . $websiteInfo->logo) }}" alt="Logo" style="width: 180px">
                        </a>
                    </div>
                </div>

                <div class="nav-outer clearfix ml-lg-auto">
                    <nav class="main-menu navbar-expand-xl">
                        <div class="navbar-header">
                            <div class="logo-mobile">
                                <a href="{{ route('index') }}">
                                    <img src="{{ asset('assets/admin/img/' . $websiteInfo->logo) }}" alt="Logo" style="width: 180px">
                                </a>
                            </div>
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="main-menu">
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="main-menu">
                            @php
                                $links = json_decode($menuInfos, true);
                            @endphp
                            <ul class="navigation clearfix">
                                @foreach ($links as $link)
                                    @php
                                        $href = get_href($link, $currentLanguageInfo->id);
                                    @endphp
                                    @if (!array_key_exists('children', $link))
                                        <li>
                                            <a href="{{ $href }}" target="{{ $link['target'] }}" style="font-weight: bold; font-size: 16px !important">
                                                {{ __($link['text']) }}
                                            </a>
                                        </li>
                                    @else
                                        <li class="dropdown">
                                            <a href="{{ $href }}" target="{{ $link['target'] }}" style="font-weight: bold; font-size: 16px !important">
                                                {{ $link['text'] }}
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul>
                                                @foreach ($link['children'] as $level2)
                                                    @php
                                                        $l2Href = get_href($level2, $currentLanguageInfo->id);
                                                    @endphp
                                                    <li>
                                                        <a href="{{ $l2Href }}" target="{{ $level2['target'] }}" style="font-weight: bold; font-size: 16px !important">
                                                            {{ __($level2['text']) }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                            <div class="menu-right">
                                <form action="{{ route('change_language') }}" method="get" class="d-none">
                                    <select name="lang_code" id="language" class="form-control" onchange="this.form.submit()">
                                        @foreach ($allLanguageInfos as $item)
                                            <option value="{{ $item->code }}" {{ $item->code == $currentLanguageInfo->code ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>

                                <div class="dropdown">
                                    <button type="button" class="menu-btn dropdown-toggle mr-1" style="font-weight: bold; font-size: 16px" data-toggle="dropdown">
                                        @if (Auth::guard('customer')->check())
                                            {{ Auth::guard('customer')->user()->username }}
                                        @elseif (Auth::guard('organizer')->check())
                                            {{ Auth::guard('organizer')->user()->username }}
                                        @else
                                            {{ __('My Dashboard') }} 
                                        @endif
                                    </button>

                                    <div class="dropdown-menu">
                                        @if (Auth::guard('customer')->check()) 
                                            <a class="dropdown-item" href="{{ route('customer.dashboard') }}">{{ __('My Account') }}</a>
                                            <a class="dropdown-item" href="{{ route('customer.logout') }}">{{ __('Logout') }}</a>
                                        @elseif (!Auth::guard('organizer')->check()) 
                                            <p class="dropdown-item" style="margin-bottom: 0px; font-weight: bold; color: #653038">
                                                For Attendees
                                            </p>
                                            <a class="dropdown-item" href="{{ route('customer.login') }}">{{ __('Sign-in') }}</a>
                                            <a class="dropdown-item" href="{{ route('customer.signup') }}">{{ __('Create Account') }}</a>
                                        @endif

                                        @if (Auth::guard('organizer')->check())
                                            <a class="dropdown-item" href="{{ route('organizer.dashboard') }}">{{ __('My Account') }}</a>
                                            <a class="dropdown-item" href="{{ route('organizer.logout') }}">{{ __('Logout') }}</a>
                                        @elseif (!Auth::guard('customer')->check())
                                            <p class="dropdown-item" style="margin-bottom: 0px; font-weight: bold; margin-top: 5px; color: #653038">
                                                For Organizers
                                            </p>
                                            <a class="dropdown-item" href="{{ route('organizer.login') }}">{{ __('Sign-in') }}</a>
                                            <a class="dropdown-item" href="{{ route('organizer.signup') }}">{{ __('Create Account') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    </div>
            </div>
        </div>
    </div>
    </header>

<style>
  /* ... (your existing CSS) ... */

@media (max-width: 991px) { 
  .navbar-collapse {
    /* ... (your existing mobile navbar CSS) ... */
    background-color: rgba(255, 255, 255, 0.95); /* Semi-transparent white background */
  }

  .navbar-toggle {
    background-color: transparent; 
    border: none; 
    padding: 10px 15px; 
  }

  .navbar-toggle .icon-bar {
    width: 25px;
    height: 3px;
    background-color: #333; 
    margin: 5px 0; 
    transition: all 0.3s ease-in-out; 
  }

  .navbar-collapse.show .navbar-toggle .top-bar {
    transform: rotate(45deg) translate(5px, 5px);
  }

  .navbar-collapse.show .navbar-toggle .middle-bar {
    opacity: 0;
  }

  .navbar-collapse.show .navbar-toggle .bottom-bar {
    transform: rotate(-45deg) translate(5px, -5px);
  }

  .navbar-collapse .navigation {
    /* ... (your existing navigation styles) ... */
  }

  .navbar-collapse .navigation li a {
    color: #333; 
    font-size: 18px; 
    padding: 15px 20px;
    border-bottom: 1px solid #eee; 
  }

  .navbar-collapse .navigation li a:hover {
    background-color: #f5f5f5; 
  }
}  

</style>
 
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const navbarToggle = document.querySelector('.navbar-toggle');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    // Close the navbar when clicking outside of it on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 991 && navbarToggle.classList.contains('collapsed') === false) {
            if (!navbarCollapse.contains(event.target) && !navbarToggle.contains(event.target)) {
                navbarCollapse.classList.remove('show');
                navbarToggle.classList.add('collapsed'); 
            }
        }
    }); 

    // Close the navbar when scrolling on mobile
    let prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        let currentScrollPos = window.pageYOffset; 
        if (window.innerWidth <= 991 && navbarToggle.classList.contains('collapsed') === false) {
            if (prevScrollpos > currentScrollPos) {
                // Scrolling up
            } else {
                // Scrolling down
                navbarCollapse.classList.remove('show');
                navbarToggle.classList.add('collapsed'); 
            }
            prevScrollpos = currentScrollPos;
        }
    }
  });
</script>