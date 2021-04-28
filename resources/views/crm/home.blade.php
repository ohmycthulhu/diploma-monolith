@extends('crm.layout')
@section('content')
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">
          <div class="widget-heading">
            <h5 class="">Flights</h5>
          </div>
          <div class="widget-content">
            <div class="table-responsive">
              <table class="table">
                {{-- Badges: badge --}}
                <thead>
                <tr>
                  <th>
                    <div class="th-content">ID</div>
                  </th>
                  <th>
                    <div class="th-content">Source</div>
                  </th>
                  <th>
                    <div class="th-content">Destination</div>
                  </th>
                  <th>
                    <div class="th-content">Date</div>
                  </th>
                  <th>
                    <div class="th-content">Departure</div>
                  </th>
                  <th>
                    <div class="th-content">Arrival</div>
                  </th>
                  <th>
                    <div class="th-content th-heading">Prices, €</div>
                  </th>
                  <th>
                    <div class="th-content">Status</div>
                  </th>
                </tr>
                </thead>
                <tbody>
                @foreach($flights as $flight)
                  <tr>
                    <td>
                      <div class="td-content customer-name">
                        <a href="{{ route('crm.flights.id', ['id' => $flight->id]) }}">
                          #{{ $flight->id }}
                        </a>
                      </div>
                    </td>
                    <td>
                      <div class="td-content product-brand text-primary">
                        {{ $flight->airportDepart->city->name }} ({{ $flight->airportDepart->code }})
                      </div>
                    </td>
                    <td>
                      <div class="td-content product-brand text-primary">
                        {{ $flight->airportArrival->city->name }} ({{ $flight->airportArrival->code }})
                      </div>
                    </td>
                    <td>
                      <div class="td-content pricing">
                        <span class="">
                          {{ $flight->flight_datetime->format('d.m.Y') }}
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="td-content pricing">
                        <span class="">
                          {{ $flight->formattedDepartureTime }}
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="td-content pricing">
                        <span class="">
                          {{ $flight->formattedArrivalTime }}
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="td-content pricing">
                        <span class="">
                          {{ $flight->ticketTypes->pluck('price')->join(', ') }}
                        </span>
                      </div>
                    </td>
                    <td>
                      <div class="td-content">
                        <span class="badge {{ $flight->flightStatusClass }}">
                          {{ $flight->flightStatusName }}
                        </span>
                      </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div class="my-3 justify-content-between d-flex">
                @if($flights->currentPage() > 1)
                <a href="{{ $flights->url($flights->currentPage() - 1) }}">
                  <button class="btn btn-primary btn-sm">Prev page</button>
                </a>
                @else
                  <div> </div>
                @endif
                @if($flights->hasMorePages())
                <a href="{{ $flights->nextPageUrl() }}">
                  <button class="btn btn-primary btn-sm">Next page</button>
                </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
