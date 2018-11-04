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
class DatepickerAsset extends AssetBundle
{
    public $sourcePath = "@bower/persian-datepicker/dist";
    public $css = [
        'css/persian-datepicker.min.css',
    ];
    public $js = [
        'js/persian-datepicker.min.js',
    ];
    public $depends = [
        'mrlco\datepicker\DateAsset',
    ];
}
