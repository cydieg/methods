<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users</title>
    <!-- Add any necessary CSS stylesheets here -->
</head>
<body>
    <h1>List of Users</h1>
    <a href="{{ route('superadmin.user.create') }}" class="btn btn-primary">Create User</a>

    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Role</th>
                <th>Clinic Location</th>
                <th>Created At</th>
                <th>Action</th> <!-- Add the Action column -->
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->firstName }}</td>
                <td>{{ $user->lastName }}</td>
                <td>{{ $user->middleName }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->clinic->name ?? 'N/A' }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{ route('superadmin.user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a>
                    <!-- Add other action buttons here, e.g., delete -->
                </td>
            </tr>
            @endforeach
        </tbody>
        <a href="http://127.0.0.1:8000/super-admin-dashboard" class="btn btn-secondary">Back to Super Admin Dashboard</a>
    </table>
</body>
</html>
