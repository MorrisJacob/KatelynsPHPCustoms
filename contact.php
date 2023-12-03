<?php 
include('master/header.php');
include('php/pages/contact.php');
?>

<!-- Header End====================================================================== -->
<div id="mainBody">
<div class="container">
	<hr class="soften">
	<h1>Visit us</h1>
	<hr class="soften"/>	
	<div class="row contact">
		<div class="span4">
		    <h4>Contact Details</h4>
		    Taxidermy, Glasswork, Jewelry, Leatherwork, crochet, oddities, diorama work done By:<br/>
		    <div style="font-weight:bold;">Katelyn Myers</div><br/>
		    Email: <a href="mailto:myerskatelyn675@gmail.com">myerskatelyn675@gmail.com</a><br/>
		    Phone Number: <a href="tel://7655138703">765-513-8703</a><br/>
		    Website: <a href="https://www.creativeodditiesandcuriosities.com">https://www.CreativeOdditiesAndCuriosities.com</a><br/><br/>
		    Other Artists:
		    <div style="font-weight:bold;">Malorie Coalburn & Turner Geary</div><br/>
		    Honey Plugs Owner & Artist<br/>
		    Phone Number: <a href="tel://7654382902">765-438-2902</a><br/><br/>

		    <div style="font-weight:bold;">Magic Man Products</div><br/>
		    Artist: David Montique<br/>
		    Phone Number: <a href="tel://7654806476">765-480-6476</a><br/><br/>
		</div>
			
		<div class="span4">
		<h4>Opening Hours</h4>
			<h5> Monday - Friday</h5>
			<p>09:00am - 09:00pm<br/><br/></p>
			<h5>Saturday</h5>
			<p>011:00am - 7:00pm<br/><br/></p>
			<h5>Sunday</h5>
			<p>11:30am - 06:30pm<br/><br/></p>
			* Sat & Sun available for class reservations/appointments
		</div>
		<div class="span4">
		<h4>Email Us</h4>
		<form action="contact.php" method="POST" class="form-horizontal">
        <fieldset>
          <div class="control-group">
           
              <input type="text" name="contactname" placeholder="name" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" name="emailaddress" placeholder="email" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" name="subject" placeholder="subject" class="input-xlarge"/>
          
          </div>
          <div class="control-group">
              <textarea rows="3" name="message" id="textarea" class="input-xlarge"></textarea>
           
          </div>

            <button class="btn btn-large" type="submit">Send Message</button>

        </fieldset>
      </form>
		</div>
	</div>
	<div class="row">
	<div class="span12">
	<iframe style="width:100%; height:300; border: 0px" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97117.86738824374!2d-86.20791836039079!3d40.476739361606256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x881484347dab8df1%3A0x20b8b11ce9debd29!2sKokomo%2C+IN!5e0!3m2!1sen!2sus!4v1498279873839"></iframe><br />
	<small><a href="https://www.google.com/maps/place/Kokomo,+IN/@40.4767394,-86.2079184,12z/data=!3m1!4b1!4m5!3m4!1s0x881484347dab8df1:0x20b8b11ce9debd29!8m2!3d40.486427!4d-86.1336033" style="color:#0000FF;text-align:left">View Larger Map</a></small>
	</div>
	</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php include('master/footer.php');?>
