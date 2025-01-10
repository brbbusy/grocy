<?php require_frontend_packages(['bootstrap-combobox']); ?>

<?php if (! $__env->hasRenderedOnce('6865b5a3-9346-4eac-a015-95e82197f848')): $__env->markAsRenderedOnce('6865b5a3-9346-4eac-a015-95e82197f848'); ?>
<?php $__env->startPush('componentScripts'); ?>
<script src="<?php echo e($U('/viewjs/components/recipepicker.js', true)); ?>?v=<?php echo e($version); ?>"></script>
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
	<label class="w-100"
		for="recipe_id"><?php echo e($__t('Recipe')); ?>

		<?php if(!empty($hint)): ?>
		<i class="fa-solid fa-question-circle text-muted"
			data-toggle="tooltip"
			data-trigger="hover click"
			title="<?php echo e($hint); ?>"></i>
		<?php endif; ?>
		<i class="fa-solid fa-barcode float-right mt-1"></i>
	</label>
	<select class="form-control recipe-combobox barcodescanner-input"
		id="recipe_id"
		name="recipe_id"
		data-target="@recipepicker"
		<?php if($isRequired): ?>
		required
		<?php endif; ?>>
		<option value=""></option>
		<?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option value="<?php echo e($recipe->id); ?>"><?php echo e($recipe->name); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
	<div class="invalid-feedback"><?php echo e($__t('You have to select a recipe')); ?></div>
</div>

<?php echo $__env->make('components.barcodescanner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /app/www/views/components/recipepicker.blade.php ENDPATH**/ ?>