<?php require_frontend_packages(['bootstrap-combobox']); ?>

<?php if (! $__env->hasRenderedOnce('67c0e23b-0850-4b2d-af0e-4d77ef706f42')): $__env->markAsRenderedOnce('67c0e23b-0850-4b2d-af0e-4d77ef706f42'); ?>
<?php $__env->startPush('componentScripts'); ?>
<script src="<?php echo e($U('/viewjs/components/locationpicker.js', true)); ?>?v=<?php echo e($version); ?>"></script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php if(empty($prefillByName)) { $prefillByName = ''; } ?>
<?php if(empty($prefillById)) { $prefillById = ''; } ?>
<?php if(!isset($isRequired)) { $isRequired = true; } ?>
<?php if(empty($hint)) { $hint = ''; } ?>
<?php if(empty($nextInputSelector)) { $nextInputSelector = ''; } ?>

<div class="form-group"
	data-next-input-selector="<?php echo e($nextInputSelector); ?>"
	data-prefill-by-name="<?php echo e($prefillByName); ?>"
	data-prefill-by-id="<?php echo e($prefillById); ?>">
	<label for="location_id"><?php echo e($__t('Location')); ?>

		<?php if(!empty($hint)): ?>
		<i class="fa-solid fa-question-circle text-muted"
			data-toggle="tooltip"
			data-trigger="hover click"
			title="<?php echo e($hint); ?>"></i>
		<?php endif; ?>
	</label>
	<select class="form-control location-combobox"
		id="location_id"
		name="location_id"
		<?php if($isRequired): ?>
		required
		<?php endif; ?>>
		<option value=""></option>
		<?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($location->id); ?>"><?php echo e($location->name); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
	<div class="invalid-feedback"><?php echo e($__t('You have to select a location')); ?></div>
</div>
<?php /**PATH /app/www/views/components/locationpicker.blade.php ENDPATH**/ ?>