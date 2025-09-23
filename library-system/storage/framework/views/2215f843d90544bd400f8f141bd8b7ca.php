<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Библиотечная система</div>

                <div class="card-body">
                    <p>Добро пожаловать в систему управления библиотекой!</p>
                    <p>Здесь вы можете найти книги, оформить выдачу и отслеживать свои штрафы.</p>

                    <!-- Форма поиска -->
                    <form action="<?php echo e(route('home.search')); ?>" method="GET" class="mt-4">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Поиск по названию или автору..." required>
                            <button class="btn btn-primary" type="submit">Найти</button>
                        </div>
                    </form>

                    <!-- Кнопки навигации -->
                    <?php if(auth()->guard()->guest()): ?>
                        <div class="mt-4">
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-secondary">Войти</a>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-primary">Зарегистрироваться</a>
                        </div>
                    <?php else: ?>
                        <div class="mt-4">
                            <a href="<?php echo e(route('books.index')); ?>" class="btn btn-outline-info">Каталог книг</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/home.blade.php ENDPATH**/ ?>