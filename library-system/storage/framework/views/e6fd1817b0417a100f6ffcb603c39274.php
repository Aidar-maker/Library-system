<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>ТОП-10 популярных книг</span>
                    <a href="<?php echo e(route('admin.reports.index')); ?>" class="btn btn-secondary btn-sm">Назад</a>
                </div>

                <div class="card-body">
                    <?php if($popularBooks->isEmpty()): ?>
                        <p>Нет данных для отчета.</p>
                    <?php else: ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Автор</th>
                                    <th>Количество выдач</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $popularBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($index + 1); ?></td>
                                        <td><?php echo e($book->title); ?></td>
                                        <td><?php echo e($book->author); ?></td>
                                        <td><?php echo e($book->loans_count); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/admin/reports/popular_books.blade.php ENDPATH**/ ?>