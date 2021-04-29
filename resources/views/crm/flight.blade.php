@extends('crm.layout')

@section('content')
  <div class="layout-px-spacing">
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-table-two">
          @include('crm.flight_info', ['flight' => $flight, 'canChangeStatus' => $flight->flight_status < 3])
          @if($flight->flight_status == 0)
            <div class="my-2 d-flex justify-content-end">
              <a class="btn btn-outline-primary btn-sm-wide"
                 href="{{ route('crm.flights.bookings', ['id' => $flight->id]) }}">
                Booking +
              </a>
            </div>
          @endif
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
                  <tr class="text-white">
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
                        @if(!$book->is_approved)
                          <a class="badge badge-danger"
                             href="{{ route('crm.books.payments', ['id' => $book->id]) }}">
                            Not Approved
                          </a>
                        @else
                          <span class="badge badge-success">
                                Approved
                          </span>
                        @endif
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