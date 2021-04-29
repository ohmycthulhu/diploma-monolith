@extends('crm.layout')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">
                    @include('crm.flight_info', ['flight' => $flight])
                    <div>
                        <h5>Ticket information</h5>
                        <form action="{{ route('crm.flights.bookings.add', ['id' => $flight->id]) }}"
                              method="post"
                              class="row"
                              enctype="multipart/form-data">
                            @csrf
                            {{-- First name --}}
                            <div class="col-sm-12 col-md-6 my-2">
                                <input type="text"
                                       name="firstName"
                                       required
                                       placeholder="First Name"
                                       class="form-control">
                            </div>
                            {{-- Last name --}}
                            <div class="col-sm-12 col-md-6 my-2">
                                <input type="text"
                                       name="lastName"
                                       required
                                       placeholder="Last Name"
                                       class="form-control">
                            </div>
                            {{-- Passport --}}
                            <div class="col-sm-12 my-2">
                                <input type="text"
                                       name="passportUuid"
                                       required
                                       placeholder="Passport #"
                                       class="form-control">
                            </div>
                            {{-- Phone --}}
                            <div class="col-sm-12 col-md-6 my-2">
                                <input type="tel"
                                       name="phone"
                                       required
                                       placeholder="Phone Number"
                                       class="form-control">
                            </div>
                            {{-- Email --}}
                            <div class="col-sm-12 col-md-6 my-2">
                                <input type="email"
                                       name="email"
                                       required
                                       placeholder="E-mail"
                                       class="form-control">
                            </div>
                            <div class="w-100 my-3"></div>
                            {{-- Ticket Type --}}
                            <select class="form-select col-sm-12 col-md-6 my-2"
                                    required
                                    name="ticketTypeId">
                                <option value="">Select Ticket Type</option>
                                @foreach($flight->ticketTypes as $ticketType)
                                    <option value="{{ $ticketType->id }}">
                                        {{ $ticketType->ticketType->name }} (€{{ $ticketType->price }})
                                    </option>
                                @endforeach
                            </select>
                            {{-- City --}}
                            <select class="form-select col-sm-12 col-md-6 my-2"
                                    required
                                    name="cityId">
                                <option value="">Select city</option>
                                @foreach ($countries as $country)
                                    <optgroup label="{{ $country->name }}">
                                        @foreach($country->cities as $city)
                                            <option value="{{ $city->id }}"
                                                    @if($city->id == $flight->airportDepart->city_id)
                                                    selected
                                                    @endif
                                            >
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <div class="my-3 col-12 d-flex justify-content-end">
                                <button class="btn btn-success">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection