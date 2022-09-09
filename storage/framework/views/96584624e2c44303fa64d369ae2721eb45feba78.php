<?php $__env->startSection('title', ' Home'); ?>
<?php $__env->startSection('description', 'luxuryeyewear Description '); ?>
<?php $__env->startSection('keywords', ' luxuryeyewear Keywords'); ?>
<?php $__env->startSection('robots', 'index, follow'); ?>
<?php $__env->startSection('revisit-after', 'content="3 days'); ?>
<?php $__env->startSection('main-content'); ?>
<section>
          
          <?php echo $__env->make('frontend.layouts.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          
</section>
<section>
  <div class="brand_logo_section">
    <div class="container">
      <div class="brand_swiper_img">
        <div class="swiper logoSwiper">
          <div class="swiper-wrapper">
          <?php $__currentLoopData = $brand_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <a href="<?php echo e(route('product-brand',[$brands->slug])); ?>">
                <img src="<?php echo e(asset($brands->brand_image)); ?>" alt="<?php echo e($brands->title); ?>"  title="<?php echo e($brands->title); ?>">
              </a></div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <!-- <div class="swiper-pagination"></div> -->
        </div>
      </div>
    </div>
  </div>
</section>

    <?php
     $female_eyeglass_banner = $banners->where('type','female_eyeglass')->where('status','active')->first();
     $man_eyeglass_banner = $banners->where('type','man_eyeglass')->where('status','active')->first();
     $female_sunglass_banner = $banners->where('type','female_sunglass')->where('status','active')->first();
     $man_sunglass_banner = $banners->where('type','man_sunglass')->where('status','active')->first();
     $gallery = $banners->where('type','gallery')->where('status','active');
    ?>

<!-- Female Eyeglasses COre Collection start  -->
<!-- Female Sunglasses COre Collection  start -->
<section>
    <div class="productsCol  pb-0">
      <div class="container">
        <div class="bgLight">
          <div class="row gx-0 align-items-center">
            <div class="col-sm-6">
              <div class="core_coll_img">
                <?php if($female_eyeglass_banner): ?>
                <img src="<?php echo e(asset($female_eyeglass_banner->photo)); ?>" alt="Image Not Found">
                <?php else: ?>
                <img src="<?php echo e(asset('assets/./images/female-product2.jpg')); ?>" alt="Image Not Found">
                <?php endif; ?>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="collection_col whiteBGColor core_coll_block_padding">
                <h2 class="darkColor">
                    <?php echo e($female_eyeglass_banner->title ?? 'Female Sunglasses COre Collection'); ?>

                    </h2>
                  <div class="line"></div>
                  <div class="row text-end">
                    <div class="col">
                      <div class="core_coll_shop_btn">
                        <a href="<?php echo e(route('front.sunglass.page',['women'])); ?>" class="btn btnShop darkBGColor whiteColor whiteColor" href="#">SHOP</a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="productColMain">
         <!-- female sun glass start   -->
        <?php echo $__env->make('frontend.pages.section.female_sunglass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <!-- female sun glass end  -->
          <div class="btnCol text-center">
            <a href="<?php echo e(route('front.sunglass.page',['women'])); ?>" class="btn btnPrimary minWdBtn btnNew">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Male Sunglasses COre Collection -->
<section>
    <div class="productsCol section_space pb-0">
      <div class="container">
        <div class="bgLight">
          <div class="row gx-0 align-items-center">
            <div class="col-sm-6 order-lg-last">
              <div class="core_coll_img">
                <?php if($man_sunglass_banner): ?>
                <img src="<?php echo e(asset($man_sunglass_banner->photo)); ?>" alt="Image Not Found">
                <?php else: ?>
                <img src="<?php echo e(asset('assets/./images/male-product.jpg')); ?>" alt="Image Not Found">
                <?php endif; ?>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="collection_col whiteBGColor core_coll_block_padding collection_col_right">
                <h2 class="darkColor"> <?php echo e($man_sunglass_banner->title ?? 'Male Sunglasses Core Collection'); ?> </h2>
                  <div class="line"></div>
                  <div class="row text-end">
                    <div class="col">
                      <div class="core_coll_shop_btn">
                        <a href="<?php echo e(route('front.sunglass.page',['men'])); ?>" class="btn btnShop darkBGColor whiteColor whiteColor">SHOP</a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="productColMain">
        <!-- male sun glass  -->
        <?php echo $__env->make('frontend.pages.section.men_sunglass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- male sun glass  -->
          <div class="btnCol text-center">
            <a href="<?php echo e(route('front.sunglass.page',['men'])); ?>" class="btn btnPrimary minWdBtn btnNew">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Male Sunglasses COre Collection end  -->

  <!-- $ card images  start  -->
<section>
    <div class="image_grid_col section_space image_grid_content overflow-hidden">
      <div class="row g-2">
        <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6">
            <a href="#">
                <img src="<?php echo e(asset($gl->photo)); ?>" alt="<?php echo e($gl->photo); ?>">
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
      </div>
    </div>
  </section>
  <!-- $ card images end   -->

<section>
  <div class="productsCol section_space pt-0">
    <div class="container">
      <div class="bgLight">
        <div class="row gx-0 align-items-center">
          <div class="col-sm-6">
            <div class="core_coll_img">
                <?php if($female_eyeglass_banner): ?>
                <img src="<?php echo e(asset($female_eyeglass_banner->photo)); ?>" alt="Image Not Found">
                <?php else: ?>
                <img src="<?php echo e(asset('assets/./images/female_eye_glass.png')); ?>" alt="Image of female eye glass ">
                <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="collection_col whiteBGColor core_coll_block_padding">
              <h2 class="darkColor">
                <?php echo e($female_eyeglass_banner->title ?? 'Female Eyeglasses COre Collection'); ?></h2>
                <div class="line"></div>
                <div class="row text-end">
                  <div class="col">
                    <div class="core_coll_shop_btn">
                      <a href="<?php echo e(route('front.eyeglass.page',['women'])); ?>" class="btn btnShop darkBGColor whiteColor whiteColor" href="#">SHOP</a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="productColMain">
      <!-- female eye glass row  -->
      <?php echo $__env->make('frontend.pages.section.female_eyeglass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- female eye glass end  -->
        <div class="btnCol text-center">
          <a href="<?php echo e(route('front.eyeglass.page',['women'])); ?>" class="btn btnPrimary minWdBtn btnNew">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Female Eyeglasses COre Collection end   -->
<!-- Male Eyeglasses COre Collection start  -->
<section>
  <div class="productsCol section_space pt-0">
    <div class="container">
      <div class="bgLight">
        <div class="row gx-0 align-items-center">
          <div class="col-sm-6 order-lg-last">
            <div class="core_coll_img">
                <?php if($man_eyeglass_banner): ?>
                <img src="<?php echo e(asset($man_eyeglass_banner->photo)); ?>" alt="Image Not Found">
                <?php else: ?>
                <img src="<?php echo e(asset('assets/./images/male-product1.jpg')); ?>" alt="Image Not Found">
                <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="collection_col whiteBGColor core_coll_block_padding collection_col_right">
              <h2 class="darkColor"><?php echo e($man_eyeglass_banner->title ?? ' Eyeglasses Core Collection'); ?> </h2>
                <div class="line"></div>
                <div class="row text-end">
                  <div class="col">
                    <div class="core_coll_shop_btn">
                      <a href="<?php echo e(route('front.eyeglass.page',['men'])); ?>" class="btn btnShop darkBGColor whiteColor whiteColor">SHOP</a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="productColMain">
      <!-- male sun glass  -->
      <?php echo $__env->make('frontend.pages.section.men_eyeglass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- male sunglass  -->
        <div class="btnCol text-center">
          <a href="<?php echo e(route('front.eyeglass.page',['men'])); ?>" class="btn btnPrimary minWdBtn btnNew">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Male Eyeglasses COre Collection end  -->


<!-- Female Sunglasses COre Collection end -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
     var root = "<?php echo e(asset('')); ?>";
     var product = <?php echo json_encode($product_variant, 15, 512) ?>

     function changeProDetail(id,type,parent_id) {
        var data = product.find(item => item.id == id)
        if(data.length != 0){
            $('.last-product-'+parent_id).removeClass('active-product last-product')
            $("#href_"+type+parent_id+"_"+id).addClass('active-product last-product')
            if(data.id != id){$("#href_"+type+parent_id+"_"+current_prod_id).removeClass('active-product')}
            if(!isValidURL(data.photo)){
                $("#" + type + "pro_img_" + parent_id).attr('src', root + insertAtPosition(data.photo,'med'))
            }else{
                $("#" + type + "pro_img_" + parent_id).attr('src', data.photo)
            }
            $("#"+type+"brand_name_"+parent_id).html(data.brand_name)
            $("#"+type+"pro_model_"+parent_id).html("<a class='text-dark link-primary' href='<?php echo e(url('product-detail')); ?>/"+data.slug+"'>"+data.title+"</a>")
            $("#"+type+"pro_price_"+parent_id).html("$"+Math.ceil(data.price))
            $("#"+type+"pro_discount_"+parent_id).html("%"+data.discount)
        }

    }
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eyewear\resources\views/frontend/index.blade.php ENDPATH**/ ?>