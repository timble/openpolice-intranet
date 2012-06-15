<form action="" method="get" name="search">
	<div class="input-append">
		<input name="search" type="text" placeholder="<?= @text('Search ...') ?>" value="<?= $state->search ? @escape($state->search) : null ?>"><input class="btn btn-primary" type="submit" value="Search"><a class="btn" href="<?= @route('&search=') ?>">Reset</a>
	</div>
</form>