<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here'); ?>
<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Clinics</title>
</head>
<body>
    <div class="card-box mb-30">
        <div class="table-responsive">
            <h2 class="h4 pd-20">View Clinics</h2>

            <!-- Button to go back to /create-clinic -->
            <a href="<?php echo e(route('clinic.create.form')); ?>" class="btn btn-primary mb-3">Add New Clinic</a>

            <?php if(isset($clinics) && count($clinics) > 0): ?>
                <table class="table nowrap">
                    <thead>
                        <tr>     
                            <th>Name</th>
                            <th>Location</th>
                            <th>Contact Number</th>
                            <th>Status</th>
                            <th>Doctor Name</th> <!-- Display Doctor Name -->
                            <th>Action</th> <!-- New column for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $clinics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clinic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="table-plus"><?php echo e($clinic->name); ?></td>
                                <td><?php echo e($clinic->location); ?></td>
                                <td><?php echo e($clinic->contact); ?></td>
                                <td><?php echo e($clinic->status); ?></td>
                                <td><?php echo e($clinic->doctor_name); ?></td> <!-- Display Doctor Name -->
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" type="button" id="dropdownMenuButton<?php echo e($clinic->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="dw dw-more"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton<?php echo e($clinic->id); ?>">
                                            <button class="dropdown-item" type="button" onclick="window.location='<?php echo e(route('clinic.edit', $clinic->id)); ?>'"><i class="dw dw-edit2"></i> Edit</button>

                                            <form method="POST" action="<?php echo e(route('clinic.archive', $clinic->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="dropdown-item"><i class="dw dw-delete-3"></i> Archive</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No clinics found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.superadmin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/clinics/clinicview.blade.php ENDPATH**/ ?>