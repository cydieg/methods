<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here'); ?>
<?php $__env->startSection('content'); ?>

<div class="card-box mb-30">
    <div class="table-responsive">
        <h2 class="h4 pd-20">Edit Clinic</h2>

        <!-- Form for editing clinic data -->
        <form action="<?php echo e(route('clinic.update', $clinic->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($clinic->name); ?>">
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo e($clinic->location); ?>">
            </div>

            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo e($clinic->contact); ?>">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo e($clinic->status); ?>">
            </div>

            <div class="form-group">
                <label for="doctor_name">Doctor Name:</label>
                <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php echo e($clinic->doctor_name); ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update Clinic</button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.superadmin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/clinics/edit.blade.php ENDPATH**/ ?>