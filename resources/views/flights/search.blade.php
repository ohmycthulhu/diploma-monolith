@extends('flights.layout')

@section('content')
<!-- ========== MAIN CONTENT ========== -->
  <div class="bg-gray-33 py-1">
    <div class="container">
      <div class="border-0">
        <div class="card-body">
          <div class="tab-content hero-tab-pane">
            <div class="tab-pane fade active show" id="pills-one-example2" role="tabpanel"
                 aria-labelledby="pills-one-example2-tab">
              <form class="js-validate"
                    action="{{ route('search') }}">
                <div class="row nav-select nav-select-1 d-block d-lg-flex mb-lg-2 px-lg-3 px-2 align-items-end">
                  <div class="col-sm-12 col-lg-6 col-xl-2dot3 mb-4 mb-xl-0 ">
                    <!-- Input -->
                    <span class="d-block text-gray-1 text-left font-weight-normal mb-0">From where</span>
                    <div class="js-focus-state">
                      <div class="input-group border-bottom-1 position-relative">
                        <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                        <input type="text"
                               value="{{ $airportFromName ?? $cityFromName }}"
                               data-city-input='input[name="city_from"]'
                               data-airport-input='input[name="airport_from"]'
                               class="form-control location-autocomplete font-size-lg-16 shadow-none hero-form font-weight-bold border-0 pl-0 bg-transparent"
                               placeholder="city or airport" aria-label="Keyword or title">
                      </div>
                      <input type="hidden"
                             value="{{ $cityFrom }}"
                             name="city_from">
                      <input type="hidden"
                             value="{{ $airportFrom }}"
                             name="airport_from">
                    </div>
                    <!-- End Input -->
                  </div>
                  <div class="col-sm-12 col-lg-6 col-xl-2dot3 mb-4 mb-xl-0 ">
                    <!-- Input -->
                    <span class="d-block text-gray-1 text-left font-weight-normal mb-0">To where</span>
                    <div class="js-focus-state">
                      <div class="input-group border-bottom-1">
                        <i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                        <input type="text"
                               value="{{ $airportToName ?? $cityToName }}"
                               data-city-input='input[name="city_to"]'
                               data-airport-input='input[name="airport_to"]'
                               class="form-control location-autocomplete font-size-lg-16 shadow-none hero-form font-weight-bold border-0 pl-0 bg-transparent"
                               placeholder="city or airport" aria-label="Keyword or title">
                      </div>
                    </div>
                    <input type="hidden"
                           name="city_to"
                           value="{{ $cityTo }}">
                    <input type="hidden"
                           name="airport_to"
                           value="{{ $airportTo }}">
                    <!-- End Input -->
                  </div>

                  <div class="col-sm-12 col-lg-6 col-xl-3 mb-4 mb-xl-0 ">
                    <!-- Input -->
                    <span class="d-block text-gray-1 text-left font-weight-normal mb-0">Depart</span>
                    <div class="border-bottom-1">
                      <div id="datepickerWrapperFromOne" class="u-datepicker input-group">
                        <div class="input-group-prepend">
                          <span class="d-flex align-items-center mr-2">
                            <i class="flaticon-calendar text-primary font-weight-semi-bold"></i>
                          </span>
                        </div>
                        <input
                            class="js-range-datepicker font-size-lg-16 shadow-none font-weight-bold form-control hero-form bg-transparent  border-0"
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

                  {{-- Hidden fields --}}
                  <input type="hidden"
                         name="price_from"
                         id="rangeSliderExample3MinResultInput"
                         class="rangeSliderExample3MinResult">
                  <input type="hidden"
                         name="price_to"
                         id="rangeSliderExample3MaxResultInput"
                         class="rangeSliderExample3MaxResult">

                  <div class="col-sm-12 col-lg-6 col-xl-2dot4 text-left mb-4 mb-xl-0">
                    <!-- Input -->
                    <span class="d-block text-gray-1 font-weight-normal mb-0">Travelers</span>
                    <div class="js-focus-state">
                      <div class="d-flex border-bottom-1">
                        <i class="flaticon-plus d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
                        <select class="js-select selectpicker dropdown-select">
                          @for($i = 1; $i <= 4; ++$i)
                            <option value="{{ $i }}">{{ $i }} Adult</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <!-- End Input -->
                  </div>

                  <div class="col-sm-12 col-lg col-xl-1dot8">
                    <button type="submit"
                            class="btn btn-blue-1 width-lg-200 text-white border-radius-2 font-weight-bold btn-md mb-xl-0 mb-lg-1 transition-3d-hover w-100 w-md-auto">
                      <i class="flaticon-magnifying-glass mr-2"></i>Search
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
  <div class="container">
    <div class="row pt-5 pt-xl-8 mb-5 mb-xl-9 pb-xl-1">
      <div class="col-lg-4 col-xl-3 mt-xl-1">
        <div class="navbar-expand-xl navbar-expand-xl-collapse-block">
          <button class="btn d-xl-none mb-5 p-0 collapsed" type="button" data-toggle="collapse"
                  data-target="#sidebar" aria-controls="sidebar" aria-expanded="false"
                  aria-label="Toggle navigation">
            <i class="far fa-caret-square-down text-primary font-size-20 card-btn-arrow ml-0"></i>
            <span class="text-primary ml-2">Sidebar</span>
          </button>
          <div id="sidebar" class="collapse navbar-collapse">
            <div class="mb-6 w-100">
              <div class="sidenav border border-color-8 rounded-xs">
                <!-- Accordiaon -->
                <div id="shopCartAccordion" class="accordion rounded shadow-none border-top">
                  <div class="border-0">
                    <div class="card-collapse" id="shopCardHeadingOne">
                      <h3 class="mb-0">
                        <button type="button"
                                class="btn btn-link btn-block card-btn py-2 px-5 text-lh-3 collapsed"
                                data-toggle="collapse" data-target="#shopCardOne"
                                aria-expanded="false" aria-controls="shopCardOne">
                              <span class="row align-items-center">
                                  <span class="col-9">
                                      <span
                                          class="d-block font-size-lg-15 font-size-17 font-weight-bold text-dark">Price Range($)</span>
                                  </span>
                                  <span class="col-3 text-right">
                                      <span class="card-btn-arrow">
                                          <span class="fas fa-chevron-down small"></span>
                                      </span>
                                  </span>
                              </span>
                        </button>
                      </h3>
                    </div>
                    <div id="shopCardOne" class="collapse show" aria-labelledby="shopCardHeadingOne"
                         data-parent="#shopCartAccordion">
                      <div class="card-body pt-0 px-5">
                        <div class="pb-3 mb-1 d-flex text-lh-1">
                          <span>£</span>
                          <span id="rangeSliderExample3MinResult"
                                class="rangeSliderExample3MinResult"></span>
                          <span class="mx-0dot5"> — </span>
                          <span>£</span>
                          <span id="rangeSliderExample3MaxResult"
                                class="rangeSliderExample3MaxResult"></span>
                        </div>
                        <input class="js-range-slider" type="text"
                               data-extra-classes="u-range-slider height-35"
                               data-type="double"
                               data-grid="false"
                               data-hide-from-to="true"
                               data-min="{{ $prices['min'] }}"
                               data-max="{{ $prices['max'] }}"
                               data-from="{{ $priceFrom ?? $prices['min'] }}"
                               data-to="{{ $priceTo ?? $prices['max'] }}"
                               data-prefix="$"
                               data-result-min=".rangeSliderExample3MinResult"
                               data-result-max=".rangeSliderExample3MaxResult">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Accordion -->

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 mt-xl-1">
        <!-- Shop-control-bar Title -->
        <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center mb-4 pb-1">
          <h3 class="font-size-21 font-weight-bold mb-4 mb-md-0 text-lh-1 text-center text-md-left">{{ $flights->total() }}
            results found.</h3>
          <div class="d-flex align-items-center justify-content-between justify-content-md-start">
            <ul class="nav tab-nav-shop flex-nowrap" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link font-size-22 p-0 ml-4" id="pills-three-example1-tab"
                   data-toggle="pill" href="#pills-three-example1" role="tab"
                   aria-controls="pills-three-example1" aria-selected="true">
                  <div class="d-md-flex justify-content-md-center align-items-md-center">
                    <i class="fa fa-list"></i>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link font-size-22 p-0 ml-2 active" id="pills-one-example1-tab"
                   data-toggle="pill" href="#pills-one-example1" role="tab"
                   aria-controls="pills-one-example1" aria-selected="false">
                  <div class="d-md-flex justify-content-md-center align-items-md-center">
                    <i class="fa fa-th"></i>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- End shop-control-bar Title -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade" id="pills-three-example1" role="tabpanel"
               aria-labelledby="pills-three-example1-tab" data-target-group="groups">
            @foreach($flights as $flight)
              <div class="mb-5">
                @include('flights.list_item', ['flight' => $flight])
              </div>
            @endforeach
          </div>
          <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel"
               aria-labelledby="pills-one-example1-tab" data-target-group="groups">
            <div class="row">
              @foreach($flights as $flight)
                <div class="col-md-6 col-xl-4">
                  <div class="mb-5">
                    @include('flights.card_item', ['flight' => $flight])
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="text-center text-md-left font-size-14 mb-3 text-lh-1">Showing 1–15</div>
          <nav aria-label="Page navigation">
            <ul class="list-pagination-1 pagination border border-color-4 rounded-sm mb-5 mb-lg-0 overflow-auto overflow-xl-visible justify-content-md-center align-items-center py-2">
              @if($flights->currentPage() > 1)
                <li class="page-item">
                  <a class="page-link border-right rounded-0 text-gray-5" href="#" aria-label="Previous">
                    <i class="flaticon-left-direction-arrow font-size-10 font-weight-bold"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
              @endif
              @for($i = max(1, $flights->currentPage() - 2); $i <= min($flights->currentPage() + 2, $flights->lastPage()); $i++)
                <li class="page-item">
                  <a class="page-link font-size-14 {{ $i == $flights->currentPage() ? 'active' : ''}}"
                     href="{{ $flights->url($i) }}">
                    {{ $i }}
                  </a>
                </li>
              @endfor
              @if($i < $flights->lastPage())
                <li class="page-item disabled">
                  <a class="page-link font-size-14" href="#">...</a>
                </li>
                @for($j = max($flights->lastPage() - 2, $i); $j <= $flights->lastPage(); $j++)
                  <li class="page-item">
                    <a class="page-link font-size-14"
                       href="{{ $flights->url($j) }}">{{ $j }}</a>
                  </li>
                @endfor
              @endif
              @if($flights->hasMorePages())
                <li class="page-item">
                  <a class="page-link border-left rounded-0 text-gray-5" href="#" aria-label="Next">
                    <i class="flaticon-right-thin-chevron font-size-10 font-weight-bold"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              @endif
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
<!-- ========== END MAIN CONTENT ========== -->
@endsection
