@extends('flights.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="mb-5 shadow-soft bg-white rounded-sm">
                    <div class="py-3 px-4 px-xl-12 border-bottom">
                        <ul class="list-group flex-nowrap overflow-auto overflow-md-visble list-group-horizontal list-group-borderless flex-center-between pt-1">
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 bg-primary border-width-2 border border-primary text-white mx-auto rounded-circle">
                                    1
                                </div>
                                <div class="text-primary">Customer information</div>
                            </li>
                            <li class="list-group-item text-center flex-shrink-0 flex-xl-shrink-1">
                                <div class="flex-content-center mb-3 width-40 height-40 border  border-width-2 border-gray mx-auto rounded-circle">
                                    2
                                </div>
                                <div class="text-gray-1">Payment information</div>
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
                            Let us know who you are
                        </h5>
                        <!-- Contacts Form -->
                        <form class="js-validate"
                              action="{{ route('flights.book.personal', compact('flight')) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            First Name
                                        </label>

                                        <input type="text" class="form-control"
                                               name="firstName"
                                               placeholder="Ali"
                                               aria-label="Ali"
                                               value="{{ $savedData['firstName'] ?? '' }}"
                                               required
                                               data-msg="Please enter your first name."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Last name
                                        </label>

                                        <input type="text" class="form-control"
                                               name="lastName"
                                               placeholder="TUFAN"
                                               aria-label="TUFAN"
                                               required
                                               value="{{ $savedData['lastName'] ?? '' }}"
                                               data-msg="Please enter your last name."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Email
                                        </label>

                                        <input type="email"
                                               class="form-control"
                                               name="email"
                                               placeholder="creativelayers088@gmail.com"
                                               aria-label="creativelayers088@gmail.com"
                                               value="{{ $savedData['email'] ?? '' }}"
                                               required
                                               data-msg="Please enter a valid email address."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-4">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Phone
                                        </label>

                                        <input type="number" class="form-control"
                                               name="phone"
                                               placeholder="+90 (254) 458 96 32"
                                               aria-label="+90 (254) 458 96 32"
                                               value="{{ $savedData['phone'] ?? '' }}"
                                               required
                                               data-msg="Please enter a valid phone number."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-12 mb-4">
                                    <div class="js-form-message">
                                        <label for="passport_uuid" class="form-label">
                                            Passport
                                        </label>

                                        <input type="text"
                                               id="passport_uuid"
                                               class="form-control"
                                               name="passport_uuid"
                                               value="{{ $savedData['passport_uuid'] ?? '' }}"
                                               required
                                               data-msg="Please enter a valid passport number."
                                               data-error-class="u-has-error"
                                               data-success-class="u-has-success">
                                    </div>
                                </div>
                                <!-- End Input -->

                                <div class="w-100"></div>
                                <!-- Input -->
                                <div class="col-sm-12 col-md-6 mb-12">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            Ticket Type
                                        </label>
                                        <select class="form-control js-select selectpicker dropdown-select city-select"
                                                required=""
                                                data-msg="Please select city."
                                                data-error-class="u-has-error"
                                                name="ticket_type_id"
                                                data-success-class="u-has-success"
                                                data-live-search="true"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                            <option value="">Select ticket type</option>
                                            @foreach($ticketTypes as $ticketType)
                                                <option
                                                        data-price="{{ $ticketType->price }}"
                                                        data-name="{{ $ticketType->ticketType->name }}"
                                                        @if($ticketType->id == ($savedData['ticket_type_id'] ?? null))
                                                          selected
                                                        @endif
                                                        value="{{ $ticketType->id }}">
                                                    {{ $ticketType->ticketType->name }} (€{{ $ticketType->price }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- End Input -->
                                <!-- Input -->
                                <div class="col-sm-12 col-md-6 mb-12">
                                    <div class="js-form-message">
                                        <label class="form-label">
                                            City
                                        </label>
                                        <select class="form-control js-select selectpicker dropdown-select city-select"
                                                required=""
                                                data-msg="Please select city."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success"
                                                data-live-search="true"
                                                name="city_id"
                                                data-style="form-control font-size-16 border-width-2 border-gray font-weight-normal">
                                            <option value="">Select city</option>
                                            @foreach($countries as $country)
                                                <optgroup label="{{ $country->name }}">
                                                    @foreach ($country->cities as $city)
                                                        <option
                                                                data-country="{{ $country->id }}"
                                                                value="{{ $city->id }}"
                                                                @if($city->id == $selectedCity)
                                                                selected
                                                                @endif
                                                        >
                                                            {{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <div class="w-100"></div>

                                <div class="col-sm-12 align-self-end">
                                    <div class="text-right">
                                        <button type="submit"
                                                class="btn btn-primary btn-wide rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3">
                                            NEXT PAGE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Contacts Form -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                @include('flights.booking_sidebar', ['flight' => $flight])
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
      $(function () {
        function onTicketTypeSelect(element) {
          const selectedOption = $(element).find(':selected')
          const name = selectedOption.data('name')
          const price = selectedOption.data('price')

          $('.flight-type').html(name)
          $('.flight-type-price').html(price)
        }

        $('[name="ticket_type_id"]')
          .on('change', function () {
            onTicketTypeSelect(this)
          })
          .each((_, el) => onTicketTypeSelect(el))
      })
    </script>
@endsection