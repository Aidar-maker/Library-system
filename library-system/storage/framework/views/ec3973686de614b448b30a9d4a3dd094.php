<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Детали книги</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <?php if($book->cover_url): ?>
                                <img src="<?php echo e($book->cover_url); ?>" alt="Обложка" class="img-fluid">
                            <?php else: ?>
                                <p>Обложка отсутствует</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <h3><?php echo e($book->title); ?></h3>
                            <p><strong>Автор:</strong> <?php echo e($book->author); ?></p>
                            <p><strong>ISBN:</strong> <?php echo e($book->isbn); ?></p>
                            <p><strong>Год:</strong> <?php echo e($book->year); ?></p>
                            <p><strong>Жанр:</strong> <?php echo e($book->genre); ?></p>
                            <p><strong>Описание:</strong> <?php echo e($book->description ?? 'Нет описания'); ?></p>
                            <p><strong>Доступна:</strong> <?php echo e($book->is_available ? 'Да' : 'Нет'); ?></p>
                        </div>
                    </div>

                    <hr>
                    <?php if(Auth::check() && Auth::user()->is_admin): ?>
                        <a href="<?php echo e(route('admin.books.edit', $book)); ?>" class="btn btn-warning">Редактировать</a>
                        <a href="<?php echo e(route('admin.books.index')); ?>" class="btn btn-secondary">Назад</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zigan\Library-system\library-system\resources\views/admin/books/show.blade.php ENDPATH**/ ?>