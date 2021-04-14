@extends('layouts.app')

@section('content')
    <div class="container">

        <h3>New Booking</h3>
        <br>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{Form::open(array('url' => route('booking.store'), 'method' => 'post'))}}
            @csrf

            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$booking->name ?? null}} {{ old('name') ?? null}}">
            </div>
            <div class="form-group">
                <label for="booking_date">Booking Date</label>
                <input type="date" class="form-control" id="booking_date" name="booking_date" placeholder="Booking Date" value="{{$booking->booking_date ?? null}} {{ old('booking_date') ?? null}}" >
            </div>
            <div class="form-group">
                <label for="flexibility">Flexibility</label>
                <select class="form-control" id="flexibility" name="flexibility">
                    <option value="1">+/- 1 Day</option>
                    <option value="2">+/- 2 Day</option>
                    <option value="3">+/- 3 Day</option>
                </select>
            </div>
            <div class="form-group">
                <label for="vehicle_size">Vehicle Size</label>
                <select class="form-control" id="vehicle_size" name="vehicle_size">
                    <option value="1">Small</option>
                    <option value="2">Medium</option>
                    <option value="3">Large</option>
                    <option value="4">Van</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="{{$booking->contact_number ?? null}} {{ old('contact_number') ?? null}}">
            </div>
            <div class="form-group">
                <label for="email_address">Email address</label>
                <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email" value="{{$booking->email_address ?? null}}{{ old('email_address') ?? null}}">
            </div>
            
            <button type="submit" class="btn btn-success">Create</button>
            @if (!Auth::guest())
                <a class="btn btn-primary" href="{{route('booking.index')}}" role="button">Back</a>
            @endif
        {{ Form::close() }}


    </div>
@endsection