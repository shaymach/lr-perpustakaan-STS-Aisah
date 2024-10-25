

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('akun.edit.formulir', $users['id'])); ?>" method="POST" class="card p-5">
        
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <?php if(Session::get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(Session::get('success')); ?></div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($errors); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($users['name']); ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="<?php echo e($users['email']); ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" value="<?php echo e($users['password']); ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Role:</label>
            <div class="col-sm-10">
                <select class="form-select" id="role" name="role">
                    <option selected disabled hidden>Pilih</option>
                    <option value="admin" <?php echo e(old('role') == 'admin' ? 'selected' : ''); ?>>Admin</option>
                    <option value="user" <?php echo e(old('role') == 'user' ? 'selected' : ''); ?>>User</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Tambah Data</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\perpus-aisah\resources\views\user\edit.blade.php ENDPATH**/ ?>