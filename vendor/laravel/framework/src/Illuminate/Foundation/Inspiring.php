<?php namespace Illuminate\Foundation;

use Illuminate\Support\Collection;

class Inspiring {

	/**
	 * Get an inspiring quote.
	 *
	 * Taylor & Dayle made this commit from Jungfraujoch. (11,333 ft.)
	 *
	 * @return string
	 */
	public static function quote()
	{
		return Collection::make([
			'楽しいWISHでの生活が今、ここから始まる',
            '世界は広いよ、さあ、最初の一歩はWISHから',
            '英語話せるようになりたい？留学生と交流してみよう',
            'いつだって、親友は寮生活からできるもの'
		])->random();
	}

}
