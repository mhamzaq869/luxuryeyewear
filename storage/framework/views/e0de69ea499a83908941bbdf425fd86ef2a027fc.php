<?php $__env->startSection('title', 'Add Shipping '); ?>
<?php $__env->startSection('main-content'); ?>

    <div class="card">
        <h5 class="card-header">Add Shipping</h5>
        <div class="card-body">
            <form method="post" action="<?php echo e(route('shipping.store')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Type <span class="text-danger">*</span></label>
                  <input id="inputTitle" type="text" name="type" placeholder="Enter title"  value="<?php echo e(old('type')); ?>" class="form-control">
                  <?php $__errorArgs = ['type'];
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

                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Countries <span class="text-danger">*</span></label>
                    <select class="select2 form-control " id="countries" name="countries[]" style="width: 100%; height:36px;">

                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>">
                                <?php echo e($user->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputTitle" class="col-form-label">Transit Days<span class="text-danger">*</span></label>
                    <input  type="text" name="transit" placeholder="5-10"  value="<?php echo e(old('transit')); ?>" class="form-control">
                    <?php $__errorArgs = ['type'];
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

                <div class="form-group">
                    <label for="price" class="col-form-label">Price <span class="text-danger">*</span></label>
                    <input id="price" type="number" name="price" placeholder="Enter price"
                        value="<?php echo e(old('price')); ?>" class="form-control">
                    <?php $__errorArgs = ['price'];
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

                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <?php $__errorArgs = ['status'];
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

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" integrity="sha512-3uVpgbpX33N/XhyD3eWlOgFVAraGn3AfpxywfOTEQeBDByJ/J7HkLvl4mJE1fvArGh4ye1EiPfSBnJo2fgfZmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo e(asset('backend/summernote/summernote.min.css')); ?>">

    <style type="text/css">
        .bootstrap-tagsinput{
            width: 100%;
        }
        .label-info{
            background-color: #17a2b8;

        }
        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,
            border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
            padding-left: 20px !important;
            color:white
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
            background-color: #0750bd00;
            border: none;
            border-right: 1px solid #aaa0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            color: rgb(255, 255, 255);
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            padding: 0 4px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #4e73df;
            border: 1px solid #aaa;
            border-radius: 4px;
            display: inline-block;
            margin-left: 5px;
            margin-top: 5px;
            padding: 0;
        }

    </style>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js" integrity="sha512-SXJkO2QQrKk2amHckjns/RYjUIBCI34edl9yh0dzgw3scKu0q4Bo/dUr+sGHMUha0j9Q1Y7fJXJMaBi4xtyfDw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="<?php echo e(asset('backend/summernote/summernote.min.js')); ?>"></script>
    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 150
            });
        });
        $("#countries").select2({ multiple: true });
        $('#countries').val(<?php echo json_encode($countries, 15, 512) ?>).trigger('change');
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eyewear\resources\views/backend/shipping/create.blade.php ENDPATH**/ ?>