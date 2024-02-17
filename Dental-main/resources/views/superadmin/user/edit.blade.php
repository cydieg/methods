<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Add any necessary CSS stylesheets here -->
</head>
<body>
    <h1>Edit User</h1>

    <form action="{{ route('superadmin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{ $user->username }}" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        <br>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="{{ $user->firstName }}">
        <br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="{{ $user->lastName }}">
        <br>

        <label for="middleName">Middle Name:</label>
        <input type="text" id="middleName" name="middleName" value="{{ $user->middleName }}">
        <br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ $user->address }}">
        <br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male" @if($user->gender == 'male') selected @endif>Male</option>
            <option value="female" @if($user->gender == 'female') selected @endif>Female</option>
        </select>
        <br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="{{ $user->age }}">
        <br>

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
            <option value="patient" @if($user->role == 'patient') selected @endif>Patient</option>
            <option value="staff" @if($user->role == 'staff') selected @endif>Staff</option>
            <option value="super_admin" @if($user->role == 'super_admin') selected @endif>Super Admin</option>
        </select>
        <br>

        <!-- Add other fields for editing user data -->

        <button type="submit">Update User</button>
    </form>
</body>
</html>
