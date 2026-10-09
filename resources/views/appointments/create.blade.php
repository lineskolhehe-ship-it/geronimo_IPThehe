<h1>Add Appointment</h1>

<form action="{{ route('appointments.store') }}" method="POST">
    @csrf

    <label>Patient:</label>

    <select name="patient_id">
        <option value="">Select Patient</option>

        @foreach($patients as $patient)
            <option value="{{ $patient->id }}">
                {{ $patient->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Date:</label>
    <input type="date" name="appointment_date">

    <br><br>

    <label>Time:</label>
    <input type="time" name="appointment_time">

    <br><br>

    <label>Reason:</label>
    <input type="text" name="reason">

    <br><br>

    <label>Status:</label>

    <select name="status">
        <option value="Pending">Pending</option>
        <option value="Confirmed">Confirmed</option>
        <option value="Completed">Completed</option>
        <option value="Cancelled">Cancelled</option>
    </select>

    <br><br>

    <button type="submit">
        Save Appointment
    </button>
</form>

<br>

<a href="{{ route('appointments.index') }}">Back</a>