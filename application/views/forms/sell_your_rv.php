
    <div id="form-content">
        <div class="title-box">
            <h1>DeMartini RV Sales - Sell Your RV Form</h1>
        </div><?php if(isset($vehicle)): ?>

        <h2 class="content-div"><strong>Vehicle:</strong> Item #<?php echo $vehicle->item_number; ?> <?php echo $vehicle->year; ?> <?php echo $vehicle->make; ?> <?php echo $vehicle->model; ?></h2>

        <?php endif; ?>

        <p align="left"><span class="big"><strong>Are you interested in selling your motorhome, trailer, boat, or pick-up?</strong></p>
        <p align="left"><span class="big"><em>We pay cash for motorhomes and recreational vehicles!</em></span> Please fill out the following short form with information on your RV and we will get back to you with an immediate cash offer! You can also upload photos of your coach. The more information you can provide us, the better we will be able to determine the best cash value for your vehicle.</p>
        <p align="left">If you're in no rush to sell your RV, we can add it to our RV for sale database.</p>
        <div class="content-div">
            <form class="pure-form pure-form-aligned" action="/forms/send_email" method="post" >
                <fieldset>
                                <legend></legend>
              <h4><strong> What would you like us to do with your information?</strong></h4>

<div class="pure-controls">
                                <label for="ContactCashOffer" class="pure-checkbox">
                                    <input id="ContactCashOffer" type="checkbox" name="ContactCashOffer" value="Checked"/>
                                    Have someone contact me with a Cash Offer!
                              </label>
                            </div>
                            <div class="pure-controls">
                                <label for="AddtoDatabase" class="pure-checkbox">
                                    <input id="AddtoDatabase" type="checkbox" name="AddtoDatabase" value="Checked" />
                                    Add me to the RV for Sale Database</label>
                            </div>
                            <h4><strong> Please give us some information on your vehicle:</strong></h4>

                             <h4>Would you like to include a trade?
      <input type="checkbox" id="is_trade"><span style="font-size: 14px;"> (check box to tell us more about your trade)</span></h4>
      							<h4 class="blueitalic">(Please check or fill in all boxes that apply)</h4>
   				                <h4 style="font-weight:bold;"> Vehicle Type: </h4>
                                <div class="pure-controls">
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Motorhome
                                </label>
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Class A
                                </label>
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Class C
                                </label>
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Diesel Pusher
                                </label>
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Trailer
                                </label>
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Fifth Wheel
                                </label>
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Camper
                                </label>
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Boat
                                </label>
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Pick-up
                                </label>
                                <label for="TradeType" class="pure-checkbox"/>
                                <input id="TradeType" type="checkbox" value="Checked"/> Other
                                </label>
                                </div>

                             <div class="pure-control-group">
                                <label for="Year">Year</label>
                                <input id="Year" name="Year" type="text" value="" placeholder="Year"/>
              </div>
                                 <div class="pure-control-group">
                                <label for="Make">Make</label>
                                <input id="Make" name="Make" type="text" value="" placeholder="Make"/>
                                </div>
                                 <div class="pure-control-group">
                                <label for="Model">Model</label>
                                <input id="Model" name="Model" type="text" value="" placeholder="Model"/>
                                </div>
                                 <div class="pure-control-group">
                                <label for="Length">Length</label>
                                <input id="Length" name="Length" type="text" value="" placeholder="Length"/>
                                </div>
                                 <div class="pure-control-group">
                                <label for="Mileage">Mileage</label>
                                <input id="Mileage" name="Mileage" type="text" value="" placeholder="Mileage"/>
                                </div>
                                <h4 style="font-weight:bold;">Chassis:</h4>
                                <div class="pure-controls">
                                <label for="Chassis" class="pure-checkbox"/>
                                <input id="Chassis" type="checkbox" value="Checked"/> Ford
                                </label>
                                <label for="Chassis" class="pure-checkbox"/>
                                <input id="Chassis" type="checkbox" value="Checked"/> Workhorse
                                </label>
                                <label for="Chassis" class="pure-checkbox"/>
                                <input id="Chassis" type="checkbox" value="Checked"/> Diesel Pusher
                                </label>
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
                                <input id="Equipment" type="checkbox" value="Checked"/> Satellite Dish
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
                               <label for="OtherInfo">Other Information/Equipment</label>
                              <input id="OtherInfo" name="OtherInfo" style="width: 250px; height: 60px;" type="text" value="" placeholder="Please list other equipment/info" />
                              </div>
<div class="pure-controls">
                                <label for="comments">Questions or Comments?</label>
                              <input id="comments" name="comments" style="width: 250px; height: 60px;" type="text" value="" placeholder="Questions or Comments" />
                  </div>
                  <h4 style="font-weight:bold;">Sale Questions:</h4>
                  <div class="pure-control-group">
                                <label for="DesiredPrice">1. What is your desired selling price?</label>
                                <input id="DesiredPrice" name="DesiredPrice" type="text" value="" placeholder="Desired Selling Price"/>
              </div>
                                <div class="pure-control-group">
                                <label for="MinPrice">2. What is your minimum selling price?</label>
                                <input id="MinPrice" name="MinPrice" type="text" value="" placeholder="Minimum Selling Price"/>
                                </div>
                                <div class="pure-control-group">
                                <label for="SellByDate">3. What is your desired sell by date?</label>
                                <input id="SellByDate" name="SellByDate" type="text" value="" placeholder="Desired Sell By Date"/>
                                </div>
                                <h4> Please check all the following that apply:</h4>
                                <div class="pure-controls">
                                <label for="ImmediateCash" class="pure-checkbox"/>
                                <input id="ImmediateCash" type="checkbox" value="Checked"/> I would like an immediate cash offer</label>
                                <label for="QuickSale" class="pure-checkbox"/>
                                <input id="QuickSale" type="checkbox" value="Checked"/> I would like a quick sale</label>
                                <label for="Must_Sell_Immediately" class="pure-checkbox"/>
                                <input id="Must_Sell_Immediately" type="checkbox" value="Checked"/> Must Sell Immediately!</label>
                                <label for="Add_To_For_Sale_List" class="pure-checkbox"/>
                                <input id="Add_To_For_Sale_List" type="checkbox" value="Checked"/> No rush to sell!  Just add me to your "For Sale List" and try to find a buyer</label>

                                </div>
                    <dl>
    <dt><font size="4"><strong>Upload Photos of your coach:</strong></font></dt>
    <dt>
  <input type="file" name="uploads[]" id="uploads" multiple="true" />
    </dt>
     <dt>
  <input type="file" name="uploads[]" id="uploads" multiple="true" />
    </dt>
     <dt>
  <input type="file" name="uploads[]" id="uploads" multiple="true" />
    </dt>
     <dt>
  <input type="file" name="uploads[]" id="uploads" multiple="true" />
    </dt>
</dl>
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
                                <button type="submit" class="pure-button pure-button-primary">Submit Information</button>
                         </div>
                                                         <p>Inquiries are monitored daily.&nbsp; Sellers will be notified by E-Mail or Phone for
  further arrangements.</p>
                  </fieldset>
                 <?php if(isset($vehicle)): ?>
                    <input type="hidden" value="Item #<?php echo $vehicle->item_number; ?> <?php echo $vehicle->year; ?> <?php echo $vehicle->make; ?> <?php echo $vehicle->model; ?>" name="rv" id="rv" />
                <?php endif; ?>
                <input type="hidden" value="<?php if(isset($_SERVER['HTTP_REFERER'])): echo $_SERVER['HTTP_REFERER']; endif; ?>" name="referrer" id="referrer" />
                <input type="hidden" value="Sell Your RV" name="xx_subject" />
                <input type="hidden" value="sales@demartini.com" name="xx_to" />
                <input type="hidden" value="<?php echo md5(date('m.d.y')); ?>" name="xx_token" />
            </form>
