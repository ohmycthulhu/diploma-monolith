<div class="card w-100 shadow-hover-3">
    <a href="flights-booking.html" class="d-block mb-0 mx-1 mt-1 p-3" tabindex="0">
{{--        <img class="card-img-top" src="/assets/img/260x200/img1.jpg" alt="Image Description">--}}
    </a>
    <div class="card-body px-3 pt-0 pb-3 my-0 mx-1">
        <div class="row">
            <div class="col-7">
                <a href="flights-booking.html" class="card-title text-dark font-size-17 font-weight-bold" tabindex="0">
                    {{ $flight->airportArrival->city->name }}
                </a>
{{--                <span class="font-weight-normal font-size-14 d-block text-color-1">Oneway flight</span>--}}
            </div>
            <div class="col-5">
                <div class="text-right">
                    <h6 class="font-weight-bold font-size-17 text-gray-3 mb-0">£{{ $flight->randomPrice }}</h6>
                    <span class="font-weight-normal font-size-14 d-block text-color-1">avg/person</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 pb-1">
        <div class="border-bottom pb-3 mb-3">
            <div class="px-3">
                <div class="d-flex mx-1">
                    <i class="flaticon-aeroplane font-size-30 text-primary mr-3"></i>
                    <div class="d-flex flex-column">
                        <span class="font-weight-normal text-gray-5">Take off</span>
                        <span class="font-size-14 text-gray-1">{{ $flight->flight_datetime->format('H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom pb-3 mb-3">
            <div class="px-3">
                <div class="d-flex mx-1">
                    <i class="d-block rotate-90 flaticon-aeroplane font-size-30 text-primary mr-3"></i>
                    <div class="d-flex flex-column">
                        <span class="font-weight-normal text-gray-5">Landing</span>
                        <span class="font-size-14 text-gray-1">{{ $flight->flight_datetime->addMinutes($flight->duration)->format('H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="text-center font-size-14 text-primary mb-3">--}}
{{--            <!-- On Target Modal -->--}}
{{--            <a class="font-size-14 text-gray-1 d-block" href="#ontargetModal"--}}
{{--               data-modal-target="#ontargetModal"--}}
{{--               data-modal-effect="fadein">--}}
{{--                Flight Details--}}
{{--            </a>--}}
{{--            <div id="ontargetModal" class="js-modal-window u-modal-window max-width-960"--}}
{{--                 data-modal-type="ontarget"--}}
{{--                 data-open-effect="fadeIn"--}}
{{--                 data-close-effect="fadeOut"--}}
{{--                 data-speed="500">--}}
{{--                <div class="card mx-4 mx-xl-0 mb-4 mb-md-0">--}}
{{--                    <button type="button" class="border-0 width-50 height-50 bg-primary flex-content-center position-absolute rounded-circle mt-n4 mr-n4 top-0 right-0" aria-label="Close" onclick="Custombox.modal.close();">--}}
{{--                        <i aria-hidden="true" class="flaticon-close text-white font-size-14"></i>--}}
{{--                    </button>--}}
{{--                    <!-- Header -->--}}
{{--                    <header class="card-header bg-light py-4 px-4">--}}
{{--                        <div class="row align-items-center text-center">--}}
{{--                            <div class="col-md-auto mb-4 mb-md-0">--}}
{{--                                <div class="d-block d-lg-flex flex-horizontal-center">--}}
{{--                                    <img class="img-fluid mr-3 mb-3 mb-lg-0" src="/assets/img/90x90/img1.png" alt="Image-Description">--}}
{{--                                    <div class="font-size-14">Spicejet SG 143 | Boeing 737-700</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-auto mb-4 mb-md-0">--}}
{{--                                <div class="mx-2 mx-xl-3 flex-content-center align-items-start d-block d-lg-flex">--}}
{{--                                    <div class="mr-lg-3 mb-1 mb-lg-0">--}}
{{--                                        <i class="flaticon-aeroplane font-size-30 text-primary"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="text-lg-left">--}}
{{--                                        <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">18:30</h6>--}}
{{--                                        <div class="font-size-14 text-gray-5">Sat, 21 Sep 19</div>--}}
{{--                                        <span class="font-size-14 text-gray-1">New Delhi, India</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-auto mb-4 mb-md-0">--}}
{{--                                <div class="mx-2 mx-xl-3 flex-content-center flex-column">--}}
{{--                                    <h6 class="font-size-14 font-weight-bold text-gray-5 mb-0">02 hrs 45 mins</h6>--}}
{{--                                    <div class="width-60 border-top border-primary border-width-2 my-1"></div>--}}
{{--                                    <div class="font-size-14 text-gray-1">Non Stop</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-auto mb-4 mb-md-0">--}}
{{--                                <div class="mx-2 mx-xl-3 flex-content-center align-items-start d-block d-lg-flex">--}}
{{--                                    <div class="mr-lg-3 mb-1 mb-lg-0">--}}
{{--                                        <i class="d-block rotate-90 flaticon-aeroplane font-size-30 text-primary"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="text-lg-left">--}}
{{--                                        <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">21.15</h6>--}}
{{--                                        <div class="font-size-14 text-gray-5">Sun, 22 Sep 19</div>--}}
{{--                                        <span class="font-size-14 text-gray-1">Bengaluru, India</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </header>--}}
{{--                    <!-- End Header -->--}}

{{--                    <!-- Body -->--}}
{{--                    <div class="card-body py-4 p-md-5">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <ul class="d-block d-md-flex list-group list-group-borderless list-group-horizontal list-group-flush no-gutters">--}}
{{--                                    <li class="mr-md-8 mr-lg-10 mb-5 list-group-item py-0">--}}
{{--                                        <div class="font-weight-bold text-dark">Baggage</div>--}}
{{--                                        <span class="text-gray-1">Adult</span>--}}
{{--                                    </li>--}}
{{--                                    <li class="mr-md-8 mr-lg-10 mb-5 list-group-item py-0">--}}
{{--                                        <div class="font-weight-bold text-dark">Check-in</div>--}}
{{--                                        <span class="text-gray-1">15 Kgs</span>--}}
{{--                                    </li>--}}
{{--                                    <li class="mr-md-8 mr-lg-10 mb-5 list-group-item py-0">--}}
{{--                                        <div class="font-weight-bold text-dark">Cabin</div>--}}
{{--                                        <span class="text-gray-1">7 Kgs</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <div class="min-width-250">--}}
{{--                                    <h5 class="font-size-17 font-weight-bold text-dark">Fare breakup</h5>--}}
{{--                                    <ul class="list-unstyled font-size-1 mb-0 font-size-16">--}}
{{--                                        <li class="d-flex justify-content-between py-2">--}}
{{--                                            <span class="font-weight-medium">Base Fare</span>--}}
{{--                                            <span class="text-secondary">€580,00</span>--}}
{{--                                        </li>--}}

{{--                                        <li class="d-flex justify-content-between py-2">--}}
{{--                                            <span class="font-weight-medium">Surcharges</span>--}}
{{--                                            <span class="text-secondary">€0,00</span>--}}
{{--                                        </li>--}}


{{--                                        <li class="d-flex justify-content-between py-2 font-size-17 font-weight-bold">--}}
{{--                                            <span class="font-weight-bold">Pay Amount</span>--}}
{{--                                            <span class="">€580,00</span>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- End Body -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End On Target Modal -->--}}
{{--        </div>--}}
        <div class="d-flex justify-content-center">
            <a href="flights-booking.html" class="btn btn-blue-1 font-size-14 width-260 text-lh-lg transition-3d-hover py-1">Choose</a>
        </div>
    </div>
</div>
