<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Make an Appointment'); ?>

<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an Appointment</title>
    <style>
        form {
            max-width: 400px;
            margin: auto;
        }
        button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div>
        <form action="<?php echo e(route('appointments.store')); ?>" method="post" class="bg-light p-4 rounded">
            <?php echo csrf_field(); ?>
            <h2 class="text-center">Make an Appointment</h2>

            <!-- Display success or error message -->
            <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('success')); ?>

                    <?php if(session('status') == 'pending'): ?>
                        Please wait for a notification in your email.
                    <?php endif; ?>
                </div>
            <?php elseif(session('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="appointment_date">Appointment Date:</label>
                <input type="date" name="appointment_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="appointment_time">Appointment Time:</label>
                <select name="appointment_time" class="form-control" required>
                    <option value="08:00">8:00 AM - 9:00 AM</option>
                    <option value="09:00">9:00 AM - 10:00 AM</option>
                    <option value="10:00">10:00 AM - 11:00 AM</option>
                    <option value="11:00">11:00 AM - 12:00 PM</option>
                    <option value="13:00">1:00 PM - 2:00 PM</option>
                    <option value="15:00">3:00 PM - 4:00 PM</option>
                    <option value="17:00">5:00 PM - 6:00 PM</option>
                </select>
            </div>

            <div class="form-group">
                <label for="clinic_id">Select Clinic:</label>
                <select name="clinic_id" class="form-control" required>
                    <?php $__currentLoopData = $clinics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($clinic->id); ?>"><?php echo e($clinic->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <button type="submit" class="btn btn-info btn-block">Request  Appointment</button>
        </form>
    </div>
</body>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.ecom-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/client/customer.blade.php ENDPATH**/ ?>