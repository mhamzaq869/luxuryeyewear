<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>

<body>
    <div class="es-wrapper-color">

        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="es-adaptive esd-stripe" esd-custom-block-id="1733" align="center">
                                        <table class="es-content-body" style="background-color: #efefef;" width="600"
                                            cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p15t es-p15b es-p20r es-p20l"
                                                        align="left">

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-header" align="center">
                            <tbody>
                                <tr>
                                    <td align="center" bgcolor="#c44d39" style="background-color: #ff9933;">
                                         <table class="es-header-body" style="background-color: #ff9933;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ff9933" align="center">
                                            <tbody>
                                                <tr>
                                                    <td width="270" align="left" class="esd-container-frame es-m-p20b">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="right" esd-links-color="#ffffff" class="esd-block-text es-m-txt-c">

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                         <table cellpadding="0" cellspacing="0" align="left" class="es-left">
                                            <tbody>
                                                <tr>
                                                    <td width="270" class="esd-container-frame" align="left">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-block-text es-m-txt-c">
                                                                        <p style="margin-left:20px; padding-top:20px; padding-bottom:20px">
                                                                            <img src="{{ asset('assets/images/luxury_logo.png') }}" alt="" width="150px">
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--[if mso]></td></tr></table><![endif]-->
                                    </td>
                                </tr>
                                <!--##@@@@-->
                            </tbody>
                        </table>

                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="1754" align="center">
                                        <table class="es-content-body" width="600" cellspacing="0"
                                            cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p10b es-p20r es-p20l"
                                                        esd-general-paddings-checked="false" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560"
                                                                        valign="top" align="center">
                                                                        <table
                                                                            style="border-radius: 0px; border-collapse: separate;"
                                                                            width="100%" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10t es-p15b"
                                                                                        align="center">
                                                                                        <h1>{{$message}}<br></h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p5t es-p5b es-p40r es-p40l"
                                                                                        align="center">
                                                                                        <p style="color: #333333;">
                                                                                            You'll receive an email when
                                                                                            your items are shipped. If
                                                                                            you have any questions, Call
                                                                                            us <br>
                                                                                            @foreach (explode('|',$site_setting->phone) as $phone)
                                                                                                    {{$phone}},
                                                                                            @endforeach
                                                                                            @if ($order->order_number)
                                                                                                <h3>Your Order Tracking No is:
                                                                                                    <b>{{ $order->order_number }}</b>
                                                                                                </h3>
                                                                                            @endif
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="1755" align="center">
                                        <table class="es-content-body" width="600" cellspacing="0"
                                            cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20t es-p30b es-p20r es-p20l"
                                                        align="left">
                                                        <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="280" valign="top"><![endif]-->
                                                        <table class="es-left" cellspacing="0" cellpadding="0"
                                                            align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="es-m-p20b esd-container-frame"
                                                                        width="280" align="left">
                                                                        <table
                                                                            style="background-color: #fef9ef; border-color: #efefef; border-collapse: separate; border-width: 1px 0px 1px 1px; border-style: solid;"
                                                                            width="100%" cellspacing="0"
                                                                            cellpadding="0" bgcolor="#fef9ef">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p20t es-p10b es-p20r es-p20l"
                                                                                        align="left">
                                                                                        <h4>SUMMARY:</h4>
                                                                                    </td>
                                                                                </tr>


                                                                                <tr>
                                                                                    <td class="esd-block-text es-p20b es-p20r es-p20l"
                                                                                        align="left">
                                                                                        <table style="width: 100%;"
                                                                                            class="cke_show_border"
                                                                                            cellspacing="1"
                                                                                            cellpadding="1"
                                                                                            border="0"
                                                                                            align="left">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td><span
                                                                                                            style="font-size: 14px; line-height: 150%;">Order
                                                                                                            #:</span>
                                                                                                    </td>
                                                                                                    <td><span
                                                                                                            style="font-size: 14px; line-height: 150%;">{{ $order->id }}</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span
                                                                                                            style="font-size: 14px; line-height: 150%;">Order
                                                                                                            Date:</span>
                                                                                                    </td>
                                                                                                    <td><span
                                                                                                            style="font-size: 14px; line-height: 150%;">
                                                                                                            {{ date('d-M-Y', strtotime($order->created_at)) }}</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td><span
                                                                                                            style="font-size: 14px; line-height: 150%;">Order
                                                                                                            Total:</span>
                                                                                                    </td>
                                                                                                    <td><span
                                                                                                            style="font-size: 14px; line-height: 150%;">{{ $_COOKIE['symbol'] . number_format($order->conversion_rate*$order->total_amount,2) }}</span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <p style="line-height: 150%;">
                                                                                            <br></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td><td width="0"></td><td width="280" valign="top"><![endif]-->
                                                        <table class="es-right" cellspacing="0" cellpadding="0"
                                                            align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="280"
                                                                        align="left">
                                                                        <table
                                                                            style="background-color: #fef9ef; border-collapse: separate; border-width: 1px; border-style: solid; border-color: #efefef;"
                                                                            width="100%" cellspacing="0"
                                                                            cellpadding="0" bgcolor="#fef9ef">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p20t es-p10b es-p20r es-p20l"
                                                                                        align="left">
                                                                                        <h4>SHIPPING ADDRESS:<br></h4>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p20b es-p20r es-p20l"
                                                                                        align="left">
                                                                                        <p>{{ $order->first_name }} {{ $order->last_name }}</p>
                                                                                        <p>{{ $order->address1 != null ? $order->address1 : $order->address2}},
                                                                                        <p>,{{ $order->city }}</p>
                                                                                        <p>{{ $order->state }}
                                                                                            {{ $order->country }}
                                                                                            -
                                                                                            {{ $order->post_code }}
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--[if mso]></td></tr></table><![endif]-->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="1758" align="center">
                                        <table class="es-content-body" width="600" cellspacing="0"
                                            cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p10b es-p20r es-p20l" esd-general-paddings-checked="false" align="left">
                                                        <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="270" valign="top"><![endif]-->
                                                        <table class="es-left" cellspacing="0" cellpadding="0"
                                                            align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="es-m-p0r es-m-p20b esd-container-frame"
                                                                        width="100%" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p20l"
                                                                                        align="left">
                                                                                        <h4>ITEMS ORDERED</h4>
                                                                                    </td>

                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table class="es-left" cellspacing="0" cellpadding="0" align="right" style="margin-top:22px">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="es-m-p0r es-m-p20b esd-container-frame" width="350" valign="top" align="left">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td> NAME  </td>
                                                                                    <td style="text-align: center;" width="60">
                                                                                        QTY
                                                                                    </td>
                                                                                    <td style="text-align: center;" width="100">
                                                                                        PRICE
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p20r es-p20l"
                                                        esd-general-paddings-checked="false" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560"
                                                                        valign="top" align="center">
                                                                        <table width="100%" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-spacer es-p10b"
                                                                                        align="center"
                                                                                        style="font-size:0">
                                                                                        <table width="100%"
                                                                                            height="100%"
                                                                                            cellspacing="0"
                                                                                            cellpadding="0"
                                                                                            border="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        style="border-bottom: 1px solid #efefef; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;">
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>


                                                @foreach ($order->cart as $detail)

                                                    <tr>
                                                        <td class="esd-structure es-p5t es-p10b es-p20r es-p20l"
                                                            esd-general-paddings-checked="false" align="left">
                                                            <!--[if mso]><table width="560" cellpadding="0" cellspacing="0"><tr><td width="178" valign="top"><![endif]-->
                                                            <table class="es-left" cellspacing="0" cellpadding="0"
                                                                align="left">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="es-m-p0r es-m-p20b esd-container-frame"
                                                                            width="178" valign="top"
                                                                            align="center">
                                                                            <table width="100%" cellspacing="0"
                                                                                cellpadding="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="esd-block-image"
                                                                                            align="center"
                                                                                            style="font-size:0"><a
                                                                                                href="#"
                                                                                                target="_blank"><img
                                                                                                    src="{{ asset($detail->product->p_f) }}"
                                                                                                    class="adapt-img"
                                                                                                    title="{{ $detail->title }}"
                                                                                                    width="95"></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                             <table cellspacing="0" cellpadding="0" align="right">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="esd-container-frame" width="362" align="left">
                                                                            <table width="100%" cellspacing="0" cellpadding="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="esd-block-text" align="left">

                                                                                            <table style="width: 100%;"
                                                                                                class="cke_show_border"
                                                                                                cellspacing="1"
                                                                                                cellpadding="1"
                                                                                                border="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            {{ $detail->product->title }}
                                                                                                        </td>
                                                                                                        <td style="text-align: center;"
                                                                                                            width="60">
                                                                                                            {{ $detail->quantity }}
                                                                                                        </td>
                                                                                                        <td style="text-align: center;"
                                                                                                            width="100">
                                                                                                            {{ $_COOKIE['symbol'] . number_format($order->conversion_rate*$detail->product->price,2) }}
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                            <p><br></p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                         </td>
                                                    </tr>

                                                @endforeach

                                                <tr>
                                                    <td class="esd-structure es-p20r es-p20l" esd-general-paddings-checked="false" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="560" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-spacer es-p10b" align="center" style="font-size:0">
                                                                                        <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        style="border-bottom: 1px solid #efefef; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; height: 1px; width: 100%; margin: 0px;">
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p5t es-p30b es-p40r es-p20l" align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="540" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text"
                                                                                        align="right">
                                                                                        <table style="width: 500px;"
                                                                                            class="cke_show_border"
                                                                                            cellspacing="1"
                                                                                            cellpadding="1"
                                                                                            border="0"
                                                                                            align="right">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        style="text-align: right; font-size: 18px; line-height: 150%;">
                                                                                                        Subtotal
                                                                                                        ({{ $order->cart->count() }}
                                                                                                        items):</td>
                                                                                                    <td
                                                                                                        style="text-align: right; font-size: 18px; line-height: 150%;">
                                                                                                        {{ $_COOKIE['symbol'] . number_format($order->conversion_rate*$order->total_amount,2) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        style="text-align: right; font-size: 18px; line-height: 150%;">
                                                                                                        Discount:</td>
                                                                                                    <td
                                                                                                        style="text-align: right; font-size: 18px; line-height: 150%;">
                                                                                                        {{ $_COOKIE['symbol'] . number_format($order->conversion_rate*$order->coupon,2) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td
                                                                                                        style="text-align: right; font-size: 18px; line-height: 150%;">
                                                                                                        <strong>Order Total:</strong>
                                                                                                    </td>
                                                                                                    <td
                                                                                                        style="text-align: right; font-size: 18px; line-height: 150%; color: #d48344;">
                                                                                                        <strong>{{ $_COOKIE['symbol'] . number_format($order->conversion_rate*$order->total_amount,2) }}</strong>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <p style="line-height: 150%;">
                                                                                            <br></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-footer" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" esd-custom-block-id="1748" align="center">
                                        <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0"
                                            align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20" esd-general-paddings-checked="false" align="left">
                                                         <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="es-m-p0r es-m-p20b esd-container-frame"
                                                                        width="178" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-image es-m-p0l es-m-txt-c" align="left"
                                                                                        style="font-size:0"><a
                                                                                            href="{{ url('/') }}"
                                                                                            target="_blank">
                                                                                            <img src="{{ asset('assets/images/luxury_logo.png') }}" alt="" width="150px">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p10t es-p5b es-m-txt-c" align="left">
                                                                                        <p>@foreach (explode('|',$site_setting->address) as $address)
                                                                                            {{$address}}
                                                                                            @endforeach
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p5t es-m-txt-c" align="left">
                                                                                        <p>
                                                                                            @foreach (explode('|',$site_setting->phone) as $phone)
                                                                                            <a target="_blank" href="tel:{{ $phone }}">{{ $phone }}</a>
                                                                                            @endforeach
                                                                                            <br>

                                                                                            @foreach (explode('|',$site_setting->email) as $email)
                                                                                            <a target="_blank" href="mailto:{{ $email }}">{{ $email }}</a>
                                                                                            @endforeach

                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table cellspacing="0" cellpadding="0" align="right">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="362"
                                                                        align="left">
                                                                        <table width="100%" cellspacing="0"
                                                                            cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15t es-p20b es-m-txt-c"
                                                                                        align="left">
                                                                                        <p style="line-height: 150%;">
                                                                                            <span
                                                                                                style="font-size: 20px; line-height: 150%;">Information</span>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-m-txt-c"
                                                                                        align="left">
                                                                                        <p><a target="_blank"
                                                                                                href="{{ url('/') }}">luxuryeyewear
                                                                                            </a><br></p>
                                                                                        <p>© Copyright © 2020. All
                                                                                            Rights Reserved | Designed
                                                                                            By<br></p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left"
                                                                                        class="esd-block-text es-p10t es-m-txt-c">
                                                                                        <p
                                                                                            style="line-height: 150%; font-size: 12px;">
                                                                                             <a
                                                                                                target="_blank"
                                                                                                href="{{ url('/privacy-policy') }}"
                                                                                                style="font-size: 12px;">Privacy
                                                                                                Policy</a>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
