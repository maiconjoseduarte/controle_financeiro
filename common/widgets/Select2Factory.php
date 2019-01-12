<?php
namespace common\widgets;

use kartik\select2\Select2;
use yii\web\JsExpression;

/**
 * Created by PhpStorm.
 * User: sergio
 * Date: 7/3/15
 * Time: 2:15 PM
 */

class Select2Factory {

    static private function config($widgetName, $initialValues, $placeHolder, $isMultiple, $minimumInputLength, $dataUrl, $addon, $ajaxSendFunction){
        $values = [];
        $labels = [];
        $data = [];
        foreach($initialValues as $initialValue){
            if($initialValue['id'] != -1){
                $values[] = $initialValue['id'];
                $labels[] = $initialValue['text'];
            }
        }

        if(!$isMultiple){
            if (count($values)>0){
                $values = $values[0];
                $labels = $labels[0];
                $data = [$values => $labels];
            }else{
                $values = '';
                $labels = '';
            }
        }else{
            $data = array_combine($values, $labels);
        }

        $ajaxFunction = $ajaxSendFunction ? $ajaxSendFunction : new JsExpression('function(term,page) { return {search:term.term}; }');

        return [
            'name' => $widgetName,
            'value' => $values,
            'data' => $data,
            'initValueText' => $labels,
            'showToggleAll' => false,
            'options' => [
                'placeholder' => $placeHolder,
            ],
            'addon' => $addon,
            'pluginOptions' => [
                'tags' => '',
                'allowClear' => true,
                'minimumInputLength' => $minimumInputLength,
                'multiple' => $isMultiple,
                'ajax' => [
                    'url' => $dataUrl,
                    'dataType' => 'json',
                    'data' => $ajaxFunction,
                    'processResults' => new JsExpression('function(data,page) { return {results:data}; }'),
                ],
            ],
        ];
    }

    static public function widget($widgetName, $initialValues, $placeHolder, $isMultiple, $minimumInputLength, $dataUrl, $addon = [], $ajaxSendFunction = false){
        $config = self::config($widgetName, $initialValues, $placeHolder, $isMultiple, $minimumInputLength, $dataUrl, $addon, $ajaxSendFunction);

        //como nao esta no contexto do ActiveField, setamos um id randomico que não ocorra em nameclash com janelas modais
        $config['options']['id'] =  uniqid('select2_' + time());

        return Select2::widget( $config );
    }

    static public function configOnly($widgetName, $initialValues, $placeHolder, $isMultiple, $minimumInputLength, $dataUrl, $addon = [], $ajaxSendFunction = false)
    {
        $config = self::config($widgetName, $initialValues, $placeHolder, $isMultiple, $minimumInputLength, $dataUrl, $addon, $ajaxSendFunction);

        //como nao esta no contexto do ActiveField, setamos um id randomico que não ocorra em nameclash com janelas modais
        $config['options']['id'] =  uniqid('select2_' + time());

        return $config;
    }

    /**
     * @param $form ActiveForm
     * @param $model
     * @param $attribute
     * @param $initialValues
     * @param $placeHolder
     * @param $isMultiple
     * @param $minimumInputLength
     * @param $dataUrl
     * @return string
     */
    static public function field($form, $model, $attribute, $label, $initialValues, $placeHolder, $isMultiple,
                                 $minimumInputLength, $dataUrl, $addon = [], $enableClientValidation = null,  $ajaxSendFunction = false)
    {
        $field = $form->field($model, $attribute);
        if($label !== null){
            $field->label($label);
        }
        if($enableClientValidation !== null){
            $field->enableClientValidation = $enableClientValidation;
        }
        $config =  self::config(null, $initialValues, $placeHolder, $isMultiple, $minimumInputLength, $dataUrl, $addon, $ajaxSendFunction);

        return $field->widget(Select2::class, $config);
    }

}
