

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Выдача книги</span>
                </div>

                <div class="card-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('admin.loans.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Читатель *</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">Выберите читателя</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id') == $user->id ? 'selected' : ''); ?>>
                                        <?php echo e($user->name); ?> (<?php echo e($user->email); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="book_id" class="form-label">Книга *</label>
                            <select name="book_id" id="book_id" class="form-control" required>
                                <option value="">Выберите книгу</option>
                                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($book->id); ?>" <?php echo e(old('book_id') == $book->id ? 'selected' : ''); ?>>
                                        <?php echo e($book->title); ?> - <?php echo e($book->author); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="issued_at" class="form-label">Дата выдачи *</label>
                            <input type="date" name="issued_at" id="issued_at" class="form-control" value="<?php echo e(old('issued_at', now()->format('Y-m-d'))); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Выдать книгу</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/admin/loans/create.blade.php ENDPATH**/ ?>