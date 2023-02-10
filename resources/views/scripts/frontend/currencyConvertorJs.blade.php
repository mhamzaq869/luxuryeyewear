<script>
    var type = "";
    var root = "{{ asset('') }}";
    var current_url = window.location.href;
    var symbol = "";
    var convertPriceVal = "";
    var countryCode = "";
    var allproducts = "";
    var total_shipping = 0;
    var cart_subtotal = 0;
    var session_coupon = false;
    var session_coupon_value = 0;
    var total_cart = 0;
    var female_eyeglass = [];
    var female_sunglasses = [];
    var male_eyeglasses = [];
    var male_sunglasses = [];
    var productDetailShippCost = 0;
    var allproductVariants = [];

    convertPrice()

    function convertPrice() {
        $.get('https://ipapi.co/currency/', function(data) {
            symbol = data
            setCookie('symbol', data, 30)
            var requestURL = `https://api.exchangerate.host/convert?from=USD&to=${data}`;
            var request = new XMLHttpRequest();
            request.open('GET', requestURL);
            request.responseType = 'json';
            request.send();

            request.onload = function() {
                var response = request.response;
                convertPriceVal = response.result

                if (current_url == root) {
                    $.each(female_eyeglass, function(index, value) {
                        $(`#female_eyeglass_pro_price_${value.id}`).html(price(value))
                    });
                    $.each(female_sunglasses, function(index, value) {
                        $(`#female_sunglass_pro_price_${value.id}`).html(price(value))
                    });
                    $.each(male_eyeglasses, function(index, value) {
                        $(`#men_eyeglass_pro_price_${value.id}`).html(price(value))
                    });
                    $.each(male_sunglasses, function(index, value) {
                        $(`#men_sunglass_pro_price_${value.id}`).html(price(value))
                    });
                } else if (current_url.includes('product-detail')) {
                    $.each(allproducts, function(index, value) {
                        $(".productPrice").html('<b>'+price(value)+'</b>')
                        $("#productPrice2").html('<b>'+price(value)+'</b>')
                        $("#current_product_price").val(Number(price(value).replace(/[^0-9.-]+/g,"")))

                        if(value.shipping_cost > 0){
                            $("#productDetailShippingCost").html(priceOnly(value.shipping_cost))
                        }
                    });

                    $.each(allproductVariants, function(index, value) {
                        $(`.productVariantPrice${value.id}`).html('<b>'+price(value)+'</b>')
                    });

                    $.each(allproducts[0].rel_prods, function(index, value) {
                        $("#men_sunglass_pro_price_"+value.id).html(price(value))
                    });

                } else if (current_url.includes('wishlist')) {
                    $.each(allproducts, function(index, value) {
                        $("#wishlist-" + value.id).html(price(value,'amount'))
                    });

                } else if (current_url.includes('cart')) {
                    $.each(allproducts, function(index, value) {
                        $("#cart_pro_price_" + value.id).html(price(value, 'productPrice'))
                        $("#cart_pro_total_price_" + value.id).html(price(value))
                    });

                    $("#cart_shipping").html(priceOnly(total_shipping))
                    if (session_coupon) {
                        $("#order_subtotal").html(priceOnly(cart_subtotal + session_coupon_value))
                        $("#coupon_price").html(priceOnly(session_coupon_value))
                    } else {
                        $("#order_subtotal").html(priceOnly(cart_subtotal))
                    }
                    $("#order_total_price").html(priceOnly(total_cart))

                } else if (current_url.includes('checkout')) {

                    $("#cart_shipping").html(priceOnly(total_shipping))
                    if (session_coupon) {
                        $("#order_subtotal").html(priceOnly(cart_subtotal))
                        $("#coupon_price").html(priceOnly(session_coupon_value))
                    } else {
                        $("#order_subtotal").html(priceOnly(cart_subtotal))
                    }
                    $("#order_total_price").html(priceOnly(total_cart))

                } else if (current_url.includes('user/order') || current_url.includes('user/order/show')) {
                    $.each(allproducts, function(index, value) {
                        $("#user_order_price_" + value.id).html(new Intl.NumberFormat('en-us', {style: 'currency', currency: symbol }).format(value.total_amount * value.conversion_rate))
                        $("#user_order_shipping_price_" + value.id).html(new Intl.NumberFormat('en-us', {style: 'currency', currency: symbol }).format(value.shipping != null ? value.shipping : 0 * value.conversion_rate))
                        $("#user_order_total_price_" + value.id).html(new Intl.NumberFormat('en-us', {style: 'currency', currency: symbol }).format(value.total_amount * value.conversion_rate))
                        $.each(value.cart_info, function(i, val) {
                            $("#user_order_cart_price_"+val.id).html(new Intl.NumberFormat('en-us', {style: 'currency', currency: symbol }).format(val.price * value.conversion_rate))
                        });
                    });
                } else {
                    $.each(allproducts, function(index, value) {
                        $("#" + type + value.id).html(price(value))
                    });
                }
                $(".loader_bg").addClass('d-none');
            }
        })
    }

    function price($details, $col = null) {
        return new Intl.NumberFormat('en-us', {
            style: 'currency',
            currency: symbol
        }).format(extraPrice($details, $col) * convertPriceVal);
    }

    function priceOnly($number) {
        return new Intl.NumberFormat('en-us', {
            style: 'currency',
            currency: symbol
        }).format($number * convertPriceVal);
    }

    function extraPrice($details, $col = null) {
        $extra = @json(config('currencyPrice.extra'));
        if ($extra != null) {
            $extra_amount = $extra.price ?? 0;
        } else {
            $extra_amount = 0;
        }

        if($details.dispatch_from != null){
            if ($details.dispatch_from.includes(countryCode)) {
                if ($col != null) {
                    $price = parseInt($details[$col]) + ($details.extra != null ? parseInt($details.extra) : 0) + parseInt(
                        $extra_amount);
                } else {
                    $price = parseInt($details.price) + ($details.extra != null ? parseInt($details.extra) : 0) + parseInt(
                        $extra_amount);
                }
            } else {

                if ($col != null) {
                    $price = parseInt($details[$col]) + parseInt($extra_amount);
                } else {
                    $price = parseInt($details.price) + parseInt($extra_amount);
                }
            }
        }else{
            if ($col != null) {
                $price = parseInt($details[$col]) + parseInt($extra_amount);
            } else {
                $price = parseInt($details.price) + parseInt($extra_amount);
            }
        }

        return $price;
    }

    function setCookie(key, value, expiry) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }


    $.get("https://api.ipify.org/?format=json", function(e) {
        $.get(`https://ipapi.co/${e.ip}/country/`, function(data) {
            localStorage.setItem('countryShortName',data)
        })
    });


</script>
