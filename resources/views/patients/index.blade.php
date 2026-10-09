<h1>Patients</h1>

<a href="{{ route('patients.create') }}">Add Patient</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Birthdate</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>

    @foreach($patients as $patient)
        <tr>
            <td>{{ $patient->id }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->phone }}</td>
            <td>{{ $patient->birthdate }}</td>
            <td>{{ $patient->address }}</td>
            <td>
                <a href="{{ route('patients.edit', $patient) }}">
                    Edit
                </a>

                <form action="{{ route('patients.destroy', $patient) }}"
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

<a href="{{ route('appointments.index') }}">
    Appointments
</a>