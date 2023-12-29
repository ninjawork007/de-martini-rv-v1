<div id="form-content">
    <div class="title-box">
        <h1>DeMartini RV Sales - RV Service Appointment Request</h1>
    </div>

    <?php if(isset($vehicle)): ?>
       <h2 class="content-div"><strong>Vehicle:</strong> Item #<?php echo $vehicle->item_number; ?> <?php echo $vehicle->year; ?> <?php echo $vehicle->make; ?> <?php echo $vehicle->model; ?></h2>
    <?php endif; ?>

    <div class="content-div">
        <form class="pure-form pure-form-aligned" action="/forms/send_email" method="post">
            <fieldset>
            <div class="pure-control-group">
                <label>Preferred Appointment Date:</label> <input id=
                "preferred_date" name="preferred_date" placeholder=
                "Preferred Date" type="text" value="">
            </div>

            <div class="pure-control-group">
                <label>Alternative Appointment Date:</label> <input id=
                "alternative_date" name="alternative_date" placeholder=
                "Alternative Date" type="text" value="">
            </div>

            <h4 style="font-weight:bold;">Which vehicle requires service?</h4>

            <div class="pure-control-group">
                <label for="Year">Year</label> <input id="Year" name="Year"
                placeholder="Year" type="text" value="">
            </div>

            <div class="pure-control-group">
                <label for="Make">Make</label> <input id="Make" name="Make"
                placeholder="Make" type="text" value="">
            </div>

            <div class="pure-control-group">
                <label for="Model">Model</label> <input id="Model" name="Model"
                placeholder="Model" type="text" value="">
            </div>

            <div class="pure-control-group">
                <label for="Mileage">Mileage</label> <input id="Mileage" name=
                "Mileage" placeholder="Mileage" type="text" value="">
            </div>

            <div class="pure-control-group">
                <label for="VIN">VIN</label> <input id="VIN" name="VIN"
                placeholder="VIN" type="text" value="">
            </div>

            <h4 style="font-weight:bold;">How can we get in touch with you? We
            will contact you to confirm your reservation.</h4>

            <div class="pure-control-group">
                <label for="name">Name</label> <input id="name" name="name"
                placeholder="Name" type="text" value="">
            </div>

            <div class="pure-control-group">
                <label for="email">Email Address</label> <input id="email"
                name="email" placeholder="Email Address" type="email" value="">
            </div>

            <div class="pure-control-group">
                <label for="address">Address</label> <input id="address" name=
                "address" placeholder="Address" type="text" value="">
            </div>

            <div class="pure-control-group">
                <label for="city">City</label> <input id="city" name="city"
                placeholder="City" type="text" value="">
            </div>

            <div class="pure-control-group">
                <label for="state">State</label> <select class="pure-input-1-2"
                id="state" name="state" style="width: 135px; height: 30px;">
                    <option selected="selected" value="none">
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
                <label for="phone">Phone Number</label> <input id="phone"
                placeholder="Phone Number" type="text" value="">
            </div>

            <div class="pure-control-group">
                <label for="Comments">Comments:</label>
                 <input id="Comments" name="Comments" style="width: 250px; height: 60px;" type="text" value="" placeholder="Questions or Comments" />
            </div>

            <div class="pure-controls">
                <button class="pure-button pure-button-primary" type=
                "submit">Request Appointment</button>
            </div>
        </fieldset>
        <input type="hidden" value="<?php if(isset($_SERVER['HTTP_REFERER'])): echo $_SERVER['HTTP_REFERER']; endif; ?>" name="referrer" id="referrer" />
        <input name="xx_subject" type="hidden" value="Service Appointment Request">
        <input name="xx_to" type="hidden" value="tony@demartini.com">
        <input name="xx_cc" type="hidden" value="vicky@demartini.com">
        <input type="hidden" value="<?php echo md5(date('m.d.y')); ?>" name="xx_token" />
        </form>
    </div>
</div>