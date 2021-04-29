@extends('crm.layout')

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">
                    <div>
                        <h4>Booking #{{ $book->uuid }}</h4>
                    </div>
                    <div>
                        <h5>Payment information</h5>
                        <form action="{{ route('crm.books.payments.create', ['id' => $book->id]) }}"
                              method="post"
                              class="row"
                              enctype="multipart/form-data">
                            @csrf
                            {{-- Ticket Type --}}
                            <select class="form-select col-sm-12 col-md-6 my-2"
                                    required
                                    name="isCache">
                                <option value="">Select payment type</option>
                                <option value="false">Card</option>
                                <option value="true">Cache</option>
                            </select>
                            <div class="my-3 col-12 col-md-6 d-flex justify-content-end">
                                <button class="btn btn-success">
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection