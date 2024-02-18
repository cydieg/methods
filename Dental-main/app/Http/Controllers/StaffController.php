<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        try {
            // Get the authenticated user
            $user = Auth::user();
    
            // Retrieve appointments for the designated clinic only
            $pendingAppointments = Appointment::where('status', 'pending')
                ->whereHas('clinic', function ($query) use ($user) {
                    $query->where('id', $user->clinic_id); // Assuming clinic_id is the foreign key in appointments table
                })
                ->get();
    
            return view('staff.staff', compact('pendingAppointments'));
        } catch (\Exception $e) {
            // Log or handle the exception
            return back()->with('error', 'An error occurred while retrieving appointments.');
        }
    }

    public function completeAppointment(Appointment $appointment)
    {
        try {
            $appointment->update(['status' => 'completed']);

            // Send email notification
            Mail::to($appointment->user->email)->send(new AppointmentCompleted($appointment));

            return redirect()->route('staff')->with('success', 'Appointment completed successfully');
        } catch (\Exception $e) {
            // Log or handle the exception
            return back()->with('error', 'An error occurred while completing the appointment.');
        }
    }

    public function homeStaff()
    {
        return view('staff.homeStaff');
    }
}
