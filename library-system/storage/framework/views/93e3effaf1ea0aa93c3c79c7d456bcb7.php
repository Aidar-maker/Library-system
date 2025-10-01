<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Отчеты</div>

                <div class="card-body">
                    <ul>
                        <li><a href="<?php echo e(route('admin.reports.popular_books')); ?>">ТОП-10 популярных книг</a></li>
                        <li><a href="<?php echo e(route('admin.reports.debtors')); ?>">Список должников</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/admin/reports/index.blade.php ENDPATH**/ ?>