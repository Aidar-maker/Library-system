

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Каталог книг</span>
                    <!-- Форма фильтрации -->
                    <form action="<?php echo e(route('books.index')); ?>" method="GET" class="d-flex flex-wrap gap-2">
                        <!-- Поиск -->
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Поиск..." value="<?php echo e(request('search')); ?>">
                        </div>

                        <!-- Фильтр по жанру -->
                        <select name="genre" class="form-select form-select-sm">
                            <option value="">Все жанры</option>
                            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genreOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($genreOption); ?>" <?php echo e(request('genre') == $genreOption ? 'selected' : ''); ?>>
                                    <?php echo e($genreOption); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <!-- Фильтр по статусу -->
                        <select name="status" class="form-select form-select-sm">
                            <option value="">Все статусы</option>
                            <option value="available" <?php echo e(request('status') == 'available' ? 'selected' : ''); ?>>Доступна</option>
                            <option value="not_available" <?php echo e(request('status') == 'not_available' ? 'selected' : ''); ?>>Занята</option>
                        </select>

                        <!-- Фильтр по году "от" -->
                        <input type="number" name="year_from" class="form-control form-control-sm" placeholder="Год от" min="1000" max="<?php echo e(date('Y')); ?>" value="<?php echo e(request('year_from')); ?>" style="width: 100px;">

                        <!-- Фильтр по году "до" -->
                        <input type="number" name="year_to" class="form-control form-control-sm" placeholder="Год до" min="1000" max="<?php echo e(date('Y')); ?>" value="<?php echo e(request('year_to')); ?>" style="width: 100px;">

                        <button class="btn btn-outline-secondary btn-sm" type="submit">Применить</button>
                        <!-- Кнопка сброса фильтров -->
                        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-outline-warning btn-sm">Сбросить</a>
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