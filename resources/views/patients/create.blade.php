<h1>Add Patient</h1>

<form action="{{ route('patients.store') }}" method="POST">
    @csrf

    <label>Name:</label>
    <input type="text" name="name">

    <br><br>

    <label>Email:</label>
    <input type="email" name="email">

    <br><br>

    <label>Phone:</label>
    <input type="text" name="phone">

    <br><br>

    <label>Birthdate:</label>
    <input type="date" name="birthdate">

    <br><br>

    <label>Address:</label>
    <input type="text" name="address">

    <br><br>

    <button type="submit">Save Patient</button>
</form>

<br>

<a href="{{ route('patients.index') }}">Back</a>