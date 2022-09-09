<?php $__env->startSection('title', ' Sunglass'); ?>

<?php $__env->startSection('description', 'Sunglass Description '); ?>
<?php $__env->startSection('keywords', ' Sunglass Keywords'); ?>
<?php $__env->startSection('robots', 'index, follow'); ?>
<?php $__env->startSection('revisit-after', 'content="3 days'); ?>

<?php $__env->startSection('main-content'); ?>
    <section>
        <?php echo $__env->make('frontend.layouts.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    <section>
        <div class="product_detail section_space pb-0">
            <div class="container">
                <div class="product_deatail_list">
                    <div class="product_deatail_list_text">
                        <div class="lineTitleCol">
                            <h6 class="lineTitle">Explore Our Products</h6>
                        </div>
                        <h2 class="product_detail_head lgTitle darkColor">Most Loved Frames</h2>
                    </div>
                    <p style="text-align: center;">We found <?php echo e($products_count); ?> products available for you all page</p>
                    <div class="filterColMain pt-3">
                        <div class="filterCol">
                            <div class="row g-2 g-md-3">
                                <div class="col"><a class="btn btnDark w-100 filterBtn" data-bs-toggle="offcanvas"
                                        href="#filterCanvas" role="button" aria-controls="filterCanvas"><span
                                            class="filterIcon">
                                            <img src="<?php echo e(asset('assets/images/filter-icon.svg')); ?>" alt="..."></span>
                                        <span>Filter</span></a></div>
                                <div class="col">
                                    <select class="form-select selectStyle" aria-label="Default select example">
                                        <option selected>Sort by</option>
                                        <option value="1">Sort by Name</option>
                                        <option value="2">Sort by Name</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="productColMain">
                        <div class="row g-4 productsList" id="productsList">


                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 col-xl-4">


                                    <div class="cardStyle1">

                                        

                                        <div class="productImg">
                                            <a href="<?php echo e(route('product-detail', $product->slug)); ?>">
                                                <div class="imgCol">
                                                    <?php if(!isValidUrl($product->photo)): ?>
                                                    <img src="<?php echo e(asset(insertAtPosition($product->photo,'med'))); ?>"
                                                        id="sunglass_pro_img_<?php echo e($product->id); ?>" alt="Product ">
                                                    <?php else: ?>
                                                    <img src="<?php echo e($product->photo); ?>"
                                                        id="sunglass_pro_img_<?php echo e($product->id); ?>" alt="Product ">
                                                    <?php endif; ?>
                                                </div>
                                            </a>

                                            <div class="color_builts">
                                                <ul>
                                                    <?php if($active = $product): ?>
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                                onclick="changeProDetail(<?php echo e($active->id); ?>,'sunglass_',<?php echo e($product->id); ?>)">
                                                                <?php if(!isValidUrl($active->photo)): ?>
                                                                <img src="<?php echo e(asset(insertAtPosition($active->photo))); ?>" alt=""
                                                                    class="p-2 hover-product active-product last-product last-product-<?php echo e($product->id); ?>"
                                                                    id="href_sunglass_<?php echo e($product->id); ?>_<?php echo e($active->id); ?>"
                                                                    onmouseover="changeProDetail(<?php echo e($product->id); ?>,'sunglass_',<?php echo e($product->id); ?>)">
                                                                <?php else: ?>
                                                                <img src="<?php echo e($active->photo); ?>" alt=""
                                                                    class="p-2 hover-product active-product last-product last-product-<?php echo e($product->id); ?>"
                                                                    id="href_sunglass_<?php echo e($product->id); ?>_<?php echo e($active->id); ?>"
                                                                    onmouseover="changeProDetail(<?php echo e($product->id); ?>,'sunglass_',<?php echo e($product->id); ?>)">
                                                                <?php endif; ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    
                                                    <?php $__currentLoopData = $product_variant->where('id', '!=', $product->id)->where('cat_id',$product->cat_id)->where('product_for', $product->product_for)->flatten(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($i <= 2): ?>
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                    onclick="changeProDetail(<?php echo e($variant->id); ?>,'sunglass_',<?php echo e($product->id); ?>)"
                                                                    onmouseover="changeProDetail(<?php echo e($variant->id); ?>,'sunglass_',<?php echo e($product->id); ?>)">
                                                                    <?php if(!isValidUrl($variant->photo)): ?>
                                                                    <img src="<?php echo e(asset(insertAtPosition($variant->photo))); ?>"
                                                                        class="p-2 hover-product last-product-<?php echo e($product->id); ?>"
                                                                        id="href_sunglass_<?php echo e($product->id); ?>_<?php echo e($variant->id); ?>">
                                                                    <?php else: ?>
                                                                    <img src="<?php echo e($variant->photo); ?>"
                                                                        class="p-2 hover-product last-product-<?php echo e($product->id); ?>"
                                                                        id="href_sunglass_<?php echo e($product->id); ?>_<?php echo e($variant->id); ?>">
                                                                    <?php endif; ?>
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    <?php if(isset($i) && $i >= 2): ?>
                                                        <li>
                                                            <a href="<?php echo e(route('product-detail', [$product->slug])); ?>"
                                                                class="text-danger m-2">
                                                                <?php if(count($product_variant->where('cat_id',$product->cat_id)->where('product_for', $product->product_for)) - 4 > 0): ?>
                                                                +<?php echo e(count($product_variant->where('cat_id',$product->cat_id)->where('product_for', $product->product_for)) - 4); ?>

                                                                <?php endif; ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                </ul>

                                            </div>

                                        </div>

                                        <div class="contentCol">

                                            <h4 class="brandCol" id="sunglass_brand_name_<?php echo e($product->id); ?>">
                                                <?php echo e($product->brand->title); ?> </h4>
                                            <a href="<?php echo e(route('product-detail', $product->slug)); ?>" target="_blank"
                                                class="text-dark">
                                                <p id="sunglass_pro_model_<?php echo e($product->id); ?>"
                                                    class="text-dark link-primary"><?php echo e($product->title); ?></p>
                                            </a>
                                            <span class="priceCol" id="sunglass_pro_price_<?php echo e($product->id); ?>"">
                                                $<?php echo e($product->price); ?></span>


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
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="ajax-load text-center my-3" style="display:none">
        <img src="<?php echo e(asset('assets/images/iphone-spinner.gif')); ?>">
     </div>
     <div class="ajax-load-show-message text-center my-3" style="display:none"></div>


    <?php echo $__env->make('frontend.layouts.product_filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script>
        var root = "<?php echo e(asset('')); ?>";
        var current_product = "<?php echo e($products->count()); ?>"
        var product = <?php echo json_encode($product_variant, 15, 512) ?>

        function changeProDetail(id, type, parent_id) {
            var data = product.find(item => item.id == id)
            if (data.length != 0) {
                $('.last-product-' + parent_id).removeClass('active-product last-product')
                $("#href_" + type + parent_id + "_" + id).addClass('active-product last-product')
                if (data.id != id) {
                    $("#href_" + type + parent_id + "_" + current_prod_id).removeClass('active-product')
                }
                if(!isValidURL(data.photo)){
                    $("#" + type + "pro_img_" + parent_id).attr('src', root + insertAtPosition(data.photo,'med'))
                }else{
                    $("#" + type + "pro_img_" + parent_id).attr('src', data.photo)
                }                $("#" + type + "brand_name_" + parent_id).html(data.brand_name)
                $("#" + type + "pro_model_" + parent_id).html(
                    "<a class='text-dark link-primary' href='<?php echo e(url('product-detail')); ?>/" + data.slug + "'>" + data
                    .title + "</a>")
                $("#" + type + "pro_price_" + parent_id).html("$" + Math.ceil(data.price))
                $("#" + type + "pro_discount_" + parent_id).html("%" + data.discount)
            }

        }

        //Load more on scroll page down
        var page = 1;
        var processing;
        $(document).ready(function(){
            $(window).scroll(function(){
                if (processing) return false;
                var position = $(window).scrollTop();
                var bottom = $(document).height() - $(window).height();
                var bottom1 = bottom-4900;

                if(position > bottom1){
                    processing = true;
                    if(current_product > 0){
                        $(".ajax-load").css('display','block');
                        loadMoreData(++page);
                    }
                }
            });
        });


        function loadMoreData(page){
            $.ajax({
                url: "<?php echo e(url('load_more_brands')); ?>/"+"<?php echo e($brand_id); ?>/brand"+'?page=' + page,
                method: "get",
                dataType: "json",
                success: function(res){
                    if(res.status == 1){
                        processing = false;
                        if(res.more_data > 0){
                            $("#productsList").append(res.html);
                            $(".ajax-load").css('display','none');
                        }else{
                            $(".ajax-load-show-message").html('No More Products Found!');
                            $(".ajax-load-show-message").css('display','block');
                            $(".ajax-load").css('display','none');
                            processing = true;
                        }
                    }else{
                        console.error('server err');
                    }
                }
            })
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eyewear\resources\views/frontend/pages/product-brand.blade.php ENDPATH**/ ?>