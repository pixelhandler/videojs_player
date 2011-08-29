<?php  
	Loader::block('library_file');
	defined('C5_EXECUTE') or die("Access Denied.");	
	class VideojsPlayerBlockController extends BlockController {

		protected $btInterfaceWidth = 760;
		protected $btInterfaceHeight = 540;
		protected $btTable = 'videojs_player';
		protected $btCacheBlockOutput = true;
		protected $btCacheBlockOutputOnPost = true;
		protected $btCacheBlockOutputForRegisteredUsers = true;

		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Adds an HTML5 video block powered by VideoJS with Flowplayer (free) as flash fallback");
		}
		
		public function getBlockTypeName() {
			return t("HTML5 Video Player");
		}

		// poster jpg/png file
		function getFilePosterID() {
			return $this->fPstrID;
		}
		function getFilePosterObject() {
			return File::getByID($this->fPstrID);
		}

		// mp4 file
		function getFileMp4ID() {
			return $this->fMp4ID;
		}
		function getFileMp4Object() {
			return File::getByID($this->fMp4ID);
		}

		// ogg file
		function getFileOgvID() {
			return $this->fOgvID;
		}
		function getFileOgvObject() {
			return File::getByID($this->fOgvID);
		}

		// webm file
		function getFileWebmID() {
			return $this->fWebmID;
		}
		function getFileWebmObject() {
			return File::getByID($this->fWebmID);
		}

		public function save($args) {
			$args['fPstrID'] = ($args['fPstrID'] != '') ? $args['fPstrID'] : 0;
			$args['fMp4ID'] = ($args['fMp4ID'] != '') ? $args['fMp4ID'] : 0;
			$args['fOgvID'] = ($args['fOgvID'] != '') ? $args['fOgvID'] : 0;
			$args['fWebmID'] = ($args['fWebmID'] != '') ? $args['fWebmID'] : 0;
			$args['width'] = ($args['width'] === '') ? '0' : $args['width'];
			$args['height'] = ($args['height'] === '') ? '0' : $args['height'];
			parent::save($args);
		}

		public function validate($args) {
			$e = Loader::helper('validation/error');
			if ($args['fPstrID'] < 1) {
				$e->add(t('You must select "poster image" as the video preview file.'));
			}
			if ($args['fMp4ID'] < 1) {
				$e->add(t('You must select a H.264 file with a .mp4 extension.'));
			}
			if ($args['fOgvID'] < 1) {
				$e->add(t('You must select a Ogg/theora file with a .ogv extension.'));
			}
			if ($args['fWebmID'] < 1) {
				$e->add(t('You must select a vp8 file with a .webm extension.'));
			}
			return $e;
		}

		public function on_page_view() {
			$v = View::GetInstance();
			$b = $this->getBlockObject();
			$btID = $b->getBlockTypeID();
			$bt = BlockType::getByID($btID);
			$uh = Loader::helper('concrete/urls');
			$v->addHeaderItem('<script type="text/javascript" src="' . $uh->getBlockTypeAssetsURL($bt) . '/video-js/video.js"></script>', 'CONTROLLER');
			$v->addHeaderItem('<link rel="stylesheet" href="' . $uh->getBlockTypeAssetsURL($bt) . '/video-js/video-js.css" />', 'CONTROLLER');
		}
	}

?>