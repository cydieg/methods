<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here'); ?>
<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if(isset($user)): ?>
<!-- Your edit form goes here -->
<div class="card-box mb-30">
    <h2 class="h2 pd-20">Edit User</h2>
    <div class="table-responsive">
        <div class="card-body">
            <form action="<?php echo e(route('updateUser', ['id' => $user->id])); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('post'); ?>

                <!-- Your form fields go here, pre-filled with user data -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" value="<?php echo e($user->username); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password (Leave blank to keep current):</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" name="firstName" value="<?php echo e($user->firstName); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" name="lastName" value="<?php echo e($user->lastName); ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="middleName">Middle Name:</label>
                            <input type="text" name="middleName" value="<?php echo e($user->middleName); ?>" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" value="<?php echo e($user->address); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" class="form-control" required>
                                <option value="" disabled>Select Gender</option>
                                <option value="male" <?php echo e($user->gender === 'male' ? 'selected' : ''); ?>>Male</option>
                                <option value="female" <?php echo e($user->gender === 'female' ? 'selected' : ''); ?>>Female</option>
                                <!-- Add more gender options if needed -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" name="age" value="<?php echo e($user->age); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select name="role" class="form-control" required>
                                <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>Admin</option>
                                <option value="client" <?php echo e($user->role === 'client' ? 'selected' : ''); ?>>Client</option>
                                <option value="cashier" <?php echo e($user->role === 'cashier' ? 'selected' : ''); ?>>Cashier</option>
                                <!-- Add more role options if needed -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="Update User" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
<?php else: ?>
<p>No user data found.</p>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/usermanagement/edituser.blade.php ENDPATH**/ ?>