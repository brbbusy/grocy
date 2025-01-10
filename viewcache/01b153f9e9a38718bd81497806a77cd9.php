<?php if (! $__env->hasRenderedOnce('e1a98bb8-a6ef-4ac9-960b-9b5e81f6d259')): $__env->markAsRenderedOnce('e1a98bb8-a6ef-4ac9-960b-9b5e81f6d259'); ?>
<?php $__env->startPush('componentScripts'); ?>
<script src="<?php echo e($U('/viewjs/components/productamountpicker.js', true)); ?>?v=<?php echo e($version); ?>"></script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php if(empty($additionalGroupCssClasses)) { $additionalGroupCssClasses = ''; } ?>
<?php if(empty($additionalHtmlContextHelp)) { $additionalHtmlContextHelp = ''; } ?>
<?php if(empty($additionalHtmlElements)) { $additionalHtmlElements = ''; } ?>
<?php if(empty($label)) { $label = 'Amount'; } ?>
<?php if(empty($initialQuId)) { $initialQuId = '-1'; } ?>
<?php if(!isset($isRequired)) { $isRequired = true; } ?>

<div class="form-group row <?php echo e($additionalGroupCssClasses); ?>">
	<div class="col">
		<?php echo $additionalHtmlContextHelp; ?>


		<div class="row">

			<?php echo $__env->make('components.numberpicker', array(
			'id' => 'display_amount',
			'label' => $label,
			'min' => $DEFAULT_MIN_AMOUNT,
			'decimals' => $userSettings['stock_decimal_places_amounts'],
			'value' => $value,
			'additionalGroupCssClasses' => 'col-sm-5 col-12 my-0',
			'additionalCssClasses' => 'input-group-productamountpicker locale-number-input locale-number-quantity-amount',
			'additionalHtmlContextHelp' => '',
			'additionalHtmlElements' => ''
			), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<div class="col-sm-7 col-12">
				<label for="qu_id"><?php echo e($__t('Quantity unit')); ?></label>
				<select <?php if($isRequired): ?>
					required
					<?php endif; ?>
					class="custom-control custom-select input-group-productamountpicker"
					id="qu_id"
					name="qu_id"
					data-initial-qu-id="<?php echo e($initialQuId); ?>">
					<option></option>
				</select>
				<div class="invalid-feedback"><?php echo e($__t('A quantity unit is required')); ?></div>
			</div>

			<div id="qu-conversion-info"
				class="ml-3 my-0 form-text text-info d-none w-100"></div>

			<?php echo $additionalHtmlElements; ?>


			<input type="hidden"
				id="amount"
				name="amount"
				value="">

		</div>
	</div>
</div>
<?php /**PATH /app/www/views/components/productamountpicker.blade.php ENDPATH**/ ?>