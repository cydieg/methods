<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here'); ?>

<?php $__env->startSection('content'); ?>

<div>
    <h2> Staff Dashboard </h2>
</div>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="card-body">
                    <p>Welcome, <?php echo e(auth()->user()->name); ?>!</p>
                    <!-- Add more content as needed -->

                    <h2>Pending Appointments</h2>
                    <?php if(count($pendingAppointments) > 0): ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pendingAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($appointment->first_name); ?> <?php echo e($appointment->last_name); ?></td>
                                    <td><?php echo e($appointment->appointment_date); ?></td>
                                    <td><?php echo e($appointment->appointment_time); ?></td>
                                    <td>
                                        <form method="POST" action="<?php echo e(route('accept.appointment', $appointment)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-success">Accept Appointment</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p>No pending appointments found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add any additional scripts or footer content here -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.cashier-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/staff/staff.blade.php ENDPATH**/ ?>