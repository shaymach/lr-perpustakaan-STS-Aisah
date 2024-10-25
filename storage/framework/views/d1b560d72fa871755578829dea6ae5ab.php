

<?php $__env->startSection('content'); ?>
    <?php if(Session::get('success')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
    <?php endif; ?>

    <div class="container h-50">
        <div class="d-flex justify-content-end">
            <a href="<?php echo e(route('akun.tambah')); ?>" class="btn btn-primary me-3">Tambah Akun</a>
            <form class="d-flex" role="search" action="<?php echo e(route('akun.data')); ?>" method="GET">
                <input type="text" class="form-control me-2" placeholder="Search Data" aria-label="Search" name="search_name">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>

        <table class="table table-bordered table-stripped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($users) < 1): ?>
                    <tr>
                        <td colspan="5" class="text-center">Data Akun Kosong!</td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1 ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(($users->currentPage() - 1) * $users->perPage() + ($index + 1)); ?></td>
                            <td><?php echo e($item['name']); ?></td>
                            <td><?php echo e($item['email']); ?></td>
                            <td><?php echo e($item['role']); ?></td>
                            <td class="d-flex">
                                <a href="<?php echo e(route('akun.edit', $item['id'])); ?>" class="btn btn-primary me-2">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="showModal('<?php echo e($item->id); ?>', '<?php echo e($item->name); ?>')">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <?php echo e($users->links()); ?>

        </div>

        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="form-delete-akun" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus akun <span id="nama-akun"></span>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                            <button type="submit" class="btn btn-danger" id="confirm-delete">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function showModal(id, name) {
            let urlDelete = '<?php echo e(route('akun.hapus', ':id')); ?>';
            urlDelete = urlDelete.replace(":id", id);
            $('#form-delete-akun').attr('action', urlDelete);
            $('#exampleModal').modal('show');
            $('#nama-akun').text(name);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\perpus-aisah\resources\views\user\data.blade.php ENDPATH**/ ?>