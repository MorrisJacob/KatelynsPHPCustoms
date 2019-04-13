<?php 
include('master/header.php'); 
include('php/pages/account.php');
?>
<form action="account.php" method="POST" class="form-horizontal">
<div class="container" style="border:1px solid gray;padding:25px;">
    <div class="row row-marg">
        <div class="span12" style="text-align:center;">
            <h2>My Account</h2>
        </div>
    </div>
    <div class="span6 col-xs-12 col-sm-6">
<div class="row row-marg">
        <div class="span12">
            <h3>Personal Info</h3>
        </div>
    </div>
    <div class="row row-marg">
        <div class="span12">
            First Name:
        </div>
        <div class="span12">
            <input type="text" class="form-control" name="FirstName" value="<?php echo $firstName; ?>" />
        </div>
    </div>
    <div class="row row-marg">
        <div class="span12">
            Last Name:
        </div>
        <div class="span12">
            <input type="text" class="form-control" name="LastName" value="<?php echo $lastName; ?>" />
        </div>
    </div>
    <div class="row row-marg">
        <div class="span12">
            Company:
        </div>
        <div class="span12">
            <input type="text" class="form-control" name="Company" value="<?php echo $company; ?>" />
        </div>
    </div>
    <div class="row row-marg">
        <div class="span12">
            Phone Number:
        </div>
        <div class="span12">
            <input type="text" class="form-control" name="PhoneNumber" value="<?php echo $phone; ?>" />
        </div>
    </div>
    </div>
        <div class="span6  col-xs-12">
    <div class="row row-marg">
        <div class="span12">
            <h3>Address Info</h3>
        </div>
    </div>
    <div class="row row-marg">
        <div class="span12">
            Address:
        </div>
        <div class="span12">
            <input type="text" class="form-control" name="Address1" value="<?php echo $address1; ?>" />
        </div>
    </div>
    <div class="row row-marg">
        <div class="span12">
            Address 2:
        </div>
        <div class="span12">
            <input type="text" class="form-control" name="Address2" value="<?php echo $address2; ?>" />
        </div>
    </div>
    <div class="row row-marg">
        <div class="span12">
            City:
        </div>
        <div class="span12">
            <input type="text" class="form-control" name="City" value="<?php echo $city; ?>" />
        </div>
    </div>
    <br/>
    <div class="row row-marg">
        <div class="span12">
            State:
        </div>
        <div class="span12">
			        <select id="state" required="required" class="required form-control" name="state">
				        <option value="">-</option>
				        <option value="1">Alabama</option><option value="2">Alaska</option><option value="3">Arizona</option><option value="4">Arkansas</option><option value="5">California</option><option value="6">Colorado</option><option value="7">Connecticut</option><option value="8">Delaware</option><option value="53">District of Columbia</option><option value="9">Florida</option><option value="10">Georgia</option><option value="11">Hawaii</option><option value="12">Idaho</option><option value="13">Illinois</option><option value="14">Indiana</option><option value="15">Iowa</option><option value="16">Kansas</option><option value="17">Kentucky</option><option value="18">Louisiana</option><option value="19">Maine</option><option value="20">Maryland</option><option value="21">Massachusetts</option><option value="22">Michigan</option><option value="23">Minnesota</option><option value="24">Mississippi</option><option value="25">Missouri</option><option value="26">Montana</option><option value="27">Nebraska</option><option value="28">Nevada</option><option value="29">New Hampshire</option><option value="30">New Jersey</option><option value="31">New Mexico</option><option value="32">New York</option><option value="33">North Carolina</option><option value="34">North Dakota</option><option value="35">Ohio</option><option value="36">Oklahoma</option><option value="37">Oregon</option><option value="38">Pennsylvania</option><option value="51">Puerto Rico</option><option value="39">Rhode Island</option><option value="40">South Carolina</option><option value="41">South Dakota</option><option value="42">Tennessee</option><option value="43">Texas</option><option value="52">US Virgin Islands</option><option value="44">Utah</option><option value="45">Vermont</option><option value="46">Virginia</option><option value="47">Washington</option><option value="48">West Virginia</option><option value="49">Wisconsin</option><option value="50">Wyoming</option></select>
		</div>
                <input type="hidden" id="hdnState" value="<?php echo $state; ?>" />	
    </div>
    <div class="row row-marg">
        <div class="span12">
            Zip:
        </div>
        <div class="span12">
            <input type="text" class="form-control" name="Zip" value="<?php echo $zip; ?>" />
        </div>
    </div>
    </div>
    <div class="row row-marg">
        <div class="span12">
        <input type="submit" class="btn btn-success" value="Save Changes" /> 
            <a class="btn btn-default" href="index.php">Cancel</a> 
            
        </div>
    </div>
</div>
</form>
<style>
.row-marg{
    margin-bottom:10px;
}
</style>
<script src="wwwroot/js/account.js"></script>
<?php include('master/footer.php'); ?>