@extends('flights.layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-xl-9">
      <div class="mb-5 shadow-soft bg-white rounded-sm">
        <div class="py-6 px-5 border-bottom">
          <div class="flex-horizontal-center">
            <div class="height-50 width-50 flex-shrink-0 flex-content-center bg-primary rounded-circle">
              <i class="flaticon-tick text-white font-size-24"></i>
            </div>
            <div class="ml-3">
              <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                Thank You. Your Booking Order is Confirmed Now.
              </h3>
              <p class="mb-0">A confirmation email has been sent to your provided email address.</p>
            </div>
          </div>
        </div>
        <div class="pt-4 pb-5 px-5 border-bottom">
          <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-2">
            Traveler Information
          </h5>
          <!-- Fact List -->
          <ul class="list-unstyled font-size-1 mb-0 font-size-16">
            <li class="d-flex justify-content-between py-2">
              <span class="font-weight-medium">Booking number</span>
              <span class="text-secondary text-right">{{ $booking->id }}</span>
            </li>

            <li class="d-flex justify-content-between py-2">
              <span class="font-weight-medium">First name</span>
              <span class="text-secondary text-right">{{ explode(' ', $booking->name)[0] ?? '' }}</span>
            </li>

            <li class="d-flex justify-content-between py-2">
              <span class="font-weight-medium">Last name</span>
              <span class="text-secondary text-right">{{ explode(' ', $booking->name)[1] ?? '' }}</span>
            </li>

            <li class="d-flex justify-content-between py-2">
              <span class="font-weight-medium">E-mail address</span>
              <span class="text-secondary text-right">{{ $booking->email }}</span>
            </li>

            <li class="d-flex justify-content-between py-2">
              <span class="font-weight-medium">Town / City</span>
              <span class="text-secondary text-right">{{ $booking->city->name }}</span>
            </li>

            <li class="d-flex justify-content-between py-2">
              <span class="font-weight-medium">Country</span>
              <span class="text-secondary text-right">{{ $booking->country->name }}</span>
            </li>
          </ul>
          <!-- End Fact List -->
        </div>
        @if($confirmable)
        <div class="pt-4 pb-5 px-5 border-bottom">
          <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-3">
            Payment
          </h5>
          <p class="">
            Please, confirm or reject the payment
          </p>

          <div class="d-flex justify-content-end">
            <form action="{{ route('flights.book.confirm', ['flight' => $flight]) }}"
                  enctype="multipart/form-data"
                  class="mx-2"
                  method="post">
              @csrf
            <button class="btn btn-success btn-sm">
              Confirm
            </button>
            </form>

            <form action="{{ route('flights.book.reject', ['flight' => $flight]) }}"
                  enctype="multipart/form-data"
                  method="post">
              @csrf
              <button class="btn btn-danger btn-sm">
                Reject
              </button>
            </form>
          </div>
        </div>
        @endif
        <div class="pt-4 pb-5 px-5">
          <h5 id="scroll-description" class="font-size-21 font-weight-bold text-dark mb-3">
            View Booking Details
          </h5>
          <p class="">
            You can view the booking details by following the link below
          </p>

          <a href="{{ route('books.details', ['uuid' => $booking->uuid]) }}"
             target="_blank"
             class="text-underline text-primary">
            {{ route('books.details', ['uuid' => $booking->uuid]) }}
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-xl-3">
      @include('flights.booking_sidebar', ['flight' => $flight, 'ticketType' => $ticketType])
    </div>
  </div>
</div>
@endsection