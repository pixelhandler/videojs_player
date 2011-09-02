<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

class VideojsPlayerPackage extends Package {

	protected $pkgHandle = 'videojs_player';
	protected $appVersionRequired = '5.4';
	protected $pkgVersion = '1.0.2';
	
	public function getPackageDescription() { 
		return t("HTML5 VideoJS player with Flowplayer (free) add-on for concrete5.");
	}
	
	public function getPackageName() {
		return t("VideoJS Player");
	}
	
	public function install() {
		$pkg = parent::install();
		
		BlockType::installBlockTypeFromPackage('videojs_player', $pkg); 
	}

}
