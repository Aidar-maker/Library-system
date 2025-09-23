

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Каталог книг</span>
                    <form action="<?php echo e(route('books.index')); ?>" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Поиск по названию или автору..." value="<?php echo e(request('search')); ?>">
                        <button class="btn btn-outline-secondary btn-sm" type="submit">Найти</button>
                    </form>
                </div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($books->isEmpty()): ?>
                        <p class="text-center">Книги не найдены.</p>
                    <?php else: ?>
                        <div class="row">
                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100">
                                        <?php if($book->cover_url): ?>
                                            <img src="<?php echo e($book->cover_url); ?>" class="card-img-top" alt="<?php echo e($book->title); ?>" style="height: 200px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                                <span class="text-muted">Обложка отсутствует</span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title"><?php echo e($book->title); ?></h5>
                                            <p class="card-text"><small class="text-muted">Автор: <?php echo e($book->author); ?></small></p>
                                            <p class="card-text flex-grow-1"><?php echo e(Str::limit($book->description, 100)); ?></p>
                                            <a href="<?php echo e(route('books.show', $book)); ?>" class="btn btn-primary mt-auto">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Пагинация -->
                        <div class="d-flex justify-content-center">
                            <?php echo e($books->links()); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/books/index.blade.php ENDPATH**/ ?>