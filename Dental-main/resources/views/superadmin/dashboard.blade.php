<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <!-- Add your CSS or any other meta tags here -->
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Super Admin Dashboard</div>

                    <div class="card-body">
                        Welcome, Super Admin! This is your dashboard.
                        <!-- Add your super admin dashboard content here -->
                        <form action="{{ route('super_admin.logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add your scripts or any other HTML content here -->
</body>
</html>