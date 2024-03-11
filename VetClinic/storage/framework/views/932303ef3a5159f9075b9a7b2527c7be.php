<!-- resources/views/edit_clinic.blade.php -->


<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here'); ?>
<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Clinic</title>
    <style>
        /* ... (your existing styles) ... */
    </style>
</head>
<body>

    <div class="card-box mb-30">
        <div class="table-responsive">
            <h2 class="h4 pd-20">Edit Clinic</h2>
            <div class="card-body">

                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>

                <!-- Check for error message -->
                <?php if(Session::has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(Session::get('error')); ?>

                    </div>
                <?php endif; ?>

                <?php if(isset($clinic)): ?>
                    <!-- Your edit form goes here -->
                    <form action="<?php echo e(route('clinic.update', ['id' => $clinic->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>

                        <!-- Your form fields go here, pre-filled with clinic data -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($clinic->name); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" name="location" value="<?php echo e($clinic->location); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="contact">Contact Number:</label>
                            <input type="text" class="form-control" name="contact" value="<?php echo e($clinic->contact); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status" required>
                                <option value="Active" <?php echo e($clinic->status == 'Active' ? 'selected' : ''); ?>>Active</option>
                                <option value="Inactive" <?php echo e($clinic->status == 'Inactive' ? 'selected' : ''); ?>>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Update Clinic</button>
                    </form>
                <?php else: ?>
                    <p>No clinic data found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/edit_clinic.blade.php ENDPATH**/ ?>