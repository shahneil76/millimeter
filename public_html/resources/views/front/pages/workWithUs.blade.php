@extends('front.layout.master')
@section('css')
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
@endsection
@section('content')
    <section class="container ms-ml-decimal-collection decimal-collection-section first-section mb-75px">
        <div class="row mb-50px">
            <div class="col-12 col-md-12">
                <div class="become-part-journy-form">
                    <div class="row">
                        {{-- <div class="col-12 mb-3">
                            <div class="become-part-of-journy-form-heading">
                                <h5>Work With Us</h5>
                            </div>
                        </div> --}}
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="become-part-of-journy-form-heading">
                                        <h5>Work With Us</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="become-part-of-journy">
                                <form action="{{ route('work.with.us.submit') }}" method="POST" id="part-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="name" name="name"
                                                placeholder="Full Name">
                                            <span class="text-danger errors" id="nameerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="email" id="email" name="email"
                                                placeholder="Email ID">
                                            <span class="text-danger errors" id="emailerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="number" id="phoneno" name="phoneno"
                                                placeholder="Phone Number">
                                            <span class="text-danger errors" id="phonenoerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <select name="experience" id="experience" class="w-100">
                                                <option value="" disabled selected>Select Experience</option>
                                                <option value="Below 1">&lt;1</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="8 Plus">8+</option>
                                            </select>
                                            <span class="text-danger errors" id="experienceerror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="field" name="field"
                                                placeholder="Field">
                                            <span class="text-danger errors" id="fielderror"></span>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input class="w-100" type="text" id="education" name="education"
                                                placeholder="Education">
                                            <span class="text-danger errors" id="educationerror"></span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <input class="w-100" style="display: none;" type="file" id="cv"
                                                name="cv" placeholder="Upload CV" accept=".pdf,.doc,.docx">
                                            <label for="cv" class="upload-cv">Upload CV</label>
                                            <span class="text-danger errors w-100" id="cverror"></span>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <button type="submit">Submit <img
                                                    src="{{ asset('assets/front/images/icon/arrow.png') }}"
                                                    alt=""></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-6 address-map">
                            <div class="address pb-4">
                                <div class="corporate-office">
                                    <div class="mb-3">
                                        <h5>Corporate Office</h5c>
                                    </div>
                                    <p class="fw-light">Get in touch with Millimetre!</p>
                                    <div class="location d-flex">
                                        <div class="me-2">
                                            <img src="{{ asset('assets/front/images/icon/location.png') }}" alt="">
                                        </div>
                                        <p class="fw-light">A3, 11th Floor, Bsquare, Colonnade-2, Rajpath Club Road, Off SG Highway, Ahmedabad 380 054, India.</p>
                                    </div>
                                    <div class="email mb-3">
                                        <a href="mailto:media@lamitude.com"><img src="{{ asset('assets/front/images/icon/email.png') }}"
                                                alt=""> media@lamitude.com</a>
                                    </div>
                                    <div class="email mb-3">
                                        <a href="mailto:info@lamitude.com"><img src="{{ asset('assets/front/images/icon/email.png') }}"
                                                alt=""> info@lamitude.com</a>
                                    </div>
                                    <div class="email">
                                        <a href="tel:+91 9879873500"><img src="{{ asset('assets/front/images/icon/call.png') }}"
                                                alt=""> +91 98798 73500</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).on("change", "#cv", function(e) {
            if ($(this).val() == null || $(this).val() == "") {
                $(this).val("");
                $(this).parent().find(".upload-cv").text("Upload CV");
            } else {
                $(this).parent().find(".upload-cv").text($(this).val());
            }
        });

        $(document).on("submit", "#part-form", async function(e) {
            e.preventDefault();
            var form = $(this);
            var data = await ajaxDynamicMethod($(this).attr('action'), $(this).attr('method'), generateFormData(
                this));
            if (data.success) {
                form[0].reset();
                $(".upload-cv").val("");
                $(".upload-cv").text("Upload CV");
                toastrsuccess(data.msg);
            }
        });
    </script>
@endsection
