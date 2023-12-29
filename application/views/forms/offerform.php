<div id="form-content">
    <div class="title-box">
        <h1>DeMartini RV Sales - Web Specials - Offer Form</h1>
    </div>
    <?php if(isset($vehicle)): ?>
       <h2 class="content-div"><strong>Vehicle:</strong> Item #<?php echo $vehicle->item_number; ?> <?php echo $vehicle->year; ?> <?php echo $vehicle->make; ?> <?php echo $vehicle->model; ?></h2>
    <?php endif; ?>

    <div class="content-div">

    <form class="pure-form pure-form-aligned" action="/forms/send_email" method="post">
        <fieldset>
            <h4>What price are you willing to offer for this new coach?</h4>

            <div class="pure-control-group">
                <label for="offer">Offer Amount</label> <input id="offer" type="text" name="offer" placeholder="Offer Amount" value="">
            </div>

            <div class="pure-controls">
                <label for="cashoffer" class="pure-checkbox"><input id="cashoffer" type="checkbox" name="cashoffer" value="Checked"> Cash Offer</label>
            </div>

            <div class="pure-controls">
                <label for="needfinancing" class="pure-checkbox"><input id="needfinancing" type="checkbox" name="needfinancing" value="Checked"> Need Financing</label>
            </div>

            <div class="pure-control-group">
                <label for="downpayment">What amount would you like to put down?</label> <input id="downpayment" name="downpayment" type="text" value="" placeholder="Down Payment">
            </div>

            <div class="pure-control-group">
                <label for="comments">Question or Comments?</label> <input id="comments" name="comments" style="width: 250px; height: 60px;" type="text" value="" placeholder="Questions or Comments">
            </div>

            <h4>Would you like to include a trade? <input type="checkbox" id="is_trade"> <span style="font-size: 14px;">(check box to tell us more about your trade)</span></h4>
            <div id="is_trade_section" style="display: none;">

                <h4 class="blueitalic">(Please check or fill in all boxes that apply)</h4>

                <div class="pure-control-group">
                    <label for="DifferenceBidAmt">Difference Price Offer</label> <input id="DifferenceBidAmt" name="DifferenceBidAmt" type="text" value="" placeholder="Difference Price Offer"> (includes trade listed below)
                </div>

                <h4 style="font-weight:bold;">Trade Type:</h4>

                <div class="pure-controls">
                    <input id="TradeType" type="checkbox" value="Checked"> Motorhome <input id="TradeType" type="checkbox" value="Checked"> Class A <input id="TradeType" type="checkbox" value="Checked"> Class C <input id="TradeType" type="checkbox" value="Checked"> Diesel Pusher <input id="TradeType" type="checkbox" value="Checked"> Trailer <input id="TradeType" type="checkbox" value="Checked"> Fifth Wheel
                </div>

                <div class="pure-control-group">
                    <label for="Year">Year</label> <input id="Year" name="Year" type="text" value="" placeholder="Year">
                </div>

                <div class="pure-control-group">
                    <label for="Make">Make</label> <input id="Make" name="Make" type="text" value="" placeholder="Make">
                </div>

                <div class="pure-control-group">
                    <label for="Model">Model</label> <input id="Model" name="Model" type="text" value="" placeholder="Model">
                </div>

                <div class="pure-control-group">
                    <label for="Length">Length</label> <input id="Length" name="Length" type="text" value="" placeholder="Length">
                </div>

                <div class="pure-control-group">
                    <label for="Mileage">Mileage</label> <input id="Mileage" name="Mileage" type="text" value="" placeholder="Mileage">
                </div>

                <h4 style="font-weight:bold;">Chassis:</h4>

                <div class="pure-controls">
                    <input id="Chassis" type="checkbox" value="Checked"> Ford <input id="Chassis" type="checkbox" value="Checked"> Workhorse <input id="Chassis" type="checkbox" value="Checked"> Diesel Pusher
                </div>

                <h4 style="font-weight:bold;">Engine Type:</h4>

                <div class="pure-controls">
                    <input id="GasEngine" type="checkbox" value="Checked"> Gas Engine
                </div>

                <div class="pure-control-group">
                    <label for="GasEngType">Gas Engine Size</label> <select id="GasEngType" name="GasEngType" style="width: 135px; height: 30px;" class="pure-input-1-2">
                        <option value="none" selected="selected">
                            -- Please select --
                        </option>

                        <option value="460 CID V-8">
                            460 CID V-8
                        </option>

                        <option value="454 CID V-8">
                            454 CID V-8
                        </option>

                        <option value="V-6">
                            V-6
                        </option>

                        <option value="6.8 LTR. V-10">
                            6.8 LTR. V-10
                        </option>

                        <option value="Other">
                            Other
                        </option>
                    </select>
                </div>

                <div class="pure-controls">
                    <input id="DieselEngine" type="checkbox" value="Checked"> Diesel Engine
                </div>

                <div class="pure-control-group">
                    <label for="EngineMake">Diesel Engine Make</label> <input id="EngineMake" name="EngineMake" type="text" value="" placeholder="Diesel Engine Make">
                </div>

                <div class="pure-control-group">
                    <label for="EngineHP">Diesel Engine Horsepower</label> <input id="EngineHP" name="EngineHP" type="text" value="" placeholder="Diesel Engine HP">
                </div>

                <div class="pure-controls">
                    <input id="ExhaustBrake" type="checkbox" value="Checked"> Exhaust Brake?
                </div>

                <h4 style="font-weight:bold;">Equipment/Condition:</h4>

                <div class="pure-control-group">
                    <label for="Condition">How would you rate the overall condition of your coach on a scale of 1-10? <span style="font-size: 12px; font-style:italic;">(1 being poor and 10 being excellent)</span></label> <input id="Condition" name="Condition" type="text" value="" placeholder="Condition">
                </div>

                <div class="pure-controls">
                    <input id="Equipment" type="checkbox" value="Checked"> Aluminum Wheels <input id="Equipment" type="checkbox" value="Checked"> Hydraulic Leveling Jacks <input id="Equipment" type="checkbox" value="Checked"> Rear View Camera <input id="Equipment" type="checkbox" value="Checked"> Satellite Dish <input id="Equipment" type="checkbox" value="Checked"> Completely Loaded <input id="Equipment" type="checkbox" value="Checked"> Inverter <label for="InverterWatts">Watts</label> <input id="InverterWatts" name="InverterWatts" types="text" value="" placeholder="Watts">
                </div>

                <div class="pure-controls">
                    <input id="Equipment" type="checkbox" value="Checked"> Generator <label for="GenFuel">Fuel Type</label> <select id="GenFuel" name="GenFuel" style="width: 135px; height: 30px;" class="pure-input-1-2">
                        <option value="none" selected="selected">
                            -- Please select --
                        </option>

                        <option value="Gas">
                            Gas
                        </option>

                        <option value="Diesel">
                            Diesel
                        </option>

                        <option value="LP">
                            LP
                        </option>
                    </select>
                </div>

                <div class="pure-controls">
                    <input id="Equipment" type="checkbox" value="Checked"> Slide-Out(s)? <label for="Slides">Number of Slide-Outs</label> <input id="Slides" name="Slides" type="text" value="" placeholder="Number of Slide-Outs">
                </div>

                <div class="pure-controls">
                    <label for="Other">Other Information/Equipment</label> <input id="comments" name="comments" style="width: 250px; height: 60px;" type="text" value="" placeholder="Please list other equipment/info">
                </div>

            </div>
            <h2>Customer Information:</h2>

            <div class="pure-control-group">
                <label for="name">Name</label> <input id="name" name="name" type="text" value="" placeholder="Name">
            </div>

            <div class="pure-control-group">
                <label for="email">Email Address</label> <input id="email" name="email" type="email" value="" placeholder="Email Address"> *Required
            </div>

            <div class="pure-control-group">
                <label for="address">Address</label> <input id="address" name="address" type="text" value="" placeholder="Address">
            </div>

            <div class="pure-control-group">
                <label for="city">City</label> <input id="city" name="city" type="text" value="" placeholder="City">
            </div>

            <div class="pure-control-group">
                <label for="state">State</label> <select id="state" name="state" style="width: 135px; height: 30px;" class="pure-input-1-2">
                    <option value="none" selected="selected">
                        -- Please select --
                    </option>

                    <option value="AL">
                        Alabama
                    </option>

                    <option value="AK">
                        Alaska
                    </option>

                    <option value="AZ">
                        Arizona
                    </option>

                    <option value="AR">
                        Arkansas
                    </option>

                    <option value="CA">
                        California
                    </option>

                    <option value="CO">
                        Colorado
                    </option>

                    <option value="CT">
                        Connecticut
                    </option>

                    <option value="DE">
                        Delaware
                    </option>

                    <option value="DC">
                        District of Columbia
                    </option>

                    <option value="FL">
                        Florida
                    </option>

                    <option value="GA">
                        Georgia
                    </option>

                    <option value="HI">
                        Hawaii
                    </option>

                    <option value="ID">
                        Idaho
                    </option>

                    <option value="IL">
                        Illinois
                    </option>

                    <option value="IN">
                        Indiana
                    </option>

                    <option value="IA">
                        Iowa
                    </option>

                    <option value="KS">
                        Kansas
                    </option>

                    <option value="KY">
                        Kentucky
                    </option>

                    <option value="LA">
                        Louisiana
                    </option>

                    <option value="ME">
                        Maine
                    </option>

                    <option value="MD">
                        Maryland
                    </option>

                    <option value="MA">
                        Massachusetts
                    </option>

                    <option value="MI">
                        Michigan
                    </option>

                    <option value="MN">
                        Minnesota
                    </option>

                    <option value="MS">
                        Mississippi
                    </option>

                    <option value="MO">
                        Missouri
                    </option>

                    <option value="MT">
                        Montana
                    </option>

                    <option value="NE">
                        Nebraska
                    </option>

                    <option value="NV">
                        Nevada
                    </option>

                    <option value="NH">
                        New Hampshire
                    </option>

                    <option value="NJ">
                        New Jersey
                    </option>

                    <option value="NM">
                        New Mexico
                    </option>

                    <option value="NY">
                        New York
                    </option>

                    <option value="NC">
                        North Carolina
                    </option>

                    <option value="ND">
                        North Dakota
                    </option>

                    <option value="OH">
                        Ohio
                    </option>

                    <option value="OK">
                        Oklahoma
                    </option>

                    <option value="OR">
                        Oregon
                    </option>

                    <option value="PA">
                        Pennsylvania
                    </option>

                    <option value="RI">
                        Rhode Island
                    </option>

                    <option value="SC">
                        South Carolina
                    </option>

                    <option value="SD">
                        South Dakota
                    </option>

                    <option value="TN">
                        Tennessee
                    </option>

                    <option value="TX">
                        Texas
                    </option>

                    <option value="UT">
                        Utah
                    </option>

                    <option value="VT">
                        Vermont
                    </option>

                    <option value="VA">
                        Virginia
                    </option>

                    <option value="WA">
                        Washington
                    </option>

                    <option value="WV">
                        West Virginia
                    </option>

                    <option value="WI">
                        Wisconsin
                    </option>

                    <option value="WY">
                        Wyoming
                    </option>
                </select>
            </div>

            <div class="pure-control-group">
                <label for="phone">Phone Number</label> <input id="phone" type="text" value="" placeholder="Phone Number">
            </div>

            <div class="pure-controls">
                <input id="contactasap" type="checkbox"> Please contact me as soon as possible <button type="submit" class="pure-button pure-button-primary">Submit My Offer</button>
            </div>

            <p>Offers are not binding nor are a guarantee of purchase. Bidder reserves the right to verify condition of unit before an actual purchase contract is signed.</p>
 
            <p>All Bank Repo's are sold as is, where is, with no warranty or guarantee of any kind, and are subject to availability for sale. We reserve the right to refuse any or all bids. Bids are monitored daily and successful bidders will be notified by E-Mail or Telephone.</p>
        </fieldset>
        <?php if(isset($vehicle)): ?>
        <input type="hidden" value="Item #<?php echo $vehicle->item_number; ?> <?php echo $vehicle->year; ?> <?php echo $vehicle->make; ?> <?php echo $vehicle->model; ?>" name="rv" id="rv" />
        <?php endif; ?>
        <input type="hidden" value="<?php if(isset($_SERVER['HTTP_REFERER'])): echo $_SERVER['HTTP_REFERER']; endif; ?>" name="referrer" id="referrer" />
        <input type="hidden" value="Internet Special Offer Form" name="xx_subject" />
        <input name="xx_to" type="hidden" value="sales@demartini.com" />
        <input type="hidden" value="<?php echo md5(date('m.d.y')); ?>" name="xx_token" />
    </form>
    </div>
</div>
