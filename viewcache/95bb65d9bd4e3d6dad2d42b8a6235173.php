<?php require_frontend_packages(['datatables']); ?>



<?php $__env->startSection('title', $__t('Userentities')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col">
		<div class="title-related-links">
			<h2 class="title"><?php echo $__env->yieldContent('title'); ?></h2>
			<div class="float-right">
				<button class="btn btn-outline-dark d-md-none mt-2 order-1 order-md-3"
					type="button"
					data-toggle="collapse"
					data-target="#table-filter-row">
					<i class="fa-solid fa-filter"></i>
				</button>
				<button class="btn btn-outline-dark d-md-none mt-2 order-1 order-md-3"
					type="button"
					data-toggle="collapse"
					data-target="#related-links">
					<i class="fa-solid fa-ellipsis-v"></i>
				</button>
			</div>
			<div class="related-links collapse d-md-flex order-2 width-xs-sm-100 m-1 mt-md-0 mb-md-0 float-right"
				id="related-links">
				<a class="btn btn-primary responsive-button show-as-dialog-link"
					href="<?php echo e($U('/userentity/new?embedded')); ?>">
					<?php echo e($__t('Add')); ?>

				</a>
			</div>
		</div>
	</div>
</div>

<hr class="my-2">

<div class="row collapse d-md-flex"
	id="table-filter-row">
	<div class="col-12 col-md-6 col-xl-3">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa-solid fa-search"></i></span>
			</div>
			<input type="text"
				id="search"
				class="form-control"
				placeholder="<?php echo e($__t('Search')); ?>">
		</div>
	</div>
	<div class="col">
		<div class="float-right">
			<button id="clear-filter-button"
				class="btn btn-sm btn-outline-info"
				data-toggle="tooltip"
				title="<?php echo e($__t('Clear filter')); ?>">
				<i class="fa-solid fa-filter-circle-xmark"></i>
			</button>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<table id="userentities-table"
			class="table table-sm table-striped nowrap w-100">
			<thead>
				<tr>
					<th class="border-right"><a class="text-muted change-table-columns-visibility-button"
							data-toggle="tooltip"
							data-toggle="tooltip"
							title="<?php echo e($__t('Table options')); ?>"
							data-table-selector="#userentities-table"
							href="#"><i class="fa-solid fa-eye"></i></a>
					</th>
					<th><?php echo e($__t('Name')); ?></th>
					<th><?php echo e($__t('Caption')); ?></th>
				</tr>
			</thead>
			<tbody class="d-none">
				<?php $__currentLoopData = $userentities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userentity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td class="fit-content border-right">
						<a class="btn btn-info btn-sm show-as-dialog-link"
							href="<?php echo e($U('/userentity/')); ?><?php echo e($userentity->id); ?>?embedded"
							data-toggle="tooltip"
							title="<?php echo e($__t('Edit this item')); ?>">
							<i class="fa-solid fa-edit"></i>
						</a>
						<a class="btn btn-danger btn-sm userentity-delete-button"
							href="#"
							data-userentity-id="<?php echo e($userentity->id); ?>"
							data-userentity-name="<?php echo e($userentity->name); ?>"
							data-toggle="tooltip"
							title="<?php echo e($__t('Delete this item')); ?>">
							<i class="fa-solid fa-trash"></i>
						</a>
						<a class="btn btn-secondary btn-sm"
							href="<?php echo e($U('/userfields?entity=userentity-')); ?><?php echo e($userentity->name); ?>">
							<?php echo e($__t('Configure fields')); ?>

						</a>
					</td>
					<td>
						<?php echo e($userentity->name); ?>

					</td>
					<td>
						<?php echo e($userentity->caption); ?>

					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/www/views/userentities.blade.php ENDPATH**/ ?>