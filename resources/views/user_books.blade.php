@extends('layout.layout')

@section('content')
    <div class="container my-4">
        <div>
            <h3>
                Welcome, {{ $user->name }}
            </h3>
        </div>
        @if(sizeof($bookings))
        <div class="my-4">
            <div class="row">
                @foreach($bookings as $booking)
                <div class="col-sm-6 col-md-4">
                    @include('flights.card_item', [
                      'flight' => $booking->flight,
                      'buttonName' => 'Details',
                      'link' => route('books.details', ['uuid' => $booking->uuid])
                  ])
                </div>
                @endforeach
            </div>
        </div>
        @else
            <h5 class="text-center">
                <a href="{{ route('search') }}">
                Sorry, but you haven't booked any flights yet
                </a>
            </h5>
        @endif
    </div>
@endsection