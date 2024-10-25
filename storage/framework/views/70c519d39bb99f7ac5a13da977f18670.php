<?php $__env->startSection('content'); ?>
<div class="Jumbotron py-4 px-5">

    <?php if(Session::get('failed')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('failed')); ?></div>
    <?php endif; ?>

    <?php if(Session::get('login')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('login')); ?></div>
    <?php endif; ?>

    <h1 class="display-4">
        Selamat Datang!
    </h1>
    <p>Aplikasi ini hanya bisa digunakan oleh pegawai administrator PERPUSTAKAAN SA</p>
    <hr class="my-4">
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\perpus-aisah\resources\views\home\home.blade.php ENDPATH**/ ?>