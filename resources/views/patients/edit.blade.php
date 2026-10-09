<h1>Edit Patient</h1>

<form action="{{ route('patients.update', $patient) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ $patient->name }}">

    <br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $patient->email }}">

    <br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $patient->phone }}">

    <br><br>

    <label>Birthdate:</label>
    <input type="date" name="birthdate" value="{{ $patient->birthdate }}">

    <br><br>

    <label>Address:</label>
    <input type="text" name="address" value="{{ $patient->address }}">

    <br><br>

    <button type="submit">Update Patient</button>
</form>

<br>

<a href="{{ route('patients.index') }}">Back</a>