<?php

class Stream
{
	public function __construct(Room $room, $selection, $language, $translation_label = null)
	{
		$this->room = $room;
		$this->selection = $selection;
		$this->language = $language;
	 	$this->translation_label = (empty($translation_label)) ? $language : $translation_label;
	}

	public function getRoom()
	{
		return $this->room;
	}

	public function getSelection()
	{
		return $this->selection;
	}

	public function getLanguage()
	{
		return $this->language;
	}

	public function getTranslationLabel()
	{
	  return $this->translation_label;
	}

	public function isTranslated()
	{
		return !empty($this->getLanguage()) &&
			$this->getLanguage() !== 'native' &&
			$this->getLanguage() !== 'stereo';
	}

	public function getVideoSize()
	{
		switch($this->getSelection())
		{
			case 'sd':
			case 'slides':
				return array(1024, 576);

			case 'hd':
				return array(1920, 1080);

			default:
				return null;
		}
	}

	public function getVideoWidth()
	{
		$sz = $this->getVideoSize();
		return $sz[0];
	}

	public function getVideoHeight()
	{
		$sz = $this->getVideoSize();
		return $sz[1];
	}

	public function getTab()
	{
		switch($this->getSelection())
		{
			case 'sd':
			case 'hd':
				return 'video';

			default:
				return $this->getSelection();
		}
	}

	public function getPlayerType()
	{
		return $this->getTab();
	}

	public function getDisplay()
	{
		$display = $this->getRoom()->getDisplay().' ';
		switch($this->getSelection())
		{
			case 'hd':
				$display .= 'FullHD Video';
				break;

			case 'sd':
				$display .= 'SD Video';
				break;

			case 'music':
				$display .= 'Radio';
				break;

			default:
				$display .= ucfirst($this->getSelection());
				break;
		}

		if($this->isTranslated())
			$display .= ' ('. $this->getTranslationLabel() .')';

		return $display;
	}

	public function getEmbedUrl()
	{
		return joinpath([
			baseurl(),
			$this->getRoom()->getConference()->getSlug(),
			'embed',
			rawurlencode($this->getRoom()->getSlug()),
			rawurlencode($this->getSelection()),
			rawurlencode($this->getLanguage()),
		]);
	}

	public function getVideoUrl($proto, $selection=null)
	{
		if (!$selection) {
			$selection = $this->getSelection();
		}

		switch($proto)
		{
			case 'webm':
				return $this->getCdnBaseUrl().'/'.rawurlencode($this->getRoom()->getStream()).'_'.rawurlencode($this->getLanguage()).'_'.rawurlencode($selection).'.webm';

			case 'hls':
				return $this->getCdnBaseUrl().'/hls/'.rawurlencode($this->getRoom()->getStream()).'_'.rawurlencode($this->getLanguage()).'_'.rawurlencode($selection).'.m3u8';
		}

		return null;
	}
	public function getVideoTech($proto)
	{
		switch($proto)
		{
			case 'webm':
				if($this->getSelection() == 'hd')
					return '1920x1080, VP8+Vorbis in WebM, 3.5 MBit/s';

				else if($this->getSelection() == 'sd')
					return '1024x576, VP8+Vorbis in WebM, 1 MBit/s';

			case 'hls':
				if($this->getSelection() == 'hd')
					return '1920x1080, h264+AAC im MPEG-TS-Container via HTTP, 3 MBit/s';

				else if($this->getSelection() == 'sd')
					return '1024x576, h264+AAC im MPEG-TS-Container via HTTP, 800 kBit/s';
		}

		return null;
	}
	public static function getVideoProtos()
	{
		return array(
			'webm' => 'WebM',
			'hls' => 'HLS',
		);
	}

	public function getSlidesUrl($proto)
	{
		return $this->getVideoUrl($proto);
	}
	public function getSlidesTech($proto)
	{
		switch($proto)
		{
			case 'webm':
				return '1024x576, VP8+Vorbis in WebM, 400 kBit/s';

			case 'hls':
				return '1024x576, h264+AAC im MPEG-TS-Container via HTTP, 400 kBit/s';
		}

		return null;
	}
	public static function getSlidesProtos()
	{
		return Stream::getVideoProtos();
	}


	public function getAudioUrl($proto)
	{
		switch($proto)
		{
			case 'mp3':
			case 'opus':
				return $this->getCdnBaseUrl().'/'.rawurlencode($this->getRoom()->getStream()).'_'.rawurlencode($this->getLanguage()).'.'.$proto;
		}

		return null;
	}
	public function getAudioTech($proto)
	{
		switch($proto)
		{
			case 'mp3':
				return 'MP3-Audio, 96 kBit/s';

			case 'opus':
				return 'Opus-Audio, 64 kBit/s';
		}

		return null;
	}
	public function getAudioProtos()
	{
		if ($this->getRoom()->hasMp3Audio()) {
			return array(
				'mp3' => 'MP3',
				'opus' => 'Opus',
			);
		}
		else {
			return array(
				'opus' => 'Opus',
			);
		}
	}

	public function getMusicUrl($proto)
	{
		switch($proto)
		{
			case 'mp3':
			case 'opus':
				return $this->getCdnBaseUrl().'/'.rawurlencode($this->getRoom()->getStream()).'.'.$proto;

			default:
				return null;
		}
	}
	public function getMusicTech($proto)
	{
		switch($proto)
		{
			case 'mp3':
				return 'MP3-Audio, 192 kBit/s';

			case 'opus':
				return 'Opus-Audio, 96 kBit/s';
		}

		return null;
	}

	private function getCdnBaseUrl() {
		return $this->getRoom()->getCdnBaseUrl();
	}

	public static function getMusicProtos()
	{
		return array(
			'mp3' => 'MP3',
			'opus' => 'Opus',
		);
	}
}
