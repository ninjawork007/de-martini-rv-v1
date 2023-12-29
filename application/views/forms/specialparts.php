<div id="form-content">
    <div class="title-box">
        <h1>DeMartini RV Sales - Special Parts Request Form</h1>
    </div>

    <?php if(isset($vehicle)): ?>
       <h2 class="content-div"><strong>Vehicle:</strong> Item #<?php echo $vehicle->item_number; ?> <?php echo $vehicle->year; ?> <?php echo $vehicle->make; ?> <?php echo $vehicle->model; ?></h2>
    <?php endif; ?>

    <div class="content-div">
        <form class="pure-form pure-form-aligned" action="/forms/send_email" method="post" >
            <fieldset>
                <h2>Customer Information:</h2>

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

                <h2>Vehicle Information:</h2>

                <div class="pure-control-group">
                    <label for="MakeModel">Make/Model</label> <input id="MakeModel"
                    name="MakeModel" placeholder="Make/Model" type="text" value="">
                </div>

                <div class="pure-control-group">
                    <label for="VehicleSerialNumber">Vehicle Serial Number</label>
                    <input id="VehicleSerialNumber" name="VehicleSerialNumber"
                    placeholder="Vehicle Serial Number" type="text" value="">
                </div>

                <div class="pure-control-group">
                    <label for="VIN">VIN (last 8 digits)</label> <input id="VIN"
                    name="VIN" placeholder="VIN (last 8 digits)" type="text" value=
                    "">
                </div>

                <h2>Part Description:</h2>

                <div class="pure-control-group">
                    <label for="ManPartno">Manufacturer Part # (if known)</label>
                    <input id="ManPartno" name="ManPartno" placeholder=
                    "Manufacturer Part No." type="text" value="">
                </div>
                <div class="pure-control-group">
              <label for="Description">Describe the part you are looking for:</label>
               <input id="Description" name="Description" style="width: 250px; height: 60px;" type="text" value="" placeholder="Describe the part" />
              </div>

                <p><input name="MAX_FILE_SIZE" type="hidden" value="100000000">
                Attach a Photo: <input multiple name="uploads[]" type="file" value=""><br>
                Attach a Photo: <input multiple name="uploads[]" type="file" value=""><br>
                Attach a Photo: <input multiple name="uploads[]" type="file" value=""></p>

                <p>If the part goes with an appliance (ie. refrigerator, furnace
                etc.) provide the following:</p>

                <div class="pure-control-group">
                    <label for="ApplianceModel">Appliance Model</label> <input id=
                    "ApplianceModel" name="ApplianceModel" placeholder=
                    "Appliance Model" type="text" value="">
                </div>

                <div class="pure-control-group">
                    <label for="ApplianceSerial">Appliance Serial Number</label>
                    <input id="ApplianceSerial" name="ApplianceSerial" placeholder=
                    "Appliance Serial Number" type="text" value="">
                </div>

                <div class="pure-controls">
                    <input id="MailingList" name="MailingList" type="checkbox">
                    <label for="MailingList">Please add me to your mailing
                    list</label>
                </div>

                <div class="pure-controls">
                    <button class="pure-button pure-button-primary" type=
                    "submit">Submit Form</button>
                </div>
            </fieldset>
            <input type="hidden" value="<?php if(isset($_SERVER['HTTP_REFERER'])): echo $_SERVER['HTTP_REFERER']; endif; ?>" name="referrer" id="referrer" />
            <input name="xx_subject" type="hidden" value="Parts Form">
            <input name="xx_to" type="hidden" value="janko@demartini.com">
            <input name="xx_cc" type="hidden" value="vicky@demartini.com">
            <input type="hidden" value="<?php echo md5(date('m.d.y')); ?>" name="xx_token" />
        </form>
    </div>
</div>