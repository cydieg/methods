@extends('back.layout.ecom-layout')

@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Make an Appointment')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an Appointment</title>

    <style>
        form {
            max-width: 400px;
            margin: auto;
        }

        button {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div>
        <form action="{{ route('appointments.store') }}" method="post" class="bg-light p-4 rounded">
            @csrf
            <h2 class="text-center">Make an Appointment</h2>

            <!-- Display success or error message -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="appointment_date">Appointment Date:</label>
                <input type="date" name="appointment_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="appointment_time">Appointment Time:</label>
                <input type="time" name="appointment_time" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-info btn-block">Make Appointment</button>
        </form>
    </div>
</body>
</html>
@endsection
