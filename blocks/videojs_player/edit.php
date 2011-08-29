<?php   
defined('C5_EXECUTE') or die("Access Denied.");
$includeAssetLibrary = true; 
$assetLibraryPassThru = array(
	'type' => 'image'
);
$al = Loader::helper('concrete/asset_library');

$fPstrID = null;
if ($controller->getFilePosterID() > 0) { 
	$fPstrID = $controller->getFilePosterObject();
}
$fMp4ID  = null;
if ($controller->getFilePosterID() > 0) { 
	$fMp4ID = $controller->getFileMp4Object();
}
$fOgvID  = null;
if ($controller->getFilePosterID() > 0) { 
	$fOgvID = $controller->getFileOgvObject();
}
$fWebmID = null;
if ($controller->getFilePosterID() > 0) { 
	$fWebmID = $controller->getFileWebmObject();
}

$this->inc('videojs_form.php');
?>
