@extends('layouts.app')

@section('content')
<div class="container">

    <h3>INDEX</h3>
    <div class="create-button">
        <a class="btn btn-success" href="{{route('booking.create')}}" role="button">Create</a>
    </div>
    
    <div class="table-content">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Flexibility</th>
                <th scope="col">Vehicle Size</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @if (isset($bookings))
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{$booking->id}}</td>
                            <td>{{$booking->name}}</td>
                            <td>{{$booking->booking_date}}</td>
                            <td>{{$booking->flexibility}}</td>
                            <td>{{$booking->vehicle_size}}</td>
                            <td>{{$booking->contact_number}}</td>
                            <td>{{$booking->email_address}}</td>
                            <td>
                                <a href="#" class="list-icons-item confirm-action"
                                    data-booking="{{$booking->id}}">
                                    Confirm
                                </a>
                                <a href="{{route('booking.edit', [$booking->id])}}"> 
                                    Edit
                                </a>
                                {{-- <a href="{{route('booking.destroy', [$booking->id])}}"> delete </a> --}}
                                <a href="#" class="list-icons-item delete-action">
                                    delete
                                </a>
                                {{ Form::open(['url' => route('booking.destroy', $booking), 'method' => 'delete']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

   
</div>
@endsection
