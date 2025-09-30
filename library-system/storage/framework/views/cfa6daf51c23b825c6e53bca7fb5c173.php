<?php
use Carbon\Carbon;
?>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Список должников</span>
                    <a href="<?php echo e(route('admin.reports.index')); ?>" class="btn btn-secondary btn-sm">Назад</a>
                </div>

                <div class="card-body">
                    <?php if($debtors->isEmpty()): ?>
                        <p>Нет должников.</p>
                    <?php else: ?>
                        <?php $__currentLoopData = $debtors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debtor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <?php echo e($debtor['user']->name); ?> (<?php echo e($debtor['user']->email); ?>)
                                    <span class="badge bg-danger float-end">Общий штраф: <?php echo e(number_format($debtor['total_fine'], 2, ',', ' ')); ?> руб.</span>
                                </div>
                                <div class="card-body">
                                    <h6>Просроченные выдачи:</h6>
                                    <ul>
                                        <?php $__currentLoopData = $debtor['loans']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <strong><?php echo e($loan->book->title); ?></strong> -
                                                Выдана: <?php echo e($loan->issued_at); ?> -
                                                Срок возврата: <?php echo e($loan->due_at); ?> -
                                                Просрочка: <?php echo e($loan->due_at->diffInDays(Carbon::now())); ?> дней -
                                                Штраф: <?php echo e(number_format($loan->fine_amount, 2, ',', ' ')); ?> руб.
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zigan\Library-system\library-system\resources\views/admin/reports/debtors.blade.php ENDPATH**/ ?>