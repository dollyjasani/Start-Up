<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Verify Email</title>
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
   </head>
   <body style="margin: 0;font-family: 'Roboto', sans-serif; padding: 0; background-size: cover; background-repeat: no-repeat;
      overflow: hidden;">
      <div style="max-width: 700px; margin: 0 auto; background-color: #fff; box-shadow: 0 10px 60px 0 rgba(0,0,0,0.3);">
         <div style="background-color: #f1f1f1;text-align: center; display: inline-block; width: 100%; padding: 30px 0;">
            <img src="<?=base_url('assets/images/brand/favicon.png');?>" style="margin: 0 0 30px 0;">
         </div>
         <div style="padding:60px 30px">
            <div>
               <h2 style=" font-size: 30px; line-height: 40px; margin: 0 0 30px 0; color: #dc3465; text-align: left;">Verify your email address.</h2>
               <h3 style=" font-size: 22px; line-height: 32px; margin: 0; color: #232323; text-align: left; ">Hi <?=$name?>,</h3>
               <p style="font-size: 14px; line-height: 24px; text-align: left;">You have selected this email address as your new <?=$this->config->item('site_title')?>. To verify this email address belongs to you, enter the code below on the account activation page:
               </p>
               <h1  style=" font-size: 30px; line-height: 40px; margin: 0 0 30px 0; color: #dc3465; text-align: left;"><?=$activation_code?></h1>
               <hr style="border: 1px solid #eee; margin: 30px 0;">
            </div>
            <div></div>
            <div style="text-align: left; margin: 30px 0 0 0;">
               <h3 style=" font-size: 14px; line-height: 24px; margin: 0 0 30px 0; color: #232323; font-weight: 500;">
                  Thanks for Choosing <?=$this->config->item('site_title')?><br>
                  - The <?=$this->config->item('site_title')?>
               </h3>
            </div>
         </div>
      </div>
   </body>
</html>
