<?php
$user = $this->user;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title><? echo $template['title'];?></title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv='expires' content='1200' />
		<meta http-equiv='content-language' content='<?php echo $this->config->item('prefix_language') ?>' />

		<base href="<?php echo $this->config->item('base_url') ?>/public/" />

		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/smoothness/jquery-ui-1.8.21.custom.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.3.0/pure-min.css">
		<link rel="stylesheet" href="js/dropzone/css/basic.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="js/dropzone/css/dropzone.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/bstyles.css" type="text/css" media="screen" />

		<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
		<script src="js/dropzone/dropzone.min.js" type="text/javascript"></script>
		<script src="js/admin.js" type="text/javascript"></script>

		<?php echo $template['metadata']; ?>
        
        <script type="text/javascript">
            <?php if($user && isset($user->usersgroups[0])): ?>
            window.group = <?=$user->usersgroups[0]->id?>;
            <?php else: ?>
            window.group = null;
            <?php endif; ?>
        </script>
	</head>

	<body>

		<div id='bcontainer'>

			<div id="bheader">

				<div id="btop">
					<h1><a href="/"><?=$this->config->item('site_title');?></a></h1>
					<?php if($user): ?>
					<p id="userbox"><strong style="color: white;"><?=$user->first_name?> <?=$user->last_name?></strong> &nbsp;| &nbsp;<a href="/admin/users/edit/<?=$user->id?>"><?=lang('web_my_account')?></a> &nbsp;|&nbsp; <a href='/scaffolds/scaffolds/create'>Scaffolding</a> &nbsp;|&nbsp;<a href="/admin/logout"><?=lang('web_logout')?></a> <br>
`					<?php else: ?>
					<p id="userbox"><a href="/admin/login">Login</a> <br>
					<?php endif; ?>
					<span class="clearFix">&nbsp;</span>
				</div>
				<ul id="bmenu">
					<?php $this->load->view('partials/_menu');?>
				</ul>


				<span class="clearFix">&nbsp;</span>

			</div>	


			<div id="bcontent">

				<?php $this->load->view("partials/_flashdata");?>

				<?php echo $template['body']; ?>

			</div>

		</div>

	</body>

</html>
