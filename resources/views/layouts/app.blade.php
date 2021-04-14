<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dj Valeting</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
    @yield('content')
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

