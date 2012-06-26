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
				<jdoc:include type="modules" name="apps" style="raw" />
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