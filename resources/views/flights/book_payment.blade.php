@extends('flights.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="mb-5 shadow-soft bg-white rounded-sm">
                    <div class="py-3 px-4 px-xl-12 border-bottom">
                        <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    1
                                </div>
                                <div class="text-gray-1">Customer information</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                    2
                                </div>
                                <div class="text-primary">Payment information</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-md-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    3
                                </div>
                                <div class="text-gray-1">Booking is confirmed!</div>
                            </li>
                        </ul>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-4">
                            Your Card Information
                        </h5>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Payment Form -->
                            <form class="js-validate"
                                  action="{{ route('flights.book.payment', compact('flight')) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-4">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Card Holder Name
                                            </label>

                                            <input type="text" class="form-control"
                                                   name="name"
                                                   placeholder=""
                                                   aria-label=""
                                                   required
                                                   data-msg="Please enter card holder name."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                    <!-- Input -->
                                    <div class="col-sm-6 mb-4">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                Card Number
                                            </label>

                                            <input type="text" class="form-control"
                                                   name="number" placeholder=""
                                                   aria-label=""
                                                   required
                                                   pattern="\d{16}"
                                                   data-msg="Please enter card number."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                    <div class="w-100"></div>

                                    <!-- Input -->
                                    <div class="col-sm-6 mb-4">
                                        <div class="row">
                                            <div class="col-sm-6 mb-4 mb-md-0">
                                                <div class="js-form-message">
                                                    <label class="form-label">
                                                        Expiry Month
                                                    </label>

                                                    <input type="number" class="form-control"
                                                           name="expiry_month"
                                                           placeholder=""
                                                           aria-label=""
                                                           required
                                                           data-msg="Please enter expiry month."
                                                           data-error-class="u-has-error"
                                                           data-success-class="u-has-success">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="js-form-message">
                                                    <label class="form-label">
                                                        Expiry Year
                                                    </label>

                                                    <input type="number" class="form-control"
                                                           name="expire_year"
                                                           placeholder=""
                                                           aria-label=""
                                                           required
                                                           data-msg="Please enter expiry year."
                                                           data-error-class="u-has-error"
                                                           data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                    <!-- Input -->
                                    <div class="col-sm-6 mb-4">
                                        <div class="js-form-message">
                                            <label class="form-label">
                                                CCV
                                            </label>

                                            <input type="number" class="form-control"
                                                   name="ccv" placeholder=""
                                                   aria-label="" required
                                                   data-msg="Please enter ccv number."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <!-- End Input -->

                                    <div class="w-100"></div>

                                    <div class="col">
                                        <!-- Checkbox -->
                                        <div class="js-form-message mb-5">
                                            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                <input type="checkbox" class="custom-control-input" id="termsCheckbox"
                                                       name="termsCheckbox" required
                                                       data-msg="Please accept our Terms and Conditions."
                                                       data-error-class="u-has-error"
                                                       data-success-class="u-has-success">
                                                <label class="custom-control-label" for="termsCheckbox">
                                                    <small>
                                                        By continuing, you agree to the
                                                        <a class="link-muted"
                                                           href="https://transvelo.github.io/mytravel-html/html/pages/terms.html">Terms
                                                            and Conditions</a>
                                                    </small>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End Checkbox -->
                                        <button type="submit"
                                                class="btn btn-primary w-100 rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">
                                            CONFIRM BOOKING
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- End Payment Form -->
                        </div>
                        <!-- End Tab Content -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                @include('flights.booking_sidebar', compact('flight', 'ticketType'))
            </div>
        </div>
    </div>
@endsection