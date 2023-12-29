<div id="form-content">
    <div class="title-box">
        <h1>DeMartini RV Sales - Bid Form</h1>
    </div>

    <?php if(isset($vehicle)): ?>
       <h2 class="content-div"><strong>Vehicle:</strong> Item #<?php echo $vehicle->item_number; ?> <?php echo $vehicle->year; ?> <?php echo $vehicle->make; ?> <?php echo $vehicle->model; ?></h2>
    <?php endif; ?>

    <div class="content-div">
        <form class="pure-form pure-form-aligned" action="/forms/send_email" method="post">
            <fieldset>
                <div class="pure-control-group">
                    <label for="bid">Bid Amount</label> <input id="bid" type="text" name="bid" placeholder="Bid Amount" value="">
                </div>

                <div class="pure-controls">
                    <label for="cashoffer" class="pure-checkbox"><input id="cashoffer" type="checkbox" name="cashoffer" value="Checked"> Cash Offer</label>
                </div>

                <div class="pure-controls">
                    <label for="needfinancing" class="pure-checkbox"><input id="needfinancing" type="checkbox" name="needfinancing" value="Checked"> Need Financing</label>
                </div>

                <div class="pure-control-group">
                    <label for="downpayment">What amount would you like to put down?</label>
                    <input id="downpayment" name="downpayment" type="text" value="" placeholder="Down Payment">
                </div>

                <div class="pure-control-group">
                    <label for="comments">Questions or Comments?</label>
                     <input id="comments" name="comments" style="width: 250px; height: 60px;" type="text" value="" placeholder="Questions or Comments" />
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
                    <label for="phone">Phone Number</label> <input id="phone" type="text" value="" name="phone" placeholder="Phone Number">
                </div>

                <div class="pure-controls">
                    <input id="contactasap" type="checkbox" name="contact_me" value="Yes" /> Please contact me as soon as possible
                    <?php if(isset($vehicle)): ?>
                    <input type="hidden" value="Item #<?php echo $vehicle->item_number; ?> <?php echo $vehicle->year; ?> <?php echo $vehicle->make; ?> <?php echo $vehicle->model; ?>" name="rv" id="rv" />
                    <?php endif; ?>
                    <input type="hidden" value="<?php if(isset($_SERVER['HTTP_REFERER'])): echo $_SERVER['HTTP_REFERER']; endif; ?>" name="referrer" id="referrer" />
                    <input type="hidden" value="Bid Form Offer" name="xx_subject" />
                    <input type="hidden" value="sales@demartini.com" name="xx_to" />
                    <input type="hidden" value="<?php echo md5(date('m.d.y')); ?>" name="xx_token" />
                    <button type="submit" class="pure-button pure-button-primary">Submit</button>
                </div>
                <p class="padding10">Bid Offers are not binding nor are a guarantee of purchase, and bidder reserves the right to verify condition of unit before an actual purchase contract is signed. All Bank Repo's are sold as is, where is, with no warranty or guarantee of any kind, and are subject to availability for sale. We reserve the right to refuse any or all bids. Bids are monitored daily and successful bidders will be notified by E-Mail or Telephone.</p>
            </fieldset>
        </form>
    </div>
</div>