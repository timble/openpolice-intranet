<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$session = JFactory::getUser();
$user    = JUser::getInstance($session->id);

if($session->gid > 18) 
{
    $gid      = 18;
    $aid      = 1;
    $usertype = 'Registered';
} 
else 
{
    $gid      = $user->gid;
    $usertype = $user->usertype;
    $aid      = $gid > 21 ? 2 : 1;
}
?>

<?php if($user->gid > 18) : ?>
<div class="secondary-nav mod_access_select">
	<form action="<?php echo JURI::current(); ?>" method="post">	
		Switch to : <input type="submit" class="button" value="<?php echo $usertype; ?>">
		<input type="hidden" name="access_gid" value="<?php echo $gid; ?>">
		<input type="hidden" name="access_aid" value="<?php echo $aid; ?>">
		<input type="hidden" name="access_usertype" value="<?php echo $usertype; ?>">
	</form>
</div>
<?php endif; ?>