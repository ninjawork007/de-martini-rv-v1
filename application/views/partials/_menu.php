<?php  $mactive = ($this->uri->rsegment(1) == 'admin')  ? "class='selected'" : "" ?>
<li data-low-hide <?=$mactive?> data><a href="/admin/" style="background-position: 0px 0px;"><?=lang('web_home')?></a></li>
<?php  $mactive = ($this->uri->rsegment(1) == 'users')  ? "class='selected'" : "" ?>
<li data-low-hide <?=$mactive?>><a href="/admin/users/" style="background-position: 0px 0px;"><?=lang('web_users')?></a></li>
<?php  $mactive = ($this->uri->rsegment(1) == 'vehicles')  ? "class='selected'" : "" ?>
<li <?=$mactive?>><a href="/admin/vehicles/" style="background-position: 0px 0px;">Vehicles</a></li>
<?php  $mactive = ($this->uri->rsegment(1) == 'categories')  ? "class='selected'" : "" ?>
<li data-low-hide <?=$mactive?>><a href="/admin/categories/" style="background-position: 0px 0px;"><?=lang('web_categories')?></a></li>
<?php  $mactive = ($this->uri->rsegment(1) == 'statuses')  ? "class='selected'" : "" ?>
<li data-low-hide <?=$mactive?>><a href="/admin/statuses/" style="background-position: 0px 0px;">Statuses</a></li>
<!--
<?php  $mactive = ($this->uri->rsegment(1) == 'vehicle_templates')  ? "class='selected'" : "" ?>
<li <?=$mactive?>><a href="/admin/vehicle_templates/" style="background-position: 0px 0px;">Vehicle Templates</a></li>
-->
<?php  $mactive = ($this->uri->rsegment(1) == 'testimonials')  ? "class='selected'" : "" ?>
<li data-low-hide <?=$mactive?>><a href="/admin/testimonials/" style="background-position: 0px 0px;">Testimonials</a></li>

<?php  $mactive = ($this->uri->rsegment(1) == 'forms')  ? "class='selected'" : "" ?>
<li data-low-hide <?=$mactive?>><a href="/admin/forms/" style="background-position: 0px 0px;">Forms</a></li>

<?php  $mactive = ($this->uri->rsegment(1) == 'floor_plans')  ? "class='selected'" : "" ?>
<li data-low-hide <?=$mactive?>><a href="/admin/floor_plans/" style="background-position: 0px 0px;">Floor Plans</a></li>

<?php  $mactive = ($this->uri->rsegment(1) == 'model_specifics')  ? "class='selected'" : "" ?>
<li data-low-hide <?=$mactive?>><a href="/admin/model_specifics/" style="background-position: 0px 0px;">Model Specifics</a></li>