<?php

// app/Http/Controllers/ClientController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\Clinic;


class ClientController extends Controller
{
    public function customer()
    {
        // Get the authenticated user's clinic ID
        $clinicId = Auth::user()->clinic_id;
    
        // Retrieve appointments only for the user's clinic
        $appointments = Auth::user()->appointments()->whereHas('user', function ($query) use ($clinicId) {
            $query->where('clinic_id', $clinicId);
        })->get();
    
        // Retrieve all clinics
        $clinics = Clinic::all();
    
        // No need for redirects here
        return view('client.customer', compact('appointments', 'clinics'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'clinic_id' => 'required|exists:clinics,id', // Add validation for clinic_id
        ]);
    
        // Determine the appointment status based on the button clicked
        $status = $request->input('status', 'pending');
    
        // Create a new appointment with the determined status and clinic ID
        Auth::user()->appointments()->create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'appointment_date' => $request->input('appointment_date'),
            'appointment_time' => $request->input('appointment_time'),
            'clinic_id' => $request->input('clinic_id'), // Add clinic_id
            'user_id' => Auth::id(),
            'status' => $status,
        ]);
    
        // Redirect to the index page with a success message
        return redirect()->route('customer')->with('success', 'Appointment ' . ($status == 'pending' ? 'requested' : 'completed') . ' successfully. Please wait for a notification in your email.');
    }
    
public function home1()
{
    return view('home1');
}

public function about2()
{
    return view('about2');
}

public function dentalClinic2()
{
    return view('dentalClinic2');
}
}
