<?php  
defined('C5_EXECUTE') or die("Access Denied.");
$p = Page::getCurrentPage();
$pstr = $controller->getFilePosterObject()->getRelativePath();
?>
<?php if ( $p->isEditMode() ) { ?>
<div class="ccm-edit-mode-disabled-item" style="<?php  if ($width > 1) { ?>width: <?php  echo $width; ?>px; <?php } if ($height > 1) { ?> height:<?php  echo $height; ?>px;<?php  } ?>">
	<div style="padding:8px 0px; ?>px;">
		<?php  echo t('Video disabled in edit mode.'); // padding-top: <?php echo round($height / 2) - 10;?>
		<?php if ($pstr && $pstr != '') { ?>
		<img src="<?php echo $pstr; ?>" width="<?php  if ($width > 1) { echo $width; } ?>" height="<?php  if ($height > 1) { echo $height; } ?>" alt="<?php  echo t('Poster Image') ?>" title="<?php  echo t('No video playback capabilities.') ?>" />
		<?php } ?>
	</div>
</div>
<?php } else {
	$mp4  = $controller->getFileMp4Object()->getRelativePath();
	$ogv  = $controller->getFileOgvObject()->getRelativePath();
	$webm = $controller->getFileWebmObject()->getRelativePath();
?>
<script type="text/javascript" charset="utf-8">
    // Must come after the video.js library, loaded by controller in head
    // Add VideoJS to all video tags on the page when the DOM is ready
    VideoJS.setupAllWhenReady();
</script>
<div class="video-js-box">
	<?php // Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody ?>
	<video id="video_<?php echo $bID; ?>" class="video-js" width="<?php  if ($width > 1) { echo $width; } ?>" height="<?php  if ($height > 1) { echo $height; } ?>" controls="controls" preload="auto" poster="<?php echo $pstr; ?>">
		<source src="<?php  echo $mp4; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
		<source src="<?php  echo $ogv; ?>" type='video/ogg; codecs="theora, vorbis"'>
		<source src="<?php  echo $webm; ?>" type='video/webm; codecs="vp8, vorbis"' />
		<?php // Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. ?>
		<?php // echo t('Your Browser doesn\'t support the html5 video element.');?>
		<object id="flash_fallback_<?php echo $bID; ?>" class="vjs-flash-fallback" width="<?php  if ($width > 1) { echo $width; } ?>" height="<?php  if ($height > 1) { echo $height; } ?>" type="application/x-shockwave-flash"
			data="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf">
			<param name="movie" value="<?php  echo $this->getBlockURL() ?>/flowplayer/flowplayer-3.2.7.swf" />
			<param name="allowfullscreen" value="true" />
			<param name="flashvars" value='config={"playlist":["<?php echo $pstr; ?>", {"url": "<?php  echo $mp4; ?>","autoPlay":false,"autoBuffering":true}]}' />
			<?php // Image Fallback. Typically the same as the poster image. ?>
			<img src="<?php echo $pstr; ?>" width="<?php  if ($width > 1) { echo $width; } ?>" height="<?php  if ($height > 1) { echo $height; } ?>" alt="Poster Image" title="<?php  echo t('No video playback capabilities.') ?>" />
			<?php // Download links provided for devices that can't play video in the browser. ?>
			<p class="vjs-no-video"><strong><?php  echo t('Download Video:') ?></strong>
				<a href="<?php  echo $mp4; ?>"><?php  echo t('MP4') ?></a>,
				<a href="<?php  echo $ogv; ?>"><?php  echo t('WebM') ?></a>,
				<a href="<?php  echo $webm; ?>"><?php  echo t('Ogg') ?></a><br />
			</p>
		</object>
	</video>
</div><!--/.video-js-box -->
<?php } ?>