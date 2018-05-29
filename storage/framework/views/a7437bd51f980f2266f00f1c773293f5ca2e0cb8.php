<style>
<!--
.button {
    background-color: #008CBA; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

-->
</style>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">訂單</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
<body background=https://www.smartordersystem.com/images/banner_1_en_bg.png style="font-size:30px;">
<form id="from" method="post" name="myform" action="manager" >
<?php echo e(csrf_field()); ?>

    <?php $__currentLoopData = $select_stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $select_store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<label type="text"  style="background-color:#77DDFF;">開會日期</label>
<?php echo e($select_store->meeting_time); ?>

<label type="text"  style="background-color:#77DDFF;">截止時間</label>
<?php echo e($select_store->deadline); ?>

<label type="text"  style="background-color:#77DDFF;">開會主題</label>
<?php echo e($select_store->place); ?>

<label type="text"  style="background-color:#77DDFF;">開會地點</label>
<?php echo e($select_store->topic); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<br>
<br>
選擇餐廳
<ol style="font-size:30px;" name="food" id="food">
<?php if(count($users) > 0): ?>

    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <li > <?php echo e($user->name); ?>  <?php echo e($user->food); ?>  <?php echo e($user->price); ?></li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?> 
    nothing

<?php endif; ?>
</ol>

<input class="button" type="submit" id="btn_smb"  value="選擇餐點囉">
</form>


</body> 

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>