<div class="form_box" >
	<form id="booking_form" method="post" action="/send_email.php" class="clearfix">
		<input class="input-item subject-field" type="hidden" value="Friendly Local Guides Order" name="subject"/>
		<input class="input-item title-field" type="hidden" name="title" value="<?=$titleTour?>"/>
		<input class="input-item price-field" type="hidden" name="price" value="<?=$price?>"/>
		<input class="input-item name-field" type="text" name="name" placeholder="Name"/>
		<input class="input-item email-field" type="email" name="email"  placeholder="E-mail"/>
		<input class="input-item num_of_people-field" type="text" name="num_of_people" placeholder="Number of people"/>
		<input class="input-item country-field" type="text" name="country" placeholder="Where are you from?"/>
		<input class="input-item hotel-field" type="text" name="hotel" placeholder="Hotel pickup"/>
		<input class="input-item date-field" type="date" name="date" placeholder="Tour date (dd-mm-yyyy)"/>
		<textarea class="input-item comments-field" name="message" placeholder="Comments"></textarea>
		<input class="input-item book_button booking-tour" value="Book now" type="submit">
	</form>
</div>
