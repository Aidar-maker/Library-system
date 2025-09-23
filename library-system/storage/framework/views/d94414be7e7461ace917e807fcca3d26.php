

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Настройки системы</span>
                </div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label for="loan_period_days" class="form-label">Срок выдачи (дней) *</label>
                            <input type="number" name="loan_period_days" id="loan_period_days" class="form-control" 
                                   value="<?php echo e(old('loan_period_days', $settings['loan_period_days']->value ?? 14)); ?>" 
                                   min="1" max="365" required>
                            <?php if($errors->has('loan_period_days')): ?>
                                <div class="text-danger"><?php echo e($errors->first('loan_period_days')); ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="fine_rate_per_day" class="form-label">Ставка штрафа (руб./день) *</label>
                            <input type="number" name="fine_rate_per_day" id="fine_rate_per_day" class="form-control" step="0.01"
                                   value="<?php echo e(old('fine_rate_per_day', $settings['fine_rate_per_day']->value ?? 10)); ?>" 
                                   min="0" required>
                            <?php if($errors->has('fine_rate_per_day')): ?>
                                <div class="text-danger"><?php echo e($errors->first('fine_rate_per_day')); ?></div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Сохранить настройки</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>