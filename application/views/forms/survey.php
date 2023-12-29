<div id="form-content">
    <div class="title-box">
        <h1>DeMartini RV Sales -  Customer Survey</h1>
    </div>

    <?php if(isset($vehicle)): ?>
       <h2 class="content-div"><strong>Vehicle:</strong> Item #<?php echo $vehicle->item_number; ?> <?php echo $vehicle->year; ?> <?php echo $vehicle->make; ?> <?php echo $vehicle->model; ?></h2>
    <?php endif; ?>

    <div class="content-div">
        <form class="pure-form pure-form-aligned" action="/forms/send_email" method="post">
<fieldset>
                                <legend></legend>
              <h4><strong> What type of RV are you looking for?</strong></h4>

<div class="pure-controls">
                                <label for="RVType" class="pure-checkbox">
                                    <input id="RVType" type="checkbox" name="ContactCashOffer" value="Checked"/> New</label>
                            </div>
                            <div class="pure-controls">
                                <label for="RVType" class="pure-checkbox">
                                    <input id="RVType" type="checkbox" name="ContactCashOffer" value="Checked"/> Used</label>
                            </div>
                             <div class="pure-controls">
                                <label for="RVType" class="pure-checkbox">
                                    <input id="RVType" type="checkbox" name="ContactCashOffer" value="Checked"/> Bank Repossession</label>
                            </div>
              <div class="pure-control-group">
                                <label for="ChassisType">Preferred Chassis Type</label>
                <select id="ChassisType" name="ChassisType" style="width: 135px; height: 30px;" class="pure-input-1-2">
	<option value="none" selected="selected"> -- Please select --</option>
    <option value="Ford Chassis">Ford Chassis</option>
      <option value="Chevrolet Chassis">Chevrolet Chassis</option>
      <option value="Diesel Pusher">Diesel Pusher</option>
      <option value="Other">Other</option>
    </select>
              </div>
              <div class="pure-control-group">
                                <label for="Brands">Desired Brand(s)</label>
                                <input id="Brands" name="Brands" type="text" value="" placeholder="Desired Brand(s)"/>
              </div>
              <div class="pure-control-group">
              <label for="OtherBrand">Other:</label>
               <input id="OtherBrand" name="OtherBrand" style="width: 250px; height: 60px;" type="text" value="" placeholder="Other" />
              </div>
<h4 class="blueitalic">(Please check or fill in all boxes that apply)</h4>
   				                <h4 style="font-weight:bold;"> Vehicle Type: </h4>
                                <div class="pure-controls">
                                <label for="Type" class="pure-checkbox"/>
                                <input id="Type" type="checkbox" value="Checked"/>
                                Class A Gas Motorhome
                                </label>
                                <label for="Type" class="pure-checkbox"/>
                                <input id="Type" type="checkbox" value="Checked"/>
                                Class B/C Gas Motorhome
                                </label>
                                <label for="Type" class="pure-checkbox"/>
                                <input id="Type" type="checkbox" value="Checked"/> Diesel Pusher
                                </label>
                                <label for="Type" class="pure-checkbox"/>
                                <input id="Type" type="checkbox" value="Checked"/> Trailer
                                </label>
                                <label for="Type" class="pure-checkbox"/>
                                <input id="Type" type="checkbox" value="Checked"/> Fifth Wheel
                                </label>
                                <label for="Type" class="pure-checkbox"/>
                                <input id="Type" type="checkbox" value="Checked"/> Camper
                                </label>
                                </div>
                  <h4> What size are you looking for?</h4>
                  			<div class="pure-control-group">
                                <label for="PreferredLength">Preferred Length:</label>
                <select id="PreferredLength" name="PreferredLength" style="width: 135px; height: 30px;" class="pure-input-1-2">
	<option value="none" selected="selected"> -- Please select --</option>
    <option value="20 to 24 Foot">20 to 24 Foot</option>
      <option value="25 to 28 Foot">25 to 28 Foot</option>
      <option value="29 to 32 Foot">29 to 32 Foot</option>
      <option value="33 to 35 Foot">33 to 35 Foot</option>
      <option value="36 to 37 Foot">36 to 37 Foot</option>
      <option value="38 to 40 Foot">38 to 40 Foot</option>
      <option value="41 Foot and up">41 Foot and up</option>
    </select>
              </div>
<div class="pure-control-group">
                                <label for="OtherSize">Other Size:</label>
                                <input id="OtherSize" name="OtherSize" type="text" value="" placeholder="Other Size"/>
              </div>
              <h4> Your desired price range?</h4>
              <div class="pure-control-group">
                                <label for="PriceRange">Preferred Price Range:</label>
                <select id="PriceRange" name="PriceRange" style="width: 135px; height: 30px;" class="pure-input-1-2">
	<option value="none" selected="selected"> -- Please select --</option>
    <option value="Under $50,000">Under $50,000</option>
      <option value="$50,000 to $100,000">$50,000 to $100,000</option>
      <option value="$100,000 to $150,000">$100,000 to $150,000</option>
      <option value="$150,000 to $200,000">$150,000 to $200,000</option>
      <option value="$200,000 to $250,000">$200,000 to $250,000</option>
      <option value="$250,000 and up">$250,000 and up</option>
    </select>
</div>
                                 <h4 style="font-weight:bold;">Engine Type:</h4>
                                <div class="pure-controls">
                                <label for="GasEngine" class="pure-checkbox"/>
                                <input id="GasEngine" type="checkbox" value="Checked"/> Gas Engine
                                </label>
                                </div>
							<div class="pure-control-group">
                                <label for="GasEngType">Gas Engine Size</label>
                                <select id="GasEngType" name="GasEngType" style="width: 135px; height: 30px;" class="pure-input-1-2">
	<option value="none" selected="selected"> -- Please select --</option>
    <option value="460 CID V-8">460 CID V-8</option>
      <option value="454 CID V-8">454 CID V-8</option>
      <option value="V-6">V-6</option>
      <option value="6.8 LTR. V-10">6.8 LTR. V-10</option>
      <option value="Other">Other</option>
    </select>
    </div>
    							<div class="pure-controls">
                                <label for="DieselEngine" class="pure-checkbox"/>
                                <input id="DieselEngine" type="checkbox" value="Checked"/> Diesel Engine
                                </label>
                                </div>
							<div class="pure-control-group">
                                <label for="EngineMake">Diesel Engine Make</label>
                                <input id="EngineMake" name="EngineMake" type="text" value="" placeholder="Diesel Engine Make"/>
              </div>
                                <div class="pure-control-group">
                                <label for="EngineHP">Diesel Engine Horsepower</label>
                                <input id="EngineHP" name="EngineHP" type="text" value="" placeholder="Diesel Engine HP"/>
                                </div>
                                <div class="pure-controls">
                                <label for="ExhaustBrake" class="pure-checkbox"/>
                                <input id="ExhaustBrake" type="checkbox" value="Checked"/> Exhaust Brake?
                                </label>
                                </div>
                                <h4 style="font-weight:bold;">Equipment/Condition:</h4>
                                <div class="pure-control-group">
                                <label for="Condition">How would you rate the overall condition of your coach on a scale of 1-10? <span style="font-size: 12px; font-style:italic;"> (1 being poor and 10 being excellent)</span></label>
                                <input id="Condition" name="Condition" type="text" value="" placeholder="Condition"/>
                                </div>
                                <div class="pure-controls">
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/> Aluminum Wheels
                                </label>
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/> Hydraulic Leveling Jacks
                                </label>
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/> Rear View Camera
                                </label>
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/>
                                Low Miles
                                </label>
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/> Aqua Hot
                                </label>
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/> LCD TV's
                                </label>
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/> Full Body Paint
                                </label>
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/> Completely Loaded
                                </label>
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/> Inverter
                                </label>
                                 <label for="InverterWatts">Watts</label>
                                <input id="InverterWatts" name="InverterWatts" types="text" value="" placeholder="Watts"/>
                                </div>
                               <div class="pure-controls">
                                <input id="Equipment" type="checkbox" value="Checked"/> Generator
                                </label>
                                <label for="GenFuel">Fuel Type</label>
                                <select id="GenFuel" name="GenFuel" style="width: 135px; height: 30px;" class="pure-input-1-2"><option value="none" selected="selected"> -- Please select --</option>
    <option value="Gas">Gas</option>
    <option value="Diesel">Diesel</option>
    <option value="LP">LP</option>
    </select></div>

                                <div class="pure-controls">
                                <label for="Equipment" class="pure-checkbox"/>
                                <input id="Equipment" type="checkbox" value="Checked"/> Slide-Out(s)?
                                </label>
                                <label for="Slides">Number of Slide-Outs</label>
                                <input id="Slides" name="Slides" type="text" value="" placeholder="Number of Slide-Outs"/>
                               </div>
                               <div class="pure-controls">
                               <label for="otherinfo">Other Information/Equipment</label>
                              <input id="otherinfo" name="otherinfo" style="width: 250px; height: 60px;" type="text" value="" placeholder="Please list other equipment/info" />
                              </div>
<div class="pure-controls">
                                <label for="comments">Questions or Comments?</label>
                              <input id="comments" name="comments" style="width: 250px; height: 60px;" type="text" value="" placeholder="Questions or Comments" />
                  </div>
                  <h4 style="font-weight:bold;">Possible Trade-In?</h4>
                  <div class="pure-control-group">
                  <label for="TradeIn">Yes, I have a trade. Please give us a brief description.</label>
               <input id="TradeIn" name="TradeIn" style="width: 250px; height: 60px;" type="text" value="" placeholder="Brief Description of your Trade-In" />
              </div>
                                <div class="pure-control-group">
                                <label for="NoTrade" class="pure-checkbox"/>
                                <input id="NoTrade" type="checkbox" value="Checked"/> No, I don't have a trade-in.</label>
                                </div>

<h2>Customer Information:</h2>
                                <div class="pure-control-group">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" value="" placeholder="Name"/>
                                </div>
                                <div class="pure-control-group">
                                <label for="email">Email Address</label>
                                <input id="email" name="email" type="email" value="" placeholder="Email Address"/>
                                </div>
                                <div class="pure-control-group">
                                <label for="address">Address</label>
                                <input id="address" name="address" type="text" value="" placeholder="Address"/>
                                </div>
                                <div class="pure-control-group">
                                <label for="city">City</label>
                                <input id="city" name="city" type="text" value="" placeholder="City"/>
                                </div>
                                <div class="pure-control-group">
                                <label for="state">State</label>
                                <select id="state" name="state" style="width: 135px; height: 30px;" class="pure-input-1-2">
	<option value="none" selected="selected"> -- Please select --</option>
    <option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
                                </select>
                                </div>
                                <div class="pure-control-group">
                                <label for="phone">Phone Number</label>
                                <input id="phone" type="text" value="" placeholder="Phone Number"/>
                                </div>
                  <div class="pure-controls">
                                <label for="contactasap" class="pure-checkbox"/>
                                <input id="contactasap" type="checkbox"/> Please contact me as soon as possible
                                </label>
                                <button type="submit" class="pure-button pure-button-primary">Submit Form</button>
                         </div>
                                                         <p>.</p>
                  </fieldset>
        <input type="hidden" value="<?php if(isset($_SERVER['HTTP_REFERER'])): echo $_SERVER['HTTP_REFERER']; endif; ?>" name="referrer" id="referrer" />
        <input type="hidden" value="New Wanted Form" name="xx_subject" />
        <input type="hidden" value="sales@demartini.com" name="xx_to" />
        <input type="hidden" value="<?php echo md5(date('m.d.y')); ?>" name="xx_token" />
        </form>
    </div>
</div>