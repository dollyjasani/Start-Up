<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title><?php echo $this->config->item('site_title'); ?></title>
    <style type="text/css" media="screen">
    @media only screen and (max-width:480px){
        table[class="maintablewrap"],
        table[class="maintablewrap"] table,
        table[class="maintablewrap"] tbody,
        table[class="maintablewrap"] tr,
        table[class="maintablewrap"] td,
        .maintablewrap,
        .maintablewrap table,
        .maintablewrap tbody,
        .maintablewrap tr,
        .maintablewrap td {
            display: inline-block !important;
            width: 100% !important;
        }
        table[class="maintablewrap"],
        .maintablewrap{width: 90% !important;padding: 30px 5% !important;}
        table[class="maintablewrap"] table[class="maininsidetablewrap"],
        table[class="maininsidetablewrap"],
        .maintablewrap .maininsidetablewrap,
        .maininsidetablewrap{width: 90% !important;padding: 30px 5% !important;}
        table[class="maintablewrap"] td[class=foot-left],
        .maintablewrap .foot-left{padding-bottom: 15px !important;text-align: center;}
        table[class="maintablewrap"] td[class=foot-right],
        .maintablewrap .foot-right{text-align: center;}

    }
    </style>
</head>

<body style="margin:0;padding:0;font-family: Arial, Helvetica, sans-serif;font-weight: 400;padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#ffffff; color: #35393a; -webkit-text-size-adjust:none; mso-cellspacing:0px; mso-padding-alt:0px 0px 0px 0px" data-gr-c-s-loaded="true">
    <table width="800" border="0" cellspacing="0" cellpadding="0" class="maintablewrap" style="background-color:#7a6fbe;margin: 0 auto;padding: 60px 100px;">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellspacing="0" cellpadding="0" class="maininsidetablewrap" bgcolor="#fff" style="padding: 45px 40px;border-radius: 5px;">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" align="left" valign="top" cellpadding="0" class="">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <center><img src="<?php echo base_url('assets/images/logo-dark.svg'); ?>" height="40px" alt="" /></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="height60" style="height: 60px;line-height: 60px;font-size: 0;"></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><h1 style="margin: 0;color: #7a6fbe;font-size: 24px; mso-line-height-rule:exactly;">Forgot Password</h1></td>
                                            </tr>
                                            <tr>
                                                <td class="height20" style="height: 20px;line-height: 20px;font-size: 0;"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 14px;">If you've lost your password or wish to forgot it,use the link below get started.</td>
                                            </tr>
                                            <tr>
                                                <td class="height40" style="height: 40px;line-height: 40px;font-size: 0;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="249" border="0" cellspacing="0" align="center" valign="top" cellpadding="0" class="">
                                        <tbody>
                                            <tr>
                                                <td style="border-radius: 2px;" bgcolor="#7a6fbe"><a href="<?php echo base_url('auth/reset_password/' . $forgotten); ?>" style="padding: 15px 25px;border-radius: 5px;font-size: 16px; color: #ffffff;text-decoration: none;font-weight:bold;display: block;text-align: center;">Reset Password</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" align="left" valign="top" cellpadding="0" class="">
                                        <tbody>
                                            <tr>
                                                <td class="height40" style="height: 40px;line-height: 40px;font-size: 0;"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 14px;">If you did not request a password forgot, you can safely ignore this email. Only a person with access to your email can forgot your account password</td>
                                            </tr>
                                            <tr>
                                                <td class="height20" style="height: 20px;line-height: 20px;font-size: 0;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table width="100%" border="0" cellspacing="0" align="left" valign="top" cellpadding="0" class="">
                                        <tbody>
                                            <tr>
                                                <td class="height40" style="height: 40px;line-height: 40px;font-size: 0;"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 14px;">Best regards,</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 14px;">Your <?php echo $this->config->item('site_title'); ?> Team</td>
                                            </tr>
                                            <tr>
                                                <td class="height20" style="height: 20px;line-height: 20px;font-size: 0;"></td>
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
</body>
</html>
