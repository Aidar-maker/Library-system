

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить книгу</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('admin.books.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="title" class="form-label">Название *</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Автор *</label>
                            <input type="text" name="author" id="author" class="form-control" value="<?php echo e(old('author')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="isbn" class="form-label">ISBN *</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" value="<?php echo e(old('isbn')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Год *</label>
                            <input type="number" name="year" id="year" class="form-control" value="<?php echo e(old('year')); ?>" min="1000" max="<?php echo e(date('Y')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Жанр *</label>
                            <input type="text" name="genre" id="genre" class="form-control" value="<?php echo e(old('genre')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="cover_url" class="form-label">URL обложки</label>
                            <input type="url" name="cover_url" id="cover_url" class="form-control" value="<?php echo e(old('cover_url')); ?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>
                        <a href="<?php echo e(route('admin.books.index')); ?>" class="btn btn-secondary">Отмена</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\zigan\Library-system\library-system\resources\views/admin/books/create.blade.php ENDPATH**/ ?>