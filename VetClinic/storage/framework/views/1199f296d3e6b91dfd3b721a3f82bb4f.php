<?php $__env->startSection('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title here'); ?>
<?php $__env->startSection('content'); ?>

<div class="card-box mb-30">
    <div class="table-responsive">
        <h2 class="h4 pd-20">Users</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Clinic Location</th>
                    <th>Created At</th>
                    <th>Action</th>
                    <!-- New column for action buttons -->
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $user_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($items->username); ?></td>
                    <td><?php echo e($items->email); ?></td>
                    <td><?php echo e($items->role); ?></td>
                    <td><?php echo e($items->clinic->name ?? 'N/A'); ?></td>
                    <td><?php echo e($items->created_at); ?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a href="<?php echo e(route('editUser', ['id' => $items->id])); ?>"
                                    class="dropdown-item"><i class="dw dw-edit2"></i> Edit</a>
                                <a href="<?php echo e(route('archiveUser', ['id' => $items->id])); ?>"
                                    class="dropdown-item"><i class="dw dw-delete-3"></i> Archive</a>
                                <a href="<?php echo e(route('getUserDetails', ['id' => $items->id])); ?>"
                                    class="dropdown-item"><i class="dw dw-eye"></i> View Details</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <!-- Add User button -->
    <div class="text-right">
        <a href="<?php echo e(route('addUserForm')); ?>" class="btn btn-primary">Add User</a>
    </div>
</div>

<script>
    function redirectToAddPage(id) {
        // Redirect to the page where you can add a new quantity for a specific item
        window.location.href = "<?php echo e(url('inventory/add')); ?>/" + id;
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('back.layout.main-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\methods\Dental-main\resources\views/usermanagement/usertable.blade.php ENDPATH**/ ?>