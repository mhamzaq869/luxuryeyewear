
<?php $__env->startSection('title','Import Product'); ?>
<?php $__env->startSection('main-content'); ?>

<div class="card">
    <h5 class="card-header">Import Product</h5>
    <div class="card-body">
      <form method="post" action="<?php echo e(route('product.import.post')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <label for="inputFile" class="col-form-label">Import Csv File <span class="text-danger">*</span></label>
          <div class="input-group">
          <input id="thumbnail" class="form-control" type="file" name="file" >
        </div>
          <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="text-danger"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eyewear\resources\views/backend/product/import.blade.php ENDPATH**/ ?>