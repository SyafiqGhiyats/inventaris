<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> Error </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/smartadmin-rtl.min.css"> 

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?=base_url()?>assets/img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="<?=base_url()?>assets/http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?=base_url()?>assets/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>assets/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>assets/img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?=base_url()?>assets/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?=base_url()?>assets/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?=base_url()?>assets/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

		<style>
			.error-text-2 {
				text-align: center;
				font-size: 700%;
				font-weight: bold;
				font-weight: 100;
				color: #333;
				line-height: 1;
				letter-spacing: -.05em;
				background-image: -webkit-linear-gradient(92deg,#333,#ed1c24);
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
			}
			.particle {
				position: absolute;
				top: 50%;
				left: 50%;
				width: 1rem;
				height: 1rem;
				border-radius: 100%;
				background-color: #ed1c24;
				background-image: -webkit-linear-gradient(rgba(0,0,0,0),rgba(0,0,0,.3) 75%,rgba(0,0,0,0));
				box-shadow: inset 0 0 1px 1px rgba(0,0,0,.25);
			}
			.particle--a {
				-webkit-animation: particle-a 1.4s infinite linear;
				-moz-animation: particle-a 1.4s infinite linear;
				-o-animation: particle-a 1.4s infinite linear;
				animation: particle-a 1.4s infinite linear;
			}
			.particle--b {
				-webkit-animation: particle-b 1.3s infinite linear;
				-moz-animation: particle-b 1.3s infinite linear;
				-o-animation: particle-b 1.3s infinite linear;
				animation: particle-b 1.3s infinite linear;
				background-color: #00A300;
			}
			.particle--c {
				-webkit-animation: particle-c 1.5s infinite linear;
				-moz-animation: particle-c 1.5s infinite linear;
				-o-animation: particle-c 1.5s infinite linear;
				animation: particle-c 1.5s infinite linear;
				background-color: #57889C;
			}@-webkit-keyframes particle-a {
			0% {
			-webkit-transform: translate3D(-3rem,-3rem,0);
			z-index: 1;
			-webkit-animation-timing-function: ease-in-out;
			} 25% {
			width: 1.5rem;
			height: 1.5rem;
			}
		
			50% {
			-webkit-transform: translate3D(4rem, 3rem, 0);
			opacity: 1;
			z-index: 1;
			-webkit-animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .75rem;
			height: .75rem;
			opacity: .5;
			}
		
			100% {
			-webkit-transform: translate3D(-3rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@-moz-keyframes particle-a {
			0% {
			-moz-transform: translate3D(-3rem,-3rem,0);
			z-index: 1;
			-moz-animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.5rem;
			height: 1.5rem;
			}
		
			50% {
			-moz-transform: translate3D(4rem, 3rem, 0);
			opacity: 1;
			z-index: 1;
			-moz-animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .75rem;
			height: .75rem;
			opacity: .5;
			}
		
			100% {
			-moz-transform: translate3D(-3rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@-o-keyframes particle-a {
			0% {
			-o-transform: translate3D(-3rem,-3rem,0);
			z-index: 1;
			-o-animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.5rem;
			height: 1.5rem;
			}
		
			50% {
			-o-transform: translate3D(4rem, 3rem, 0);
			opacity: 1;
			z-index: 1;
			-o-animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .75rem;
			height: .75rem;
			opacity: .5;
			}
		
			100% {
			-o-transform: translate3D(-3rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@keyframes particle-a {
			0% {
			transform: translate3D(-3rem,-3rem,0);
			z-index: 1;
			animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.5rem;
			height: 1.5rem;
			}
		
			50% {
			transform: translate3D(4rem, 3rem, 0);
			opacity: 1;
			z-index: 1;
			animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .75rem;
			height: .75rem;
			opacity: .5;
			}
		
			100% {
			transform: translate3D(-3rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@-webkit-keyframes particle-b {
			0% {
			-webkit-transform: translate3D(3rem,-3rem,0);
			z-index: 1;
			-webkit-animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.5rem;
			height: 1.5rem;
			}
		
			50% {
			-webkit-transform: translate3D(-3rem, 3.5rem, 0);
			opacity: 1;
			z-index: 1;
			-webkit-animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .5rem;
			height: .5rem;
			opacity: .5;
			}
		
			100% {
			-webkit-transform: translate3D(3rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@-moz-keyframes particle-b {
			0% {
			-moz-transform: translate3D(3rem,-3rem,0);
			z-index: 1;
			-moz-animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.5rem;
			height: 1.5rem;
			}
		
			50% {
			-moz-transform: translate3D(-3rem, 3.5rem, 0);
			opacity: 1;
			z-index: 1;
			-moz-animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .5rem;
			height: .5rem;
			opacity: .5;
			}
		
			100% {
			-moz-transform: translate3D(3rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@-o-keyframes particle-b {
			0% {
			-o-transform: translate3D(3rem,-3rem,0);
			z-index: 1;
			-o-animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.5rem;
			height: 1.5rem;
			}
		
			50% {
			-o-transform: translate3D(-3rem, 3.5rem, 0);
			opacity: 1;
			z-index: 1;
			-o-animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .5rem;
			height: .5rem;
			opacity: .5;
			}
		
			100% {
			-o-transform: translate3D(3rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@keyframes particle-b {
			0% {
			transform: translate3D(3rem,-3rem,0);
			z-index: 1;
			animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.5rem;
			height: 1.5rem;
			}
		
			50% {
			transform: translate3D(-3rem, 3.5rem, 0);
			opacity: 1;
			z-index: 1;
			animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .5rem;
			height: .5rem;
			opacity: .5;
			}
		
			100% {
			transform: translate3D(3rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@-webkit-keyframes particle-c {
			0% {
			-webkit-transform: translate3D(-1rem,-3rem,0);
			z-index: 1;
			-webkit-animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.3rem;
			height: 1.3rem;
			}
		
			50% {
			-webkit-transform: translate3D(2rem, 2.5rem, 0);
			opacity: 1;
			z-index: 1;
			-webkit-animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .5rem;
			height: .5rem;
			opacity: .5;
			}
		
			100% {
			-webkit-transform: translate3D(-1rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@-moz-keyframes particle-c {
			0% {
			-moz-transform: translate3D(-1rem,-3rem,0);
			z-index: 1;
			-moz-animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.3rem;
			height: 1.3rem;
			}
		
			50% {
			-moz-transform: translate3D(2rem, 2.5rem, 0);
			opacity: 1;
			z-index: 1;
			-moz-animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .5rem;
			height: .5rem;
			opacity: .5;
			}
		
			100% {
			-moz-transform: translate3D(-1rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@-o-keyframes particle-c {
			0% {
			-o-transform: translate3D(-1rem,-3rem,0);
			z-index: 1;
			-o-animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.3rem;
			height: 1.3rem;
			}
		
			50% {
			-o-transform: translate3D(2rem, 2.5rem, 0);
			opacity: 1;
			z-index: 1;
			-o-animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .5rem;
			height: .5rem;
			opacity: .5;
			}
		
			100% {
			-o-transform: translate3D(-1rem,-3rem,0);
			z-index: -1;
			}
			}
		
			@keyframes particle-c {
			0% {
			transform: translate3D(-1rem,-3rem,0);
			z-index: 1;
			animation-timing-function: ease-in-out;
			}
		
			25% {
			width: 1.3rem;
			height: 1.3rem;
			}
		
			50% {
			transform: translate3D(2rem, 2.5rem, 0);
			opacity: 1;
			z-index: 1;
			animation-timing-function: ease-in-out;
			}
		
			55% {
			z-index: -1;
			}
		
			75% {
			width: .5rem;
			height: .5rem;
			opacity: .5;
			}
		
			100% {
			transform: translate3D(-1rem,-3rem,0);
			z-index: -1;
			}
			}
		</style>

		<!--[if IE 9]>
		<style>
		.error-text {
			color: #333 !important;
		}
		.particle {
			display:none;
		}
		</style>
		<![endif]-->

	</head>
	
	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="">

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="<?=base_url()?>assets/img/logo.png" alt="SmartAdmin"> </span>
				<!-- END LOGO PLACEHOLDER -->

				<!-- Note: The activity badge color changes when clicked and resets the number to 0
				Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
				<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 21 </b> </span>

				<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
				<div class="ajax-dropdown">

					<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
					<div class="btn-group btn-group-justified" data-toggle="buttons">
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/mail.html">
							Msgs (14) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/notifications.html">
							notify (3) </label>
						<label class="btn btn-default">
							<input type="radio" name="activity" id="ajax/notify/tasks.html">
							Tasks (4) </label>
					</div>

					<!-- notification content -->
					<div class="ajax-notifications custom-scroll">

						<div class="alert alert-transparent">
							<h4>Click a button to show messages here</h4>
							This blank page message helps protect your privacy, or you can show the first message here automatically.
						</div>

						<i class="fa fa-lock fa-4x fa-border"></i>

					</div>
					<!-- end notification content -->

					<!-- footer: refresh area -->
					<span> Last updated on: 12/12/2013 9:43AM
						<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
							<i class="fa fa-refresh"></i>
						</button> </span>
					<!-- end footer -->

				</div>
				<!-- END AJAX-DROPDOWN -->
			</div>

			<!-- projects dropdown -->
			<div class="project-context hidden-xs">

				<span class="label">Projects:</span>
				<span class="project-selector dropdown-toggle" data-toggle="dropdown">Recent projects <i class="fa fa-angle-down"></i></span>

				<!-- Suggestion: populate this list with fetch and push technique -->
				<ul class="dropdown-menu">
					<li>
						<a href="<?=base_url()?>assets/javascript:void(0);">Online e-merchant management system - attaching integration with the iOS</a>
					</li>
					<li>
						<a href="<?=base_url()?>assets/javascript:void(0);">Notes on pipeline upgradee</a>
					</li>
					<li>
						<a href="<?=base_url()?>assets/javascript:void(0);">Assesment Report for merchant account</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="<?=base_url()?>assets/javascript:void(0);"><i class="fa fa-power-off"></i> Clear</a>
					</li>
				</ul>
				<!-- end dropdown-menu-->

			</div>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">
				
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="<?=base_url()?>assets/javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="<?=base_url()?>assets/#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="<?=base_url()?>assets/img/avatars/sunny.png" alt="John Doe" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?=base_url()?>assets/profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?=base_url()?>assets/login.html" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?=base_url()?>assets/login.html" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="<?=base_url()?>assets/javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->

				<!-- input: search field -->
				<form action="search.html" class="header-search pull-right">
					<input id="search-fld"  type="text" name="param" placeholder="Find reports and more" data-autocomplete='[
					"ActionScript",
					"AppleScript",
					"Asp",
					"BASIC",
					"C",
					"C++",
					"Clojure",
					"COBOL",
					"ColdFusion",
					"Erlang",
					"Fortran",
					"Groovy",
					"Haskell",
					"Java",
					"JavaScript",
					"Lisp",
					"Perl",
					"PHP",
					"Python",
					"Ruby",
					"Scala",
					"Scheme"]'>
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
					<a href="<?=base_url()?>assets/javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="<?=base_url()?>assets/javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->
				
				<!-- #Voice Command: Start Speech -->
				<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
					<div> 
						<a href="<?=base_url()?>assets/javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
						<div class="popover bottom"><div class="arrow"></div>
							<div class="popover-content">
								<h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
								<h4 class="vc-title-error text-center">
									<i class="fa fa-microphone-slash"></i> Voice command failed
									<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
									<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
								</h4>
								<a href="<?=base_url()?>assets/javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
								<a href="<?=base_url()?>assets/javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
							</div>
						</div>
					</div>
				</div>
				<!-- end voice command -->
				
				<!-- multiple lang dropdown : find all flags in the flags page -->
				<ul class="header-dropdown-list hidden-xs">
					<li>
						<a href="<?=base_url()?>assets/#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-us" alt="United States"> <span> English (US) </span> <i class="fa fa-angle-down"></i> </a>
						<ul class="dropdown-menu pull-right">
							<li class="active">
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-us" alt="United States"> English (US)</a>
							</li>
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-fr" alt="France"> Français</a>
							</li>
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-es" alt="Spanish"> Español</a>
							</li>
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-de" alt="German"> Deutsch</a>
							</li>
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-jp" alt="Japan"> 日本語</a>
							</li>
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-cn" alt="China"> 中文</a>
							</li>	
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-it" alt="Italy"> Italiano</a>
							</li>	
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-pt" alt="Portugal"> Portugal</a>
							</li>
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-ru" alt="Russia"> Русский язык</a>
							</li>
							<li>
								<a href="<?=base_url()?>assets/javascript:void(0);"><img src="<?=base_url()?>assets/img/blank.gif" class="flag flag-kr" alt="Korea"> 한국어</a>
							</li>						
							
						</ul>
					</li>
				</ul>
				<!-- end multiple lang -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="<?=base_url()?>assets/javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?=base_url()?>assets/img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							john.doe 
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->
	

			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Error 404</li>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<!-- row -->
				<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
						<div class="row">
							<div class="col-sm-12">
								<div class="text-center error-box">
									<h1 class="error-text-2 bounceInDown animated"> Halaman tidak ditemukan <span class="particle particle--c"></span><span class="particle particle--a"></span><span class="particle particle--b"></span></h1>
									<h2 class="font-xl"><strong><i class="fa fa-fw fa-warning fa-lg text-warning"></i> Page <u>Not</u> Found</strong></h2>
									<br />
									<p class="lead">
										The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from
									</p>
									<p class="font-md">
										<b>... That didn't work on you? Dang. May we suggest a search, then?</b>
									</p>
									<br>
									<div class="error-search well well-lg padding-10">
										<div class="input-group">
											<input class="form-control input-lg" type="text" placeholder="let's try this again" id="search-error">
											<span class="input-group-addon"><i class="fa fa-fw fa-lg fa-search"></i></span>
										</div>
									</div>
				
									<div class="row">
				
										<div class="col-sm-12">
											<ul class="list-inline">
												<li>
													&nbsp;<a href="<?=base_url()?>assets/javascript:void(0);">Dashbaord</a>&nbsp;
												</li>
												<li>
													.
												</li>
												<li>
													&nbsp;<a href="<?=base_url()?>assets/javascript:void(0);">Inbox (14)</a>&nbsp;
												</li>
												<li>
													.
												</li>
												<li>
													&nbsp;<a href="<?=base_url()?>assets/javascript:void(0);">Calendar</a>&nbsp;
												</li>
												<li>
													.
												</li>
												<li>
													&nbsp;<a href="<?=base_url()?>assets/javascript:void(0);">Gallery</a>&nbsp;
												</li>
												<li>
													.
												</li>
												<li>
													&nbsp;<a href="<?=base_url()?>assets/javascript:void(0);">My Profile</a>&nbsp;
												</li>
											</ul>
										</div>
				
									</div>
				
								</div>
				
							</div>
				
						</div>
				
					</div>

				<!-- end row -->

			</div>
			
			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">SmartAdmin 1.8.2 <span class="hidden-xs"> - Web Application Framework</span> © 2014-2015</span>
				</div>

				<div class="col-xs-6 col-sm-6 text-right hidden-xs">
					<div class="txt-color-white inline-block">
						<i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong>52 mins ago &nbsp;</strong> </i>
						<div class="btn-group dropup">
							<button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
								<i class="fa fa-link"></i> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right text-left">
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Download Progress</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 50%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Server Load</p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-success" style="width: 20%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span></p>
										<div class="progress progress-micro no-margin">
											<div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="padding-5">
										<button class="btn btn-block btn-default">refresh</button>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>
					<a href="<?=base_url()?>assets/inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="<?=base_url()?>assets/calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
				</li>
				<li>
					<a href="<?=base_url()?>assets/gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="<?=base_url()?>assets/invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="<?=base_url()?>assets/gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="<?=base_url()?>assets/profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?=base_url()?>assets/js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="<?=base_url()?>assets/http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?=base_url()?>assets/js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="<?=base_url()?>assets/http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?=base_url()?>assets/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?=base_url()?>assets/js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?=base_url()?>assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?=base_url()?>assets/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?=base_url()?>assets/js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?=base_url()?>assets/js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?=base_url()?>assets/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?=base_url()?>assets/js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?=base_url()?>assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?=base_url()?>assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?=base_url()?>assets/js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?=base_url()?>assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?=base_url()?>assets/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?=base_url()?>assets/js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		<!-- Demo purpose only -->
		<script src="<?=base_url()?>assets/js/demo.min.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?=base_url()?>assets/js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?=base_url()?>assets/js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?=base_url()?>assets/js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="<?=base_url()?>assets/js/smart-chat-ui/smart.chat.manager.min.js"></script>

		<!-- PAGE RELATED PLUGIN(S) 
		<script src="<?=base_url()?>assets/..."></script>-->

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
				_gaq.push(['_trackPageview']);
			
			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();

		</script>

	</body>

</html>