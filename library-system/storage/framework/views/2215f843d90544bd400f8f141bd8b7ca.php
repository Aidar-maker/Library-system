<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Добро пожаловать в Библиотечную систему</h2>
                </div>
                <div class="card-body">
                    <p class="text-center">
                        Наша система позволяет легко находить книги, отслеживать выдачи и возвращать их вовремя.
                    </p>

                    <!-- Форма поиска -->
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-8">
                            <form action="<?php echo e(route('books.index')); ?>" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Поиск книг по названию или автору..." value="<?php echo e(request('search')); ?>">
                                    <button class="btn btn-outline-primary" type="submit">Найти</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Последние добавленные книги -->
                   <?php if($latestBooks && $latestBooks->count() > 0): ?>
                    <h4>Новые поступления</h4>
                    <div class="row">
                        <?php $__currentLoopData = $latestBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-4 col-sm-3">
                                <a href="<?php echo e(route('books.show', $book)); ?>" >
                                <div class="card h-100 shadow-sm border-0">
                                    <!-- Карточка обложки -->
                                    <div class="position-relative" style="max-height: 450px; max-width: 330px">
                                        <!-- Фоновое изображение -->
                                        <?php if($book->cover_url): ?>
                                            <img src="<?php echo e($book->cover_url); ?>" class="w-100 h-100 object-cover" alt="<?php echo e($book->title); ?>">
                                        <?php else: ?>
                                            <!-- Заглушка -->
                                            <div class="w-100 h-100 bg-secondary d-flex align-items-center justify-content-center">
                                                <span class="text-light">Обложка отсутствует</span>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Текстовые слои (автор, название) -->
                                        <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-dark bg-opacity-75 text-white">
                                            <h6 class="card-title fw-bold"><?php echo e($book->title); ?></h6>
                                            <p class="card-text small"><?php echo e($book->author); ?></p>
                                        </div>
                                    </div>

                                    <!-- Тело карточки -->
                                    <div class="card-body d-flex flex-column">
                                        <a href="<?php echo e(route('books.show', $book)); ?>" class="p btn btn-primary mt-auto">Подробнее</a>
                                    </div>
                                </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <p class="text-center">Нет новых поступлений.</p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/home.blade.php ENDPATH**/ ?>