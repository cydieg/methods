<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
    <!-- Add any necessary CSS stylesheets here -->
</head>
<body>
    <h1>Create New User</h1>

    <form action="{{ route('superadmin.user.store') }}" method="POST">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName">
        <br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName">
        <br>

        <label for="middleName">Middle Name:</label>
        <input type="text" id="middleName" name="middleName">
        <br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        <br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age">
        <br>

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="admin">Admin</option>
            <option value="patient">Patient</option>
            <option value="staff">Staff</option>
            <option value="super_admin">Super Admin</option> <!-- Add Super Admin option -->
        </select>
        <br>

        <!-- Add other fields as needed -->

        <button type="submit">Submit</button>
    </form>
</body>
</html>
