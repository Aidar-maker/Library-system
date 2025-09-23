

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Детали книги</span>
                    <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary btn-sm">Назад к каталогу</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <?php if($book->cover_url): ?>
                                <img src="<?php echo e($book->cover_url); ?>" alt="<?php echo e($book->title); ?>" class="img-fluid rounded">
                            <?php else: ?>
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <span class="text-muted">Обложка отсутствует</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <h2><?php echo e($book->title); ?></h2>
                            <p class="lead">Автор: <?php echo e($book->author); ?></p>
                            <p><strong>ISBN:</strong> <?php echo e($book->isbn); ?></p>
                            <p><strong>Год издания:</strong> <?php echo e($book->year); ?></p>
                            <p><strong>Жанр:</strong> <?php echo e($book->genre); ?></p>
                            <p><strong>Статус:</strong>
                                <?php if($book->is_available): ?>
                                    <span class="badge bg-success">Доступна</span>
                                <?php else: ?>
                                    <span class="badge bg-warning">Занята</span>
                                <?php endif; ?>
                            </p>
                            <?php if($book->description): ?>
                                <p><strong>Описание:</strong></p>
                                <p><?php echo e($book->description); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/books/show.blade.php ENDPATH**/ ?>