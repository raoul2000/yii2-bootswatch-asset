<?php
namespace raoul2000\bootswatch;

use Yii;
use yii\web\AssetBundle;
use yii\base\InvalidConfigException;
use yii\base\InvalidCallException;

/**
 * Asset bundle around the Bootswatch theme for bootstrap.
 * Use raoul2000\bootswatch\BootswatchAsset::$theme = 'cyborg' to enable the "Cyborg" theme.
 *
 * @see http://bootswatch.com/
 * @author Raoul
 *
 */
class BootswatchAsset extends AssetBundle
{
	const VENDOR_ALIAS = '@vendor/thomaspark/bootswatch';

	public $sourcePath = BootswatchAsset::VENDOR_ALIAS;
	/**
	 * @var string name of the active bootswatch theme. When NULL, no bootswatch theme
	 * is applied.
	 */
	public static $theme = null;
	public $depends = [
		'yii\bootstrap\BootstrapAsset'
	];
	/**
	 * Initialize the class properties depending on the current active theme.
	 *
	 * When debug mode is disabled, the minified version of the css is used.
	 * @see \yii\web\AssetBundle::init()
	 */
	public function init()
	{
		if ( self::$theme != null) {
			if ( ! is_string(self::$theme) ) {
				throw new InvalidConfigException('No theme Bootswatch configured : set BootswatchAsset::$theme to the theme name you want to use');
			}
			$this->css = [
				strtolower(self::$theme).'/bootstrap'.( YII_ENV_DEV ? '.css' : '.min.css' )
			];

			// optimized asset publication : only publish bootswatch theme folders and font folder.

			$this->publishOptions['beforeCopy'] =  function ($from, $to)  {
				if ( is_dir($from)) {
					$name = pathinfo($from,PATHINFO_BASENAME);
					return ! in_array($name, ['2','api','assets','bower_components','tests','help','global','default']);
				} else {
					$ext = pathinfo($from,PATHINFO_EXTENSION);
					return in_array($ext,['css','eot','svg','ttf','woff','woff2']);
				}
			};
		}
		parent::init();
	}

	/**
	 * Chekcs if a theme is a valid bootswatch theme.
	 *
	 * This basic method assumes the $theme name passed as argument is an existing
	 * subfolder of the vendor alias folder (@vendor/thomaspark/bootswatch) that contains
	 * the file 'bootstrap.min.css'. If this condition is not true, the theme is invalid.
	 *
	 * @param string $theme the theme name to test
	 * @return boolean TRUE if $theme is a valid bootswatch theme, FALSE otherwise
	 */
	static function isSupportedTheme($theme)
	{
		if (! is_string($theme) || empty($theme)) {
			throw new InvalidCallException('Invalid theme value : empty or null value');
		}
		return file_exists(Yii::getAlias(BootswatchAsset::VENDOR_ALIAS . '/' . strtolower($theme) . '/bootstrap.min.css'));
	}
}
