<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-left">
                <h2>Data Buku</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-success" href="<?php echo e(route('buku.create')); ?>">Tambah Buku</a>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><p><?php echo e($message); ?></p></strong>
        </div>
    <?php endif; ?>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($no++); ?></td>
                    <td><?php echo e($item->judul); ?></td>
                    <td><?php echo e($item->penulis); ?></td>
                    <td><?php echo e($item->penerbit); ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo e(route('buku.edit', $item->id)); ?>">Edit</a>
                        <form action="<?php echo e(route('buku.destroy', $books->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?> <!-- Pastikan menggunakan DELETE -->
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\perpus-aisah\resources\views\buku\index.blade.php ENDPATH**/ ?>