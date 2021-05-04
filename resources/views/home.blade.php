@extends('layout.layout')

@section('content')
    <!-- ========== HERO ========== -->
    <div class="hero-block hero-v8 bg-img-hero-bottom text-center gradient-overlay-half-bg-violet-light z-index-2"
         style="background-image: url(/assets/img/1920x650/img1.jpg);">
        <div class="container space-2 space-top-lg-3 space-top-xl-6">
            <div class="row justify-content-md-center pb-4">
                <!-- Info -->
                <div class="pb-lg-8 pb-xl-11 pb-3">
                    <h1 class="font-size-60 font-size-xs-30 text-white font-weight-bold">Where do you want to
                        explore?</h1>
                </div>
                <!-- End Info -->
            </div>
            <div class="pt-xl-11 mb-lg-n17">
                <div class="card border-0 tab-shadow">
                    <div class="card-body">
                        <div class="tab-content hero-tab-pane">
                            <div class="tab-pane fade pt-xl-4 active show" id="pills-one-example2" role="tabpanel"
                                 aria-labelledby="pills-one-example2-tab">
                                <form class="js-validate"
                                      action="{{ route('search') }}"
                                >
                                    <div class="row nav-select d-block d-lg-flex mb-lg-2 px-lg-3 px-2">
                                        <div class="col-sm-12 col-lg-2dot3 mb-4 mb-lg-0 ">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-0">From where</span>
                                            <div class="js-focus-state">
                                                <div class="input-group border-bottom border-width-2 border-color-1">
                                                    <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                                                    <input type="text"
                                                           data-city-input='input[name="city_from"]'
                                                           data-airport-input='input[name="airport_from"]'
                                                           class="form-control font-size-lg-16 shadow-none hero-form font-weight-bold border-0 pl-0 location-autocomplete"
                                                           placeholder="city or airport"
                                                           aria-label="Keyword or title">
                                                </div>
                                            </div>
                                            <input type="hidden"
                                                   value="{{ $cityFrom ?? '' }}"
                                                   name="city_from">
                                            <input type="hidden"
                                                   value="{{ $airportFrom ?? '' }}"
                                                   name="airport_from">
                                            <!-- End Input -->
                                        </div>
                                        <div class="col-sm-12 col-lg-2dot3 mb-4 mb-lg-0 ">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-0">To where</span>
                                            <div class="js-focus-state">
                                                <div class="input-group border-bottom border-width-2 border-color-1">
                                                    <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                                                    <input type="text"
                                                           data-city-input='input[name="city_to"]'
                                                           data-airport-input='input[name="airport_to"]'
                                                           class="form-control font-size-lg-16 shadow-none hero-form font-weight-bold border-0 pl-0 location-autocomplete"
                                                           placeholder="city or airport" aria-label="Keyword or title">
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                            <input type="hidden"
                                                   name="city_to"
                                                   value="{{ $cityTo ?? '' }}">
                                            <input type="hidden"
                                                   name="airport_to"
                                                   value="{{ $airportTo ?? '' }}">
                                        </div>

                                        <div class="col-sm-12 col-lg-3 mb-4 mb-lg-0 ">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Depart-Return</span>
                                            <div class="border-bottom border-width-2 border-color-1">
                                                <div id="datepickerWrapperFromOne" class="u-datepicker input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="d-flex align-items-center mr-2">
                                                              <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                            </span>
                                                    </div>
                                                    <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0"
                                                           type="date"
                                                           data-rp-wrapper="#datepickerWrapperFromOne"
                                                           data-rp-type="single"
                                                           data-rp-date-format="M d / Y"
                                                           data-rp-default-date='["Jul 7 / 2020"]'>
                                                </div>
                                                <!-- End Datepicker -->
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-sm-12 col-lg-2dot4 text-left mb-4 mb-lg-0">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 font-weight-normal mb-0">Travelers</span>
                                            <div class="js-focus-state">
                                                <div class="d-flex border-bottom border-width-2 border-color-1">
                                                    <i class="flaticon-backpack d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                                                    <select class="js-select selectpicker dropdown-select">
                                                        <option value="2 Rooms - 3 Guests" selected>1 Adult - Ecconomy
                                                        </option>
                                                        <option value="2 Rooms - 3 Guests">3 Adults - Ecconomy</option>
                                                        <option value="2 Rooms - 3 Guests">2 Adults - Business</option>
                                                        <option value="2 Rooms - 3 Guests">4 Adults - Business</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-sm-12 col-lg-1dot8 text-left align-self-lg-end">
                                            <button type="submit"
                                                    class="btn btn-primary text-white border-radius-2 font-weight-bold btn-md mb-xl-0 mb-lg-1 transition-3d-hover">
                                                <i class="flaticon-magnifying-glass mr-2"></i>Search
                                            </button>
                                        </div>
                                    </div>
                                    <!-- End Checkbox -->
                                </form>
                            </div>
                            <div class="tab-pane fade pt-xl-4" id="pills-two-example2" role="tabpanel"
                                 aria-labelledby="pills-two-example2-tab">
                                <form class="js-validate">
                                    <div class="row nav-select d-block d-lg-flex mb-lg-2 px-lg-3 px-2">
                                        <div class="col-sm-12 col-lg-3dot7 mb-4 mb-lg-0 ">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-0">From where</span>
                                            <div class="js-focus-state">
                                                <div class="input-group border-bottom border-width-2 border-color-1">
                                                    <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                                                    <input type="text"
                                                           class="form-control font-size-lg-16 shadow-none hero-form font-weight-bold border-0 pl-0"
                                                           placeholder="city or airport" aria-label="Keyword or title">
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                        </div>
                                        <div class="col-sm-12 col-lg-3dot6 mb-4 mb-lg-0 ">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Depart</span>
                                            <div class="border-bottom border-width-2 border-color-1">
                                                <div id="datepickerWrapperFromtwo" class="u-datepicker input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="d-flex align-items-center mr-2">
                                                              <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                            </span>
                                                    </div>
                                                    <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0"
                                                           type="date"
                                                           data-rp-wrapper="#datepickerWrapperFromtwo"
                                                           data-rp-type="range"
                                                           data-rp-date-format="M d / Y"
                                                           data-rp-default-date='["Jul 7 / 2020", "Aug 25 / 2020"]'>
                                                </div>
                                                <!-- End Datepicker -->
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-sm-12 col-lg-2dot8 text-left mb-4 mb-lg-0">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 font-weight-normal mb-0">Travelers</span>
                                            <div class="js-focus-state">
                                                <div class="d-flex border-bottom border-width-2 border-color-1">
                                                    <i class="flaticon-backpack d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                                                    <select class="js-select selectpicker dropdown-select">
                                                        <option value="2 Rooms - 3 Guests" selected>1 Adult - Ecconomy
                                                        </option>
                                                        <option value="2 Rooms - 3 Guests">3 Adults - Ecconomy</option>
                                                        <option value="2 Rooms - 3 Guests">2 Adults - Business</option>
                                                        <option value="2 Rooms - 3 Guests">4 Adults - Business</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-sm-12 col-lg-1dot8 text-left align-self-lg-end">
                                            <button type="submit"
                                                    class="btn btn-primary text-white border-radius-2 font-weight-bold btn-md mb-xl-0 mb-lg-1 transition-3d-hover">
                                                <i class="flaticon-magnifying-glass mr-2"></i>Search
                                            </button>
                                        </div>
                                    </div>
                                    <!-- End Checkbox -->
                                </form>
                            </div>
                            <div class="tab-pane fade pt-xl-4" id="pills-three-example2" role="tabpanel"
                                 aria-labelledby="pills-three-example2-tab">
                                <form class="js-validate">
                                    <div class="row nav-select d-block d-lg-flex mb-lg-2 px-lg-3 px-2">
                                        <div class="col-sm-12 col-lg-3dot7 mb-4 mb-lg-0 ">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-0">From where</span>
                                            <div class="js-focus-state">
                                                <div class="input-group border-bottom border-width-2 border-color-1">
                                                    <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                                                    <input type="text"
                                                           class="form-control font-size-lg-16 shadow-none hero-form font-weight-bold border-0 pl-0"
                                                           placeholder="city or airport" aria-label="Keyword or title">
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                        </div>
                                        <div class="col-sm-12 col-lg-3dot6 mb-4 mb-lg-0 ">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Depart</span>
                                            <div class="border-bottom border-width-2 border-color-1">
                                                <div id="datepickerWrapperFromthree" class="u-datepicker input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="d-flex align-items-center mr-2">
                                                              <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                                                            </span>
                                                    </div>
                                                    <input class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0"
                                                           type="date"
                                                           data-rp-wrapper="#datepickerWrapperFromthree"
                                                           data-rp-type="range"
                                                           data-rp-date-format="M d / Y"
                                                           data-rp-default-date='["Jul 7 / 2020", "Aug 25 / 2020"]'>
                                                </div>
                                                <!-- End Datepicker -->
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-sm-12 col-lg-2dot8 text-left mb-4 mb-lg-0">
                                            <!-- Input -->
                                            <span class="d-block text-gray-1 font-weight-normal mb-0">Travelers</span>
                                            <div class="js-focus-state">
                                                <div class="d-flex border-bottom border-width-2 border-color-1">
                                                    <i class="flaticon-backpack d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                                                    <select class="js-select selectpicker dropdown-select">
                                                        <option value="2 Rooms - 3 Guests" selected>1 Adult - Ecconomy
                                                        </option>
                                                        <option value="2 Rooms - 3 Guests">3 Adults - Ecconomy</option>
                                                        <option value="2 Rooms - 3 Guests">2 Adults - Business</option>
                                                        <option value="2 Rooms - 3 Guests">4 Adults - Business</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <div class="col-sm-12 col-lg-1dot8 text-left align-self-lg-end">
                                            <button type="submit"
                                                    class="btn btn-primary text-white border-radius-2 font-weight-bold btn-md mb-xl-0 mb-lg-1 transition-3d-hover">
                                                <i class="flaticon-magnifying-glass font-size-20 mr-2"></i>Search
                                            </button>
                                        </div>
                                    </div>
                                    <!-- End Checkbox -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ========== END HERO ========== -->

    <div class="my-8 py-4"></div>

    <!-- Deals-List v1 -->
    <div class="deal-list-block deal-list-v1 bg-img-hero min-height-600 mt-8"
         style="background-image: url(/assets/img/1920x600/img2.jpg);">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-8 pb-1 pt-7">
            <h2 class="section-title-1 text-white font-size-30 font-weight-bold mb-0">Travel Deals</h2>
        </div>
        <div class="container">
            @for ($i = 0; $i < sizeof($flights); $i += 4)
                <div class="row mb-xl-5">
                    @for ($j = 0; $j < min(4, sizeof($flights) - $i); $j++)
                        <div class="col-md-6 col-xl-3">
                            @include('common.flight_brief_card', ['flight' => $flights[$i + $j]])
                        </div>
                    @endfor
                </div>
            @endfor
        </div>
    </div>
    <!-- End Deals-List v1 -->

    <!-- Destinantion v6 -->
    <div class="destination-block destination-v6 border-bottom border-color-8">
        <div class="container space-1">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-3">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">Top Destination</h2>
            </div>
            <div class="row">
            @foreach($countries as $country)
                <!-- Card Block -->
                    <div class="col-md-4 col-lg-6 col-xl-2dot4 mb-3 mb-md-4 pb-1">
                        @include('common.country_card', ['country' => $country])
                    </div>
                    <!-- End Card Block -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Destinantion v6 -->
@endsection