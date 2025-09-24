<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактирование профиля</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('profile.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label for="name" class="form-label">ФИО</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name', auth()->user()->name)); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email', auth()->user()->email)); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Телефон</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo e(old('phone', auth()->user()->phone)); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Адрес</label>
                            <input type="text" name="address" id="address" class="form-control" value="<?php echo e(old('address', auth()->user()->address)); ?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/profile/edit.blade.php ENDPATH**/ ?>