<?php
namespace raoul2000\bootswatch;

use Yii;
use yii\web\AssetBundle;
use yii\base\InvalidConfigException;
use yii\base\InvalidCallException;

/**
 * Asset bundle around the Bootswatch theme for bootstrap.
 * Use BootswatchAsset::$theme = 'cyborg' to enable the cyborg theme.
 *
 * @see http://bootswatch.com/
 * @author Raoul
 *        
 */
class BootswatchAsset extends AssetBundle
{
	const ALIAS = '@vendor/thomaspark/bootswatch';

	/**
	 *
	 * @var string name of the active bootswatch theme
	 */
	public static $theme = 'amelia';

	public $depends = [
		'yii\bootstrap\BootstrapAsset'
	];

	/**
	 * Initialize the class properties depending on the current active theme.
	 * 
	 * @see \yii\web\AssetBundle::init()
	 */
	public function init()
	{
		if (! isset(self::$theme)) {
			throw new InvalidConfigException('No theme configured : set BootswatchAsset::$theme to the theme name');
		}
		$this->baseUrl = BootswatchAsset::ALIAS . '/' . self::$theme;
		$this->sourcePath = BootswatchAsset::ALIAS . '/' . self::$theme;
		$this->css = [
			'bootstrap.min.css'
		];
		
		parent::init();
	}

	/**
	 * Chekcs if a theme is a valid bootswatch theme.
	 * 
	 * @param string $theme        	
	 * @return boolean TRUE if $theme is a valid bootswatch theme, FALSE otherwise
	 */
	static function isSupportedTheme($theme)
	{
		if (! is_string($theme) || empty($theme)) {
			throw new InvalidCallException('Invalid theme value : empty or null value');
		}
		return file_exists(Yii::getAlias(BootswatchAsset::ALIAS . '/' . strtolower($theme) . '/bootstrap.min.css'));
	}
}
