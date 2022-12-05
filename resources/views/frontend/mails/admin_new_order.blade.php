<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Prolook Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<style>
    a, p, h3, h4, h5 {
        font-family: Roboto, Helvetica, Arial, sans-serif;
    }
</style>
<body style="margin: 0; padding: 0;">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td style="padding: 30px;">
            <table width=600" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#f4f4f4" style="border-collapse: collapse; border: 1px solid #cccccc;">
                <tr>
                    <td style="padding: 15px;">
                        <table cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse: collapse;">
                            <tr>
                                <td>
                                    <img src="{{ asset('assets/images/luxury_logo.png') }}" alt="Prolook Logo" width="80" style="display: block;" />
                                </td>

                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#fff" style="align-content: center; padding: 80px 15px 80px 15px; border-top: solid 1px #e6e6e6; border-bottom: solid 1px #e6e6e6; text-align: center;">
                        <table width="100%" align="center" cellspacing="0" cellpadding="0" bgcolor="#fff">
                            <tr>
                                <td>
                                    <h3 style="margin-top: 0px;">YOU HAVE A NEW ORDER!</h3>
                                    <p style="width: 95%; margin: 25px auto auto auto; color: #6b6b6b; font-size: 14px; line-height: 1.5;">
                                        Hi {{$admin->fullname}}! This is to let you now that {{$customer->fullname}} had made an order. check order details by clicking the button below or visit this link:<br/>
                                        <a href="{{route('user.order.show',[$order->order_number])}}">#{{$order->order_number}}</a>
                                    </p>
                                    <a href="{{route('user.order.show',[$order->order_number])}}" style="display: inline-block; margin-top: 20px; padding: 0px 30px; background-color: #000000; color: #ffffff; font-size: 12px; font-weight: bold; line-height: 38px; text-decoration: none;">CHECK ORDER DETAILS</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
