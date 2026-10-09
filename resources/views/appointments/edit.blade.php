<h1>Edit Appointment</h1>

<form action="{{ route('appointments.update', $appointment) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Patient:</label>

    <select name="patient_id">
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}"
                {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                {{ $patient->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Date:</label>
    <input type="date"
           name="appointment_date"
           value="{{ $appointment->appointment_date }}">

    <br><br>

    <label>Time:</label>
    <input type="time"
           name="appointment_time"
           value="{{ $appointment->appointment_time }}">

    <br><br>

    <label>Reason:</label>
    <input type="text"
           name="reason"
           value="{{ $appointment->reason }}">

    <br><br>

    <label>Status:</label>

    <select name="status">
        <option value="Pending"
            {{ $appointment->status == 'Pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option value="Confirmed"
            {{ $appointment->status == 'Confirmed' ? 'selected' : '' }}>
            Confirmed
        </option>

        <option value="Completed"
            {{ $appointment->status == 'Completed' ? 'selected' : '' }}>
            Completed
        </option>

        <option value="Cancelled"
            {{ $appointment->status == 'Cancelled' ? 'selected' : '' }}>
            Cancelled
        </option>
    </select>

    <br><br>

    <button type="submit">
        Update Appointment
    </button>
</form>

<br>

<a href="{{ route('appointments.index') }}">Back</a>