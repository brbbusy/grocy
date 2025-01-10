<?php $__env->startSection('title', $__t('Permissions for user %s', GetUserDisplayName($user))); ?>

<?php $__env->startPush('pageScripts'); ?>
<script>
	Grocy.EditObjectId = <?php echo e($user->id); ?>;
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('pageStyles'); ?>
<style>
	ul {
		list-style-type: none;
	}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col">
		<h2 class="title"><?php echo $__env->yieldContent('title'); ?></h2>
	</div>
</div>

<hr class="my-2">

<div class="row">
	<div class="col">
		<ul class="pl-0">
			<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li>
				<?php echo $__env->make('components.userpermission_select', array(
				'permission' => $perm
				), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
		<button id="permission-save"
			class="btn btn-success"
			type="submit"><?php echo e($__t('Save')); ?></button>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/www/views/userpermissions.blade.php ENDPATH**/ ?>