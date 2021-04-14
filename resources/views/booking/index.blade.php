<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .create-button{
            float: right;
        }
        .table-content{
            margin-top: 70px;
        }
    </style>
</head>
<body>
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
</body>

<script>
    
    $(document).ready(function () {
        $('.delete-action').click(function (e) {
            if (confirm('Are you sure?')) {
                $(this).siblings('form').submit();
            }

            return false;
        });

        $('.confirm-action').click(function (e) {
            var booking = $(this).attr('data-booking');

            $.ajax({
                type:'POST',
                url:'/booking/confirm',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success:function(data){
                    alert(data);
                }
            });
        });

    });
</script>
</html>

