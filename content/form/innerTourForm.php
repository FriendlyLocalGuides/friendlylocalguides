<?

$order_number = substr(number_format(time(), '0', '', '-'), 2);

?>
<div class="form_box">
	<form id="booking_form" method="post" action="/send_email.php" class="clearfix" autocomplete="on">
		<input class="input-item title-field" type="hidden" name="title" value="<?=$titleTour?> <?=$title2Tour?>"/>
		<input class="input-item price-field" type="hidden" name="price" value="<?=$price?>"/>
		<input class="input-item duration-field" type="hidden" name="price" value="<?=$duration?>"/>
		<input class="input-item order-number-field" type="hidden" name="order" value="<?=$order_number?>"/>
		<input class="input-item tour-photo-field" type="hidden" name="tour-pic" value=""/>
        <h3>You are booking</h3>

        <figure class="wrap-preorder-img">
            <img class="preorder-img" src="" alt=""/>
            <figcaption>
                <h4>Red Square & Kremlin</h4>
                <div class="price">$157 — 5 hours</div>
            </figcaption>
        </figure>
        <div class="form-row clearfix">
            <label>
                <input class="input-item num_of_people-field required" type="tel" name="people_num" placeholder="Number of people"/>
            </label>
            <label>
                <input class="input-item country-field required" type="text" name="country" placeholder="Where are you from?"/>
            </label>
            <label>
                <input class="input-item date-field required" type="text" name="date" placeholder="Pick the tour date" autocomplete="off" readonly="readonly"/>
            </label>
            <label>
                <input class="input-item time-field required" type="text" name="time" placeholder="Start time" autocomplete="off" readonly="readonly"/>
            </label>
        </div>
        <div class="form-row clearfix">
            <h3>Personal details</h3>
            <label>
                <input class="input-item name-field required" type="text" name="name" placeholder="Full name"/>
            </label>
            <label>
                <input class="input-item email-field required" type="email" name="email" data-email="true" placeholder="E-mail"/>
            </label>
            <label>
                <input class="input-item phone-field" type="tel" name="phone"  placeholder="Phone number (optional)"/>
            </label>
            <label>
                <input class="input-item hotel-field required" type="text" name="hotel" placeholder="Hotel pickup"/>
            </label>
            <div class="label-textarea">
                <textarea class="input-item comments-field" name="message" placeholder="Comments"></textarea>
            </div>
        </div>
        <div class="form-row clearfix">
            <h3>Payment method</h3>
            <div class="payment-errors-wrapper">
                <span class="payment-errors"></span>
            </div>
            <label class="label card_number-field">
                <input class="input-item cc-num required" placeholder="Card Number" type="tel" data-stripe="number"/>
                <span class="card-icon"></span>
            </label>
            <label class="label exp-field">
                <input class="input-item cc-exp required" placeholder="Exp. (MM/YY)" type="tel" data-stripe="exp-month"/>
            </label>
            <label class="label cvc-field">
                <input class="input-item cc-cvc required" placeholder="CVC" type="tel" data-stripe="cvc" autocomplete="off"/>
            </label>
        </div>
		<input class="input-item book_button booking-tour" value="Book now" type="submit">
	</form>
</div>
