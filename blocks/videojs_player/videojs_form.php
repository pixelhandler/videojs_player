<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));
?>
<style type="text/css" media="screen">
	.ccm-block-field-group th {
		background-color: #444;
		color: #fff;
	}
	.ccm-block-field-group th,
	.ccm-block-field-group td, 
	.ccm-block-field-group td p {
		margin: 0px;
		padding: 5px;
	}
</style>
<h1>
	<span><?php echo t('HTML5 Video Block') ?></span>
</h1>
<p>
	For info on HTML5 video see : <a href="http://diveintohtml5.org/video.html" target="_blank">http://diveintohtml5.org/video.html</a> which has a tutorial for video conversion for web using the (free) Miro Video Converter. As HTML5 video implementations vary per web browser, to use this block you will need to prepare (4) files: .mp4, .ogv, .webm and have a preview or "poster" image. Also, if needed, Flowplayer (free) plays your .mp4 as flash media content.
</p>
<div class="ccm-block-field-group">
	<h2><?php  echo t('Video Source Files')?></h2>
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<th><?php  echo t('Preview Image')?></th>
			<th><?php echo t('MPEG 4 (.mp4)') ?></th>
		</tr>
		<tr>
			<td>
				<?php  echo $al->file('ccm-b-poster', 'fPstrID', t('Choose Poster Image'), $fPstrID); ?>
				<p><?php  echo t('Choose a file with a .png or .jpg extension; e.g. still frame from video.');?></p>
			</td>
			<td>
				<?php  echo $al->file('ccm-b-mp4', 'fMp4ID', t('Choose .mp4 Video'), $fMp4ID); ?>
				<p><?php  echo t('Choose a file with a .mp4 extension as common HTML5 video format; also used for flash fallback.');?></p>
			</td>
		</tr>
		<tr>
			<th><?php echo t('Ogg video (.ogv)') ?></th>
			<th><?php echo t('WebM video (.webm)') ?></th>
		</tr>
		<tr>
			<td>
				<?php  echo $al->file('ccm-b-ogv', 'fOgvID', t('Choose .ogv Video'), $fOgvID); ?>
				<p><?php  echo t('Choose a file with a .ogv extension; "Theora" file, HTML5 video format e.g. for FireFox');?></p>
			</td>
			<td>
				<?php  echo $al->file('ccm-b-webm', 'fWebmID', t('Choose .webm Video'), $fWebmID); ?>
				<p><?php  echo t('Choose a file with a .webm extension; HTML5 video format e.g. for MSIE 9+');?></p>
			</td>
		</tr>
	</table>
</div>
<div class="ccm-block-field-group">
	<h2><?php  echo t('Maximum Dimensions')?></h2>
	<table border="0" cellspacing="0" cellpadding="0">
		<tr><td colspan="4">Input the maximum width and height in pixels:</td></tr>
		<tr>
			<td><?php  echo t('Width')?></td>
			<td><?php  echo  $form->text('width', intval($width), array('style' => 'width: 40px')); ?></td>
			<td><?php  echo t('Height')?></td>
			<td><?php  echo  $form->text('height', intval($height), array('style' => 'width: 40px')); ?></td>
		</tr>
	</table>
</div>

<br class="clear" />