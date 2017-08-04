<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Position</th>
                <th id="usrFilterTrigger" data-target="#usrFilter" data-toggle="collapse">Status <span class="glyphicon glyphicon-filter"></span></th>
                <th>Actions</th>
                <th><input type="hidden" value="<?php echo e(csrf_token()); ?>" id="token"></th>
            </tr>
        </thead>
        <tbody id="usersViewBody">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a data-uid="<?php echo e($user->id); ?>" class="openUserPanel" href="#tabUserInfo"> <?php echo e($user->name); ?></a></td>
                <td><?php echo e($user->department); ?></td>
                <td><?php echo e($user->position); ?></td>
                <?php if($user->status == 0): ?>
                    <td class="userActive">Active</td>
                <?php elseif($user->status == 1): ?>
                    <td class="userOOO">On Leave</td>
                <?php elseif($user->status == 2): ?>
                    <td class="userInactive">Retired</td>
                <?php else: ?>
                    <td class="userInactive">Terminated</td>
                <?php endif; ?>
                <?php if($user->status == 2 || $user->status == 3): ?>
                    <td><button class="btn btn-xs btn-default payrollModalTrigger disabled" data-uid="<?php echo e($user->id); ?>">Update Payroll</button></td>
                <?php else: ?>
                    <td><button class="btn btn-xs btn-default payrollModalTrigger" data-uid="<?php echo e($user->id); ?>">Update Payroll</button></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
    <div class="text-center">
    <?php if(!empty($selected)): ?>
    <?php echo e($users->appends(['selected' => $selected])->links()); ?>

    <?php else: ?>
    <?php echo e($users->links()); ?>

    <?php endif; ?>
</div>