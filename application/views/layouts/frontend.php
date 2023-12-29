<?php
$user = $this->user;
?>
<?php
if(!function_exists('is_menu_item_selected')){
	function is_menu_item_selected($controller, $method){
		if($this->uri->segment(1) == $controller && $this->uri->segment(2) == $method){
			return "selected";
		}else{
			return "";
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>DeMartini RV Sales - New and Used Motorhome Dealer | <? echo $template['title'];?></title>
		<meta name="google-site-verification" content="qfldR6Yf4yTbtwuhKQPb3-5CxKqgbuQTQzlF3pKQGs0" />
		<meta name="keywords" content="recreation, recreational, vehicle, RV, r.v., super c motorhome, newmar, luxury rv, dynamax, forest river, thor, jayco, motorhome, diesel pusher, class A, class C, camping, travel.   ">
		<meta name="description" content="DeMartini RV Sales, RV Dealer in California, New and Used motorhomes, Huge Inventory and Great Prices on the best brands! Newmar, Dynamax, Forest River, Thor, Jayco RV.">
		<meta name="google-site-verification" content="S4sByN8oftpRp1xO5S_6YQrfrLc0gsGrHUQY3R-qTnE" />
        <meta name="GENERATOR" content="Microsoft FrontPage 6.0">
		<meta name="ProgId" content="FrontPage.Editor.Document">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv='expires' content='1200' />
		<meta http-equiv='content-language' content='<?php echo $this->config->item('prefix_language') ?>' />
		<base href="<?php echo $this->config->item('base_url') ?>public/" />
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'> 
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.3.0/pure-min.css">
		<link rel="stylesheet" href="js/bxslider/jquery.bxslider.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/fstyles.css?v=<?php echo time();?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="css/print1.css" type="text/css" media="print">
        <link rel='shortcut icon' href="img/favicon.ico" type='image/x-icon'/ >
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-962179746"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-962179746');
</script>
<script>
  gtag('config', 'AW-962179746/_ymHCNaIi_EDEKLl5soD', {
    'phone_conversion_number': '(800) 576-1921'
  });
</script>
		<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-V6WCTF53XC"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-V6WCTF53XC'); </script>

	</head>
	<body>
		<div id="island">
			<header class="pure-g-r">
				<div class="pure-u-1-3">
					<span id="contact-box" class="yellow bold"><span class="big-font">(800)576-1921</span><br /><a class="yellow" style="text-decoration: none;" href="mailto:sales@demartini.com" title="Email Sales at DeMartini RV">sales@demartini.com</a><span>
				</div>
                <div class="pure-u-1-3">
                </div>
				<div class="pure-u-1-3">
					<div id="searches">
						<?=form_open('/vehicles/search', array('id' => 'search', 'class' => 'pure-form', 'method' => 'get'))?>
							<?=form_input(array(
								'name' => 'query',
								'id' => 'search-query',
								'value' => set_value('search_query'),
								'placeholder' => 'What RV are you looking for?',
								'class' => 'pure-u-2-3'
							))?>
							<?=form_input(array(
								'name' => 'search',
								'type' => 'submit',
								'id' => 'search-submit',
								'value' => 'SEARCH',
								'class' => 'yellow-button pure-u-1-3 pure-button pure-button-primary'
							))?>
							<div id="advanced-search" style="display: none;">
								<?=form_fieldset('Advanced Search')?>
									<span class="form-sec">
										<?=form_radio('condition', 'new', false)?>
										<?=form_label('New', 'condition')?>
										<?=form_radio('condition', 'used', false)?>
										<?=form_label('Used', 'condition')?>
										<?=form_radio('condition', 'both', true)?>
										<?=form_label('Both', 'condition')?>
									</span>
									<span class="form-sec">
										<?=form_label('Category', 'category')?>
										<?=form_dropdown('category', array('' => 'All') + $this->categories)?>
									</span>
									<span class="form-sec">
    									<?=form_label('Year', 'year')?>
										<?=form_dropdown('from_year', array('' => 'Any') + $this->years)?>
										&nbsp;to&nbsp;
										<?=form_dropdown('to_year', array('' => 'Any') + $this->years)?>
										<?=form_label('Make', 'make')?>
										<?=form_dropdown('make', array('' => 'All') + $this->makes)?>
									</span>
									<span class="form-sec">
    									<?=form_label('Price', 'price')?>
										<?=form_dropdown('price', array(
											'>0' => 'Any Price',
                                            '0-50000' => 'Under $50,000',
                                            '50001-100000' => '$50,001-$100,000',
                                            '100001-150000' => '$100,001-$150,000',
                                            '150001-200000' => '$150,001-$200,000',
                                            '200001-250000' => '$200,001-$250,000',
                                            '250000' => '$250,001 and Higher'
										))?>
										<?=form_label('Length', 'length')?>
										<?=form_dropdown('length', array(
											'>0' => '',
                                            '<31' => "30' and under",
											'31-33' => "31' to 33'",
                                            '34-36' => "34' to 36'",
											'37-38' => "37' to 38'",
											'39-40' => "39' to 40''",
											'>40' => "Over 40'"
										))?>
									</span>
									<span class="form-sec">
										<?=form_input(array(
											'name' => 'advanced-search',
											'type' => 'submit',
											'id' => 'advanced-search-submit',
											'value' => 'SEARCH',
											'class' => 'yellow-button pure-u-1 pure-button pure-button-primary'
										))?>
									</span>
								<?=form_fieldset_close()?>
							</div>
							<div class="arrow-down">
							</div>
						<?=form_close()?>
					</div>
				</div>
			</header>
			<div class="island-shadow">
				<?php if($this->show_banner): ?>
				<div class="pure-g-r" id="banner">
					<div class="pure-u-1">
						<h1 id="site-title">
						    <a href="/" title="DeMartini RV Home Page">DeMartini RV Sales</a></h1>
						    <ul class="banner-links">
						        <li><a href="<?=base_url()?>testimonials" title="Testimonials">Testimonials</a></li>
    						    <li><a href="<?=base_url()?>forms/sell_your_rv" title="Sell Your RV">Sell Your RV</a></li>
    						    <li><a href="<?=base_url()?>forms/rvwanted" title="RV Wanted Form">RV Wanted Form</a></li>
						    </ul>
						<img src="img/homephoto.jpg" alt="DeMartini RV Banner"/>
					</div>
				</div>
				<?php else: ?>
				<div class="pure-g-r" id="cbanner">
					<div class="pure-u-1">
						<h1 id="site-title">
						    <a href="/" title="DeMartini RV Home Page">DeMartini RV Sales</a></h1>
						    <ul class="banner-links">
						        <li><a href="<?=base_url()?>testimonials" title="Testimonials">Testimonials</a></li>
    						    <li><a href="<?=base_url()?>forms/sell_your_rv" title="Sell Your RV">Sell Your RV</a></li>
    						    <li><a href="<?=base_url()?>forms/rvwanted" title="RV Wanted Form">RV Wanted Form</a></li>
						    </ul>
						
						<img src="img/homephoto.jpg" alt="DeMartini RV Banner"/>
					</div>
				</div>
				<?php endif; ?>
				<?php $this->load->view("partials/_nav");?>
				<section id="content">
					<?php $this->load->view("partials/_flashdata");?>
					<?php echo $template['body']; ?>
				</section>
                <?php $this->load->view('partials/_specials');?>
				<footer>
					<div class="inline footer-imgs">
						<a href="/"><img src="img/demartinilogo.png" alt="DeMartini RV Logo" style="margin-left: 10px; margin-top: -5px;"/></a>
						<img src="img/ThorLogo.png" alt="Thor RV's" style="margin: 20px 15px;" />
						<img src="img/forestriverlogo.png" alt="Forest River Logo" style="margin: 7px 15px;" />
						<img src="img/surveyorlogo.png" alt="Surveyor RV Logo" style="margin: 15px;" />
						<img src="img/monacologo.png" alt="Manaco RV Logo" style="margin: 5px 15px;" />
					</div>
					<div class="inline footer-links">
						<ul>
							<li><a href="<?=base_url()?>categories/type/new" title="Used RVs">Used RV's</a></li>
							<li><a href="<?=base_url()?>categories/type/used" title="Used Diesels">Used Diesels</a></li>
							<li><a href="<?=base_url()?>categories/web_specials" title="Web Specials">Web Specials</a></li>
						</ul>
					</div>
					<div class="pure-g-r" id="footer-lists">
					    <div class="pure-u-1-5">
                            <ul>
                                <li><h5>Class A Diesels</h5></li>
								<li><a href="<?=base_url()?>categories/model_new/newmar-king-aire" title="Newmar King Aire">Newmar King Aire</a></li>
                               <li><a href="<?=base_url()?>categories/model_new/newmar-london-aire" title="Newmar London Aire">Newmar London Aire</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-mountain-aire" title="Newmar Mountain Aire">Newmar Mountain Aire</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/newmar-new-aire" title="Newmar New Aire">Newmar New Aire</a></li>
                      <li><a href="<?=base_url()?>categories/model_new/newmar-dutch-star" title="Newmar Dutch Star">Newmar Dutch Star</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-ventana" title="Newmar Ventana">Newmar Ventana</a></li>
					 <li><a href="<?=base_url()?>categories/model_new/newmar-super-star" title="Newmar Super Star">Newmar Super Star</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/forest-river-berkshire" title="Forest River Berkshire">Forest River Berkshire</a></li>
                       <li><a href="<?=base_url()?>categories/model_new/thor-tuscany" title="Thor Tuscany">Thor Tuscany</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/thor-venetian" title="Thor Venetian">Thor Venetian</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/thor-aria" title="Thor Aria">Thor Aria</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/monaco-diplomat" title="Monaco Diplomat">Monaco Diplomat</a></li>
								<li><a href="<?=base_url()?>categories/model_new/newmar-kountry-star" title="Newmar Kountry Star">Newmar Kountry Star</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/coachmen-sportscoach" title="Coachmen Sportscoach">Coachmen Sportscoach</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/thor-palazzo" title="Thor Palazzo">Thor Palazzo</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-dynaquest" title="Dynamax Dynaquest">Dynamax Dynaquest</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-DX3" title="Dynamax DX3">Dynamax DX3 Super C</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-europa" title="Dynamax Europa">Dynamax Europa</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-force" title="Dynamax Force">Dynamax Force</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/dynamax-isata-5" title="Dynamax Isata 5">Dynamax Isata 5</a></li>
                          <li><a href="<?=base_url()?>categories/model_new/dynamax-isata-3" title="Dynamax Isata 3">Dynamax Isata 3</a></li>
                            <li><a href="<?=base_url()?>categories/model_new/jayco-seneca" title="Jayco Seneca">Jayco Seneca</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/forest-river-forester" title="Forest River Forester MBS">FR Forester MBS</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/roadtrek" title="Roadtrek">Roadtrek</a></li>
                    	  <li><a href="<?=base_url()?>categories/model_new/thor-omni" title="Thor Omni">Thor Omni Super C</a></li>
                            </ul>
					    </div>
                        <div class="pure-u-1-5">
                        <ul>
                            <li><h5>Class A Gas</h5></li>
                            <li><a href="<?=base_url()?>categories/model_new/forest-river-georgetown" title="Forest River Georgetown">Forest River Georgetown</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/forest-river-fr3" title="Forest River FR3">Forest River FR3</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-canyon-star" title="Newmar Canyon Star">Newmar Canyon Star</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/newmar-bay-star" title="Newmar Bay Star">Newmar Bay Star</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/newmar-bay-star-sport" title="Newmar Bay Star Sport">Newmar Bay Star Sport</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/thor-outlaw" title="Thor Outlaw">Thor Outlaw</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/thor-windsport" title="Thor Windsport">Thor Windsport</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/thor-vegas" title="Thor Vegas">Thor Vegas</a></li>
                        </ul>
                        </div>
                        <div class="pure-u-1-5">
                        <ul>
                            <li><h5>Class B & C</h5></li>
                            <li><a href="<?=base_url()?>categories/model_new/newmar-super-star" title="Newmar Super Star">Newmar Super Star</a></li>
                       <li><a href="<?=base_url()?>categories/model_new/dynamax-dynaquest" title="Dynamax Dynaquest">Dynamax Dynaquest</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-DX3" title="Dynamax DX3">Dynamax DX3 Super C</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-europa" title="Dynamax Europa">Dynamax Europa</a></li>
					   <li><a href="<?=base_url()?>categories/model_new/dynamax-force" title="Dynamax Force">Dynamax Force</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/dynamax-isata" title="Dynamax Isata">Dynamax Isata</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/forest-river-forester" title="Forest River Forester MBS">FR Forester MBS</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/jayco-greyhawk" title="Jayco Greyhawk">Jayco Greyhawk</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/jayco-melbourne" title="Jayco Melbourne">Jayco Melbourne</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/jayco-redhawk" title="Jayco Redhawk">Jayco Redhawk</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/jayco-seneca" title="Jayco Seneca">Jayco Seneca Super C</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/roadtrek" title="Roadtrek">Roadtrek</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/coachmen-concord" title="Coachmen Concord">Coachmen Concord</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/forest-river-forester" title="Forest River Forester">Forest River Forester</a></li>
                   		<li><a href="<?=base_url()?>categories/model_new/thor-chateau" title="Thor Chateau">Thor Chateau</a></li>
                   		<li><a href="<?=base_url()?>categories/model_new/thor-omni" title="Thor Omni">Thor Omni Super C</a></li>
                        </ul>
                        </div>
                        <div class="pure-u-1-5">
                        <ul>
                            <li><h5>Fifth Wheels/Trailers</h5></li>
                            <li><a href="<?=base_url()?>categories/model_new/salem" title="Salem Hemisphere">Salem Hemisphere</a></li>
                        <li><a href="<?=base_url()?>categories/model_new/forest-river-surveyor" title="Forest River Surveyor">Forest River Surveyor</a></li>
                    	<li><a href="<?=base_url()?>categories/model_new/Forest-River-r_pod" title="Forest River R-Pod">Forest River R-Pod</a></li>
                        </ul>
                        </div>
                        <div class="pure-u-1-5">
                            <ul>
                                <li><h5>Park Homes</h5></li>
                                <li><a href="<?=base_url()?>categories/model/palm-harbor" title="Palm Harbor">Palm Harbor</a></li>
                                <li><a href="<?=base_url()?>categories/model/skyline" title="Skyline">Skyline</a></li>
                            </ul>
					    </div>
					
                    <div class="pure-u-1-2">
                    <a href="https://www.youtube.com/user/demartinirv" target="_blank"><img src="../../../public/img/youtube.png" width="50" height="50" style="margin-left: 35px; margin-top: 10px; margin-bottom: 15px; margin-right: 10px;"  alt="DeMartini RV Youtube"></a>
                    <a href="https://www.facebook.com/DeMartiniRV" target="_blank"><img src="../../../public/img/facebook.png" width="50" height="50" style="margin-top: 10px; margin-bottom: 15px; margin-right: 10px;"  alt="DeMartini RV Facebook"></a>
                    <a href="https://plus.google.com/+demartinirvsales/about" target="_blank"><img src="../../../public/img/googleplus.png" width="50" height="50" style="margin-top: 10px; margin-bottom: 15px; margin-right: 10px;"  alt="DeMartini RV Google Plus"></a>
                    <a href="https://twitter.com/demartinirv" target="_blank"><img src="../../../public/img/twitter.png" width="50" height="50" style="margin-top: 10px; margin-bottom: 15px; margin-right: 10px;"  alt="DeMartini RV Twitter"></a>
                    </div>
                    <div class="pure-u-1-2">
                    <p>© Copyright 2022 DeMartini RV Sales</p>
                    </div>
                    </div>
				</footer>
			</div>
		</div>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
		<script src="js/jquery.hoverIntent.js" type="text/javascript"></script>
		<script src="js/bxslider/jquery.bxslider.min.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
		<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
          ga('create', 'UA-49570410-1', 'demartinirv.com');
          ga('send', 'pageview');
        </script>
        <script> 
var $buoop = {i:6, i:7, i:8}; 
function $buo_f(){ 
 var e = document.createElement("script"); 
 e.src = "//browser-update.org/update.js"; 
 document.body.appendChild(e);
};
try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
catch(e){window.attachEvent("onload", $buo_f)}
</script>
				<script>
  document.addEventListener('click', function(e) {
    if (e.target.matches('a[href="mailto:sales@demartini.com"] , [href="mailto:sales@demartini.com"] *')) {
      gtag('event', 'conversion', {
        'send_to': 'AW-962179746/s1oPCIi6o4UYEKLl5soD'
      });
    }
    if (e.target.matches('a[href*="mailto:sales@demartini.com?subject=Request"] , [href*="mailto:sales@demartini.com?subject=Request"] *')) {
      gtag('event', 'conversion', {
        'send_to': 'AW-962179746/TfjBCIu6o4UYEKLl5soD'
      });
    }
  })
  window.addEventListener('load', function() {
    if (document.location.pathname == '/forms/form_success') {
      gtag('event', 'conversion', {
        'send_to': 'AW-962179746/Kv1nCIW6o4UYEKLl5soD'
      });
    }
  });

</script>
	</body>
</html>
