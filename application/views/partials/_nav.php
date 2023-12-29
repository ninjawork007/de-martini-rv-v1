<nav id="main-nav" class="pure-menu pure-menu-open pure-menu-horizontal">
	<ul>
	    <?php preg_match("/^([A-Za-z0-9_-]+\\/*){0,2}([A-Za-z0-9_-]+){1}/u", $this->uri->uri_string(), $first_three); ?>
	    <?php $first_three = isset($first_three[0]) ? $first_three[0] : ''; ?>
	    <?php  $mactive = ($first_three == '')  ? "class='pure-menu-selected'" : ""; ?>
	    <li <?=$mactive?>><a href="<?=base_url()?>" title="Home">Home</a></li>
	    <?php  $mactive = ($first_three == 'categories/type/new')  ? "class='pure-menu-selected'" : ""; ?>
		<li <?=$mactive?>><a href="<?=base_url()?>categories/type/new" title="New RVs">New RV's</a></li>
		<?php  $mactive = ($first_three == 'categories/type/used')  ? "class='pure-menu-selected'" : ""; ?>
		<li <?=$mactive?>><a href="<?=base_url()?>categories/type/used" title="Used RVs">Used RV's</a></li>
		<?php  $mactive = ($first_three == 'categories/all/90')  ? "class='pure-menu-selected'" : ""; ?>
		<li <?=$mactive?>><a href="<?=base_url()?>categories/used_rvs/90/class-a-diesel" title="Used Diesels">Used Diesels</a></li>
		<?php  $mactive = ($first_three == 'categories/web_specials')  ? "class='pure-menu-selected'" : ""; ?>
		<li <?=$mactive?>><a href="<?=base_url()?>categories/web_specials" title="Web Specials">Web Specials</a></li>
		<?php  $mactive = ($first_three == 'categories/clearance')  ? "class='pure-menu-selected'" : ""; ?>
		<li <?=$mactive?>><a href="<?=base_url()?>categories/clearance" title="Clearance">Clearance</a></li>
		<?php  $mactive = ($first_three == 'details/parts_service')  ? "class='pure-menu-selected'" : ""; ?>
		<li <?=$mactive?>><a href="<?=base_url()?>details/parts_service" title="Service">Parts & Service</a></li>
		<?php  $mactive = ($first_three == 'details/location')  ? "class='pure-menu-selected'" : ""; ?>
		<li <?=$mactive?>><a href="<?=base_url()?>details/location" title="Contact Us">Contact Us</a></li>
	</ul>
</nav>
