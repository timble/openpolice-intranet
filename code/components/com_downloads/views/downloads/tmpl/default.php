
<h1>Downloads</h1>

<? if(count($files)): ?>
	<table width="100%" cellspacing="0" class="filelist">
		<thead>
			<tr>
				<th width="60%"><?= @text('Name'); ?></th>
				<th><?= @text('Size'); ?></th>
				<th><?= @text('Last Modified'); ?></th>
			</tr>
		</thead>
		<tbody>
			<? if(isset($toplevel)): ?>
				<tr>
					<td colspan="3">
					<img src="media://com_files/images/folder-16.png" /> 
					<a href="<?= @route('folder='.$toplevel) ?>">..</a>
					</td>
				</tr>
			<? endif; ?>
		
			<? if(count($folders)): ?>
				<? foreach($folders as $folder): ?>
				<tr>
					<td colspan="3">
						<img src="media://com_files/images/folder-16.png" /> 
						<a href="<?= @route('folder='.base64_encode($cwd.'/'.$folder->name)) ?>">
							<?= $folder->name ?>
						</a>
					</td>
				</tr>
				<? endforeach; ?>
			<? endif; ?>
		
			<? foreach($files as $file): ?>
				<tr>
					<td>
						<a href="<?= @route('view=file&format=raw&path='.base64_encode($cwd.'/'.$file->name)) ?>"><?= $file->name ?></a>
					</td>
					<td align="center">
						<?= @helper('com://admin/files.template.helper.filesize.humanize', array('size' => $file->metadata['size']))?>
					</td>
					<td align="center">
						<?= @helper('date.format', array('format' => '%d/%m/%Y %H:%M:%S', 'date' => date('Y-m-d H:i:s', $file->metadata['modified_date'])))?>
					</td>
				</tr>
			<? endforeach; ?>
		</tbody>
	</table>
<? endif; ?>