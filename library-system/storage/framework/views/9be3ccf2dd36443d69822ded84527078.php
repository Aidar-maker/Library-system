

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Возврат книги</span>
                </div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($activeLoans->isEmpty()): ?>
                        <p>Нет активных выдач.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Читатель</th>
                                        <th>Книга</th>
                                        <th>Дата выдачи</th>
                                        <th>Срок возврата</th>
                                        <th>Дней до возврата</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $activeLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loan->user->name); ?></td>
                                            <td><?php echo e($loan->book->title); ?></td>
                                            <td><?php echo e($loan->issued_at->format('d.m.Y')); ?></td>
                                            <td><?php echo e($loan->due_at->format('d.m.Y')); ?></td>
                                            <td>
                                                <?php if($loan->due_at->isPast()): ?>
                                                    <span class="text-danger"><?php echo e($loan->due_at->diffInDays(now())); ?> дней просрочки</span>
                                                <?php else: ?>
                                                    <?php echo e($loan->due_at->diffInDays(now())); ?> дней
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('admin.loans.return', $loan)); ?>" method="POST" style="display:inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Подтвердить возврат книги?')">Принять возврат</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/admin/loans/return_index.blade.php ENDPATH**/ ?>