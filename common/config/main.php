<?php

use kartik\datecontrol\Module;

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],

    'language' => 'pt-br',

    'modules' => [
        'datecontrol' =>  [
            'class' => 'kartik\datecontrol\Module',

            // format settings for displaying each date attribute
            'displaySettings' => [
                Module::FORMAT_DATE => 'php:d/F/Y',
                Module::FORMAT_TIME => 'php:H:i:s',
                Module::FORMAT_DATETIME => 'php:d/F/Y H:i:s',
            ],

            // format settings for saving each date attribute
            'saveSettings' => [
                Module::FORMAT_DATE => 'php:Y-m-d',
                Module::FORMAT_TIME => 'php:H:i:s',
                Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
            ],

//            // set your display timezone
//            'displayTimezone' => 'Asia/Kolkata',

            // set your timezone for date saved to db
            'saveTimezone' => 'America/Sao_Paulo',

            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,

            // default settings for each widget from kartik\widgets used when autoWidget is true
            'autoWidgetSettings' => [
                Module::FORMAT_DATE => [
                    'pluginOptions'=>[
                        'autoclose'=>true,
                        'todayHighlight' => true
                    ],
                    'pluginEvents' => [
                        'paste' => "function(e) {
                            var obj = $('#' + e.target.id);
                            obj.change();
                            obj.blur();
                            $('.datepicker-days').css({'display': 'none'});
                        }"
                    ]
                ],
                Module::FORMAT_DATETIME => [
                    'pluginOptions'=>[
                        'todayHighlight' => true,
                        'autoclose'=>true,
                    ]
                ],
//                Module::FORMAT_TIME => [],
            ],

        ],
    ]
];
