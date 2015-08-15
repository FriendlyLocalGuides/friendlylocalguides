<?if($result != 'contact'){?>
<section class="whiten thanks-container">
	<div class="mail_success">
	    <div class="success_txt">Thank you for booking the tour:</div>
	    <div class="title-tour"><?=$titleTour?></div>
	    <div class="price-tour"><?=$price?> — <?=$duration?></div>
		<div class="thank-you">
        <?if(!stristr($_SERVER['HTTP_REFERER'], 'free-tour')) {
            ?>
            <p>You will soon get payment confirmation email.</p>
        <?}?>
			<p>We will contact you to discuss the details of the tour within 24 hours.</p>
		</div>
	</div>
</section>
<?}else{?>
<section class="whiten thanks-container">
	<div class="mail_success">
		<div class="success_txt">Thank you for your message</div>
		<div class="thank-you">We will contact you within 24 hours</div>
	</div>
</section>
<?}?>