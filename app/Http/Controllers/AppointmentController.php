<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('patient')->latest()->get();

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();

        return view('appointments.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'reason' => 'nullable',
            'status' => 'required',
        ]);

        Appointment::create($request->all());

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment added successfully.');
    }

    public function show(Appointment $appointment)
    {
        $appointment->load('patient');

        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();

        return view('appointments.edit', compact('appointment', 'patients'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'reason' => 'nullable',
            'status' => 'required',
        ]);

        $appointment->update($request->all());

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}