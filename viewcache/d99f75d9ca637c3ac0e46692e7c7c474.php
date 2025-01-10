<?php $__env->startSection('title', $__t('Chores settings')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col">
		<h2 class="title"><?php echo $__env->yieldContent('title'); ?></h2>
	</div>
</div>

<hr class="my-2">

<div class="row">
	<div class="col-lg-6 col-12">
		<?php echo $__env->make('components.numberpicker', array(
		'id' => 'chores_due_soon_days',
		'additionalAttributes' => 'data-setting-key="chores_due_soon_days"',
		'label' => 'Due soon days',
		'min' => 0,
		'additionalCssClasses' => 'user-setting-control',
		'hint' => $__t('Set to 0 to hide due soon filters/highlighting')
		), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<a href="<?php echo e($U('/choresoverview')); ?>"
			class="btn btn-success"><?php echo e($__t('OK')); ?></a>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/www/views/choressettings.blade.php ENDPATH**/ ?>