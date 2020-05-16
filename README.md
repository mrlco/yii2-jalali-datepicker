Jalali Bootstrap DatePicker Widget for Yii2
====================================

Renders a [Persian Web Toolkit](http://babakhani.github.io/PersianWebToolkit)'s [Persian Date Picker](http://babakhani.github.io/PersianWebToolkit/doc/datepicker/) ([Reza Babakhani](https://github.com/babakhani)'s nice work.)


Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require mrlco/yii2-jalali-datepicker:~1.1.0
```
or add

```json
"mrlco/yii2-jalali-datepicker" : "~1.1.0"
```

to the require section of your application's `composer.json` file.

#### Bootstrap 4 support
From v2.0.0 - [Updated to use Bootstrap 4](https://github.com/mrlco/yii2-jalali-datepicker/releases/tag/2.0.0)


Usage
-----

### DatePicker

This widget renders a Bootstrap Persian DatePicker input control. Best suitable for model with date string attribute.

#### With a form model

There are two ways:

* with an ActiveForm instance:

```php
// as a widget
<?= mrlco\datepicker\Datepicker::widget([
    'model' => $model,
    'attribute' => 'date',
    'template' => '{addon}{input}',
        'clientOptions' => [
            'format' => 'YYYY/MM/DD'
        ]
]);?>
```
* As a widget, setup its model and attribute
```php
// with an ActiveForm instance 
<?= $form->field($model, 'date')->widget(
    mrlco\datepicker\Datepicker::className(), [
        'inline' => true,
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'format' => 'YYYY/MM/DD'
        ]
]);?>
```
#### Without any form model
```php
//use without any model
<?= mrlco\datepicker\Datepicker::widget([
    'name' => 'Test',
    'value' => '1394/03/23',
    'template' => '{addon}{input}',
        'clientOptions' => [
            'format' => 'YYYY/MM/DD'
        ]
]);?>
```

Credits
-------

- [Mehran Barzandeh](https://github.com/mehrna)

License
-------

The MIT License.