<?
$order_number = substr(number_format(time(), '0', '', '-'), 2);
?>
<div class="form_box" >
	<form id="booking_form" method="post" action="/send_email.php" class="clearfix">
		<input class="input-item title-field" type="hidden" name="title" value="<?=$titleTour?>"/>
		<input class="input-item price-field" type="hidden" name="price" value="<?=$price?>"/>
		<input class="input-item order-number-field" type="hidden" name="order-number" value="<?=$order_number?>"/>
        <h3>You are booking</h3>

        <figure class="wrap-preorder-img">
            <img class="preorder-img" src="" alt=""/>
            <figcaption>
                <h4>Red Square & Kremlin</h4>
                <div class="price">$157 — 5 hours</div>
            </figcaption>
        </figure>
        <div class="form-row">
            <label>
                <input class="input-item num_of_people-field" type="text" name="num_of_people" placeholder="Number of people"/>
            </label>
            <label>
                <input class="input-item country-field" type="text" name="country" placeholder="Where are you from?"/>
            </label>
            <label>
                <input class="input-item date-field" type="date" name="date" placeholder="Tour date (dd-mm-yyyy)"/>
            </label>
            <label>
                <input class="input-item time-field" type="text" name="time" placeholder="Start time"/>
            </label>
        </div>
        <div class="form-row">
            <h3>Personal details</h3>
            <label>
                <input class="input-item name-field" type="text" name="name" placeholder="Full name"/>
            </label>
            <label>
                <input class="input-item email-field" type="email" name="email"  placeholder="E-mail"/>
            </label>
            <label>
                <input class="input-item phone-field" type="phone" name="phone"  placeholder="Phone number (optional)"/>
            </label>
            <label>
                <input class="input-item hotel-field" type="text" name="hotel" placeholder="Hotel pickup"/>
            </label>
            <div class="label-textarea">
                <textarea class="input-item comments-field" name="message" placeholder="Comments"></textarea>
            </div>
        </div>
        <div class="form-row">
            <h3>Payment method</h3>
            <label class="label card_number-field">
                <input class="input-item" placeholder="Card Number"  type="text" size="20" data-stripe="number"/>
            </label>
            <label class="label cvc-field">
                <input class="input-item" placeholder="CVC" type="text" size="4" data-stripe="cvc"/>
            </label>
            <label class="label full-width">
                <input class="input-item" placeholder="Expiration (MM/YYYY)" type="text" size="2" data-stripe="exp-month"/>
            </label>
        </div>
		<input class="input-item book_button booking-tour" value="Book now" type="submit">
	</form>
</div>
