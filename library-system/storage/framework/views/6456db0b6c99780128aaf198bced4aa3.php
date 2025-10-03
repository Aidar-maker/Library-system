<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <!-- Логотип -->
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <img src="./logo.png" alt="Logo" class="d-inline-block align-text-top me-2">
        </a>

        <!-- Кнопка для мобильных устройств -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Навигационное меню -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Левая часть навигации -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is('/') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>"><?php echo e(__('Главная')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is('books*') ? 'active' : ''); ?>" href="<?php echo e(route('books.index')); ?>"><?php echo e(__('Каталог книг')); ?></a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('profile') ? 'active' : ''); ?>" href="<?php echo e(route('profile.index')); ?>"><?php echo e(__('Личный кабинет')); ?></a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Правая часть навигации -->
            <ul class="navbar-nav ms-auto">
                <!-- Аутентификация -->
                <?php if(auth()->guard()->guest()): ?>
                    <?php if(Route::has('login')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Вход')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Регистрация')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- Профиль пользователя -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?>

                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">
                                <?php echo e(__('Профиль')); ?>

                            </a>

                            <!-- Админ-ссылки -->
                            <?php if(Auth::check() && Auth::user()->is_admin): ?>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Администратор</h6>
                                <a class="dropdown-item" href="<?php echo e(route('admin.dashboard')); ?>">
                                    <?php echo e(__('Админ-панель')); ?>

                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('admin.books.index')); ?>">
                                    <?php echo e(__('Управление книгами')); ?>

                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('admin.loans.create')); ?>">
                                    <?php echo e(__('Выдача книги')); ?>

                                </a>
                                <a class="dropdown-item" href="<?php echo e(route('admin.loans.return.index')); ?>">
                                    <?php echo e(__('Возврат книги')); ?>

                                </a>
                            <?php endif; ?>

                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item"><?php echo e(__('Выход')); ?></button>
                            </form>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <?php echo e(__('Выход')); ?>

                            </a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>