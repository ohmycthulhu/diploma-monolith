<div class="hover-bg-gray-1 border rounded-xs py-4 px-4 px-xl-5">
    <div class="row align-items-center text-center">
        <div class="col-md mb-4 mb-md-0">
            <div class="flex-content-center d-block d-lg-flex">
                <div class="mr-lg-3 mb-1 mb-lg-0">
                    <i class="flaticon-aeroplane font-size-30 text-primary"></i>
                </div>
                <div class="text-lg-left">
                    <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">
                        {{ $flight->flight_datetime->format('H:i') }}
                    </h6>
                    <span class="font-size-14 text-gray-1">
                        {{ $flight->airportDepart->city->name }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md mb-4 mb-md-0">
            <div class="flex-content-center flex-column">
                <h6 class="font-size-14 font-weight-bold text-gray-5 mb-0">
                    {{ $flight->formattedDuration }}
                </h6>
                <div class="width-60 border-top border-primary border-width-2 my-1"></div>
                <div class="font-size-14 text-gray-1">Non Stop</div>
            </div>
        </div>
        <div class="col-md mb-4 mb-md-0">
            <div class="flex-content-center d-block d-lg-flex">
                <div class="mr-lg-3 mb-1 mb-lg-0">
                    <i class="d-block rotate-90 flaticon-aeroplane font-size-30 text-primary"></i>
                </div>
                <div class="text-lg-left">
                    <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">
                        {{ $flight->flight_datetime->addMinutes($flight->duration)->format('H:i') }}
                    </h6>
                    <span class="font-size-14 text-gray-1">
                        {{ $flight->airportArrival->city->name }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-2gdot8">
            <div class="border-xl-left">
                <div class="ml-xl-5">
                    <div class="mb-2">
                        <div class="mb-2 text-lh-1dot4">
                            <span class="font-weight-bold font-size-22">
                                £ {{ $flight->randomPrice }}
                            </span>
                        </div>
                        <a href="flights-booking.html" class="btn btn-outline-primary border-radius-3 d-flex align-items-center justify-content-center min-height-50 font-weight-bold border-width-2 py-2 w-100">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>