<a class="d-block mb-4 mb-xl-0"
   href="{{ route('flights.book', ['flight' => $flight]) }}">
    <div class="text-hover bg-white p-3 rounded-xs d-flex justify-content-between transition-3d-hover">
        <h6 class="font-size-17 font-weight-normal text-gray-5 ml-1 mb-0">
            {{ $flight->airportArrival->city->name }}
        </h6>
        <span class="font-size-19 font-weight-bold text-gray-1 mr-1">
            £ {{ number_format($flight->ticketTypes[0]->price, 2) }}
        </span>
    </div>
</a>