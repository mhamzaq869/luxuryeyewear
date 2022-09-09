<div class="bannerCol">
  <div class="container-fluid p-0">
    <div class="bannerSlider">
      <div class="swiper bannerSlider swiperStyle">
        <div class="swiper-wrapper">
          <?php $__currentLoopData = $banners->where('type','slider')->flatten(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="swiper-slide <?php echo e((($key==0)? 'active' : '')); ?>">
            <div class="swiper_bg_img" style="background-image: url(<?php echo e(asset($banner->photo)); ?>);">
              <div class="container">
                <div class="bannerImgCnt">
                  <a href="javascript:void(0)"><img src="<?php echo e(asset('assets/images/banner-content.png')); ?>" alt="..." class="saleImg"></a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\laragon\www\eyewear\resources\views/frontend/layouts/slider.blade.php ENDPATH**/ ?>