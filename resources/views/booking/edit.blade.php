<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h3>EDIT</h3>
    <br>
        
    {{Form::open(array('url' => route('booking.update', $booking->id)))}}
    {{-- {{Form::open(array('url' => route('booking.update', $booking->id), 'method' => 'PUT', 'class'=>'col-md-12')) }} --}}
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$booking->name ?? null}}">
        </div>
        <div class="form-group">
            <label for="booking_date">Booking Date</label>
            <input type="date" class="form-control" id="booking_date" name="booking_date" placeholder="Booking Date" value="{{$booking->booking_date ?? null}}" >
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
            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" value="{{$booking->contact_number ?? null}}">
        </div>
        <div class="form-group">
            <label for="email_address">Email address</label>
            <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email" value="{{$booking->email_address ?? null}}">
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
        <a class="btn btn-primary" href="{{route('booking.index')}}" role="button">Back</a>

      {{ Form::close() }}


    {{-- <a href="{{route('booking.index')}}">Back</a> --}}
</div>

</body>
</html>