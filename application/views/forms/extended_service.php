<div id="form-content">
    <div class="title-box">
        <h1>Extended Service Contract Quote Form</h1>
        <p>Please fill out the following information and we will get back to you with a quote on an <em>Extended Service Contract</em> and <em>Tire &amp; Wheel Protection</em> for your RV!</p>
    </div>
    <div class="content-div">

    <form class="pure-form pure-form-aligned" action="/forms/send_email" method="post">
        <fieldset>
        <h2>Customer Information:</h2>
               <div class="pure-control-group">
                <label for="name">Name</label> <input id="name" name="name" type="text" value="" placeholder="Name">
            </div>

            <div class="pure-control-group">
                <label for="email">Email Address</label> <input id="email" name="email" type="email" value="" placeholder="Email Address"> *Required
            </div>

            <div class="pure-control-group">
                <label for="phone">Phone Number</label> <input id="phone" name="phone" type="text" value="" placeholder="Phone Number">
            </div>
          
            <h2>RV Information:</h2>

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
                    <label for="Mileage">Mileage</label> <input id="Mileage" name="Mileage" type="text" value="" placeholder="Mileage">
                </div>
            <p>Do you already own your RV or are you in the process of purchasing?</p>
            <div class="pure-controls">
                <label for="alreadyown" class="pure-checkbox"><input id="alreadyown" type="checkbox" name="alreadyown" value="Checked"> I Already Own</label>
                <label for="purchasing" class="pure-checkbox"><input id="purchasing" type="checkbox" name="purchasing" value="Checked"> I Am Purchasing</label>
            </div> 
   
                <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Submit</button>
            </div>
         
        </fieldset>
        <input type="hidden" value="<?php if(isset($_SERVER['HTTP_REFERER'])): echo $_SERVER['HTTP_REFERER']; endif; ?>" name="referrer" id="referrer" />
        <input type="hidden" value="Extended Service Quote" name="xx_subject" />
        <input type="hidden" value="sales@demartini.com" name="xx_to" />
        <input type="hidden" value="<?php echo md5(date('m.d.y')); ?>" name="xx_token" />
    </form>
    </div>
</div>
