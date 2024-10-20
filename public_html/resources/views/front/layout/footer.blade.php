<section class="footer">
    <div class="container mb-3">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('assets/front/images/logo.svg') }}" class="header-logo" alt="logo" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="mt-5">
                    <h4 class="heading">About US</h4>
                    <p>
                        Millimetre is India's leading producer of high-pressure laminates & edge bands, providing
                        innovative interior solutions.
                    </p>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div class="mt-5">
                    <h4 class="heading">Categories</h4>
                    @foreach ($general_categories as $category)
                        <div><a href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div class="mt-5">
                    <h4 class="heading">Navigation</h4>
                    <div><a href="{{ route('home') }}">Home</a></div>
                    <div><a href="{{ route('about') }}">About</a></div>
                    <div><a href="">Blog</a></div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="mt-5">
                    <h4 class="heading">Contact</h4>
                    <div class="d-flex mb-2">
                        <div class="me-2">
                            <img src="{{ asset('assets/front/images/icon/location.png') }}" alt="location" />
                        </div>
                        <p>
                            A3, 11th Floor, Bsquare, Colonnade-2, Rajpath Club Road, Off SG Highway, Ahmedabad 380 054,
                            India.
                        </p>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="me-2">
                            <img src="{{ asset('assets/front/images/icon/call.png') }}" alt="location" />
                        </div>
                        <p>+91 98798 73500</p>
                    </div>
                    <div class="d-flex">
                        <div class="me-2">
                            <img src="{{ asset('assets/front/images/icon/email.png') }}" alt="location" />
                        </div>
                        <p>info@lamitude.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <div id="mc_embed_shell">
                    <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet"
                        type="text/css" />
                    <style type="text/css">
                        #mc_embed_signup form {
                            margin: 0;
                        }

                        #mc_embed_signup .button {
                            margin: 0;
                        }

                        #mc_embed_signup {
                            margin-left: 0px;
                            clear: left;
                            font: 14px Helvetica, Arial, sans-serif;
                            max-width: 600px;
                            width: 100%;
                        }

                        /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                            We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                    </style>
                    <div id="mc_embed_signup">
                        <form
                            action="https://lamitude.us21.list-manage.com/subscribe/post?u=5365accf8ae5c1da186d7cd48&amp;id=ba26c78e92&amp;f_id=000e8ee6f0"
                            method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                            class="validate" target="_blank">
                            <div id="mc_embed_signup_scroll">
                                <h2>Subscribe to our Newsletter</h2>
                                <!-- <div class="indicates-required"><span class="asterisk">*</span> indicates required</div> -->
                                <div class="mc-field-group d-flex">
                                    <input type="email" name="EMAIL" class="required email"
                                        placeholder="Enter Email" id="mce-EMAIL" required />
                                    <div class="clear" style="margin-left: 5px">
                                        <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button"
                                            value="Subscribe" />
                                    </div>
                                </div>
                                <div id="mce-responses" class="clear">
                                    <div class="response" id="mce-error-response" style="display: none"></div>
                                    <div class="response" id="mce-success-response" style="display: none"></div>
                                </div>
                                <div aria-hidden="true" style="position: relative; left: -5000px">
                                    <input type="text" name="b_5365accf8ae5c1da186d7cd48_ba26c78e92" tabindex="-1"
                                        value="" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
                    <script type="text/javascript">
                        (function($) {
                            window.fnames = new Array();
                            window.ftypes = new Array();
                            fnames[0] = "EMAIL";
                            ftypes[0] = "email";
                            fnames[1] = "FNAME";
                            ftypes[1] = "text";
                            fnames[2] = "LNAME";
                            ftypes[2] = "text";
                        })(jQuery);
                        var $mcj = jQuery.noConflict(true);
                    </script>
                </div>
            </div>
        </div>
    </div>
    <section class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="mb-0">Copyright 2024 Millimetre All rights Reserved.</p>
                </div>
            </div>
        </div>
    </section>
</section>
