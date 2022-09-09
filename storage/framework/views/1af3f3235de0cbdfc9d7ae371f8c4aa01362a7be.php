<?php $__env->startSection('title', 'Edit Product'); ?>
<?php $__env->startSection('main-content'); ?>
    <?php $g_image = isset($product->g_image) ? json_decode($product->g_image) : []; ?>

    <?php
    $sub_cat_info = DB::table('categories')
        ->select('title')
        ->where('id', $product->child_cat_id)
        ->get();
    ?>
    <div class="card">
        <h5 class="card-header">Edit Product</h5>
        <div class="card-body">
            <form method="post" action="<?php echo e(route('product.update', $product->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <input type="hidden" name="front_image">
                <input type="hidden" name="back_image">
                <input type="hidden" name="g_image_1">
                <input type="hidden" name="g_image_2">
                <input type="hidden" name="g_image_3">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPhoto" class="col-form-label">Product Front Image <span
                                    class="text-danger"></span></label>

                                <?php if(isset($product->p_f) && $product->p_f != ''): ?>
                                <div class="image-area" id="preview_p_f">
                                    <?php if(!isValidUrl($product->p_f)): ?>
                                    <img src="<?php echo e(asset($product->p_f)); ?>"   class="img-responsive" />
                                    <?php else: ?>
                                    <img src="<?php echo e($product->p_f); ?>"   class="img-responsive" />
                                    <?php endif; ?>
                                    <a class="remove-image" href="javascript:deleteImage('p_f')" style="display: inline;">&#215;</a>
                                </div>
                                <?php endif; ?>

                            <input class="form-control" type="file" name="before_crop_image[front_image]"
                                id="front_image">

                            <?php $__errorArgs = ['p_f'];
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
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPhoto" class="col-form-label">Product Back Image <span
                                    class="text-danger"></span></label>
                            <?php if(isset($product->p_b) && $product->p_b != ''): ?>
                            <div class="image-area" id="preview_p_b">
                                <?php if(!isValidUrl($product->p_b)): ?>
                                <img src="<?php echo e(asset($product->p_b)); ?>" class="img-responsive"  />
                                <?php else: ?>
                                <img src="<?php echo e($product->p_b); ?>" class="img-responsive"  />
                                <?php endif; ?>
                                <a class="remove-image" href="javascript:deleteImage('p_b')" style="display: inline;">&#215;</a>
                            </div>
                            <?php endif; ?>
                            <input class="form-control" type="file" name="before_crop_image[back_image]" id="back_image">
                            <?php $__errorArgs = ['p_b'];
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
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPhoto" class="col-form-label">Product Other Images <span
                                    class="text-danger"></span></label>
                            <?php if(isset($product->g_image_1) && $product->g_image_1 != ''): ?>
                            <div class="image-area" id="preview_g_image_1">
                                <?php if(!isValidUrl($product->g_image_1)): ?>
                                <img src="<?php echo e(asset($product->g_image_1)); ?>"  class="img-responsive" id="preview_p_f" />
                                <?php else: ?>
                                <img src="<?php echo e($product->g_image_1); ?>"  class="img-responsive" id="preview_p_f" />
                                <?php endif; ?>
                                <a class="remove-image"  href="javascript:deleteImage('g_image_1')" style="display: inline;">&#215;</a>
                            </div>
                            <?php endif; ?>
                            <input class="form-control" type="file" name="before_crop_image[g_image_1]" id="g_image_1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPhoto" class="col-form-label">Product Other Images <span
                                    class="text-danger"></span></label>
                            <?php if(isset($product->g_image_2) && $product->g_image_2 != ''): ?>
                            <div class="image-area" id="preview_g_image_2" >
                                <?php if(!isValidUrl($product->g_image_2)): ?>
                                <img src="<?php echo e(asset($product->g_image_2)); ?>" class="img-responsive" />
                                <?php else: ?>
                                <img src="<?php echo e($product->g_image_2); ?>" class="img-responsive" />
                                <?php endif; ?>
                                <a class="remove-image" href="javascript:deleteImage('g_image_2')" style="display: inline;">&#215;</a>
                            </div>
                            <?php endif; ?>

                            <input class="form-control" type="file" name="before_crop_image[g_image_2]" id="g_image_2">


                            <?php $__errorArgs = ['p_o2'];
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
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="inputPhoto" class="col-form-label">Product Other Images <span
                                    class="text-danger">*</span></label>
                            <?php if(isset($product->g_image_3) && $product->g_image_3 != ''): ?>
                            <div class="image-area"  id="preview_g_image_3">
                                <?php if(!isValidUrl($product->g_image_3)): ?>
                                <img src="<?php echo e(asset($product->g_image_3)); ?>" id="preview_g_image_3" class="img-responsive" />
                                <?php else: ?>
                                <img src="<?php echo e($product->g_image_3); ?>" id="preview_g_image_3" class="img-responsive" />
                                <?php endif; ?>
                                <a class="remove-image" href="javascript:deleteImage('g_image_3')" style="display: inline;">&#215;</a>
                            </div>
                            <?php endif; ?>
                            <input class="form-control " type="file" name="before_crop_image[g_image_3]" id="g_image_3">

                            <?php $__errorArgs = ['photo'];
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
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="inputTitle" class="col-form-label">Product Name <span
                                    class="text-danger">*</span></label>
                            <input id="inputProductName" type="text" name="title" placeholder="Enter title"
                                value="<?php echo e($product->title); ?>" class="form-control">
                            <?php $__errorArgs = ['title'];
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
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="brand_id">Brand</label>

                            <select name="brand_id" id="brand_id" class="form-control select2">
                                <option value="">--Select Brand--</option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->id); ?>" <?php if($brand->id == $product->brand_id): ?> selected <?php endif; ?>>
                                        <?php echo e($brand->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cat_id">Category <span class="text-danger">*</span></label>
                            <select name="cat_id" id="cat_id" class="form-control select2">
                                <option value="">--Select any Category--</option>
                                <?php if($product->cat_id != null): ?>
                                    <?php $__currentLoopData = $categories->where('brand_id',$product->brand_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value='<?php echo e($cat_data->id); ?>' data-size="<?php echo e($cat_data->size); ?>" data-brand="<?php echo e($cat_data->brand_id); ?>"
                                        <?php if($product->cat_id == $cat_data->id): ?> selected <?php endif; ?>><?php echo e($cat_data->title); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value='<?php echo e($cat_data->id); ?>' data-size="<?php echo e($cat_data->size); ?>" data-brand="<?php echo e($cat_data->brand_id); ?>"
                                        <?php if($product->cat_id == $cat_data->id): ?> selected <?php endif; ?>><?php echo e($cat_data->title); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </select>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Color Code </label>
                            <input type="text" id="inputProductColor" class="form-control" name="color"
                                value="<?php echo e($product->color); ?>">
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Size: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="<?php echo e($product->size); ?>" name="size" placeholder="Size">
                            
                        </div>
                    </div>

                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color_description" class="col-form-label d-flex">Color Description
                                
                            </label>
                            <input type="text" class="form-control" name="color_description"
                                value="<?php echo e($product->color_description); ?>">
                            <?php $__errorArgs = ['color_description'];
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
                    </div>

                    

                    
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="col-form-label">ITEM Code </label>
                            <input type="text" class="form-control" name="product_uan_code"
                                value="<?php echo e($product->product_uan_code); ?>">
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="col-form-label">EAN Code </label>
                            <input type="text" class="form-control" name="product_ean_code"
                                value="<?php echo e($product->product_ean_code); ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="shape">Product Shape <span class="text-danger">*</span></label>
                            <select name="shape" id="shape" class="form-control">
                                <option value="">--Select any Shape--</option>
                                <?php $__currentLoopData = $shapes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $shape): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value='<?php echo e($shape->id); ?>' <?php if($shape->id == $product->shape): ?> selected <?php endif; ?>>
                                        <?php echo e($shape->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="product_material">Product Material <span class="text-danger">*</span></label>
                            <select name="product_material" id="product_material" class="form-control">
                                <option value="">--Select any Material--</option>
                                <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value='<?php echo e($material->id); ?>' <?php if($material->id == $product->product_material): ?> selected <?php endif; ?>>
                                        <?php echo e($material->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="type" class="col-form-label">Product Type <span
                                class="text-danger">*</span></label>
                        <select name="type" id="type" class="form-control">
                            <option value="">--Select Product Type --</option>
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($type->id); ?>' <?php if($product->type == $type->id): ?> selected <?php endif; ?>>
                                    <?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="category_for">Gender</label>

                            <select name="product_for" id="category_for" class="form-control ">
                                <?php $__currentLoopData = $product_for; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro_for): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value='<?php echo e($pro_for->id); ?>' <?php if($product->product_for == $pro_for->id): ?> selected <?php endif; ?>>
                                        <?php echo e($pro_for->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lense_type">Lense Type<span class="text-danger">*</span></label>
                            <select name="lense_type" id="lense_type" class="form-control">
                                <option value="">--Select any lense type--</option>
                                <?php $__currentLoopData = $lensTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lensType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value='<?php echo e($lensType->id); ?>'
                                        <?php if($lensType->id == $product->lense_type): ?> selected <?php endif; ?>><?php echo e($lensType->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unit_price" class="col-form-label d-flex">Unit Price
                                
                            </label>
                            <input type="text" class="form-control" name="unit_price"
                                value="<?php echo e($product->unit_price); ?>">
                            <?php $__errorArgs = ['unit_price'];
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
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="price" class="col-form-label">Price<span class="text-danger">*</span></label>
                            <input id="price" type="number" name="price" placeholder="Enter price"
                                value="<?php echo e($product->price); ?>" class="form-control">
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
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="shipping_cost">Shipping Cost <span class="text-danger">*</span></label>
                            <input id="shipping_cost" type="number" name="shipping_cost" placeholder="Enter Shipping Cost"
                                value="<?php echo e($product->shipping_cost ?? ''); ?>" class="form-control">
                            <?php $__errorArgs = ['shipping_cost'];
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
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stock">Quantity <span class="text-danger">*</span></label>
                            <input id="quantity" type="number" name="stock" min="0"
                                placeholder="Enter quantity" value="<?php echo e($product->stock); ?>" class="form-control">
                            <?php $__errorArgs = ['stock'];
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
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="condition">Condition</label>
                            <select name="condition" class="form-control">
                                <option value="">--Select Condition--</option>
                                <option value="default" <?php if($product->condition == 'default'): ?> selected <?php endif; ?>>Default
                                </option>
                                <option value="new" <?php if($product->condition == 'new'): ?> selected <?php endif; ?>>New</option>
                                <option value="hot" <?php if($product->condition == 'hot'): ?> selected <?php endif; ?>>Hot</option>
                            </select>
                        </div>
                    </div>

                    


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status <span
                                    class="text-danger">*</span></label>
                            <select name="status" class="form-control">
                                <option value="active" <?php echo e($product->status == 'active' ? 'selected' : ''); ?>>Active</option>
                                <option value="inactive" <?php echo e($product->status == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
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
                    </div>


                </div>







                
                <div class="form-group <?php echo e($product->child_cat_id ? '' : 'd-none'); ?>" id="child_cat_div">
                    <label for="child_cat_id">Sub Category</label>
                    <select name="child_cat_id" id="child_cat_id" class="form-control">
                        <option value="">--Select any sub category--</option>
                    </select>
                </div>

                <div class="row">



                    

                    

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="brand_id">Dispatch From <span class="text-danger">*</span></label>
                            <select name="dispatch_from" id="dispatch" class="form-control select2">
                                <option value="">--Select Country--</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->shortname); ?>" <?php if($country->shortname == $product->dispatch_from): ?> selected <?php endif; ?>>
                                        <?php echo e($country->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="stock">Country Of Region <span class="text-danger">*</span></label>
                            <input id="country_of_region" type="text" value="<?php echo e($product->country_of_origin); ?>" name="country_of_origin"
                                placeholder="Enter Country Of Region"  class="form-control">
                            <?php $__errorArgs = ['country_of_origin'];
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
                    </div>


                    <div class="col-md-4 mt-4">
                        <div class="form-group">
                            <label for="is_featured">Is Featured</label><br>
                            <input type="checkbox" name='is_featured' id='is_featured' value="1"
                                <?php echo e($product->is_featured ? 'checked' : ''); ?>> Yes

                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control" hidden id="description" name="description"><?php echo e($product->description); ?></textarea>
                    <?php $__errorArgs = ['description'];
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
                
                <div class="jumbotron" id="seo_jumbotron">
                    <h4>SEO related information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_meta_title">Product Meta Title</label>
                                <input type="text" id="product_meta_title" value="<?php echo e($product->product_meta_title); ?>"
                                    class="form-control" name="product_meta_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_meta_keyword">Product Meta Keywords</label>
                                <input type="text" id="product_meta_keyword"
                                    value="<?php echo e($product->product_meta_keyword); ?>" class="form-control"
                                    name="product_meta_keyword">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="product_meta_description">Product Meta Description</label><br>
                                <textarea name="product_meta_description" value="<?php echo e($product->product_meta_description); ?>" rows="4"
                                    cols="100"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">

                    <button class="btn btn-success" type="submit">Update</button>

                </div>

            </form>


            <div id="imageModel" class="modal fade bd-example-modal-lg" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Crop & Resize Upload Image</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                </div>
                                <div class="col-md-4">
                                    <div class="preview"></div>
                                    <div class="col-md-12 px-2">
                                        <div class="input-group py-2 input-group-sm">
                                            <span class="input-group-prepend">
                                                <label class="input-group-text" for="dataWidth">Width</label>
                                            </span>
                                            <input type="text" class="form-control" id="dataWidth"
                                                placeholder="width">
                                            <span class="input-group-append">
                                                <span class="input-group-text">px</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 px-2">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-prepend">
                                                <label class="input-group-text" for="dataWidth">Height</label>
                                            </span>
                                            <input type="text" class="form-control" id="dataHeight"
                                                placeholder="Height">
                                            <span class="input-group-append">
                                                <span class="input-group-text">px</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startPush('styles'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
        <style type="text/css">
            img {
                display: block;
                max-width: 100%;
            }

            .preview {
                overflow: hidden;
                width: 160px;
                height: 160px;
                margin: 10px;
                border: 1px solid red;
            }

            .modal-lg {
                max-width: 1000px !important;
            }

            .img-responsive {
                width: auto;
                height: 100px;
            }


            .image-area {
                position: relative;
                width: 50%;
                background: #333;
            }

            .image-area img {
                max-width: 100%;
                height: auto;
            }

            .remove-image {
                display: none;
                position: absolute;
                top: -10px;
                right: -10px;
                border-radius: 10em;
                padding: 2px 6px 3px;
                text-decoration: none;
                font: 700 21px/20px sans-serif;
                background: #555;
                border: 3px solid #fff;
                color: #FFF;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
                -webkit-transition: background 0.5s;
                transition: background 0.5s;
            }

            .remove-image:hover {
                background: #E54E4E;
                padding: 3px 7px 5px;
                top: -11px;
                right: -11px;
            }

            .remove-image:active {
                background: #E54E4E;
                top: -10px;
                right: -11px;
            }


        .cke_inner {
                width: 100%;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('scripts'); ?>
        
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

        <script>
            jQuery('#brand_id').change(function() {
                var selectedVal = jQuery(this).val();
                var option = jQuery('#cat_id').find('option');
                option.each(function(index, val) {
                    if (selectedVal != val.getAttribute('data-brand')) {
                        val.style.display = "none";
                    } else {
                        val.style.display = "block";
                    }
                })
            })

            CKEDITOR.replace( 'description', {
                resize_dir: 'both',
                removeButtons: 'PasteFromWord'
            } );

            $("#cke_description").attr('width',' ')

            $('#brand_id').change(function() {
                var brand_id = $(this).val();

                if (brand_id != null) {

                    // ajax call
                    $.ajax({
                        url: "<?php echo e(url('/admin/category')); ?>/" + brand_id + "/brand",
                        type: "POST",
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success: function(response) {

                            var html_option = "<option value=''>--Select any one--</option>";
                            if (response.status) {
                                var data = response.data;
                                if (response.data) {
                                    $.each(data, function(i) {

                                        html_option += "<option value='" + data[i].id + "'>" +data[i].title + "</option>";
                                    });
                                } else {
                                    console.log('no response data');
                                }
                            }
                            $('#cat_id').empty();
                            $('#cat_id').html(html_option);
                        }
                    });
                } else {}

            });




            var $modal = $('#imageModel');
            var image = document.getElementById('image');
            var _target = "";

            var cropper;
            $("body").on("change", "#front_image, #back_image, #g_image_1, #g_image_2, #g_image_3", function(e) {
                _target = jQuery(this).attr('id');
                var files = e.target.files;
                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };
                var reader;
                var file;
                var url;
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function(e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            $("body").on('click', "#front_image, #back_image, #g_image_1, #g_image_2, #g_image_3", function() {
                $(this).val(null);
            });

            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    preview: '.preview',
                    movable: false,
                    zoomable: false,
                    rotatable: false,
                    scalable: false,
                    crop(event) {
                        $("#dataWidth").val(parseInt(event.detail.width));
                        $("#dataHeight").val(parseInt(event.detail.height));
                    },
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            })


            $("#crop").click(function() {
                var croppedImg = cropper.getData();
                canvas = cropper.getCroppedCanvas({
                    width: parseInt(croppedImg.width),
                    height: parseInt(croppedImg.height),
                });

                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;

                        jQuery('input[name="' + _target + '"]').val(base64data)
                        $modal.modal('hide');

                    }
                });
            })

            var brand = '',
                category = '',
                color = '',
                product_name = '';

            $("#brand_id").change(function() {
                brand = $(this).children("option:selected").text();
                if ($("#cat_id").children("option:selected").val() != '' && category != '') {
                    category = $("#cat_id").children("option:selected").text()
                }
                if (color == '') {
                    color = $("#inputProductColor").val();
                }
                product_name = brand + " " + category + " " + color
                $("#inputProductName").val(removeExtraSpaces(product_name))
            });

            $("#cat_id").change(function() {
                if (brand == '') {
                    brand = $("#brand_id").children("option:selected").text();
                }
                if ($("#cat_id").children("option:selected").val() != '') {
                    category = $("#cat_id").children("option:selected").text()
                }
                if (color == '') {
                    color = $("#inputProductColor").val();
                }

                product_name = brand + " " + category + " " + color
                $("#inputProductName").val(removeExtraSpaces(product_name))
            });

            $("#inputProductColor").keyup(function() {
                if (brand == '') {
                    brand = $("#brand_id").children("option:selected").text();
                }
                if (category == '') {
                    category = $("#cat_id").children("option:selected").text()
                }
                color = $("#inputProductColor").val();
                product_name = brand + " " + category + " " + color
                $("#inputProductName").val(removeExtraSpaces(product_name))
            });

            const removeExtraSpaces = (string) => {
                const newText = string
                    .replace(/\s+/g, " ")
                    .replace(/^\s+|\s+$/g, "")
                    .replace(/ +(\W)/g, "$1");
                return newText
            };


            function deleteImage(col) {
                $.ajax({
                    url: "<?php echo e(url('/deleteImage')); ?>",
                    type: "POSt",
                    data: {
                        _token:"<?php echo e(csrf_token()); ?>",
                        id:"<?php echo e($product->id); ?>",
                        col:col,
                        data:null,
                    },
                    success: function(data) {
                        if(data.status == 200){
                            swal({
                                title: "Good job!",
                                text: data.message,
                                icon: "success",
                                buttons: true,
                            })

                            $("#"+"preview_"+col).remove();
                        }
                    }
                });
            }

            if (child_cat_id != null) {
                $('#cat_id').change();
            }
            //Get Lens Detail on Category Change
            var child_cat_id = '<?php echo e($product->cat_id); ?>';
            $('#cat_id').change(function() {
                var cat_id = $(this).val();


                if (cat_id != null) {
                    var _size = $('#cat_id option[value=' + cat_id + ']').attr('data-size');
                    if (_size) {
                        _size = JSON.parse(_size);
                        jQuery('#product_lens_width').val(_size.width)
                        jQuery('#product_bridge').val(_size.bridge)
                        jQuery('#product_arm_length').val(_size.arm_length)
                        jQuery('#product_lens_height').val(_size.lens_height)
                        jQuery('#product_total_width').val(_size.total_width)

                    } else {
                        jQuery('#product_lens_width').val('')
                        jQuery('#product_bridge').val('')
                        jQuery('#product_arm_length').val('')
                        jQuery('#product_lens_height').val('')
                        jQuery('#product_total_width').val('')

                    }

                    // ajax call
                    $.ajax({
                        url: "<?php echo e(url('/admin/category')); ?>/" + cat_id + "/child",
                        type: "POST",
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success: function(response) {
                            if (typeof(response) != 'object') {
                                response = $.parseJSON(response);
                            }
                            var html_option = "<option value=''>--Select any one--</option>";
                            if (response.status) {
                                var data = response.data;
                                if (response.data) {
                                    $('#child_cat_div').removeClass('d-none');
                                    $.each(data, function(id, title) {
                                        html_option += "<option value='" + id + "' " + (
                                                child_cat_id == id ? 'selected ' : '') + ">" +
                                            title + "</option>";
                                    });
                                } else {
                                    console.log('no response data');
                                }
                            } else {
                                $('#child_cat_div').addClass('d-none');
                            }
                            $('#child_cat_id').html(html_option);
                        }
                    });
                } else {}

            });

        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eyewear\resources\views/backend/product/edit.blade.php ENDPATH**/ ?>