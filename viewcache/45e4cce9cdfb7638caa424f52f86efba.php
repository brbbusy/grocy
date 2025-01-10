<?php require_frontend_packages(['datatables']); ?>



<?php $__env->startSection('title', $__t('Product groups')); ?>

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
			<div class="related-links collapse d-md-flex order-2 width-xs-sm-100"
				id="related-links">
				<a class="btn btn-primary responsive-button show-as-dialog-link m-1 mt-md-0 mb-md-0 float-right"
					href="<?php echo e($U('/productgroup/new?embedded')); ?>">
					<?php echo e($__t('Add')); ?>

				</a>
				<a class="btn btn-outline-secondary m-1 mt-md-0 mb-md-0 float-right"
					href="<?php echo e($U('/userfields?entity=product_groups')); ?>">
					<?php echo e($__t('Configure userfields')); ?>

				</a>
			</div>
		</div>
	</div>
</div>

<hr class="my-2">

<div class="row collapse d-md-flex"
	id="table-filter-row">
	<div class="col-12 col-md-6 col-xl-3">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa-solid fa-search"></i></span>
			</div>
			<input type="text"
				id="search"
				class="form-control"
				placeholder="<?php echo e($__t('Search')); ?>">
		</div>
	</div>
	<div class="col-12 col-md-6 col-xl-3">
		<div class="form-check custom-control custom-checkbox">
			<input class="form-check-input custom-control-input"
				type="checkbox"
				id="show-disabled">
			<label class="form-check-label custom-control-label"
				for="show-disabled">
				<?php echo e($__t('Show disabled')); ?>

			</label>
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
		<table id="productgroups-table"
			class="table table-sm table-striped nowrap w-100">
			<thead>
				<tr>
					<th class="border-right"><a class="text-muted change-table-columns-visibility-button"
							data-toggle="tooltip"
							data-toggle="tooltip"
							title="<?php echo e($__t('Table options')); ?>"
							data-table-selector="#productgroups-table"
							href="#"><i class="fa-solid fa-eye"></i></a>
					</th>
					<th><?php echo e($__t('Name')); ?></th>
					<th><?php echo e($__t('Description')); ?></th>
					<th><?php echo e($__t('Product count')); ?></th>

					<?php echo $__env->make('components.userfields_thead', array(
					'userfields' => $userfields
					), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</tr>
			</thead>
			<tbody class="d-none">
				<?php $__currentLoopData = $productGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="<?php if($productGroup->active == 0): ?> text-muted <?php endif; ?>">
					<td class="fit-content border-right">
						<a class="btn btn-info btn-sm show-as-dialog-link"
							href="<?php echo e($U('/productgroup/')); ?><?php echo e($productGroup->id); ?>?embedded"
							data-toggle="tooltip"
							title="<?php echo e($__t('Edit this item')); ?>">
							<i class="fa-solid fa-edit"></i>
						</a>
						<a class="btn btn-danger btn-sm product-group-delete-button"
							href="#"
							data-group-id="<?php echo e($productGroup->id); ?>"
							data-group-name="<?php echo e($productGroup->name); ?>"
							data-toggle="tooltip"
							title="<?php echo e($__t('Delete this item')); ?>">
							<i class="fa-solid fa-trash"></i>
						</a>
					</td>
					<td>
						<?php echo e($productGroup->name); ?>

					</td>
					<td>
						<?php echo e($productGroup->description); ?>

					</td>
					<td>
						<?php echo e(count(FindAllObjectsInArrayByPropertyValue($products, 'product_group_id', $productGroup->id))); ?>

						<a class="btn btn-link btn-sm text-body"
							href="<?php echo e($U('/products?product-group=') . $productGroup->id); ?>">
							<i class="fa-solid fa-external-link-alt"></i>
						</a>
					</td>

					<?php echo $__env->make('components.userfields_tbody', array(
					'userfields' => $userfields,
					'userfieldValues' => FindAllObjectsInArrayByPropertyValue($userfieldValues, 'object_id', $productGroup->id)
					), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/www/views/productgroups.blade.php ENDPATH**/ ?>