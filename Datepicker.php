<?php
/**
 * @link https://github.com/mrlco/yii2-jalali-datepicker#readme
 * @license https://github.com/mrlco/yii2-jalali-datepicker/blob/master/LICENSE
 * @copyright Copyright (c) 2015 Mrlco
 */

namespace mrlco\datepicker;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * Datepicker renders a Persian Datepicker input.
 *
 * @author Mehran Barzandeh <merhan.barzandeh@gmail.com>
 * @see http://babakhani.github.io/PersianWebToolkit/doc/datepicker/
 */
class Datepicker extends InputWidget
{
    /**
     * @var array the options for the Persian Bootstrap DatePicker plugin.
     * Please refer to the Persian Bootstrap DatePicker plugin Web page for possible options.
     * @see http://babakhani.github.io/PersianWebToolkit/doc/datepicker/#/options/
     */
    public $clientOptions = [];

    /**
     * @var array the event handlers for the underlying Persian Bootstrap DatePicker plugin.
     * Please refer to the [DatePicker](http://babakhani.github.io/PersianWebToolkit/doc/datepicker/#/methods/) plugin
     * Web page for possible events.
     */
    public $clientEvents = [];

    /**
     * @var array HTML attributes to render on the container
     */
    public $containerOptions = [];

    /**
     * @var string the Persian Bootstrap DatePicker plugin's theme.
     */
    public $theme = 'default';

    /**
     * @var string the size of the input ('lg', 'sm')
     */
    public $size;

    /**
     * @var string the prepend addon markup if you wish to display the input as a component then set it to
     * something like '<span class="input-group-text">Sample Text</span>'.
     */
    public $prependAddon = false;

    /**
     * @var string the append addon markup if you wish to display the input as a component then set it to
     * something like '<span class="input-group-text">Sample Text</span>'.
     */
    public $appendAddon = false;

    /**
     * @var string the template to render the input.
     */
    public $template = '{prepend}{input}{append}';

    /**
     * @var bool whether to render the input as an inline calendar
     */
    public $inline = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->inline) {
            $this->options['readonly'] = 'readonly';
            Html::addCssClass($this->options, 'text-center');
        }
        if ($this->size) {
            Html::addCssClass($this->options, 'input-' . $this->size);
            Html::addCssClass($this->containerOptions, 'input-group-' . $this->size);
        }
        Html::addCssClass($this->options, 'form-control');
        Html::addCssClass($this->containerOptions, 'input-group date');
    }

    /**
     * @inheritdoc
     */
    public function run()
    {

        $input = $this->hasModel()
            ? Html::activeTextInput($this->model, $this->attribute, $this->options)
            : Html::textInput($this->name, $this->value, $this->options);

        if ($this->inline) {
            $input .= '<div></div>';
        }
        if (($this->prependAddon || $this->appendAddon) && !$this->inline) {
            $prepend = $append = '';
            if ($this->prependAddon) {
                $prepend = Html::tag('span', $this->prependAddon, ['class' => 'input-group-prepend']);
            }
            if ($this->appendAddon) {
                $append = Html::tag('span', $this->appendAddon, ['class' => 'input-group-append']);
            }
            $input = strtr($this->template, ['{prepend}' => $prepend, '{input}' => $input, '{append}' => $append]);
            $input = Html::tag('div', $input, $this->containerOptions);
        }
        if ($this->inline) {
            $input = strtr($this->template, ['{input}' => $input, '{addon}' => '']);
        }
        echo $input;

        $this->registerClientScript();
    }

    /**
     * Registers required script for the plugin to work as DatePicker
     */
    public function registerClientScript()
    {
        $js = [];
        $view = $this->getView();
        $this->clientOptions['theme'] = $this->theme;

        DateAsset::register($view);

        if ($this->theme === 'default') {
            DatepickerAsset::register($view);
        } else {
            $this->{'registerDatepicker' . ucfirst($this->theme) . 'ThemeAsset'}($view);
        }

        $id = $this->options['id'];
        $selector = ";jQuery('#$id')";

        if ($this->inline) {
            $selector .= ".parent()";
        }


        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : '';

        $js[] = "$selector.pDatepicker($options);";

        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "$selector.on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js));
    }

    /**
     * Register Persian Bootstrap Datepicker Blue theme asset into view.
     *
     * @param $view
     */
    protected function registerDatepickerBlueThemeAsset($view)
    {
        DatepickerBlueThemeAsset::register($view);
    }

    /**
     * Register Persian Bootstrap Datepicker Cheerup theme asset into view.
     *
     * @param $view
     */
    protected function registerDatepickerCheerupThemeAsset($view)
    {
        DatepickerCheerupThemeAsset::register($view);
    }

    /**
     * Register Persian Bootstrap Datepicker Dark theme asset into view.
     *
     * @param $view
     */
    protected function registerDatepickerDarkThemeAsset($view)
    {
        DatepickerDarkThemeAsset::register($view);
    }

    /**
     * Register Persian Bootstrap Datepicker Redblack theme asset into view.
     *
     * @param $view
     */
    protected function registerDatepickerRedblackThemeAsset($view)
    {
        DatepickerRedblackThemeAsset::register($view);
    }
}
