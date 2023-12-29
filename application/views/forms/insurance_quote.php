<div id="form-content">
    <div class="title-box">
        <h1>RV Insurance Quote Form</h1>
        <p>Please fill out the following information and we will get back to you with a quote on RV Insurance.</p>
    </div>
    <div class="content-div">

    <form class="pure-form pure-form-aligned" action="/forms/send_email" method="post">
        <fieldset>
        <h2>Customer Information:</h2>
        <h3><b>Primary Driver:</b></h3>

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
                <label for="phone">Phone Number</label> <input id="phone" name="phone" type="text" value="" placeholder="Phone Number">
            </div>
            <div class="pure-control-group">
                <label for="dateofbirth">Date of Birth (mm/dd/yyyy)</label> <input id="dateofbirth" name="dateofbirth" type="text" value="" placeholder="Date of Birth">
            </div>
            <div class="pure-control-group">
                <label for="license_no">Driver's License Number</label> <input id="license_no" name="license_no" type="text" value="" placeholder="Driver's License Number">
            </div>
            <h3> Please check the following that apply: </h3>
            <p>Have you had any tickets or accidents in the last three years?</p>
            <div class="pure-controls">
                <label for="yestickets" class="pure-checkbox"><input id="yestickets" type="checkbox" name="yestickets" value="Checked"> Yes</label>
                <label for="notickets" class="pure-checkbox"><input id="notickets" type="checkbox" name="notickets" value="Checked"> No</label>
            </div>
            <p>Marital Status:</p>
            <div class="pure-controls">
                <label for="married" class="pure-checkbox"><input id="married" type="checkbox" name="married" value="Checked"> Married</label>
                <label for="single" class="pure-checkbox"><input id="single" type="checkbox" name="single" value="Checked"> Single</label>
            </div>
            <p>Are you a homeowner?</p>
            <div class="pure-controls">
                <label for="yeshomeowner" class="pure-checkbox"><input id="yeshomeowner" type="checkbox" name="yeshomeowner" value="Checked"> Yes</label>
                <label for="nohomeowner" class="pure-checkbox"><input id="nohomeowner" type="checkbox" name="nohomeowner" value="Checked"> No</label>
            </div>
            
            <p>Are you a Full-Time RVer?</p>
            <div class="pure-controls">
                <label for="yesfulltimer" class="pure-checkbox"><input id="yesfulltimer" type="checkbox" name="yesfulltimer" value="Checked"> Yes</label>
                <label for="nofulltimer" class="pure-checkbox"><input id="nofulltimer" type="checkbox" name="nofulltimer" value="Checked"> No</label>
            </div>
            <h3> <b> Secondary Driver: </b>(if applicable)</h3>

            <div class="pure-control-group">
                <label for="name2">Name</label> <input id="name2" name="name2" type="text" value="" placeholder="Name">
            </div>
            
			<div class="pure-control-group">
                <label for="License2">Driver's License Number</label> <input id="License2" name="License2" type="text" value="" placeholder="Driver's License Number">
            </div>
            <div class="pure-control-group">
                <label for="dateofbirth2">Date of Birth (mm/dd/yyyy)</label> <input id="dateofbirth2" name="dateofbirth2" type="text" value="" placeholder="Date of Birth">
            </div>
            
           <div class="pure-control-group">
                <label for="address2">Address (if different from primary driver)</label> <input id="address2" name="address2" type="text" value="" placeholder="Address">
            </div>

            <div class="pure-control-group">
                <label for="city2">City</label> <input id="city2" name="city2" type="text" value="" placeholder="City">
            </div>

            <div class="pure-control-group">
                <label for="state2">State</label> <select id="state2" name="state2" style="width: 135px; height: 30px;" class="pure-input-1-2">
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
                <label for="phone2">Phone Number</label> <input id="phone2" name="phone2" type="text" value="" placeholder="Phone Number">
            </div>
            
            <h3>Please check the following that apply: </h3>
            <p>Have you had any tickets or accidents in the last three years?</p>
            <div class="pure-controls">
                <label for="yestickets2" class="pure-checkbox"><input id="yestickets2" type="checkbox" name="yestickets2" value="Checked"> Yes</label>
                <label for="notickets2" class="pure-checkbox"><input id="notickets2" type="checkbox" name="notickets2" value="Checked"> No</label>
            </div>
            <p>Marital Status:</p>
            <div class="pure-controls">
                <label for="married2" class="pure-checkbox"><input id="married2" type="checkbox" name="married2" value="Checked"> Married</label>
                <label for="single2" class="pure-checkbox"><input id="single2" type="checkbox" name="single2" value="Checked"> Single</label>
            </div>
            <p>Are you a homeowner?</p>
            <div class="pure-controls">
                <label for="yeshomeowner2" class="pure-checkbox"><input id="yeshomeowner2" type="checkbox" name="yeshomeowner2" value="Checked"> Yes</label>
                <label for="nohomeowner2" class="pure-checkbox"><input id="nohomeowner2" type="checkbox" name="nohomeowner2" value="Checked"> No</label>
            </div>
            
            <p>Are you a Full-Time RVer?</p>
            <div class="pure-controls">
                <label for="yesfulltimer2" class="pure-checkbox"><input id="yesfulltimer2" type="checkbox" name="yesfulltimer2" value="Checked"> Yes</label>
                <label for="nofulltimer2" class="pure-checkbox"><input id="nofulltimer2" type="checkbox" name="nofulltimer2" value="Checked"> No</label>
            </div>
   
                <h2 style="font-weight:bold;">RV Information:</h2>

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
                
                <div class="pure-control-group">
                    <label for="VIN_Number">VIN Number</label> <input id="VIN" name="VIN" type="text" value="" placeholder="VIN Number">
                </div>
                <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Submit</button>
            </div>

        </fieldset>
        <input type="hidden" value="<?php if(isset($_SERVER['HTTP_REFERER'])): echo $_SERVER['HTTP_REFERER']; endif; ?>" name="referrer" id="referrer" />
        <input type="hidden" value="RV Insurance Quote" name="xx_subject" />
        <input type="hidden" value="sales@demartini.com" name="xx_to" />
        <input type="hidden" value="<?php echo md5(date('m.d.y')); ?>" name="xx_token" />
    </form>
    </div>
</div>
