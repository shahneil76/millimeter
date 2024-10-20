@extends('front.layout.master')
@section('content')
    {{-- <section class="first-section mb-75px">
        <img src="{{ asset('assets/front/images/about-banner.jpg') }}" class="w-100" alt="blog">
    </section> --}}
    <section class="container first-section about-section mb-75px">
        <div class="row mb-50px">
            <div class="col-lg-7">
                <h2 class="section-title">
                    <span>About Us</span>
                </h2>
                {{-- <h3 class="title title-greay my-2">How To Protect A Bathroom With Marble Surface?</h3> --}}
                <p class="p-text mt-2">Millimetre is one of India’s leading manufacturers and traders of high-pressure laminates
                    and edgebands,
                    offering innovative solutions for the furniture and interior design sector. With a focus on
                    out-of-the-box thinking and innovation, Millimetre designs, curates, and distributes its products to 20
                    locations nationwide. Founded by partners Punit Tambi, Devshrut Patel, and Nihar Jain, Millimetre aims
                    to address evolving design preferences by offering international quality products at accessible prices
                    and locations. In just two years, Millimetre has emerged as an industry pioneer, introducing India's
                    first superior quality, high-definition decor laminates in an extensive range of solid colours, along
                    with matching edge strips under the category head of BandEdge.</p>
                <p class="p-text">Established in 2022 and headquartered in Ahmedabad, Millimetre is committed to empowering
                    Indian
                    craftsmanship through its locally manufactured designs and educating underprivileged students to foster
                    spirited, innovative thinkers of tomorrow.</p>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('assets/front/images/about-img.png') }}" class="w-100" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-title">
                    <span>Our Team</span>
                </h2>
                {{-- <h3 class="title title-greay my-2">Meet the Team</h3> --}}
            </div>
            <div class="col-lg-12 mt-4">
                <div class="row">
                    <div class="col-md-7">
                        <div class="w-75">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <h3 class="title me-5">Punit Tambi</h3>
                                        <a href="https://www.linkedin.com/in/punit-tambi-8ba72b228" target="_blank">
                                            <img src="{{ asset('assets/front/images/icon/linkdin.png') }}" alt="" />
                                        </a>
                                    </div>
                                    <p class="designation">Partner | Innovation & Growth</p>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-white" />
                        <p class="p-text">Punit Tambi leverages over two decades of industry expertise to navigate Millimetre's wholesale and retail distribution channels. Through leadership, teamwork and innovative solutions, Punit enhances Millimetre's value proposition, addressing critical needs within the interior design sector.</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('assets/front/images/about-person-2.png') }}" class="w-100" alt="">
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12 my-4">
                <hr class="bg-white" />
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-5 order-custom-1">
                        <img src="{{ asset('assets/front/images/about-person-1.png') }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-7 order-custom-2">
                        <div class="w-75">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <h3 class="title me-5">Devshrut Patel</h3>
                                        <a href="https://www.linkedin.com/in/devshrut96" target="_blank">
                                            <img src="{{ asset('assets/front/images/icon/linkdin.png') }}" alt="" />
                                        </a>
                                    </div>
                                    <p class="designation">Partner | Business Development</p>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-white" />
                        <p class="p-text">Devshrut Patel drives Millimetre forward with a meticulous focus on branding, marketing and supply chain management. With an entrepreneurial upbringing and a mechanical engineering background, Devshrut ensures stringent quality control, aiming to exceed consumer expectations and elevate Millimetre's standing.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 my-4">
                <hr class="bg-white" />
            </div>
            <div class="col-lg-12 mt-4">
                <div class="row">
                    <div class="col-md-7">
                        <div class="w-75">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <h3 class="title me-5">Nihar Jain</h3>
                                        <a href="https://www.linkedin.com/in/nihar-jain-27244128a/" target="_blank">
                                            <img src="{{ asset('assets/front/images/icon/linkdin.png') }}" alt="" />
                                        </a>
                                    </div>
                                    <p class="designation">Partner | Strategy & Operations</p>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-white" />
                        <p class="p-text">Nihar Jain oversees Millimetre's commitment to delivering premium laminate and edge band solutions. From conception to execution, Nihar ensures Millimetre's products seamlessly blend creative flair with practical functionality, catering to diverse design preferences.</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('assets/front/images/about-person-3.png') }}" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
