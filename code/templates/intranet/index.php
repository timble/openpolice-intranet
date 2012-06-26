<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD xhtmls 1.0 Transitional//EN" "http://www.w3.org/TR/xhtmls1/DTD/xhtmls1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtmls" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>	
	<jdoc:include type="head" />
	
	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/print.css" type="text/css" media="print" />
</head>
<body>
	<div id="frame">
		<div id="header" class="row">
			<div class="span3">
				<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/img/logo-en.png" alt="" border="0" style="float: left;margin: 0 40px 0 15px;">
			</div>
			<div class="span6 header-search">
				<jdoc:include type="modules" name="search" style="raw" />
			</div>
			<div class="span3 header-access">
				<jdoc:include type="modules" name="access" style="raw" />
			</div>
		</div>
		
		<div class="row">
			<div class="frame-sidebar span1">
				<div class="module clearfix mod_mainmenu ">
									
				<ul class="menu nav nav-apps nav-stacked">
					<li id="current" class=" first active item1"><a href="http://intranet.police/" class=" first active item1 top-level"><i class="nav-icon"></i><br />Home</a></li>
					<li class="item3"><a href="/index.php?option=com_calendar&amp;view=events&amp;Itemid=3" class="item3 top-level"><i class="nav-icon"></i><br />Calendar</a></li>
					<li class="item4"><a href="/index.php?option=com_news&amp;view=activities&amp;Itemid=4" class="item4 top-level"><i class="nav-icon"></i><br />Activities</a></li>
					<li class="item6"><a href="/index.php?option=com_downloads&amp;view=downloads&amp;Itemid=6" class="item6 top-level"><i class="nav-icon"></i><br />Downloads</a></li>
					<li class=" last item5"><a href="/index.php?option=com_users&amp;view=user&amp;layout=form&amp;Itemid=5" class=" last item5 top-level"><i class="nav-icon"></i><br />Profile</a></li>
					</ul>
				</div>
			</div>
			<div class="main span11">
				<jdoc:include type="component" />
			</div>
		</div>
		<div class="row">
			<div class="span11 offset1 mod_syndicate">
				<jdoc:include type="modules" name="syndicate" style="raw" />
			</div>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" />
</body>
</html>