<?php require_frontend_packages(['datatables']); ?>



<?php $__env->startSection('title', $__t('Chores journal')); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col">
		<h2 class="title"><?php echo $__env->yieldContent('title'); ?></h2>
		<div class="float-right">
			<button class="btn btn-outline-dark d-md-none mt-2 order-1 order-md-3"
				type="button"
				data-toggle="collapse"
				data-target="#table-filter-row">
				<i class="fa-solid fa-filter"></i>
			</button>
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
	<div class="col-12 col-md-6 col-xl-3">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa-solid fa-filter"></i>&nbsp;<?php echo e($__t('Chore')); ?></span>
			</div>
			<select class="custom-control custom-select"
				id="chore-filter">
				<option value="all"><?php echo e($__t('All')); ?></option>
				<?php $__currentLoopData = $chores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($chore->id); ?>"><?php echo e($chore->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
	</div>
	<div class="col-12 col-md-6 col-xl-3">
		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa-solid fa-clock"></i>&nbsp;<?php echo e($__t('Date range')); ?></span>
			</div>
			<select class="custom-control custom-select"
				id="daterange-filter">
				<option value="1"><?php echo e($__n(1, '%s month', '%s months')); ?></option>
				<option value="6"><?php echo e($__n(6, '%s month', '%s months')); ?></option>
				<option value="12"
					selected><?php echo e($__n(1, '%s year', '%s years')); ?></option>
				<option value="24"><?php echo e($__n(2, '%s month', '%s years')); ?></option>
				<option value="9999"><?php echo e($__t('All')); ?></option>
			</select>
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

<div class="row mt-2">
	<div class="col">
		<table id="chores-journal-table"
			class="table table-sm table-striped nowrap w-100">
			<thead>
				<tr>
					<th class="border-right"><a class="text-muted change-table-columns-visibility-button"
							data-toggle="tooltip"
							data-toggle="tooltip"
							title="<?php echo e($__t('Table options')); ?>"
							data-table-selector="#chores-journal-table"
							href="#"><i class="fa-solid fa-eye"></i></a>
					</th>
					<th class="allow-grouping"><?php echo e($__t('Chore')); ?></th>
					<th><?php echo e($__t('Tracked time')); ?></th>
					<?php if(GROCY_FEATURE_FLAG_CHORES_ASSIGNMENTS): ?>
					<th class="allow-grouping"><?php echo e($__t('Done by')); ?></th>
					<?php endif; ?>

					<?php echo $__env->make('components.userfields_thead', array(
					'userfields' => $userfields
					), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</tr>
			</thead>
			<tbody class="d-none">
				<?php $__currentLoopData = $choresLog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choreLogEntry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr id="chore-execution-<?php echo e($choreLogEntry->id); ?>-row"
					class="<?php if($choreLogEntry->undone == 1): ?> text-muted <?php endif; ?> <?php if($choreLogEntry->skipped == 1): ?> font-italic <?php endif; ?>">
					<td class="fit-content border-right">
						<a class="btn btn-secondary btn-xs undo-chore-execution-button permission-CHORE_UNDO_EXECUTION <?php if($choreLogEntry->undone == 1): ?> disabled <?php endif; ?>"
							href="#"
							data-execution-id="<?php echo e($choreLogEntry->id); ?>"
							data-toggle="tooltip"
							data-placement="left"
							title="<?php echo e($__t('Undo chore execution')); ?>">
							<i class="fa-solid fa-undo"></i>
						</a>
					</td>
					<td>
						<span class="name-anchor <?php if($choreLogEntry->undone == 1): ?> text-strike-through <?php endif; ?>"><?php echo e(FindObjectInArrayByPropertyValue($chores, 'id', $choreLogEntry->chore_id)->name); ?></span>
						<?php if($choreLogEntry->undone == 1): ?>
						<br>
						<?php echo e($__t('Undone on') . ' ' . $choreLogEntry->undone_timestamp); ?>

						<time class="timeago timeago-contextual"
							datetime="<?php echo e($choreLogEntry->undone_timestamp); ?>"></time>
						<?php endif; ?>
					</td>
					<td>
						<span><?php echo e($choreLogEntry->tracked_time); ?></span>
						<time class="timeago timeago-contextual <?php if(FindObjectInArrayByPropertyValue($chores, 'id', $choreLogEntry->chore_id)->track_date_only == 1): ?> timeago-date-only <?php endif; ?>"
							datetime="<?php echo e($choreLogEntry->tracked_time); ?>"></time>
						<?php if($choreLogEntry->skipped == 1): ?>
						<span class="text-muted"><?php echo e($__t('Skipped')); ?></span>
						<?php endif; ?>
					</td>
					<?php if(GROCY_FEATURE_FLAG_CHORES_ASSIGNMENTS): ?>
					<td>
						<?php if($choreLogEntry->done_by_user_id !== null && !empty($choreLogEntry->done_by_user_id)): ?>
						<?php echo e(GetUserDisplayName(FindObjectInArrayByPropertyValue($users, 'id', $choreLogEntry->done_by_user_id))); ?>

						<?php else: ?>
						<?php echo e($__t('Unknown')); ?>

						<?php endif; ?>
					</td>
					<?php endif; ?>

					<?php echo $__env->make('components.userfields_tbody', array(
					'userfields' => $userfields,
					'userfieldValues' => FindAllObjectsInArrayByPropertyValue($userfieldValues, 'object_id', $choreLogEntry->id)
					), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/www/views/choresjournal.blade.php ENDPATH**/ ?>