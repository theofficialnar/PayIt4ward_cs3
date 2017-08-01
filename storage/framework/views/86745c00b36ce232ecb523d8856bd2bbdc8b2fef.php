<?php $__env->startSection('title'); ?>
    Admin Settings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_section'); ?>
<div class="topPadding">
    <div class="well row">
        <h1 class="text-center">Update Contribution Table</h1>
        <hr>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#tax_table">Tax Table</a></li>
                <li><a data-toggle="pill" href="#sss_table">SSS Table</a></li>
                <li><a data-toggle="pill" href="#philhealth_table">Philhealth Table</a></li>
            </ul>

            
            <div class="tab-content">
                <div id="tax_table" class="tab-pane fade in active">
                    <h3>Tax Table</h3>
                    <form method="POST" action="admin_settings/tax">
                        <?php echo e(csrf_field()); ?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Bracket</th>
                        <?php $__currentLoopData = $tax_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e($tax->id); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Exemption</td>
                        <?php $__currentLoopData = $tax_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><input type="number" name="exemp_<?php echo e($tax->id); ?>" value="<?php echo e($tax->exemption); ?>" class="contrib_input"></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>Status (%)</td>
                        <?php $__currentLoopData = $tax_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><input type="number" name="status_<?php echo e($tax->id); ?>" value="<?php echo e($tax->status); ?>" class="contrib_input"></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>            
                                    <td>Z</td>
                        <?php $__currentLoopData = $tax_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><input type="number" name="z_<?php echo e($tax->id); ?>" value="<?php echo e($tax->z); ?>" class="contrib_input"></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>            
                                    <td>S/ME</td>
                        <?php $__currentLoopData = $tax_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><input type="number" name="sme_<?php echo e($tax->id); ?>" value="<?php echo e($tax->sme); ?>" class="contrib_input"></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>            
                                    <td>ME1/S1</td>
                        <?php $__currentLoopData = $tax_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><input type="number" name="me1se1_<?php echo e($tax->id); ?>" value="<?php echo e($tax->me1se1); ?>" class="contrib_input"></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>ME2/S2</td>
                        <?php $__currentLoopData = $tax_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><input type="number" name="me2se2_<?php echo e($tax->id); ?>" value="<?php echo e($tax->me2se2); ?>" class="contrib_input"></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>           
                                    <td>ME3/S3</td>
                        <?php $__currentLoopData = $tax_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><input type="number" name="me3se3_<?php echo e($tax->id); ?>" value="<?php echo e($tax->me3se3); ?>" class="contrib_input"></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                                <tr>
                                    <td>ME4/S4</td>
                        <?php $__currentLoopData = $tax_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td><input type="number" name="me4se4_<?php echo e($tax->id); ?>" value="<?php echo e($tax->me4se4); ?>" class="contrib_input"></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tbody>
                        </table>
                        <button>Save Changes</button>
                    </form>
                </div>

                
                <div id="sss_table" class="tab-pane fade">
                    <h3>SSS Contribution Table</h3>
                    <p>Some content in menu 1.</p>
                </div>

                
                <div id="philhealth_table" class="tab-pane fade">
                    <h3>Philhealth Contribution Table</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>