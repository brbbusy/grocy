<?php if(!GROCY_FEATURE_FLAG_DISABLE_BROWSER_BARCODE_CAMERA_SCANNING): ?>

<?php require_frontend_packages(['quagga2']); ?>

<?php if (! $__env->hasRenderedOnce('c9496369-f637-4089-8964-e347f2f7607b')): $__env->markAsRenderedOnce('c9496369-f637-4089-8964-e347f2f7607b'); ?>
<?php $__env->startPush('componentScripts'); ?>
<script src="<?php echo e($U('/viewjs/components/barcodescanner.js', true)); ?>?v=<?php echo e($version); ?>"></script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->startPush('pageStyles'); ?>
<style>
	#barcodescanner-start-button {
		position: absolute;
		right: 0;
		margin-top: 4px;
		margin-right: 5px;
		cursor: pointer;
	}

	.combobox-container #barcodescanner-start-button {
		margin-right: 36px !important;
	}
</style>
<?php $__env->stopPush(); ?>

<?php endif; ?>
<?php /**PATH /app/www/views/components/barcodescanner.blade.php ENDPATH**/ ?>