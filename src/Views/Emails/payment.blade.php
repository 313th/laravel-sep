<table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%;min-width:100%" width="100%">
    <tbody>
    <tr>
        <td align="center">
            <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px" width="100%">
                <tbody>
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                            <tr>
                                <td align="center" style="padding-left:24px;padding-right:24px">
                                    <a href="{{ env('APP_URL') }}" target="_blank">
                                        <img alt="آفرینش پازل" height="auto" src="https://afarineshpuzzle.com/wp-content/uploads/2014/12/logo-min.png" style="display:block;border:0px" width="120" class="CToWUd">
                                    </a>
                                </td>
                            </tr>


                            <tr><td height="24" style="height:24px;line-height:24px">&nbsp;</td></tr>


                            <tr>
                                <td align="center" style="padding-left:24px;padding-right:24px">
                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <td align="center" style="padding-top:16px">
                                                <h4 class="m_-5706580865744548872mobile-heading-shrink" style="margin:0;font-family:Tahoma,sans-serif;font-size:42px;line-height:50px;font-weight:700;letter-spacing:0;color:#4c4c4c">
                                                    اطلاعات پرداخت شماره {{ $model->id }}
                                                </h4>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>


                            <tr><td height="24" style="height:24px;line-height:24px">&nbsp;</td></tr>


                            <tr>
                                <td align="center" style="padding-left:24px;padding-right:24px">
                                    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;max-width:390px" width="390">
                                        <tbody>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ $model->name }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        نام
                                                    </strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ $model->family }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        نام خانوادگی
                                                    </strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ $model->mobile }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        تلفن همراه
                                                    </strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ $model->description }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        بابت
                                                    </strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        ریال {{ number_format($model->amount + $model->wage) }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        مبلغ پرداختی
                                                    </strong>
                                                </td>

                                            </tr>
                                            @if($model->wage > 0)
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        ریال {{ number_format($model->wage) }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        کارمزد کسر شده
                                                    </strong>
                                                </td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ \sahifedp\Sep\Models\SepPayment::SEP_PAYMENT_STATUSES[$model->status] }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        وضعیت پرداخت
                                                    </strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ $model->refnum }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        رسید دیجیتال
                                                    </strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ $model->card_pan }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        کارت
                                                    </strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ $model->rrn }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        شماره مرجع
                                                    </strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ $model->trace_number }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        شماره پیگیری
                                                    </strong>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center" style="padding-top:16px">
                                                    <p style="margin:0;font-weight: 600;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        {{ JDF::jdate('Y/m/j - H:i',(new DateTime($model->updated_at))->getTimestamp()) }}
                                                    </p>
                                                </td>
                                                <td align="right" style="padding-top:16px">
                                                    <strong style="margin:0;font-family:Tahoma,sans-serif;font-size:15px;line-height:22px;font-weight:400;letter-spacing:0;color:#555555">
                                                        تاریخ پرداخت
                                                    </strong>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr><td height="24" style="height:24px;line-height:24px">&nbsp;</td></tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="50" style="height:50px;min-height:50px;line-height:50px;font-size:1px;border-bottom:2px solid #f2f2f2">&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px" width="100%">
                <tbody><tr>
                    <td align="center" style="padding-top:23px">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody><tr>
                                <td style="width:32px;min-width:32px;max-width:32px" width="32">&nbsp;</td>
                                <td valign="top">

                                    <table align="left" border="0" cellpadding="0" cellspacing="0" class="m_-5706580865744548872mobile-full-width" width="105">
                                        <tbody><tr>
                                            <td align="left" style="padding-top:4px;padding-bottom:16px">
                                                <table border="0" cellpadding="0" cellspacing="0" width="105">
                                                    <tbody><tr>
                                                        <td>
                                                            <a href="https://www.instagram.com/afarineshpuzzle/" style="color:#a7a7a7" target="_blank">
                                                                <img alt="Instagram" height="auto" src="https://ci3.googleusercontent.com/proxy/RfiWmOL8tZiBtAVtByvEJrvgGfr5kWT5yS9uNmrJQ5_UdwTXdtyL_ywzQijrgoMkS7uTFhTWDSu-JnXe3itbFJo-4qE=s0-d-e1-ft#http://dzvpwvcpo1876.cloudfront.net/Instagram.png" style="display:block;border:0" width="25" class="CToWUd">
                                                            </a>
                                                        </td>
                                                        <td style="width:15px;min-width:15px;font-size:1px" width="15">&nbsp;&nbsp;</td>
                                                        <td>
                                                            <a href="https://pay.bazizar.com/" style="color:#a7a7a7" target="_blank">
                                                                <img alt="Website" height="auto" src="@asset('img/forum6.png')" style="display:block;border:0" width="25" class="CToWUd">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        </tbody></table>

                                    <table align="right" border="0" cellpadding="0" cellspacing="0" width="290">
                                        <tbody><tr>
                                            <td align="center">

                                                <table align="right" border="0" cellpadding="0" cellspacing="0" width="300">
                                                    <tbody><tr>
                                                        <td align="right">
                                                            <p style="Margin:0;margin:0;font-family:Tahoma,sans-serif;font-size:13px;line-height:15px;font-weight:400;color:#a7a7a7">مشهد، بلوار مصلی، جنب بازار اسباب بازی، فروشگاه آفرینش پازل</p>
                                                            <p style="Margin:0;margin:0;margin-top:px;font-family:Tahoma,sans-serif;font-size:13px;line-height:15px;font-weight:400;color:#a7a7a7">
                                                                <a href="https://pay.bazizar.com" style="color:#a7a7a7;text-decoration:underline" target="_blank"><span style="color:#a7a7a7">سامانه پرداخت آنلاین</span></a>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody></table>

                                            </td>
                                        </tr>
                                        </tbody></table>

                                </td>
                                <td style="width:32px;min-width:32px;max-width:32px" width="32">&nbsp;</td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>

                <tr>
                    <td height="60" style="height:60px;min-height:60px;line-height:60px;font-size:1px">&nbsp;</td>
                </tr>
                </tbody></table>
        </td>
    </tr>
    </tbody>
</table>
