<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Buku
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Input kembali.<br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <form method="POST" action="<?php echo e(route('buku.store')); ?>" id="myForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="judul" class="form-control" id="title" placeholder="Masukkan Judul Buku" required>
                    </div>
                    <div class="form-group">
                        <label for="writer">Penulis</label>
                        <input type="text" name="penulis" class="form-control" id="writer" placeholder="Masukkan Nama Penulis" required>
                    </div>
                    <div class="form-group">
                        <label for="publisher">Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="publisher" placeholder="Masukkan Nama Penerbit" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\perpus-aisah\resources\views\buku\create.blade.php ENDPATH**/ ?>