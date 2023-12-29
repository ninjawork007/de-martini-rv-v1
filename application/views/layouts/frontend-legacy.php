<?php
$user = $this->user;
?>
<?php
function is_menu_item_selected($controller, $method){
	if($this->uri->segment(1) == $controller && $this->uri->segment(2) == $method){
		return "selected";
	}else{
		return "";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>DeMartini R.V. Sales | <? echo $template['title'];?></title>
		<meta name="google-site-verification" content="BlFmmAWKQmyhcLo3Z0gagi4t29qx8hwwIFkXE_vQSvE" />
		<meta name="keywords" content="recreation, recreational, vehicle, RV, r.v., Holiday Rambler, Monaco, Admiral, Ambassador, Atlantis, Vacationer, Endeavor, Imperial, Navigator, Fleetwood, Discovery, Revolution, Icon, Pulse, Jamboree, Tioga, Bounder, Bounder Classic, Quest, Camelot, Windsor, Dynasty, Condor, Stratus, motorhome, diesel pusher, class A, class C, bank repo, bank repossession, boat, bigfoot, campers, camping, travel, yacht, marine.   ">
		<meta name="description" content="DeMartini R.V. Sales, Recreational vehicles (RVs), Holiday&nbsp; Rambler Motorhomes, Monaco Motorhomes, Monaco Coach Corporation, Fleetwood, Discovery, Revolution, Icon, Pulse, Jamboree, Tioga, Bounder, Bounder Classic, Quest,  Endeavor, Scepter, Imperial, Dynasty,&nbsp; Windsor, Camelot, Navigator, Vacationer, Admiral, Ambassador, trailers, campers,&nbsp; boat and bank repossessions.">
		<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
		<meta name="ProgId" content="FrontPage.Editor.Document">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv='expires' content='1200' />
		<meta http-equiv='content-language' content='<?php echo $this->config->item('prefix_language') ?>' />
		<base href="<?php echo $this->config->item('base_url') ?>/public/" />
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/fstyles.css?<?php echo time();?>" type="text/css" media="screen" />

	</head>

	<body>

		<div id="bheader">
			<img border="0" src="img/parts/BANNER.jpg" width="2003" height="84">
		</div>

		<div id="bsidebar">
			<?php $this->load->view("partials/sidebar");?>
		</div>

		<div id="bcontent">

			<?php $this->load->view("partials/_flashdata");?>

			<?php echo $template['body']; ?>

		</div>

	</body>

</html>
