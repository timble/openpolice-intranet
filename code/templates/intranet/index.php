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
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="">
				<a class="brand" href="index.php">Intranet Arro Veurne</a>
				<jdoc:include type="modules" name="topmenu" style="notitle" />
				<jdoc:include type="modules" name="user4" style="search" />
				<jdoc:include type="modules" name="access" style="xhtml" />
			</div>
		</div>
	</div>

	<div id="frame" class="">
		<div class="row">
			<div class="sidebar span1">
				<jdoc:include type="modules" name="left" style="xhtmls" />
				test
			</div>
			<div class="content span11">
				<div class="module-scopebar">
					<jdoc:include type="modules" name="scopebar" style="xhtml" />
				</div>
				
				<div class="row">
					<div class="span8">
						<jdoc:include type="component" />
					</div>
					<div class="inspector span3">
						<jdoc:include type="modules" name="right" style="xhtmls" />
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<jdoc:include type="modules" name="debug" />
</body>
</html>