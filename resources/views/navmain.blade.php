<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="/" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="/#about">About</a></li>
                        <li class="scroll-to-section"><a href="/#menu">Menu</a></li>
                        <li class="scroll-to-section"><a href="/#chefs">Chefs</a></li>
                        <li class="scroll-to-section"><a href="/#reservation">Contact Us</a></li>
                        <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->

                        <li class="scroll-to-section">
                            @auth()
                                <a href="{{url('/showcart',Auth::user()->id)}}">
                                    <i class="fa fa-shopping-cart" style="position: relative">
                                    <span style="position: absolute;
        border: 1px solid;
    z-index: 999;
    top: -7px;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    left: 12px;">{{count($carts)}}</span>
                                    </i>
                                    @endauth
                                    @guest()
                                        <a href="#">
                                            <i class="fa fa-shopping-cart" ></i>
                                            @endguest
                                        </a>
                        </li>

                        @if (Route::has('login'))
                            {{--                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
                            @auth
{{--                                <li>--}}
{{--                                    <x-app-layout>--}}

{{--                                    </x-app-layout>--}}
{{--                                </li>--}}
                                <li class="submenu">
                                    <a href="javascript:;">
                                            {{ Auth::user()->name }}
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                    </li>
                                @endif
                            @endauth
                            {{--                            </div>--}}
                        @endif

                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
