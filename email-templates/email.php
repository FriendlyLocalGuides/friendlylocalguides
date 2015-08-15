<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body style=" padding: 0; margin: 0;">
<div style=" min-width: 700px; background-color: #f7f7f7; background: url('https://friendlylocalguides.com/i/blotter-tile-bg.jpg') repeat center top; padding: 0; margin: 0;">
    <table cellspacing="0" cellpadding="0" style="margin: 0 auto; width: 602px;  padding-bottom: 25px;">
        <tr>
            <td style="text-align: center; padding: 20px;">
                <a href="http:https://friendlylocalguides.com"><img src="https://friendlylocalguides.com/i/logo_l_w.png" width="100"  alt="friendlylocalguides"/></a>
            </td>
        </tr>
        <tr>
            <td style="background-color: #fff; border-top: 1px solid #ccc; border-left: 1px solid #ccc;border-right: 1px solid #ccc;">
                <h1 style="text-align:center;color:#202020;display:block;margin:30px 0 15px 0;font-size:26px;font-weight:normal;line-height:32px;font-family:'Helvetica Neue',Helvetica,Arial;">
                    Dear <?=$name?>,
                </h1>
                <h2 style="padding: 0 20px;text-align:center;color:#777;display:block;line-height:1.7;margin:0px 0;font-size:22px;font-weight:normal;font-family:'Helvetica Neue',Helvetica,Arial;">
                    <?if(!stristr($_SERVER['HTTP_REFERER'], 'free-tour')) {?>
                        We've just got your payment  <strong style="color: #555;"><?=$amount?></strong> for tour
                    <?}else{?>
                        Thank you for booking
                    <?}?>
                    <br/>  <strong style="color: #555;"><?=$title?></strong>
                </h2>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 20px; background-color: #fff;">
                <img style="width: 100%; display: block;" alt="" src="https://friendlylocalguides.com<?=$tourPicture?>">
            </td>
        </tr>
        <tr>
            <td style="background-color: #fff; padding: 20px 0; border-left: 1px solid #ccc;border-right: 1px solid #ccc;">
                <h3 style="color:#9a9a9a;display:block;font-family:'Helvetica Neue',Helvetica,Arial;font-size:16px;font-weight:200;letter-spacing:0.65px;line-height:100%;margin:10px auto 0;text-transform:uppercase;text-align:center">
                    Here are details of your order:
                </h3>
            </td>
        </tr>
        <tr>
            <td style="background-color: #fff;vertical-align:top;text-align:center;width:100%;  border-left: 1px solid #ccc;border-right: 1px solid #ccc; padding-left: 30px; padding-right: 30px;padding-bottom: 30px;">
                <table cellspacing="0" cellpadding="0" style="margin:0 auto;padding:10px 0;  border-width: 1px; border-style: solid; border-color: #cccccc; border-radius: 5px; background-color: #f7f7f7;">
                    <tbody>
                        <tr>
                            <td width="5%">

                            </td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;font-weight:200;color:#777;font-size:13px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Order number:
                                </p>
                            </td>
                            <td width="45%" style="text-align: left;padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$order_number?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%">

                            </td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Price and duration:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$price?> — <?=$duration?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Tour:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$title?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Name:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$name?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    E-mail:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777 !important;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$email?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777 !important;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Phone number
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$phone?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Number of people:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$numOfPeople?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Country:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                       <?=$country?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Hotel pickup:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$hotel?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Date of tour:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$date?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    Start time:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <?=$startTime?>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                        <tr>
                            <td width="5%"></td>
                            <td width="40%" style="text-align: left;">
                                <p style="text-transform:uppercase;margin:5px 0;text-indent:10px;color:#777;font-size:14px;line-height:18px;font-family: Helvetica,Arial, sans-serif;">
                                    Comment:
                                </p>
                            </td>
                            <td width="45%" style="padding-left: 20px;">
                                <p style="margin:5px 0;color:#777;font-size:14px;line-height:18px;text-align:left; font-family: 'Helvetica Neue',Helvetica,Arial;">
                                    <strong>
                                        <em>
                                            <?=$message?>
                                        </em>
                                    </strong>
                                </p>
                            </td>
                            <td width="5%"></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>

        <tr>
            <td style="background-color: #fff; padding: 0 50px; text-align: center;">
                <h4 style="margin:5px 0;color:#777;font-size:14px;line-height:18px;font-family: Helvetica,Arial, sans-serif; padding-bottom: 20px; border-bottom: 1px solid #ccc;">
                    Thank you for choosing us! We will contact you within 24 hours to discuss details of the tour.
                </h4>
            </td>
        </tr>
        <tr>
            <td style="color:#777;padding: 0 0 15px; background-color: #fff;border-bottom: 1px solid #ccc;line-height:18px;font-size:14px;font-family: Helvetica,Arial, sans-serif; text-align: center">
                <p>
                    You can contact us with any questions by emailing <br/>
                    <a style="text-decoration: none;color:#777; font-weight: bold;" href="mailto:info@friendlylocalguides.com">info@friendlylocalguides.com</a>
                </p>
            </td>
        </tr>
        <tr>
            <td style="font-family: Helvetica,Arial, sans-serif; padding: 20px 0; text-align: center; background-color: #f2f2f2;">
                <span style="display: inline-block; padding-top: 7px; vertical-align: top; color: #000;">Follow us:</span>
                <a style="text-decoration: none;" target="_blank" href="//www.facebook.com/friendlylocalguides" style="text-decoration: none;">
                    <img width="32" height="32" src="https://friendlylocalguides.com/i/social_buttons/fb_w.png" alt=""/>
                </a>
                <a style="text-decoration: none;" target="_blank" href="//twitter.com/FriendlyGuides">
                    <img width="32" height="32" src="https://friendlylocalguides.com/i/social_buttons/tw_w.png" alt=""/>
                </a>
                <a style="text-decoration: none;" target="_blank" href="//plus.google.com/b/113546718017692385903/113546718017692385903/posts/p/pub">
                    <img width="32" height="32" src="https://friendlylocalguides.com/i/social_buttons/g+_w.png" alt=""/>
                </a>
                <a style="text-decoration: none;" target="_blank" href="//instagram.com/friendly.local.guides">
                    <img width="32" height="32" src="https://friendlylocalguides.com/i/social_buttons/instagram_w.png" alt=""/>
                </a>
            </td>
        </tr>
    </table>
</div>
</body>
</html>