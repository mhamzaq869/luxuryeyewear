<footer>
    <div class="footer_section" style="padding-left: 0% !important">
        <div class="footer_fade"></div>
        <div class="container">
            <div class="newsletter_content newsletter_space_section">
                <h2 class="whiteColor">NEWSLETTER</h2>
                <p class="whiteColor">Once you subscribe to our newsletter, we will send our promo offers and news to
                    your email.</p>
                <div class="subscribe_col">
                    <form action="<?php echo e(route('subscribe')); ?>" method="post" class="newsletter-inner">
                        <?php echo csrf_field(); ?>

                        <input name="email" placeholder="Your email address" required="" type="email"
                            class="sub_input_style">
                        <button class="sub_btn_style" type="button" type="submit">SUBSCRIBE US</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="bottom_footer darkBGColor">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-xl-auto col-lg-12 col-sm-12 ">
                        <div class="foot_logo_content">
                            <div class="footer_logo">
                                <a href="index.html"><img src="<?php echo e(asset('assets/images/luxuryeyewear.png')); ?>"
                                        alt="..."></a>
                            </div>
                            <p class="whiteColor">Luxuryeyewear ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                tincidunt ornare viverra.</p>
                            <ul class="foot_social_icon">
                                <li><a href="javascript:void(0)"><img
                                            src="<?php echo e(asset('assets/./images/foot_facebook_icon.svg')); ?>"
                                            alt="..."></a></li>
                                <li><a href="javascript:void(0)"><img
                                            src="<?php echo e(asset('assets/./images/foot_twitter_icon.svg')); ?>"
                                            alt="..."></a></li>
                                <li><a href="javascript:void(0)"><img
                                            src="<?php echo e(asset('assets/./images/foot_instagram_icon.svg')); ?>"
                                            alt="..."></a></li>
                                <li><a href="javascript:void(0)"><img
                                            src="<?php echo e(asset('assets/./images/foot_linkedin_icon.svg')); ?>"
                                            alt="..."></a></li>
                                <li><a href="javascript:void(0)"><img
                                            src="<?php echo e(asset('assets/./images/foot_youtube_icon.svg')); ?>"
                                            alt="..."></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="footer_imp_links">
                            <div class="row gy-5">
                                <div class="col-sm col-lg">
                                    <div class="imp_links_col">
                                        <div class="imp_link_head">
                                            <h3 class="foot_link_head_style">Quick Links</h3>
                                        </div>
                                        <ul class="foot_link_list">

                                            <li><a href="<?php echo e(route('order.track')); ?>">Track Order</a></li>
                                            <li><a href="<?php echo e(route('return.and.exchange')); ?>">Return & Exchange</a></li>
                                            <li><a href="<?php echo e(route('shipping.policy')); ?>">Shipping Policy</a></li>
                                            <li><a href="<?php echo e(route('privacy.policy')); ?>">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm col-lg">
                                    <div class="imp_links_col">
                                        <div class="imp_link_head">
                                            <h3 class="foot_link_head_style">usefull links</h3>
                                        </div>
                                        <ul class="foot_link_list">
                                            <li><a href="<?php echo e(route('home')); ?>">home</a></li>
                                            <li><a href="<?php echo e(route('about-us')); ?>">about us</a></li>
                                            <li><a href="<?php echo e(route('contact')); ?>">contact us</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-auto">
                                    <div class="imp_links_col add_cont">
                                        <div class="imp_link_head">
                                            <h3 class="foot_link_head_style">Get In Touch</h3>
                                        </div>
                                        <ul class="foot_link_list contact">
                                            <li><a href="javascript:void(0)">C-12 Paryavaran Complex Ignu Road New
                                                    Delhi, Delhi - 110030, India</a></li>
                                            <li><a href="javascript:void(0)"><img
                                                        src="<?php echo e(asset('assets/./images/phone-icon.svg')); ?>"
                                                        alt="...">9990360806</a></li>
                                            <li><a href="javascript:void(0)"><img
                                                        src="<?php echo e(asset('assets/./images/email_icon.svg')); ?>"
                                                        alt="...">Support@Luxuryeyewear.In</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="copyright_col">
                    <div class="row align-items-center gy-4">
                        <div class="col-xl col-lg-12 ">
                            <div class="courier_logo justify-content-center">
                                <ul>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/dhl_icon.png')); ?>" alt="..."></a>
                                    </li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/fedex_icon.png')); ?>" alt="..."></a>
                                    </li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/ups_icon.png')); ?>" alt="..."></a>
                                    </li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/aramex_icon.png')); ?>"
                                                alt="..."></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-auto col-lg-12">
                            <div class="payment_method_logo">
                                <ul>
                                    <li><a href="javascript:void(0)"><img src="<?php echo e(asset('assets/./images/visa.png')); ?>"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/mastercard.png')); ?>" alt="..."></a>
                                    </li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/american-express.png')); ?>"
                                                alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="<?php echo e(asset('assets/./images/paypal.png')); ?>" alt="..."></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-auto col-md-12 order-xl-first">
                            <p class="mb-xl-0">Copyright © <?php echo e(date('Y')); ?> by luxuryeyewear. All Rights reserved
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>
<?php /**PATH C:\laragon\www\eyewear\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>