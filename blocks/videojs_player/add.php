<?php    
defined('C5_EXECUTE') or die("Access Denied.");
$includeAssetLibrary = true; 
$assetLibraryPassThru = array(
	'type' => 'image'
);
$al = Loader::helper('concrete/asset_library');

$fPstrID = null;
$fMp4ID  = null;
$fOgvID  = null;
$fWebmID = null;

$this->inc('videojs_form.php');
?>
