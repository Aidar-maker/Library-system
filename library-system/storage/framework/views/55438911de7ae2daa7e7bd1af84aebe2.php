<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Личный кабинет</div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <h4>Мой профиль</h4>
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>ФИО:</strong> <?php echo e($user->name); ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?php echo e($user->email); ?></li>
                        <!-- Если в будущем добавятся телефон и адрес, их можно будет сюда добавить -->
                    </ul>

                    <h4>Мои штрафы</h4>
                    <p>Общая сумма штрафов: <strong><?php echo e(number_format($totalFine, 2, ',', ' ')); ?> руб.</strong></p>

                    <hr>

                    <h4>Активные выдачи</h4>
                    <?php if($activeLoans->isEmpty()): ?>
                        <p>У вас нет активных выдач.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Книга</th>
                                        <th>Дата выдачи</th>
                                        <th>Срок возврата</th>
                                        <th>Дней до возврата</th>
                                        <th>Штраф</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $activeLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loan->book->title); ?></td>
                                            <td><?php echo e($loan->issued_at->format('d.m.Y')); ?></td>
                                            <td><?php echo e($loan->due_at->format('d.m.Y')); ?></td>
                                            <td>
                                                <?php if($loan->due_at->isPast()): ?>
                                                    <span class="text-danger"><?php echo e($loan->due_at->diffInDays(now())); ?> дней просрочки</span>
                                                <?php else: ?>
                                                    <?php echo e($loan->due_at->diffInDays(now())); ?> дней
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(number_format($loan->fine_amount, 2, ',', ' ')); ?> руб.</td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>

                    <hr>

                    <h4>История выдач</h4>
                    <?php if($historyLoans->isEmpty()): ?>
                        <p>У вас нет истории выдач.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Книга</th>
                                        <th>Дата выдачи</th>
                                        <th>Дата возврата</th>
                                        <th>Штраф</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $historyLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loan->book->title); ?></td>
                                            <td><?php echo e($loan->issued_at->format('d.m.Y')); ?></td>
                                            <td><?php echo e($loan->returned_at->format('d.m.Y')); ?></td>
                                            <td><?php echo e(number_format($loan->fine_amount, 2, ',', ' ')); ?> руб.</td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\admin\Library-system\library-system\resources\views/profile/index.blade.php ENDPATH**/ ?>