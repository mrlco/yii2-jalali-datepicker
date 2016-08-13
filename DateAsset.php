<?php
/**
 * @link https://github.com/mrlco/yii2-jalali-datepicker#readme
 * @license https://github.com/mrlco/yii2-jalali-datepicker/blob/master/LICENSE
 * @copyright Copyright (c) 2015 Mrlco
 */

namespace mrlco\datepicker;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Persian Datepicker css files.
 *
 * @author Mehran Barzandeh <merhan.barzandeh@gmail.com>
 */
class DateAsset extends AssetBundle
{
    public $js = [
        '0.1.8/persian-date-0.1.8.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public function init()
    {
        $s = DIRECTORY_SEPARATOR;
        $this->sourcePath = "@bower{$s}persian-date{$s}dist";
        parent::init();
    }
}
