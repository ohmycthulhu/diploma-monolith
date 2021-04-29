<div class="widget-heading">
    <h5 class="">Flight #{{ $flight->id }}</h5>
    @if ($canChangeStatus ?? false)
        <form action="{{ route('crm.flights.nextStatus', ['id' => $flight->id]) }}"
              enctype="multipart/form-data"
              id="change-status"
              method="post">
            @csrf
            <span class="badge {{$flight->flightStatusClass}}">
              {{ $flight->flightStatusName }}
            </span>
            <a type="submit"
               onclick="submit()"
               data-form="#change-status"
               class="badge badge-danger">
                Next status
            </a>
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
                    {{ $ticketType->ticketType->name }}, {{ $ticketType->seats }} -
                    €{{ $ticketType->price }}
                </li>
            @endforeach
        </ul>
    </div>
</div>