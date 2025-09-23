<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Админ-панель</div>

                <div class="card-body">
                    <h4>Статистика</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            Всего книг: <strong><?php echo e($stats['total_books']); ?></strong>
                        </li>
                        <li class="list-group-item">
                            Всего пользователей: <strong><?php echo e($stats['total_users']); ?></strong>
                        </li>
                        <li class="list-group-item">
                            Активных выдач: <strong><?php echo e($stats['active_loans']); ?></strong>
                        </li>
                    </ul>

                    <hr>

                    <h4>Управление</h4>
                    <ul>
                        <li><a href="<?php echo e(route('admin.books.index')); ?>">Управление книгами</a></li>
                        <li><a href="<?php echo e(route('admin.users.index')); ?>">Управление пользователями</a></li>
                        <li><a href="<?php echo e(route('admin.reports.index')); ?>">Отчеты</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>