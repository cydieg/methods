<!-- resources/views/view_clinics.blade.php -->


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
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <form style="display: inline-block;" action="<?php echo e(route('clinic.edit.form', ['id' => $clinic->id])); ?>" method="get">
                                                <button class="dropdown-item" type="submit"><i class="dw dw-edit2"></i> Edit</button>
                                            </form>
                                            <form style="display: inline-block;" action="<?php echo e(route('clinic.archive', ['id' => $clinic->id])); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?> <!-- Use DELETE method for delete operation -->
                                                <button class="dropdown-item" type="submit"><i class="dw dw-delete-3"></i> Archive</button>
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

</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/view_clinics.blade.php ENDPATH**/ ?>