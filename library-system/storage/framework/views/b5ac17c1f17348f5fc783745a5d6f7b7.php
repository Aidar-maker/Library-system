<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Управление книгами</span>
                    <a href="<?php echo e(route('admin.books.create')); ?>" class="btn btn-primary">Добавить книгу</a>
                </div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="row justify-content-center mb-4">
                        <div class="col-md-8">
                            <form action="<?php echo e(route('admin.books.index')); ?>" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Поиск книг по названию или автору..." value="<?php echo e(request('search')); ?>">
                                    <button class="btn btn-outline-primary" type="submit">Найти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Автор</th>
                                <th>ISBN</th>
                                <th>Год</th>
                                <th>Жанр</th>
                                <th>Доступна</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($book->id); ?></td>
                                    <td><?php echo e($book->title); ?></td>
                                    <td><?php echo e($book->author); ?></td>
                                    <td><?php echo e($book->isbn); ?></td>
                                    <td><?php echo e($book->year); ?></td>
                                    <td><?php echo e($book->genre); ?></td>
                                    <td><?php echo e($book->is_available ? 'Да' : 'Нет'); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.books.edit', $book)); ?>" class="btn btn-sm btn-warning">Редактировать</a>
                                        <form action="<?php echo e(route('admin.books.destroy', $book)); ?>" method="POST" style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center">Книги не найдены</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    </div>
                    <?php echo e($books->links('pagination::bootstrap-5')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/admin/books/index.blade.php ENDPATH**/ ?>