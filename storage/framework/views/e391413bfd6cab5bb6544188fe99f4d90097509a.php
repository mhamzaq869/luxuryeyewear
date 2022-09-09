<?php $__env->startSection('meta'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
    <meta name="description" content="<?php echo e($product_detail->summary ?? ''); ?>">
    <meta property="og:url" content="<?php echo e(route('product-detail', $product_detail->slug ?? '')); ?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?php echo e($product_detail->title ?? ''); ?>">
    <meta property="og:image" content="<?php echo e($product_detail->photo ?? ''); ?>">

    <meta property="og:description" content="<?php echo e($product_detail->description ?? ''); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', ' PRODUCT DETAIL'); ?>
<?php $__env->startSection('main-content'); ?>
    <!--new data section  start -->
    <section>
        <div class="productDetailPage">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="swiper_COl">
                            <div class="swiper mySwiper2" itemscope data-swiper-autoplay="1000000" itemtype="http://schema.org/ImageGallery">
                                <ul class="swiper-wrapper my-gallery ">

                                    <?php if(!empty($product_detail->p_f)): ?>
                                        <li id="1" class="swiper-slide" itemprop="associatedMedia" itemscope
                                            itemtype="http://schema.org/ImageObject">
                                            <a title="click to zoom-in " href="<?php echo e(asset($product_detail->p_f) ?? ''); ?>"
                                                itemprop="contentUrl" data-size="2400x1200">
                                                <?php if(!isValidUrl($product_detail->p_f)): ?>
                                                <img src="<?php echo e(asset(insertAtPosition($product_detail->p_f,'med')) ?? ''); ?>" class="proSlideImg"
                                                    itemprop="thumbnail" alt="Image description" />
                                                <?php else: ?>
                                                <img src="<?php echo e($product_detail->p_f); ?>" class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(!empty($product_detail->p_b)): ?>
                                        <li id="2" class="swiper-slide " itemprop="associatedMedia" itemscope
                                            itemtype="http://schema.org/ImageObject">
                                            <a title="click to zoom-in" href="<?php echo e(asset($product_detail->p_b) ?? ''); ?>"
                                                itemprop="contentUrl" data-size="2400x1200">

                                                <?php if(!isValidUrl($product_detail->p_b)): ?>
                                                <img src="<?php echo e(asset(insertAtPosition($product_detail->p_b,'med')) ?? ''); ?>" class="proSlideImg"
                                                    itemprop="thumbnail" alt="Image description" />
                                                <?php else: ?>
                                                <img src="<?php echo e($product_detail->p_b); ?>" class="proSlideImg"
                                                itemprop="thumbnail" alt="Image description" />
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(!empty($product_detail->g_image_1)): ?>
                                        <li id="3" class="swiper-slide" >
                                            <a title="click to zoom-in" href="<?php echo e(asset($product_detail->g_image_1) ?? ''); ?>"
                                                itemprop="contentUrl" data-size="2400x1200">
                                                <?php if(!isValidUrl($product_detail->g_image_1)): ?>
                                                <img src="<?php echo e(asset(insertAtPosition($product_detail->g_image_1,'med')) ?? ''); ?>"
                                                    class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                                <?php else: ?>
                                                <img src="<?php echo e($product_detail->g_image_1); ?>"
                                                    class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(!empty($product_detail->g_image_2)): ?>
                                        <li id="4" class="swiper-slide" itemprop="associatedMedia" itemscope
                                            itemtype="http://schema.org/ImageObject">
                                            <a title="click to zoom-in"
                                                href="<?php echo e(asset($product_detail->g_image_2) ?? ''); ?>" itemprop="contentUrl"
                                                data-size="2400x1200">
                                                <?php if(!isValidUrl($product_detail->g_image_2)): ?>
                                                <img src="<?php echo e(asset(insertAtPosition($product_detail->g_image_2,'med')) ?? ''); ?>"
                                                    class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                                <?php else: ?>
                                                <img src="<?php echo e($product_detail->g_image_2); ?>"
                                                    class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if(!empty($product_detail->g_image_3)): ?>
                                        <li id="5" class="swiper-slide" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a title="click to zoom-in"
                                                href="<?php echo e(asset($product_detail->g_image_3) ?? ''); ?>" itemprop="contentUrl"
                                                data-size="2400x1200">
                                                <?php if(!isValidUrl($product_detail->g_image_3)): ?>
                                                <img src="<?php echo e(asset(insertAtPosition($product_detail->g_image_3,'med')) ?? ''); ?>"
                                                    class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                                <?php else: ?>
                                                <img src="<?php echo e($product_detail->g_image_3); ?>"
                                                class="proSlideImg" itemprop="thumbnail" alt="Image description" />
                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>



                                </ul>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="pswp__bg"></div>
                                <div class="pswp__scroll-wrap">
                                    <div class="pswp__container">
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                        <div class="pswp__item"></div>
                                    </div>
                                    <div class="pswp__ui pswp__ui--hidden">
                                        <div class="pswp__top-bar" style="background-color:transparent !important">
                                            <div class="pswp__counter"></div>
                                            <button class="pswp__button pswp__button--close text-dark"
                                                style="background-color:rgba(0,0,0,.3) !important"
                                                title="Close (Esc)"></button>

                                            <div class="pswp__preloader">
                                                <div class="pswp__preloader__icn">
                                                    <div class="pswp__preloader__cut">
                                                        <div class="pswp__preloader__donut"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                            <div class="pswp__share-tooltip"></div>
                                        </div>
                                        <button class="pswp__button pswp__button--arrow--left"
                                            title="Previous (arrow left)"></button>
                                        <button class="pswp__button pswp__button--arrow--right"
                                            title="Next (arrow right)"></button>
                                        <div class="pswp__caption">
                                            <div class="pswp__caption__center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper" data-swiper-autoplay="1000000" style="margin-top:50px">
                                <div class="swiper-wrapper text-center" data-swiper-autoplay="1000000">

                                    <?php if(!empty($product_detail->p_f)): ?>
                                        <div class="swiper-slide" onmouseover="hoverImage(1)" data-swiper-autoplay="1000000"  style="width: 151.5px;margin-right: 10px;">
                                            <?php if(!isValidUrl($product_detail->p_f)): ?>
                                            <img src="<?php echo e(asset(insertAtPosition($product_detail->p_f))); ?>" alt="<?php echo e(asset($product_detail->p_f)); ?>" class="w-75 " />
                                            <?php else: ?>
                                            <img src="<?php echo e($product_detail->p_f); ?>" alt="<?php echo e($product_detail->p_f); ?>" class="w-75 " />
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(!empty($product_detail->p_b)): ?>
                                        <div class="swiper-slide" onmouseover="hoverImage(2)" data-swiper-autoplay="1000000" style="width: 151.5px;margin-right: 10px;">
                                            <?php if(!isValidUrl($product_detail->p_b)): ?>
                                            <img src="<?php echo e(asset(insertAtPosition($product_detail->p_b))); ?>"
                                                alt="<?php echo e(asset($product_detail->p_b)); ?>" class="w-75 " />
                                            <?php else: ?>
                                            <img src="<?php echo e($product_detail->p_b); ?>"
                                                alt="<?php echo e($product_detail->p_b); ?>" class="w-75 " />
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(!empty($product_detail->g_image_1)): ?>
                                        <div class="swiper-slide" onmouseover="hoverImage(3)" data-swiper-autoplay="1000000" style="width: 151.5px;margin-right: 10px;">
                                            <?php if(!isValidUrl($product_detail->g_image_1)): ?>
                                            <img src="<?php echo e(asset(insertAtPosition($product_detail->g_image_1))); ?>" alt="<?php echo e(asset($product_detail->g_image_1)); ?>" class="w-75 " />
                                            <?php else: ?>
                                            <img src="<?php echo e($product_detail->g_image_1); ?>" alt="<?php echo e($product_detail->g_image_1); ?>" class="w-75 " />
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(!empty($product_detail->g_image_2)): ?>
                                        <div class="swiper-slide" onmouseover="hoverImage(4)" data-swiper-autoplay="1000000" style="width: 151.5px;margin-right: 10px;">
                                            <?php if(!isValidUrl($product_detail->g_image_2)): ?>
                                            <img src="<?php echo e(asset(insertAtPosition($product_detail->g_image_2))); ?>" alt="<?php echo e(asset(insertAtPosition($product_detail->g_image_2))); ?>" class="w-75 " />
                                            <?php else: ?>
                                            <img src="<?php echo e($product_detail->g_image_2); ?>" alt="<?php echo e($product_detail->g_image_2); ?>" class="w-75 " />
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(!empty($product_detail->g_image_3)): ?>
                                        <div class="swiper-slide" onmouseover="hoverImage(5)" data-swiper-autoplay="1000000" style="width: 151.5px;margin-right: 10px;">
                                            <?php if(!isValidUrl($product_detail->g_image_3)): ?>
                                            <img src="<?php echo e(asset(insertAtPosition($product_detail->g_image_3))); ?>" alt="<?php echo e(asset(insertAtPosition($product_detail->g_image_3))); ?>" class="w-75 " />
                                            <?php else: ?>
                                            <img src="<?php echo e($product_detail->g_image_3); ?>" alt="<?php echo e($product_detail->g_image_3); ?>" class="w-75 " />
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="proDetailRightCol">
                            <div class="zoom">
                            </div>
                            <div class="topBrandCol">
                                <span class="text-secondary">Brand:</span>
                                <a href="<?php echo e(route('product-brand', [$product_detail['brand']['title']])); ?>"
                                    class="text-dark">
                                    <small class="brand"
                                        style="color:#F07500; font-weight:600"><?php echo e($product_detail['brand']['title'] ?? ''); ?></small>
                                </a>
                            </div>
                            <h2 class="proTitle pt-2 pb-1 text-dark"><?php echo e($product_detail->title); ?></h2>
                            <p class="uan_no" style="font-weight: bold"><?php echo e($product_detail->size ?? ''); ?> <?php echo e($product_detail->color_description ?? ''); ?>

                            </p>
                            <p class="ean_no" style="font-weight: ">Item Code: <?php echo e($product_detail->product_uan_code ?? ''); ?></p>

                            <div class="row gy-2">
                                <div class="col-12">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                             <span class="productPrice">$<?php echo e(ceil($product_detail->price)); ?></span> <br>
                                            <?php if($product_detail->shipping_cost > 0): ?>
                                             <span class="productPrice">$<?php echo e($product_detail->shipping_cost); ?></span> <br>
                                            <?php endif; ?>

                                            <?php if($product_detail->transit): ?>
                                             <span class="productPrice">$<?php echo e($product_detail->transit); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-auto mt-2 qntyInput text-end <?php if($product_detail->stock == 0): ?> d-none <?php endif; ?>">
                                            <div class="product_quantity">
                                                <div class="qtySelector row g-0">
                                                    <div class="col-auto">
                                                        <span class="qtyTrigger" onclick="decreaseValue()">-</span>
                                                    </div>
                                                    <div class="col">
                                                        <input type="number" min="0" max="<?php echo e($product_detail->stock); ?>"
                                                            onchange="changePriceQty(this.value)" id="quantity"
                                                            class="form-control qtyValue"
                                                            value="<?php echo e(old('quantity') ?? 1); ?>" />
                                                    </div>
                                                    <div class="col-auto">
                                                        <span class="qtyTrigger" onclick="increaseValue()">+</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row align-items-center mt-2">
                                        <div class="col-auto
                                        <?php if($product_detail->product_lens_width == null || $product_detail->product_bridge == null ||
                                        $product_detail->product_arm_length == null || $product_detail->product_bridge == null || $product_detail->product_lens_height == null): ?>
                                        d-none
                                        <?php endif; ?>
                                        ">
                                            <span class="detailLblCol">Size</span>
                                        </div>
                                        <div class="col-auto">
                                            <span class="dtlTextCol size">
                                                <?php echo e($product_detail->product_lens_width != null ? $product_detail->product_lens_width . '-' : ''); ?><?php echo e($product_detail->product_bridge != null ? $product_detail->product_bridge . '-' : ''); ?><?php echo e($product_detail->product_arm_length != null ? $product_detail->product_arm_length . '-' : ''); ?><?php echo e($product_detail->product_lens_height != null ? $product_detail->product_lens_height . '-' : ''); ?><?php echo e($product_detail->product_total_width != null ? $product_detail->product_total_width : ''); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <?php if($product_variant->count() != 0): ?>
                                        <div class="row  g-1 mt-2">
                                            <div class="col-2">
                                                <span class="detailLblCol">Color</span>
                                            </div>
                                            <div class="col-10" style="margin-left:-25px">
                                                <div class="row g-1">
                                                    <div class="col-3">
                                                        <a href="javascript:void(0)" id="href_<?php echo e($product_detail->id); ?>"
                                                            onclick="changePic(<?php echo e($product_detail->id); ?>)"
                                                            class="p-2 px-1 text-center hover-product active-product ">
                                                            <?php if(!isValidUrl($product_detail->photo)): ?>
                                                            <img src="<?php echo e(asset(insertAtPosition($product_detail->photo))); ?>" style="width:50px;" id="pro_pic_<?php echo e($product_detail->id); ?>">
                                                            <?php else: ?>
                                                            <img src="<?php echo e($product_detail->photo); ?>" style="width:50px;" id="pro_pic_<?php echo e($product_detail->id); ?>">
                                                            <?php endif; ?>
                                                            <small
                                                                class="text-dark"><b>$<?php echo e(ceil($product_detail->price)); ?></b></small>
                                                        </a>
                                                    </div>

                                                    <?php $__currentLoopData = $product_variant->where('id', '!=', $product_detail->id)->flatten(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                            <div
                                                                class="col-3">
                                                                <a href="javascript:void(0)"
                                                                    id="href_<?php echo e($data->id); ?>"
                                                                    <?php if($product_detail->id != $data->id): ?> onclick="changePic(<?php echo e($data->id); ?>)" <?php endif; ?>
                                                                    class="p-2 px-1 text-center hover-product <?php if($product_detail->id == $data->id): ?> active-product <?php endif; ?>">
                                                                    <?php if(!isValidUrl($data->photo)): ?>
                                                                    <img src="<?php echo e(asset(insertAtPosition($data->photo))); ?>"
                                                                        style="width:50px;"
                                                                        id="pro_pic_<?php echo e($data->id); ?>">

                                                                    <?php else: ?>
                                                                    <img src="<?php echo e($data->photo); ?>"
                                                                        style="width:50px;"
                                                                        id="pro_pic_<?php echo e($data->id); ?>">
                                                                    <?php endif; ?>
                                                                    <small
                                                                        class="text-dark"><b>$<?php echo e(ceil($data->price)); ?></b></small>
                                                                </a>
                                                            </div>
                                                        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    

                                                    
                                                </div>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-12">
                                    <div
                                        class="row g-3 align-items-center addToCart <?php if($product_detail->stock == 0): ?> d-none <?php endif; ?>">
                                        <div class="col-sm-auto col-12">
                                            <div class="class_Btn">
                                                <a href="">
                                                    <form action="<?php echo e(route('add-to-cart')); ?>" id="addToCart"
                                                        method="POST" onsubmit="">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" id="current_product_price"
                                                            value="<?php echo e($product_detail->price); ?>">
                                                        <input type="hidden" id="product_id" name="product_id"
                                                            value="<?php echo e($product_detail->id); ?>">
                                                        <input type="hidden" id="product_price" name="price"
                                                            value="<?php echo e($product_detail->price); ?>">
                                                        <input type="hidden" id="product_qty" name="quantity"
                                                            value="1">

                                                        <button type="submit"
                                                            class="btn1-- btn minWdBtn btnDark text-uppercase">add to
                                                            cart</button>
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="class_Btn_new ">
                                                <a href="<?php echo e(route('add-to-wishlist', $product_detail->slug)); ?>"
                                                    class="btn add_to_wishlist btnDark_outline w-100">Add to Wishlist</a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="shareCol">
                                                <div class="shareTrigger">
                                                    <div class="shareTrigger">
                                                        <a href="javascript:void(0)" class="">
                                                            <img src="<?php echo e(asset('assets/images/share-icon.svg')); ?>"
                                                                alt="Share icon" class="st-custom-button"
                                                                data-network="sharethis">
                                                        </a>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 align-items mt-3 notifyProduct <?php if($product_detail->stock != 0): ?> d-none <?php endif; ?>">
                                        <div class="col-12">
                                            <form action="<?php echo e(url('notify-email')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" id="notify_product_id" name="product_id"
                                                            value="<?php echo e($product_detail->id); ?>">
                                                <div class="class_Btn">
                                                    <input type="email" name="email" id="email"
                                                        class="form-control notfiyMail" placeholder="Email ">
                                                    <button type="submit"
                                                        class="btn1-- btn btn-block btnDark mt-2 w-100 text-uppercase mt-1">
                                                        Notify Me
                                                    </button>

                                                    <div class="text-center mt-2">
                                                        <p><b>OUT OF STOCK</b></p>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="proBtmDetailCol">
                    <div class="proCard frame_fragment_div <?php if(!empty($product_detail->cat_info) && $product_detail->cat_info->size == null): ?> d-none <?php endif; ?>">
                        <div class="row align-items-center">
                            <div class="col-lg">
                                <h4 class="detailTitle">Frame Measurement</h4>
                                <div class="lense_imgs">
                                    <div class="row">

                                        <div class="col-6 col-sm-2 lens_width_div <?php if(empty($product_detail->product_lens_width)): ?> d-none <?php endif; ?>">
                                            <img src="<?php echo e(asset('assets/images/lens/1lens_width.png')); ?>" alt="">
                                            <h6 class="page_speed_1600560138">LENS WIDTH<br>
                                                <span class="lens_width ">
                                                    <?php echo e($product_detail->product_lens_width); ?>

                                                </span>
                                            </h6>
                                        </div>




                                        <div class="col-6 col-sm-2 product_bridge_div <?php if(empty($product_detail->product_bridge)): ?> d-none <?php endif; ?>">
                                            <img src="<?php echo e(asset('assets/images/lens/2width.png')); ?>" alt="">
                                            <h6 class="page_speed_1600560138">BRIDGE WIDTH<br>
                                                <span
                                                    class="product_bridge ">
                                                    <?php echo e($product_detail->product_bridge); ?>

                                                </span>
                                            </h6>
                                        </div>




                                        <div class="col-6 col-sm-2 product_arm_length_div <?php if(empty($product_detail->product_arm_length)): ?> d-none <?php endif; ?>">
                                            <img src="<?php echo e(asset('assets/images/lens/3temple_length.png')); ?>"
                                                alt="">
                                            <h6 class="page_speed_1600560138">TEMPLE LENGTH<br>
                                                <span
                                                    class="product_arm_length "><?php echo e($product_detail->product_arm_length); ?></span>
                                            </h6>
                                        </div>



                                        <div class="col-6 col-sm-2 product_lens_height_div <?php if(empty($product_detail->product_lens_height)): ?> d-none <?php endif; ?>">
                                            <img src="<?php echo e(asset('assets/images/lens/4lens_height.png')); ?>" alt="">
                                            <h6 class="page_speed_542998610">LENS HEIGHT<br>
                                                <span
                                                    class="product_lens_height"><?php echo e($product_detail->product_lens_height); ?></span>
                                            </h6>
                                        </div>



                                        <div class="col-6 col-sm-2 product_total_width_div <?php if(empty($product_detail->product_total_width)): ?> d-none <?php endif; ?>">
                                            <img src="<?php echo e(asset('assets/images/lens/total_wdth.png')); ?>" alt="">
                                            <h6 class="page_speed_542998610 ">TOTAL WIDTH<br>
                                                <span
                                                    class="product_total_width"><?php echo e($product_detail->product_total_width); ?></span>
                                            </h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="fg-border <?php if(!empty($product_detail->cat_info) && $product_detail->cat_info->size != null): ?> proCard <?php endif; ?>">
                        <h4 class="detailTitle">Product Detail</h4>
                        <div class="row product_row ">


                            

                            <div class="col-md-3 py-2 <?php if(empty($product_detail['frametype']['name'])): ?> d-none <?php endif; ?>" id="frame_type_div">
                                <div class="row">
                                    <div class="col-md-5 col-sm-6">
                                        <span class="detailListLbl">Frame Type :</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6" id="frame_type">
                                        <span class="text-left"><?php echo e($product_detail['frametype']['name'] ?? ''); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 <?php if(empty($product_detail['type_name']['name'])): ?> d-none <?php endif; ?>" id="type_div">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6">
                                        <span class="detailListLbl">Type :</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6" id="type">
                                        <span class="text-left"><?php echo e($product_detail['type_name']['name'] ?? ''); ?></span>
                                    </div>
                                    <div class="col-md-3"> </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 <?php if(empty($product_detail['get_shape']['name'])): ?> d-none <?php endif; ?>" id="shape_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">Shape :</span>
                                    </div>
                                    <div class="col-md-4" id="shape">
                                        <span class="text-left"><?php echo e($product_detail['get_shape']['name'] ?? ''); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 <?php if(empty($product_detail['get_lens']['name'])): ?> d-none <?php endif; ?>" id="lens_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">Lens Type :</span>
                                    </div>
                                    <?php if(!empty($product_detail['get_lens']['name'])): ?>
                                        <div class="<?php if(strlen($product_detail['get_lens']['name']) > 7): ?> col-md-8 <?php else: ?> col-md-4 <?php endif; ?>"
                                            id="lens">
                                            <span class="text-left"><?php echo e($product_detail['get_lens']['name'] ?? ''); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-md-4" id="lens">
                                            <span class="text-left"><?php echo e($product_detail['get_lens']['name'] ?? ''); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 <?php if(empty($product_detail['get_gender']['name'])): ?> d-none <?php endif; ?>" id="gender_div">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <span class="detailListLbl">Gender :</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6" id="gender">
                                        <span class="text-left"><?php echo e($product_detail['get_gender']['name'] ?? ''); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 <?php if(empty($product_detail->product_ean_code)): ?> d-none <?php endif; ?>" id="ean_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">EAN Code :</span>
                                    </div>
                                    <div class="col-md-4" id="ean">
                                        <span class="text-left"><?php echo e($product_detail->product_ean_code); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 <?php if(empty($product_detail->extra)): ?> d-none <?php endif; ?>" id="extra_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">Extra :</span>
                                    </div>
                                    <div class="col-md-4" id="extra">
                                        <span class="text-left"> <?php echo e($product_detail->extra); ?> </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 <?php if(empty($product_detail['get_product_material']['name'])): ?> d-none <?php endif; ?>"
                                id="material_div">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="detailListLbl">Material :</span>
                                    </div>
                                    <div class="col-md-4 text-left" id="material">
                                        <?php echo e($product_detail['get_product_material']['name'] ?? ''); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 py-2 <?php if(empty($product_detail->dispatch_from)): ?> d-none <?php endif; ?>"
                                id="dispatch_div">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="detailListLbl">Dispatch From :</span>
                                    </div>
                                    <div class="col-md-4 " id="dispatch">
                                        <?php echo e($product_detail->dispatch_from); ?>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="proCard <?php if(empty($product_detail->description)): ?> d-none <?php endif; ?>" id="description_div">
                        <h4 class="detailTitle">Description</h4>
                        <div id="product_description">
                            <?php echo $product_detail->description; ?>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>



    <div class="product_detail pb-0">
        <div class="container">
            <div class="product_deatail_list">

                <div class="product_deatail_list_text">
                    <div class="lineTitleCol">
                        <h6 class="lineTitle">Explore Our Products</h6>
                    </div>
                    <h2 class="product_detail_head lgTitle darkColor">YOU MIGHT ALSO LIKE</h2>
                </div>
                <div class="productColMain">
                    <div class="row g-4">
                        
                        <?php $__currentLoopData = $product_detail->rel_prods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data->id !== $product_detail->id): ?>
                                <div class="col-md-6 py-1 col-xl-4">
                                    <div class="cardStyle1">

                                        <div class="productImg">
                                            <a href="<?php echo e(route('product-detail', $data->slug)); ?>">
                                                <div class="imgCol">
                                                    <?php if(!isValidUrl($data->photo)): ?>
                                                    <img src="<?php echo e(asset(insertAtPosition($data->photo,'med'))); ?>"
                                                        id="men_sunglass_pro_img_<?php echo e($data->id); ?>" class=""
                                                        alt="<?php echo e(asset(insertAtPosition($data->photo))); ?>">
                                                    <?php else: ?>
                                                    <img src="<?php echo e($data->photo); ?>"
                                                    id="men_sunglass_pro_img_<?php echo e($data->id); ?>" class=""
                                                    alt="<?php echo e($data->photo); ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </a>

                                            <div class="color_builts">

                                                <ul>
                                                    <?php $like = \App\Models\Product::where('cat_id', $data->cat_id)->get();  ?>

                                                    <?php if($active = $like->where('id', $product_detail->id)->first()): ?>
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                                onclick="changeProDetail(<?php echo e($active->id); ?>,'men_sunglass_',<?php echo e($data->id); ?>)"
                                                                onmouseover="changeProDetail(<?php echo e($active->id); ?>,'men_sunglass_',<?php echo e($data->id); ?>)">
                                                                <?php if(!isValidUrl($active->photo)): ?>
                                                                <img src="<?php echo e(asset(insertAtPosition($active->photo))); ?>" alt=""
                                                                    class="p-2 hover-product active-product last-product last-product-<?php echo e($data->id); ?>"
                                                                    id="href_men_sunglass_<?php echo e($data->id); ?>_<?php echo e($active->id); ?>">
                                                                <?php else: ?>
                                                                <img src="<?php echo e($active->photo); ?>" alt=""
                                                                    class="p-2 hover-product active-product last-product last-product-<?php echo e($data->id); ?>"
                                                                    id="href_men_sunglass_<?php echo e($data->id); ?>_<?php echo e($active->id); ?>">
                                                                <?php endif; ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php $__currentLoopData = $like->where('id', '!=', $product_detail->id)->flatten(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($i <= 2): ?>
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    onclick="changeProDetail(<?php echo e($variant->id); ?>,'men_sunglass_',<?php echo e($data->id); ?>)"
                                                                    onmouseover="changeProDetail(<?php echo e($variant->id); ?>,'men_sunglass_',<?php echo e($data->id); ?>)">
                                                                    <?php if(!isValidUrl($variant->photo)): ?>
                                                                    <img src="<?php echo e(asset(insertAtPosition($variant->photo))); ?>"
                                                                        class="p-2 hover-product last-product-<?php echo e($data->id); ?>"
                                                                        id="href_men_sunglass_<?php echo e($data->id); ?>_<?php echo e($variant->id); ?>">
                                                                    <?php else: ?>
                                                                    <img src="<?php echo e($variant->photo); ?>"
                                                                        class="p-2 hover-product last-product-<?php echo e($data->id); ?>"
                                                                        id="href_men_sunglass_<?php echo e($data->id); ?>_<?php echo e($variant->id); ?>">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <?php if($i >= 2): ?>
                                                        <?php if((count($like) - 4 ) != 0): ?>
                                                            <li>
                                                                <a href="<?php echo e(route('product-detail', [$data->slug])); ?>"
                                                                    class="text-danger m-2">
                                                                    +<?php echo e(count($like) - 4); ?>

                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="contentCol pt-5">
                                            <h4 class="brandCol" id="men_sunglass_brand_name_<?php echo e($data->id); ?>">
                                                <?php echo e($data->title); ?> </h4>
                                            <a href="<?php echo e(route('product-detail', $data->slug)); ?>" target="_blank"     class="text-dark">

                                                <p id="men_sunglass_pro_model_<?php echo e($data->id); ?>">
                                                    <?php echo e($data->title); ?> </p>
                                            </a>
                                            <span class="priceCol"
                                                id="men_sunglass_pro_price_<?php echo e($data->id); ?>">$<?php echo e(ceil($data->price)); ?>

                                            </span>
                                            <div class="row gx-2">
                                                <div class="col-6">
                                                    <a href="<?php echo e(route('add-to-cart', $data->slug)); ?>"
                                                        class="btn btn-dark w-100 addCartBtn btn_explore">ADD TO CART</a>
                                                </div>
                                                <div class="col-6">
                                                    <a href="<?php echo e(route('add-to-wishlist', $data->slug)); ?>"
                                                        class="btn btn-outline-dark w-100 px-1 btn_explore">ADD TO
                                                        WISHLIST</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <style>
        .my-gallery .swiper-slide-active .append_slider_imgs {
            padding: 60px !important
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
    </style>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>

    <script>
        var product = <?php echo json_encode($product_variant, 15, 512) ?>

        var stock = <?php echo e($product_detail->stock); ?>

        var current_prod_id = "<?php echo e($product_detail->id); ?>";

        function changePic(id) {

            var data = product.find(item => item.id == id)

            $('.last-product').each(function(i) {
                $(this).removeClass('active-product last-product')
            });

            $("#href_" + id).addClass('active-product last-product')
            if (current_prod_id != id) {
                $("#href_" + current_prod_id).removeClass('active-product')
            }

            var root = window.location.origin;
            if (data != null) {

                stock = data.stock
                if(data.stock != 0){
                    var exist_qty = $("#quantity").val();
                    if (exist_qty == 1) {
                        $(".productPrice").text("$" + Math.ceil(data.price))
                    }
                    $("#current_product_price").val(Math.ceil(data.price))
                    changePriceQty(exist_qty)
                }


                $("#product_id").val(data.id)
                $("#notify_product_id").val(data.id)

                //Product Top
                $(".brand").text(data.brand_name)
                $(".proTitle").text(data.title)
                $(".uan_no").text(data.size+' '+data.color_description)
                $(".ean_no").text(data.product_uan_code != null ? 'Item Code: '+data.product_uan_code : '')

                if(data.stock == 0 ){
                    $('.qntyInput').addClass('d-none')
                    $('.addToCart').addClass('d-none')
                    $('.notifyProduct').removeClass('d-none')
                }else{
                    $('.qntyInput').removeClass('d-none')
                    $('.addToCart').removeClass('d-none')
                    $('.notifyProduct').addClass('d-none')
                }
                var size = (data.product_lens_width != null ? data.product_lens_width + '-' : '') +
                    +(data.product_bridge != null ? data.product_bridge + '-' : '') +
                    +(data.product_arm_length != null ? data.product_arm_length + '-' : '') +
                    +(data.product_lens_height != null ? data.product_lens_height + '-' : '') +
                    +(data.product_total_width != null ? data.product_total_width + '-' : '') +

                    $(".dtlTextCol").text(size)

                    // frame_fragment_div
                //Frame Fragment


                if(data.frame_fragment != null){
                    $(".frame_fragment_div").removeClass('d-none');
                    $(".fg-border").addClass('proCard');

                    if(data.frame_fragment.width != null){
                        $(".product_lens_width_div").removeClass('d-none')
                        $(".product_lens_width").text(data.frame_fragment.width)
                    }else{
                        $(".product_lens_width_div").addClass('d-none')
                    }

                    if(data.frame_fragment.bridge != null){
                        $(".product_bridge_div").removeClass('d-none')
                        $(".product_bridge").text(data.frame_fragment.bridge)
                    }else{
                        $(".product_bridge_div").addClass('d-none')
                    }

                    if(data.frame_fragment.arm_length != null){
                        $(".product_arm_length_div").removeClass('d-none')
                        $(".product_arm_length").text(data.frame_fragment.arm_length)
                    }else{
                        $(".product_arm_length_div").addClass('d-none')
                    }

                    if(data.frame_fragment.lens_height != null){
                        $(".product_lens_height_div").removeClass('d-none')
                        $(".product_lens_height").text(data.frame_fragment.lens_height)
                    }else{
                        $(".product_lens_height_div").addClass('d-none')
                    }

                    if(data.frame_fragment.total_width != null){
                        $(".product_total_width_div").removeClass('d-none')
                        $(".product_total_width").text(data.frame_fragment.total_width)
                    }else{
                        $(".product_total_width_div").addClass('d-none')
                    }

                }else{
                    $(".frame_fragment_div").addClass('d-none');
                    $(".fg-border").removeClass('proCard');
                }


                //Product Detail
                if (data.description != null && data.description != '') {
                    $("#description_div").removeClass('d-none')
                    $("#product_description").html(data.description)
                } else {
                    $("#description_div").addClass('d-none')
                    $("#product_description").html(data.description)
                }

                if (data.frame_type_name != null && data.frame_type_name != '') {
                    $("#frame_type_div").removeClass('d-none')
                    $("#frame_type").html(data.frame_type_name)
                } else {
                    $("#frame_type_div").addClass('d-none')
                    $("#frame_type").html(data.frame_type_name)
                }

                if (data.typename != null && data.typename != '') {
                    $("#type_div").removeClass('d-none')
                    $("#type").html(data.typename)
                } else {
                    $("#type_div").addClass('d-none')
                    $("#type").html(data.typename)
                }

                if (data.lens_name != null && data.lens_name != '') {
                    $("#lens_div").removeClass('d-none')
                    $("#lens").html(data.lens_name)
                } else {
                    $("#lens_div").addClass('d-none')
                    $("#lens").html(data.lens_name)
                }


                if (data.gender_name != null && data.gender_name != '') {
                    $("#gender_div").removeClass('d-none')
                    $("#gender").html(data.gender_name)
                } else {
                    $("#gender_div").addClass('d-none')
                    $("#gender").html(data.gender_name)
                }

                if (data.product_ean_code != null && data.product_ean_code != '') {
                    $("#ean_div").removeClass('d-none')
                    $("#ean").html(data.product_ean_code)
                } else {
                    $("#ean_div").addClass('d-none')
                    $("#ean").html(data.product_ean_code)
                }

                if (data.shape_name != null && data.shape_name != '') {
                    $("#shape_div").removeClass('d-none')
                    $("#shape").html(data.shape_name)
                } else {
                    $("#shape_div").addClass('d-none')
                    $("#shape").html(data.shape_name)
                }

                if (data.material_name != null && data.material_name != '') {
                    $("#material_div").removeClass('d-none')
                    $("#material").html(data.material_name)
                } else {
                    $("#material_div").addClass('d-none')
                    $("#material").html(data.material_name)
                }

                if (data.extra != null && data.extra != '') {
                    $("#extra_div").removeClass('d-none')
                    $("#extra").html(data.extra)
                } else {
                    $("#extra_div").addClass('d-none')
                    $("#extra").html(data.extra)
                }

                if (data.dispatch_from != null && data.dispatch_from != '') {
                    $("#dispatch_div").removeClass('d-none')
                    $("#dispatch").html(data.dispatch_from)
                } else {
                    $("#dispatch_div").addClass('d-none')
                    $("#dispatch").html(data.dispatch_from)
                }


                // $(".my-gallery").html('')
                $(".swiper-wrapper").html('')
                var imgs = data.all_imgs;
                var gallery = ``,
                    swiper = ``;
                for (var i = 0; i < imgs.length; i++) {
                    if (imgs[i] != null) {
                        console.log(isValidURL(imgs[i]),imgs[i])
                        if(!isValidURL(imgs[i])){
                            gallery += `<li id="` + (i + 1) + `" class="swiper-slide" data-swiper-autoplay="1000000"  itemprop="associatedMedia" itemscope
                                itemtype="http://schema.org/ImageObject" style="width: 636px; margin-right: 10px;">
                                <a id="first" title="click to zoom-in" href="<?php echo e(asset('')); ?>/` + imgs[i] + `"
                                    itemprop="contentUrl" data-size="2400x1200">
                                    <img src="<?php echo e(asset('')); ?>/` + insertAtPosition(imgs[i],'med') + `" class="proSlideImg">
                                </a>
                            </li>`
                            swiper += `<div class="swiper-slide" data-swiper-autoplay="1000000" style="width: 166.5px; margin-right: 10px;">
                                <img src="<?php echo e(asset('')); ?>/` + insertAtPosition(imgs[i]) + `"  alt="<?php echo e(asset('')); ?>/` + imgs[i] + `" class="append_slider_imgs w-75  " />
                            </div>`
                        }else{
                            gallery += `<li id="` + (i + 1) + `" class="swiper-slide" data-swiper-autoplay="1000000"  itemprop="associatedMedia" itemscope
                                itemtype="http://schema.org/ImageObject" style="width: 636px; margin-right: 10px;">
                                <a id="first" title="click to zoom-in" href="` + imgs[i] + `"
                                    itemprop="contentUrl" data-size="2400x1200">
                                    <img src="`+ imgs[i] + `" class="proSlideImg">
                                </a>
                            </li>`
                            swiper += `<div class="swiper-slide" data-swiper-autoplay="1000000" style="width: 166.5px; margin-right: 10px;">
                                <img src="` +imgs[i] + `"  alt="` + imgs[i] + `" class="append_slider_imgs w-75  " />
                            </div>`
                        }
                    }

                }

                $(".swiper-wrapper").html(swiper)
                $(".my-gallery").html(gallery)
            }

        }

        var root = "<?php echo e(asset('')); ?>";

        function changeProDetail(id, type, parent_id) {
            var data = product.find(item => item.id == id)
            if (data.length != 0) {
                changeActive(data, id, type, parent_id)
                if(!isValidURL(data.photo)){
                    $("#" + type + "pro_img_" + parent_id).attr('src', root + insertAtPosition(data.photo,'med'))
                }else{
                    $("#" + type + "pro_img_" + parent_id).attr('src', data.photo)
                }
                $("#" + type + "brand_name_" + parent_id).html(data.brand_name)
                $("#" + type + "pro_model_" + parent_id).html(data.color_description)
                $("#" + type + "pro_price_" + parent_id).html("$" + Math.ceil(data.price))
                $("#" + type + "pro_discount_" + parent_id).html("%" + data.discount)
            }
        }

        function hoverImage(id){
            $(".swiper-slide").removeClass('swiper-slide-active')
            $("#"+id).addClass('swiper-slide-active')
        }

        function changeActive(data, id, type, parent_id) {
            $('.last-product-' + parent_id).removeClass('active-product last-product')
            $("#href_" + type + parent_id + "_" + id).addClass('active-product last-product')
            if (data.id != id) {
                $("#href_" + type + parent_id + "_" + current_prod_id).removeClass('active-product')
            }

        }
        var noError = true;
        //update price on update qty
        function changePriceQty(qty) {
            var product_price = $("#current_product_price").val()
            var total_price = product_price * qty;
            if (qty > stock) {
                swal({
                    title: "Oops!",
                    text: "Product Stock not available",
                    icon: "error",
                    buttons: true,
                })
                $("#addToCart").attr('onsubmit', 'return false')
            } else {
                $("#addToCart").attr('onsubmit', '')
            }

            $(".productPrice").text("$" + total_price)
            $("#product_price").val(total_price)
            $("#product_qty").val(qty)
        }

        function increaseValue() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value >= stock) {
                $("#quantity").val(stock)
                swal({
                    title: "Oops!",
                    text: "Product Stock not available",
                    icon: "error",
                    buttons: true,
                })
                $("#addToCart").attr('onsubmit', 'return false')
                value = value - 1
                return false
            } else {
                $("#addToCart").attr('onsubmit', '')
                value++;
            }
            changePriceQty(value)
            document.getElementById('quantity').value = value;
        }

        function decreaseValue() {
            var value = parseInt(document.getElementById('quantity').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            if (value == 0) {
                swal({
                    title: "Oops!",
                    text: "Product Quantity can not be 0",
                    icon: "error",
                    buttons: true,
                })
                return false;
                $("#addToCart").attr('onsubmit', 'return false')
            } else {
                $("#addToCart").attr('onsubmit', '')
            }

            changePriceQty(value)
            document.getElementById('quantity').value = value;
        }

        $("#quantity").on('keyup', function(){
            if($(this).val() > stock){
                swal({
                    title: "Oops!",
                    text: "Product Stock not available",
                    icon: "error",
                    buttons: true,
                })
                $("#quantity").val(stock)
                return false
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eyewear\resources\views/frontend/pages/product_detail.blade.php ENDPATH**/ ?>