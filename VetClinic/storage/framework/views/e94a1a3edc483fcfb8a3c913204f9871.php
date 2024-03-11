<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here'); ?>
<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Your existing styles remain unchanged */

        /* Add any additional styles here */
        body {
            padding: 20px;
        }

        .h4 {
            padding: 20px;
        }

        .details-container {
            display: flex;
            justify-content: space-between;
        }

        .details-section {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="h4 pd-20">User Details</div>

    <div class="details-container">
        <?php if(isset($user)): ?>
        <div class="details-section">
            <p><strong>Username:</strong> <?php echo e($user->username); ?></p>
            <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
            <p><strong>Created At:</strong> <?php echo e($user->created_at->format('Y-m-d H:i:s')); ?></p>

            <!-- Add more user details if needed -->
            <p><strong>First Name:</strong> <?php echo e($user->firstName); ?></p>
            <p><strong>Last Name:</strong> <?php echo e($user->lastName); ?></p>
            <p><strong>Middle Name:</strong> <?php echo e($user->middleName); ?></p>
        </div>

        <div class="details-section">
            <p><strong>Address:</strong> <?php echo e($user->address); ?></p>
            <p><strong>Gender:</strong> <?php echo e($user->gender); ?></p>
            <p><strong>Age:</strong> <?php echo e($user->age); ?></p>
            <p><strong>Role:</strong> <?php echo e($user->role); ?></p>

            <!-- Display the associated clinic -->
            <p><strong>Branch:</strong> <?php echo e($user->clinic->name); ?></p>
            <div>
                <a href="<?php echo e(route('userTable')); ?>">Go Back to User Table</a>
            </div>
        </div>

        <?php else: ?>
        <p>No user data found.</p>
        <?php endif; ?>
    </div>

    <!-- Include Bootstrap JS at the end of the body for better performance -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/usermanagement/userdetails.blade.php ENDPATH**/ ?>