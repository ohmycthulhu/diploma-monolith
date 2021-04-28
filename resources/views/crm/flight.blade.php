@extends('crm.layout')

@section('content')
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">
          <div class="widget-heading">
            <h5 class="">Flight #{{ $flight->id }}</h5>
            @if ($flight->flight_status < 3)
              <form action="{{ route('crm.flights.nextStatus', ['id' => $flight->id]) }}"
                    enctype="multipart/form-data"
                    method="post">
                @csrf
                <span class="badge {{$flight->flightStatusClass}}">
                  {{ $flight->flightStatusName }}
                </span>
                <button type="submit"
                      onclick="submit()"
                      class="badge badge-danger">
                  Next status
                </button>
              </form>
            @else
              <span class="badge {{$flight->flightStatusClass}}">
                  {{ $flight->flightStatusName }}
              </span>
            @endif
          </div>
          <div class="row">
            <div class="col-12 col-md-6 col-xl-4">
              {{-- Locations --}}
              <ul>
                <li>
                  Type: One-way flight
                </li>
                <li>
                  From: {{ $flight->airportDepart->city->name }} ({{ $flight->airportDepart->code }})
                </li>
                <li>
                  To: {{ $flight->airportArrival->city->name }} ({{ $flight->airportArrival->code }})
                </li>
              </ul>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
              {{-- Date and time --}}
              <ul>
                <li>
                  Date: {{ $flight->flight_datetime->format('d.m.Y') }}
                </li>
                <li>
                  Departure time: {{ $flight->formattedDepartureTime }}
                </li>
                <li>
                  Arrival time: {{ $flight->formattedArrivalTime }}
                </li>
              </ul>
            </div>
            <div class="col-12 col-xl-4">
              {{-- Ticket types --}}
              <ul>
                @foreach($flight->ticketTypes as $ticketType)
                  <li>
                    {{ $ticketType->ticketType->name }}, {{ $ticketType->seats }} - €{{ $ticketType->price }}
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="widget-content">
            <div class="table-responsive">
              <table class="table">
                <thead>
                <tr>
                  <th>
                    <div class="th-content">UUID</div>
                  </th>
                  <th>
                    <div class="th-content">Name</div>
                  </th>
                  <th>
                    <div class="th-content">Passport</div>
                  </th>
                  <th>
                    <div class="th-content">Phone</div>
                  </th>
                  <th>
                    <div class="th-content">Email</div>
                  </th>
                  <th>
                    <div class="th-content">Is Approved?</div>
                  </th>
                </tr>
                @foreach($flight->bookings as $book)
                <tr>
                  <td>
                    <div class="td-content">#{{$book->uuid}}</div>
                  </td>
                  <td>
                    <div class="td-content">{{$book->name}}</div>
                  </td>
                  <td>
                    <div class="td-content">{{$book->passport_uuid}}</div>
                  </td>
                  <td>
                    <div class="td-content">{{$book->phone}}</div>
                  </td>
                  <td>
                    <div class="td-content">{{$book->email}}</div>
                  </td>
                  <td>
                    <div class="td-content">
                    <span class="badge {{ $book->is_approved ? 'badge-success' : 'badge-danger' }}">
                      {{ $book->is_approved ? 'Approved' : 'Not Approved' }}
                    </span>
                    </div>
                  </td>
                </tr>
                @endforeach
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection