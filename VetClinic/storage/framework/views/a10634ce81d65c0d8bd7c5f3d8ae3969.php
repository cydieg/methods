

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accepted Appointments</title>
    <!-- Add your CSS links here -->
</head>
<body>
    <div class="container">
        <h1>Accepted Appointments</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $acceptedAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($appointment->id); ?></td>
                        <td><?php echo e($appointment->user->firstName); ?> <?php echo e($appointment->user->lastName); ?></td>
                        <td><?php echo e($appointment->appointment_date); ?></td>
                        <td><?php echo e($appointment->appointment_time); ?></td>
                        <td><?php echo e($appointment->status); ?></td>
                        <td>
                            <?php if($appointment->status === 'accepted'): ?>
                                <form method="POST" action="<?php echo e(route('complete.appointment', $appointment)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit">Completed</button>
                                </form>
                                <form method="POST" action="<?php echo e(route('staff.cancel', $appointment->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?> <!-- Using PUT method for updating -->
                                    <button type="submit">Cancel</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <!-- Add your JavaScript links here -->
</body>
</html>
<?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/staff/acceptedappoint.blade.php ENDPATH**/ ?>