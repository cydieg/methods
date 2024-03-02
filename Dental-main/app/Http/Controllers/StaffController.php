<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentCompleted;

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
                    $query->where('id', $user->clinic_id);
                })
                ->get();

            // Filter out completed appointments
            $pendingAppointments = $pendingAppointments->reject(function ($appointment) {
                return $appointment->status === 'completed';
            });

            return view('staff.staff', compact('pendingAppointments'));
        } catch (\Exception $e) {
            // Log or handle the exception
            return back()->with('error', 'An error occurred while retrieving appointments.');
        }
    }

    public function completeAppointment(Appointment $appointment)
{
    try {
        // Send email notification
        Mail::to($appointment->user->email)->send(new AppointmentCompleted($appointment));

        // Update appointment status to 'accepted'
        $appointment->update(['status' => 'accepted']);

        // Redirect with success message
        return redirect()->route('staff')->with('success', 'Appointment accepted successfully');
    } catch (\Exception $e) {
        // Log or handle the exception
        return back()->with('error', 'An error occurred while accepting the appointment.');
    }
}
    public function homeStaff()
    {
        return view('staff.homeStaff');
    }
}
