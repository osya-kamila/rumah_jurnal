@php
    $category_news = \App\Models\NewsCategory::all();
    $journals = \App\Models\Journal::all();

    $journal_chunks = $journals->split(3);
    $part1 = $journal_chunks->get(0) ?? collect();
    $part2 = $journal_chunks->get(1) ?? collect();
    $part3 = $journal_chunks->get(2) ?? collect();
@endphp

<!-- HEADER AREA START (header-5) -->
<header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area section-bg-6 top-area-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a href="mailto:{{ $setting_web->email }}"><i class="icon-mail"></i>
                                    {{ $setting_web->email }}</a>
                            </li>
                            <li><a href="#"><i class="icon-placeholder"></i> UIN Sjech M.Djamil Djambek
                                    Bukittinggi</a>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-right">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                            </li>

                                            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- header-top-btn -->
                                    <div class="header-top-btn">
                                        <a href="https://ejournal.uinbukittinggi.ac.id/">E-journal</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="{{ route("home") }}"><img src="{{ $setting_web?->getLogo() ?? '' }}" alt="Logo"
                                    style="height: 80px;"></a>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li><a href="{{ route("home") }}">Home</a></li>
                                    <li class="menu-icon"><a href="{{ route('news.index') }}">News</a>
                                        <ul>
                                            @foreach ($category_news as $category)
                                                <li><a href="{{ route('news.category', $category->slug) }}">{{ $category->name }}</a></li>
                                            @endforeach

                                        </ul>
                                    </li>
                                    <li class="menu-icon"><a href="{{ route("journal.index") }}">Journal</a>
                                        <ul class="mega-menu">
                                            <li>
                                                <ul>
                                                    @foreach ($part1 as $journal)
                                                        <li><a href="{{ route('journal.detail', $journal->url_path) }}">{{ $journal->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    @foreach ($part2 as $journal)
                                                        <li><a href="{{ route('journal.detail', $journal->url_path) }}">{{ $journal->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    @foreach ($part3 as $journal)
                                                        <li><a href="{{ route('journal.detail', $journal->url_path) }}">{{ $journal->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="#"><img
                                                        src="{{ asset('front/img/banner/menu-banner-1.jpg') }}"
                                                        alt="#"></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Payments</a></li>
                                    <li><a href="{{ route("contact.index") }}">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="ltn__header-options ltn__header-options-2 mb-sm-20">
                    <!-- header-search-1 -->
                    <div class="header-search-wrap">
                        <div class="header-search-1">
                            <div class="search-icon">
                                <i class="icon-search for-search-show"></i>
                                <i class="icon-cancel  for-search-close"></i>
                            </div>
                        </div>
                        <div class="header-search-1-form">
                            <form id="#" method="get" action="#">
                                <input type="text" name="search" value="" placeholder="Search Journal..." />
                                <button type="submit">
                                    <span><i class="icon-search"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- user-menu -->
                    <div class="ltn__drop-menu user-menu">
                        <ul>
                            <li>
                                <a href="#"><i class="icon-user"></i></a>
                                <ul>
                                    @auth
                                        <li><a href="{{ route('back.dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('logout') }}">Logout</a></li>
                                    @endauth
                                    @guest
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @endguest
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
<!-- HEADER AREA END -->



<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="{{ route("home") }}"><img src="{{ $setting_web?->getLogo() ?? '' }}" alt="Logo" style="height: 80px;"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu-search-form">
            <form action="#">
                <input type="text" placeholder="Search Journal...">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="{{ route("home") }}">Home</a>

                </li>
                <li><a href="#">News</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route("news.index") }}">All News</a></li>
                        @foreach ($category_news as $category)
                            <li><a href="{{ route('news.category', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#">Journal</a>
                    <ul class="sub-menu">
                        @foreach ($journals as $journal)
                            <li><a href="{{ route('journal.detail', $journal->url_path) }}">{{ $journal->title }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="#">Pembayaran</a></li>
                <li><a href="{{ route("contact.index") }}">Contact</a></li>
            </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
                <li>
                    @auth
                        <a href="{{ route('back.dashboard') }}" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                            Dashboard
                        </a>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                            Login
                        </a>
                    @endguest
                </li>

            </ul>
        </div>
        <div class="ltn__social-media-2">
            <ul>
                @if ($setting_web->facebook)
                    <li><a href="{{ $setting_web->facebook }}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                @endif
                @if ($setting_web->twitter)
                    <li><a href="{{ $setting_web->twitter }}" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                @endif
                @if ($setting_web->linkedin)
                    <li><a href="{{ $setting_web->linkedin }}" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                @endif
                @if ($setting_web->instagram)
                    <li><a href="{{ $setting_web->instagram }}" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->

<div class="ltn__utilize-overlay"></div>
