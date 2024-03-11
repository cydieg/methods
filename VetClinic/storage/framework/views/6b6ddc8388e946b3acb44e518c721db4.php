<!-- resources/views/create_clinic.blade.php -->


<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here'); ?>
<?php $__env->startSection('content'); ?>

<!DOCTYPE html>
<html lang="en">

<!-- ... (your existing code) ... -->

<body>
    <div class="card-box mb-30">
        <h2 class="h4 pd-20">Create Clinic</h2>
        <div class="table-responsive">
            <div class="card-body">
                <form action="<?php echo e(route('clinic.create')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name Of Clinic</label>
                            <input type="text" class="form-control" name="name" placeholder="Clinic Name" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Clinic Location" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" name="contact" placeholder="Contact Number" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="submit" class="btn btn-primary btn-block" value="Create Clinic">
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Button to view clinics -->
                <div class="text-left">
                    <div class="form-group col-md-6">
                        <a href="<?php echo e(route('clinic.view')); ?>" class="btn btn-primary btn-block">View Clinics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/create_clinic.blade.php ENDPATH**/ ?>