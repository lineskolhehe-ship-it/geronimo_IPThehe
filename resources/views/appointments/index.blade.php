<h1>Appointments</h1>

<a href="{{ route('appointments.create') }}">
    Add Appointment
</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Patient</th>
        <th>Date</th>
        <th>Time</th>
        <th>Reason</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    @foreach($appointments as $appointment)
        <tr>
            <td>{{ $appointment->id }}</td>
            <td>{{ $appointment->patient->name }}</td>
            <td>{{ $appointment->appointment_date }}</td>
            <td>{{ $appointment->appointment_time }}</td>
            <td>{{ $appointment->reason }}</td>
            <td>{{ $appointment->status }}</td>

            <td>
                <a href="{{ route('appointments.edit', $appointment) }}">
                    Edit
                </a>

                <form action="{{ route('appointments.destroy', $appointment) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<br>

<a href="{{ route('patients.index') }}">
    Patients
</a>