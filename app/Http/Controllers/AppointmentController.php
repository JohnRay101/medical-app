<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\User;;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $appointmentCount = Appointment::count();
    $appointments = Appointment::all();
    return view('appointments.index', compact('appointments', 'appointmentCount'));
}


    public function create()
    {
        $doctors = User::where('type', 'doctor')->get();
        return view('appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'doctor_id' => 'required',
            'appointment_datetime' => 'required|date',
            'type' => 'required',
            'reason' => 'required',
        ]);

        // Create a new Appointment instance and populate it with the validated data
        $appointment = new Appointment();
        $appointment->patient_id = auth()->user()->id; // Set patient_id to the ID of the currently logged-in user
        $appointment->doctor_id = $validatedData['doctor_id'];
        $appointment->appointment_datetime = $validatedData['appointment_datetime'];
        $appointment->type = $validatedData['type'];
        $appointment->reason = $validatedData['reason'];
        
        // Get the name of the patient and doctor using eager loading
        $patientName = User::where('id', $appointment->patient_id)->first()->name;
        $doctorName = User::where('id', $appointment->doctor_id)->first()->name;

        // Save the appointment to the database
        $appointment->save();

        // Redirect back to the appointments list or show a success message
        if (auth()->user()->type === 'user') {
            return redirect()->route('home')->with('success', "Appointment added successfully for Patient: $patientName, Doctor: $doctorName");
        } elseif (auth()->user()->type === 'doctor') {
            return redirect()->route('doctor.home')->with('success', "Appointment added successfully for Patient: $patientName, Doctor: $doctorName");
        } elseif (auth()->user()->type === 'admin') {
            return redirect()->route('admin.home')->with('success', "Appointment added successfully for Patient: $patientName, Doctor: $doctorName");
        }
    }


    public function show(Appointment $appointment)
    {
        $user = Auth::user();
        if ($user->id !== $appointment->patient_id && $user->id !== $appointment->doctor_id) {
            return redirect()->route('appointments.index')->with('error', 'Unauthorized action.');
        }

        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $user = Auth::user();
        if ($user->id !== $appointment->patient_id && $user->id !== $appointment->doctor_id) {
            return redirect()->route('appointments.index')->with('error', 'Unauthorized action.');
        }

        return view('appointments.edit', compact('appointment'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $user = Auth::user();
        if ($user->id !== $appointment->patient_id && $user->id !== $appointment->doctor_id) {
            return redirect()->route('appointments.index')->with('error', 'Unauthorized action.');
        }

        $appointment->update($request->validated());
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        $user = Auth::user();
        if ($user->id !== $appointment->patient_id && $user->id !== $appointment->doctor_id) {
            return redirect()->route('appointments.index')->with('error', 'Unauthorized action.');
        }

        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
