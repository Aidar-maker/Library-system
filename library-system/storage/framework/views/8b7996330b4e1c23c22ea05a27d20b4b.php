<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Результаты поиска: "<?php echo e($query); ?>"</div>

                <div class="card-body">
                    <?php if($books->isEmpty()): ?>
                        <p>Книги не найдены.</p>
                    <?php else: ?>
                        <ul class="list-group">
                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <strong><?php echo e($book->title); ?></strong> — <?php echo e($book->author); ?>

                                    <br>
                                    <small><?php echo e($book->year); ?> г., <?php echo e($book->genre); ?></small>
                                    <br>
                                    <a href="<?php echo e(route('books.show', $book)); ?>" class="btn btn-sm btn-outline-primary">Подробнее</a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/search/results.blade.php ENDPATH**/ ?>