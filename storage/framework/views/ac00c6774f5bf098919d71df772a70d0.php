<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Buku
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Terjadi kesalahan!<br><br>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('buku.update', $book->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?> <!-- Menggunakan PUT untuk update -->
                    
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" name="judul" class="form-control" value="<?php echo e(old('judul', $book->judul)); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="penulis">Penulis:</label>
                        <input type="text" name="penulis" class="form-control" value="<?php echo e(old('penulis', $book->penulis)); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="penerbit">Penerbit:</label>
                        <input type="text" name="penerbit" class="form-control" value="<?php echo e(old('penerbit', $book->penerbit)); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\perpus-aisah\resources\views/buku/edit.blade.php ENDPATH**/ ?>