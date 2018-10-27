<?php

namespace Eriks\VideoPlayer\Components;

use Cms\Classes\ComponentBase;

class Single extends ComponentBase {


	public $player = '';
	public $vid = 0;
	public $title = '';
	public $ratio = '16-9';
	public $params = [];


	public function componentDetails()
	{
		return [
			'name' => 'VideoPlayer',
			'description' => 'VideoPlayer VideoPlayer VideoPlayer VideoPlayer.'
		];
	}


	public function defineProperties()
	{
		return [
			'player' => [
				'title'             => 'Ресурс',
				'description'       => 'Выберите видеохостинг.',
				'type'              => 'dropdown',
				'default'           => 'vimeo',
//				'placeholder'       => 'Choice of ratio',
				'options'           => [
					'vimeo' => 'Vimeo',
					'youtube' => 'YouTube',
				],
			],
			'vid' => [
				'title'             => 'Video ID',
				'description'       => 'Идентификатор видеоролика.',
//				'default'           => '',
				'type'              => 'string',
//				'validationPattern' => '^[0-9]+$',
//				'validationMessage' => 'Свойство Video ID может содержать только числовые символы.'
			],
			'title' => [
				'title'             => 'Video title',
				'description'       => 'Название видеоролика.',
//				'default'           => '',
				'type'              => 'string',
			],
			'ratio' => [
				'title'             => 'Aspect ratio',
				'description'       => 'Соотношение сторон экрана.',
				'type'              => 'dropdown',
				'default'           => '16-9',
//				'placeholder'       => 'Choice of ratio',
				'options'           => [
																'4-3' => '4:3',
																'16-9' => '16:9',
															],
			],
			'player_portrait' => [
				'title'             => 'Плейер: Логотип',
				'default'           => 0,
				'type'              => 'checkbox',
			],
			'player_title' => [
				'title'             => 'Плейер: Название',
				'default'           => 0,
				'type'              => 'checkbox',
			],
			'player_byline' => [
				'title'             => 'Плейер: Автор',
				'default'           => 0,
				'type'              => 'checkbox',
			],
		];
	}


	public function onRun()
	{
		$this->addCss('/plugins/eriks/videoplayer/assets/css/video.css');
	}


	public function onRender()
	{
		$this->player = $this->property('player');
		$this->vid = $this->property('vid');
		$this->title = $this->property('title');
		$this->ratio = $this->property('ratio');
		$this->getVideoParameters();
	}


	protected function getVideoParameters()
	{
		$this->params = [];
		if (!$this->property('player_portrait')) {
			$this->params['portrait'] = 'portrait=0';
		}
		if (!$this->property('player_title')) {
			$this->params['title'] = 'title=0';
		}
		if (!$this->property('player_byline')) {
			$this->params['byline'] = 'byline=0';
		}
		$this->params = $this->params ? '?' . implode('&', $this->params) : '';
	}



}