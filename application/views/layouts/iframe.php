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
		<link rel="stylesheet" href="css/bstyles.css" type="text/css" media="screen" />

		<style>
			body {
				background: none;
			}
		</style>
		<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
		<script src="js/admin.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			});
		</script>
		<?php echo $template['metadata']; ?>

	</head>

	<body>

				<?php $this->load->view("partials/_flashdata");?>

				<?php echo $template['body']; ?>

	</body>

</html>
