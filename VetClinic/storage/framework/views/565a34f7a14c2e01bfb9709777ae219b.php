<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here'); ?>
<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Appointments</title>
    
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>

    <!-- Add any additional head elements such as stylesheets or scripts here -->
</head>

<body>

    <div class="container">
        <br>
        <h2>Completed Appointments</h2>
        <br>
    </div>
    <div class="container">
        <table id="customers">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
            <?php $__currentLoopData = $completedAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($appointment->first_name); ?></td>
                    <td><?php echo e($appointment->last_name); ?></td>
                    <td><?php echo e($appointment->appointment_date); ?></td>
                    <td><?php echo e($appointment->appointment_time); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <!-- Add any additional scripts or footer content here -->
</body>

</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/appointment/completed.blade.php ENDPATH**/ ?>