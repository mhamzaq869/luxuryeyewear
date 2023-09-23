<?php

use App\Models\Order;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Test Image Route
Route::get('/test-image', function () {
    return view('frontend.test_image');
})->name('test_image');


// Clear Config Cache
Route::get('/clearconfig', function () {
    Artisan::call('config:cache');
    return "Config Cache is cleared";
});

// Clear Cache
Route::get('/clearcache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// Clear View
Route::get('/clearview', function () {
    Artisan::call('view:clear');
    return "View is cleared";
});

// Clear Route Cache
Route::get('/clearroute', function () {
    Artisan::call('route:clear');
    return "Route is cleared";
});

Auth::routes(['register' => false]);

Route::get('user/login', 'FrontendController@login')->name('login.form')->middleware('guest');
Route::post('user/login', 'FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout/{type?}', 'FrontendController@logout')->name('user.logout');
Route::get('user/register', 'FrontendController@register')->name('register.form');
Route::post('user/register', 'FrontendController@registerSubmit')->name('register.submit');

// Reset password
Route::get('password_reset', 'FrontendController@showResetForm')->name('password_reset');

// Socialite
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');


Route::get('/', 'FrontendController@home')->name('home');
Route::get('/filter-product-for', 'FrontendController@filter_product_for')->name('filter.product');
Route::get('/eyeglasses/{type?}/{for?}', 'FrontendController@frontend_eyeglass')->name('front.eyeglass.page');
Route::get('/load_more_eyeglasses/{frametype?}/{type?}/{for?}', 'FrontendController@load_more_eyeglasses')->name('eyeglasses.load_more_eyeglasses');
Route::get('/sunglasses/{type?}/{for?}', 'FrontendController@frontend_sunglass')->name('front.sunglass.page');
Route::get('/load_more_sunglass/{frametype?}/{type?}/{for?}', 'FrontendController@load_more_sunglass')->name('sunglass.load_more_sunglass');
Route::get('/brands', 'FrontendController@frontend_brands')->name('front.brands.page');
Route::get('/load_more_brands/{brand}/brand', 'FrontendController@load_more_brands')->name('load_more_brands');
Route::get('/product-detail/new', 'FrontendController@product_detail')->name('front.product_detail.page');

// Frontend Routes
Route::get('/home', 'FrontendController@index')->name('user_dashboard');
Route::get('/about-us', 'FrontendController@aboutUs')->name('about-us');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::get('/return-and-exchange', 'FrontendController@returnAndExchange')->name('return.and.exchange');
Route::get('/shipping-policy', 'FrontendController@shippingPolicy')->name('shipping.policy');
Route::get('/privacy-policy', 'FrontendController@privacyPolicy')->name('privacy.policy');
Route::post('/contact/message', 'MessageController@store')->name('contact.store');
Route::get('product-detail/{slug}', 'FrontendController@productDetail')->name('product-detail');
Route::post('/notify-email', 'FrontendController@notifyEmail')->name('notify-email');
Route::get('/getProduct/{id}', 'FrontendController@getProduct')->name('get-product');
Route::get('/product/search', 'FrontendController@productSearch')->name('product.search');
Route::get('/load_more_products/{search}', 'FrontendController@load_more_products')->name('load.more.products');
Route::post('/deleteImage', 'ProductController@deleteImage')->name('product.delete.image');
Route::get('/product-cron', 'ProductController@productCronJob')->name('product.cron.job');
Route::get('/product-cat/{slug}', 'FrontendController@productCat')->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}', 'FrontendController@productSubCat')->name('product-sub-cat');
Route::get('/product-brand/{slug}', 'FrontendController@productBrand')->name('product-brand');

// Cart section
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/add-to-cart', 'CartController@addToCart')->name('add-to-cart');
Route::get('/add-to-cart-single/{slug?}', 'CartController@singleAddToCart')->name('single-add-to-cart');
Route::get('cart-delete/{id}', 'CartController@cartDelete')->name('cart-delete');
Route::post('cart-update', 'CartController@cartUpdate')->name('cart.update');
Route::get('paid/success/{type?}', 'OrderController@paymentSuccess')->name('paid.success');
Route::get('paid/error/{type?}', 'OrderController@paymentError')->name('paid.error');
Route::get('/checkout', 'CartController@checkout')->name('checkout');

// Wishlist
Route::view('/wishlist', 'frontend.pages.wishlist')->name('wishlist');
Route::get('/wishlist/{slug}', 'WishlistController@wishlist')->name('add-to-wishlist');
Route::get('wishlist-delete/{id}', 'WishlistController@wishlistDelete')->name('wishlist-delete');
Route::post('cart/order', 'OrderController@store')->name('cart.order');
Route::get('order/pdf/{id}', 'OrderController@pdf')->name('order.pdf');
Route::get('/income', 'OrderController@incomeChart')->name('product.order.income');

Route::get('new-order', function () {
    $customer = \App\User::find(Auth::id());
    $admin = \App\User::where('role', 'admin')->first();
    $shipping = \App\Models\Shipping::find(0);
    $order = Order::find(13);
    $mail = new App\Http\Controllers\MailController();
    $message = "Your order is confirmed!";
    //  $mail->sendMail(\App\User::where('role','admin')->first()->email, "You have a new Order #".$order->order_number, view('frontend.mails.new_order',get_defined_vars())->render());

    return view('frontend.mails.order', get_defined_vars());
});

Route::get('/product-grids', 'FrontendController@productGrids')->name('product-grids');
Route::get('/product-lists', 'FrontendController@productLists')->name('product-lists');
Route::match(['get', 'post'], '/filter', 'FrontendController@productFilter')->name('shop.filter');

// Order Track
Route::get('/product/track', 'OrderController@orderTrack')->name('order.track');
Route::post('product/track/order', 'OrderController@productTrackOrder')->name('product.track.order');

// Blog
Route::get('/blog', 'FrontendController@blog')->name('blog');
Route::get('/blog-detail/{slug}', 'FrontendController@blogDetail')->name('blog.detail');
Route::get('/blog/search', 'FrontendController@blogSearch')->name('blog.search');
Route::post('/blog/filter', 'FrontendController@blogFilter')->name('blog.filter');
Route::get('blog-cat/{slug}', 'FrontendController@blogByCategory')->name('blog.category');
Route::get('blog-tag/{slug}', 'FrontendController@blogByTag')->name('blog.tag');

// NewsLetter
Route::post('/subscribe', 'FrontendController@subscribe')->name('subscribe');

// Product Review
Route::resource('/review', 'ProductReviewController');

// Post Comment
Route::post('post/{slug}/comment', 'PostCommentController@store')->name('post-comment.store');
Route::resource('/comment', 'PostCommentController');

// Coupon
Route::get('/coupon/remove/discount', 'CouponController@removeCouponDiscount')->name('coupon.remove.discount');
Route::post('/coupon_discount', 'CouponController@couponStore')->name('coupon.discount');

// Payment
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');

// Admin section start
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin');

    // user route
    Route::resource('users', 'UsersController');
    Route::get('/user/permission', 'UsersController@permission')->name('users.permissions');
    Route::post('/user/updatepermission', 'UsersController@updatePermission')->name('users.update.permissions');
    // Banner
    Route::resource('banner', 'BannerController');
    Route::get('pages', 'BannerController@pages')->name('admin.pages');
    Route::get('page/{id}/edit', 'BannerController@pageEdit')->name('admin.page.edit');
    Route::post('page/{id}/update', 'BannerController@pageUpdate')->name('admin.page.update');
    // Brand
    Route::resource('brand', 'BrandController');
    // Profile
    // active bid
    Route::get('/active/{id}', 'BrandController@active_brands')->name('active.brands');
    // inactive bid
    Route::get('/inactive/{id}', 'BrandController@inactive_brands')->name('inactive.brands');

    Route::get('/profile', 'AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}', 'AdminController@profileUpdate')->name('profile-update');

    // Category
    Route::get('category/export/{type?}', 'CategoryController@exportCategory')->name('category.export.get');
    Route::get('category/import', 'CategoryController@getCategoryImport')->name('category.import.get');
    Route::post('category/import', 'CategoryController@saveCategoryImport')->name('category.import.post');
    Route::post('categories/delete', 'CategoryController@categoriesDelete')->name('categories.delete');
    Route::get('categories/{id}/delete', 'CategoryController@destroy');
    Route::post('categories/ajax', 'CategoryController@showDatatableDataCat')->name('categories.ajax');
    Route::resource('/category', 'CategoryController');

    // attribute
    Route::resource('/attribute', 'AttributeController');

    // attribute
    Route::resource('product-color', 'ProductColorController');

    // Product
    Route::get('product/import', 'ProductController@getProductImport')->name('product.import.get');
    Route::post('product/import', 'ProductController@saveProductImport')->name('product.import.post');
    Route::get('product/export/{id?}', 'ProductController@ProductExport')->name('product.export.get');
    Route::post('product/update/oncheck', 'ProductController@productUpdate')->name('product.update.on.check');
    Route::post('product/ajax', 'ProductController@showDatatableData')->name('product.show.ajax.data');
    Route::get('product/outofstock', 'ProductController@outOfStock')->name('product.out.of.stock');
    Route::post('product/ajax/outofstock', 'ProductController@showOutOfStockTable')->name('product.out.stock.show.ajax.data');
    Route::get('product/{id}/delete', 'ProductController@destroy')->name('product.delete');
    Route::get('product-request/{id}/delete', 'ProductController@destroyRequest');
    Route::resource('/product', 'ProductController');
    // Ajax for sub category

    Route::post('/category/{id}/brand', 'CategoryController@getByBrand');
    Route::post('/category/{id}/child', 'CategoryController@getChildByParent');
    // POST category
    Route::resource('/post-category', 'PostCategoryController');
    // Post tag
    Route::resource('/post-tag', 'PostTagController');
    // Post
    Route::resource('/post', 'PostController');
    // Message
    Route::resource('/message', 'MessageController');
    Route::get('/message/five', 'MessageController@messageFive')->name('messages.five');
    // Order

    Route::resource('/order', 'OrderController');
    // Shipping
    Route::resource('/shipping', 'ShippingController');
    // Extra
    Route::resource('/extra', 'ExtraController');
    // Coupon
    Route::resource('/coupon', 'CouponController');
    // Settings
    Route::get('settings', 'AdminController@settings')->name('settings');
    Route::get('settings/integration', 'AdminController@paymentInteg')->name('integeration');
    Route::get('settings/integration/{id}', 'AdminController@integrationShow')->name('integration.show');
    Route::post('settings/integration/store', 'AdminController@integrationStore')->name('integration.store');
    Route::post('settings/integration/{id}/update', 'AdminController@integrationUpdate')->name('integration.update');

    Route::post('setting/update', 'AdminController@settingsUpdate')->name('settings.update');
    // Notification
    Route::get('/notification/{id}', 'NotificationController@show')->name('admin.notification');
    Route::get('/notifications', 'NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}', 'NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password.admin');
});

// User section start
Route::group(['prefix' => '/user', 'middleware' => ['auth', 'user']], function () {

    Route::get('/', 'HomeController@index')->name('user');

    // Profile
    Route::get('/profile', 'HomeController@profile')->name('user-profile');
    Route::post('/profile/{id}', 'HomeController@profileUpdate')->name('user-profile-update');

    // Shipping Address
    Route::get('/address', 'HomeController@address')->name('user.address');
    Route::get('/address/create', 'HomeController@addressCreate')->name('user.address.create');
    Route::post('/address/create', 'HomeController@addressSave')->name('user.address.store');
    Route::get('/address/{id}/edit', 'HomeController@addressEdit')->name('user.address.edit');
    Route::post('/address/{id}', 'HomeController@addressUpdate')->name('user.address.update');

    //  Order
    Route::get('/order', "HomeController@orderIndex")->name('user.order.index');
    Route::get('/order/show/{id}', "HomeController@orderShow")->name('user.order.show');
    Route::delete('/order/delete/{id}', 'HomeController@userOrderDelete')->name('user.order.delete');
    Route::get('order-completed', 'HomeController@orderCompleted')->name('user.order.completed');

    // Product Review
    Route::get('/user-review', 'HomeController@productReviewIndex')->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}', 'HomeController@productReviewDelete')->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}', 'HomeController@productReviewEdit')->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}', 'HomeController@productReviewUpdate')->name('user.productreview.update');

    // Post comment
    Route::get('user-post/comment', 'HomeController@userComment')->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}', 'HomeController@userCommentDelete')->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}', 'HomeController@userCommentEdit')->name('user.post-comment.edit');
    Route::patch('user-post/comment/udpate/{id}', 'HomeController@userCommentUpdate')->name('user.post-comment.update');

    // Password Change
    Route::get('changePassword', 'HomeController@changePassword')->name('user.change.password.form');
    Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');
});
