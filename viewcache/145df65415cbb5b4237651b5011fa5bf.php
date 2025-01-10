<?php $__env->startSection('title', $__t('User settings')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col">
		<h2 class="title"><?php echo $__env->yieldContent('title'); ?></h2>
	</div>
</div>

<hr class="my-2">

<div class="row">
	<div class="col-lg-6 col-12">

		<div class="form-group">
			<label for="locale"><?php echo e($__t('Language')); ?></label>
			<select class="custom-control custom-select user-setting-control"
				id="locale"
				data-setting-key="locale">
				<option value=""><?php echo e($__t('Default')); ?></option>
				<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($lang); ?>"
					<?php if(GROCY_LOCALE==$lang): ?>
					checked
					<?php endif; ?>><?php echo e($__t($lang)); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>

		<a href="<?php echo e($U('/')); ?>"
			class="btn btn-success link-return"><?php echo e($__t('OK')); ?></a>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/www/views/usersettings.blade.php ENDPATH**/ ?>