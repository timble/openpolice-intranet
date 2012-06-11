<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD xhtmls 1.0 Transitional//EN" "http://www.w3.org/TR/xhtmls1/DTD/xhtmls1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtmls" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>	
	<jdoc:include type="head" />
	
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/bootstrap.css" type="text/css" />
</head>
<body>

	<div id="frame">
		<div class="row">
			<div id="header" class="span11 offset1">
				<jdoc:include type="modules" name="access" style="xhtml" />
			</div>
		</div>
		
		<div class="row">
			<div class="span1">
				<jdoc:include type="modules" name="apps" style="xhtmls" />
			</div>
			<div class="main span11">
				<div class="main-scopebar">
					<jdoc:include type="modules" name="scopebar" style="xhtml" />
				</div>
				
				<div class="row-fluid">
					<div class="main-component span9">
						<jdoc:include type="component" />
					</div>
					<div class="inspector span3">
						<jdoc:include type="modules" name="right" style="xhtmls" />
						sss
					</div>
				</div>
			</div>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" />
</body>
</html>