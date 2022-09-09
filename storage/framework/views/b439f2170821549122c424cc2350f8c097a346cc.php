  <div class="row g-4">

      <?php $__currentLoopData = $male_eyeglasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-6 col-xl-4">


            <div class="cardStyle1">

                

                <div class="productImg">
                    <a href="<?php echo e(route('product-detail', $product->slug)); ?>">
                        <div class="imgCol">
                            <img src="<?php echo e(asset($product->photo)); ?>" id="men_eyeglass_pro_img_<?php echo e($product->id); ?>" alt="Product ">
                        </div>
                    </a>

                    <div class="color_builts">
                        <ul>
                            <?php if($active = $product): ?>
                                <li>
                                    <a href="javascript:void(0)" onclick="changeProDetail(<?php echo e($active->id); ?>,'men_eyeglass_',<?php echo e($product->id); ?>)" >
                                        <?php if(!isValidUrl($active->photo)): ?>
                                        <img src="<?php echo e(asset(insertAtPosition($active->photo))); ?>" alt="" class="p-2 hover-product active-product last-product last-product-<?php echo e($product->id); ?>" id="href_men_eyeglass_<?php echo e($product->id); ?>_<?php echo e($active->id); ?>" onmouseover="changeProDetail(<?php echo e($product->id); ?>,'men_eyeglass_',<?php echo e($product->id); ?>)">
                                        <?php else: ?>
                                        <img src="<?php echo e($active->photo); ?>" alt="" class="p-2 hover-product active-product last-product last-product-<?php echo e($product->id); ?>" id="href_men_eyeglass_<?php echo e($product->id); ?>_<?php echo e($active->id); ?>" onmouseover="changeProDetail(<?php echo e($product->id); ?>,'men_eyeglass_',<?php echo e($product->id); ?>)">
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php $__currentLoopData = $product_variant->where('id','!=',$product->id)->whereIn('product_for',[27,30])->flatten(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($i <= 2): ?>
                                <li>
                                    <a href="javascript:void(0)"  onclick="changeProDetail(<?php echo e($variant->id); ?>,'men_eyeglass_',<?php echo e($product->id); ?>)" onmouseover="changeProDetail(<?php echo e($variant->id); ?>,'men_eyeglass_',<?php echo e($product->id); ?>)">
                                        <?php if(!isValidUrl($variant->photo)): ?>
                                        <img src="<?php echo e(asset(insertAtPosition($variant->photo))); ?>" class="p-2 hover-product last-product-<?php echo e($product->id); ?>" id="href_men_eyeglass_<?php echo e($product->id); ?>_<?php echo e($variant->id); ?>">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset(insertAtPosition($variant->photo))); ?>" class="p-2 hover-product last-product-<?php echo e($product->id); ?>" id="href_men_eyeglass_<?php echo e($product->id); ?>_<?php echo e($variant->id); ?>">
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(isset($i) && $i >= 2): ?>
                                <?php if((count($product_variant->whereIn('product_for',[27,30])) - 4) != 0): ?>
                                <li>
                                    <a href="<?php echo e(route('product-detail',[$product->slug])); ?>" class="text-danger m-2">
                                        +<?php echo e(count($product_variant->whereIn('product_for',[27,30])) - 4); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            <?php endif; ?>

                        </ul>

                    </div>

                </div>

                <div class="contentCol">

                    <h4 class="brandCol" id="men_eyeglass_brand_name_<?php echo e($product->id); ?>""><?php echo e($product->brand->title); ?> </h4>
                    <a href="<?php echo e(route('product-detail', $product->slug)); ?>" target="_blank" class="text-dark">
                        <p id="men_eyeglass_pro_model_<?php echo e($product->id); ?>" class="text-dark link-primary"><?php echo e($product->title); ?></p>
                    </a>
                    <span class="priceCol" id="men_eyeglass_pro_price_<?php echo e($product->id); ?>""> $<?php echo e(ceil($product->price)); ?></span>


                    <div class="row gx-2">

                        <div class="col-auto">

                            <a href="<?php echo e(route('single-add-to-cart', $product->slug)); ?>"
                                class="btn btnDark w-100 addCartBtn">ADD TO CART</a>

                        </div>

                        <div class="col">

                            <a href="<?php echo e(route('add-to-wishlist', $product->slug)); ?>"
                                class="btn btnDark_outline w-100">ADD TO WISHLIST</a>

                        </div>

                    </div>

                </div>

            </div>


          </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php /**PATH C:\laragon\www\eyewear\resources\views/frontend/pages/section/men_eyeglass.blade.php ENDPATH**/ ?>