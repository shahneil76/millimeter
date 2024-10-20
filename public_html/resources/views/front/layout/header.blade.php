<section class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid p-0">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/front/images/logo.svg') }}" class="header-logo" alt="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0 ms-3">
                        <li class="nav-item">
                            <a class="nav-link pb-0 {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                                aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0 {{ Route::currentRouteName() == 'about' ? 'active' : '' }}"
                                aria-current="page" href="{{ route('about') }}">About</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link pb-0 dropdown-toggle {{ Route::currentRouteName() == 'category' ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Collection
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($general_categories as $category)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('category',['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link pb-0 dropdown-toggle {{ (Route::currentRouteName() == 'blogs' || Route::currentRouteName() == 'blog.details') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Media
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('publications') }}">Publications</a></li>
                                <li><a class="dropdown-item" href="{{ route('blogs') }}">Blog</a></li>
                                {{-- <li><a class="dropdown-item" href="{{ route('events') }}">Events</a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('newsletters') }}">Newsletters</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link pb-0 dropdown-toggle {{ (Route::currentRouteName() == 'contactus' || Route::currentRouteName() == 'work.with.us') ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Contact
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('contactus') }}">Contact US</a></li>
                                <li><a class="dropdown-item" href="{{ route('work.with.us') }}">Work With Us</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('download.content') }}" class="nav-link pb-0 {{ Route::currentRouteName() == 'download.content' ? 'active' : '' }}">Download</a>
                            {{-- <a href="{{ asset($download_file->value) }}" download class="nav-link pb-0">Download</a> --}}
                        </li>
                    </ul>
                </div>
                <div class="social-links-search">
                    <div class="social-link d-flex justify-content-around">
                        {{-- <a href="tel:+919879873500">
                            <img src="{{ asset('assets/front/images/icon/call.png') }}" alt="" />
                        </a>
                        <a href="mailto:info@lamitude.com">
                            <img src="{{ asset('assets/front/images/icon/email.png') }}" alt="" />
                        </a> --}}
                        <a href="https://www.linkedin.com/company/lamitude/" target="_blank">
                            <img src="{{ asset('assets/front/images/icon/linkdin.png') }}" alt="" />
                        </a>
                        <a href="https://www.instagram.com/millimetreindia/" target="_blank">
                            <img src="{{ asset('assets/front/images/icon/insta.png') }}" alt="" />
                        </a>
                        <a href="https://www.facebook.com/millimetreindia" target="_blank">
                            <img src="{{ asset('assets/front/images/icon/facebook.png') }}" alt="" />
                        </a>
                        <a href="http://www.youtube.com/@millimetreindia" target="_blank">
                            <img src="{{ asset('assets/front/images/icon/youtube.png') }}" alt="" />
                        </a>
                        <a href="https://twitter.com/millimetreindia" target="_blank">
                            <img src="{{ asset('assets/front/images/icon/x.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="product-search-area">
                        <input type="hidden" id="product-search-url" value="{{ route('product.search') }}">
                        <select id="product-search">
                            
                        </select>
                        {{-- <div class="input-group search">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                aria-describedby="basic-addon2" />
                            <span class="input-group-text" id="basic-addon2">
                                <img src="{{ asset('assets/front/images/icon/search.png') }}" alt="search" />
                            </span>
                        </div> --}}
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>
