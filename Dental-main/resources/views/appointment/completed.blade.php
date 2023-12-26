@extends('back.layout.main-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Appointments</title>
    
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>

    <!-- Add any additional head elements such as stylesheets or scripts here -->
</head>

<body>

    <div class="container">
        <br>
        <h2>Completed Appointments</h2>
        <br>
    </div>
    <div class="container">
        <table id="customers">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Clinic</th>
                <th>Address</th>
            </tr>
            @foreach($completedAppointments as $appointment)
                <tr>
                    <td>{{ $appointment->first_name }}</td>
                    <td>{{ $appointment->last_name }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->appointment_time }}</td>
                    <td>{{ $appointment->user->age }}</td>
                    <td>{{ $appointment->user->gender }}</td>
                    <td>{{ $appointment->user->clinic->name }}</td>
                    <td>{{ $appointment->user->clinic->location }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <!-- Add any additional scripts or footer content here -->
</body>

</html>
@endsection
