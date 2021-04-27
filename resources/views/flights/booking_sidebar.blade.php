<div class="shadow-soft bg-white rounded-sm">
    <div class="pt-5 pb-3 px-5 border-bottom">
        <a href="#" class="text-dark font-weight-bold mb-1">
            {{ $flight->airportDepart->city->name }} to {{ $flight->airportArrival->city->name }}
        </a>
        <div class="d-flex align-items-center justify-content-between mb-2">
            <div class="flex-horizontal-center text-gray-1">Oneway flight</div>
        </div>
        <div class="flex-content-center flex-column mb-1">
            <h6 class="font-size-14 font-weight-bold text-gray-5 mb-0">
                {{ $flight->formattedDuration }}
            </h6>
            <div class="width-60 border-top border-primary border-width-2 my-1"></div>
            <div class="font-size-14 text-gray-1">Non Stop</div>
        </div>
        <div class="flex-horizontal-center justify-content-between">
            <div class="flex-horizontal-center">
                <div class="mr-2">
                    <i class="flaticon-aeroplane font-size-30 text-primary"></i>
                </div>
                <div class="text-lh-sm ml-1">
                    <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">
                        {{ $flight->formattedDepartureTime }}
                    </h6>
                    <span class="font-size-14 font-weight-normal text-gray-1">
                        {{ $flight->airportDepart->city->name }}
                    </span>
                </div>
            </div>
            <div class="text-center d-none d-md-block d-lg-none">
                <div class="mb-1">
                    <h6 class="font-size-14 font-weight-bold text-gray-5 mb-0">{{ $flight->formattedDuration }}</h6>
                </div>
                <div class="d-inline-block border-top border-primary border-width-2 font-size-14 font-weight-normal text-gray-1">Non Stop</div>
            </div>
            <div class="flex-horizontal-center">
                <div class="mr-2">
                    <i class="d-block rotate-90 flaticon-aeroplane font-size-30 text-primary"></i>
                </div>
                <div class="text-lh-sm ml-1">
                    <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">{{ $flight->formattedArrivalTime }}</h6>
                    <span class="font-size-14 font-weight-normal text-gray-1">
                        {{ $flight->airportArrival->city->name }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Basics Accordion -->
    <div id="basicsAccordion">
        <!-- Card -->
        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
            <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingOne">
                <h5 class="mb-0">
                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                            data-toggle="collapse"
                            data-target="#basicsCollapseOne"
                            aria-expanded="true"
                            aria-controls="basicsCollapseOne">
                        Booking Detail

                        <span class="card-btn-arrow font-size-14 text-dark">
                                                    <i class="fas fa-chevron-down"></i>
                                                </span>
                    </button>
                </h5>
            </div>
            <div id="basicsCollapseOne" class="collapse show"
                 aria-labelledby="basicsHeadingOne"
                 data-parent="#basicsAccordion">
                <div class="card-body px-4 pt-0">
                    <!-- Fact List -->
                    <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                        <li class="d-flex justify-content-between py-2">
                            <span class="font-weight-medium">Flight type</span>
                            <span class="text-secondary flight-type">
                                {{ isset($ticketType) ? $ticketType->ticketType->name : null }}
                            </span>
                        </li>

                        <li class="d-flex justify-content-between py-2">
                            <span class="font-weight-medium">Base Fare</span>
                            <span class="text-secondary">
                                €<span class="flight-type-price">
                                    {{ isset($ticketType) ? $ticketType->price : null }}
                                </span>
                            </span>
                        </li>
                    </ul>
                    <!-- End Fact List -->
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
            <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingFour">
                <h5 class="mb-0">
                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark"
                            data-toggle="collapse"
                            data-target="#basicsCollapseFour"
                            aria-expanded="false"
                            aria-controls="basicsCollapseFour">
                        Payment

                        <span class="card-btn-arrow font-size-14 text-dark">
                                                    <i class="fas fa-chevron-down"></i>
                                                </span>
                    </button>
                </h5>
            </div>
            <div id="basicsCollapseFour" class="collapse show"
                 aria-labelledby="basicsHeadingFour"
                 data-parent="#basicsAccordion">
                <div class="card-body px-4 pt-0">
                    <!-- Fact List -->
                    <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                        <li class="d-flex justify-content-between py-2">
                            <span class="font-weight-medium">Subtotal</span>
                            <span class="text-secondary">€<span class="flight-type-price">{{ isset($ticketType) ? $ticketType->price : null }}</span></span>
                        </li>

                        <li class="d-flex justify-content-between py-2">
                            <span class="font-weight-medium">Extra Price</span>
                            <span class="text-secondary">€0,00</span>
                        </li>

                        <li class="d-flex justify-content-between py-2">
                            <span class="font-weight-medium">Tax</span>
                            <span class="text-secondary">0 %</span>
                        </li>

                        <li class="d-flex justify-content-between py-2 font-size-17 font-weight-bold">
                            <span class="font-weight-bold">Pay Amount</span>
                            <span class="">€<span class="flight-type-price"></span></span>
                        </li>
                    </ul>
                    <!-- End Fact List -->
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Basics Accordion -->
</div>
