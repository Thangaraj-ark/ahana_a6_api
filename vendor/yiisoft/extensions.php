<?php

$vendorDir = dirname(__DIR__);

return array (
  'yiisoft/yii2-faker' => 
  array (
    'name' => 'yiisoft/yii2-faker',
    'version' => '2.0.3.0',
    'alias' => 
    array (
      '@yii/faker' => $vendorDir . '/yiisoft/yii2-faker',
    ),
  ),
  'cornernote/yii2-linkall' => 
  array (
    'name' => 'cornernote/yii2-linkall',
    'version' => '1.0.0.0',
    'alias' => 
    array (
      '@cornernote/linkall' => $vendorDir . '/cornernote/yii2-linkall/src',
    ),
  ),
  'yiisoft/yii2-swiftmailer' => 
  array (
    'name' => 'yiisoft/yii2-swiftmailer',
    'version' => '2.0.6.0',
    'alias' => 
    array (
      '@yii/swiftmailer' => $vendorDir . '/yiisoft/yii2-swiftmailer',
    ),
  ),
  'p2made/yii2-uuid' => 
  array (
    'name' => 'p2made/yii2-uuid',
    'version' => '2.0.4.0',
    'alias' => 
    array (
      '@p2made/helpers/Uuid' => $vendorDir . '/p2made/yii2-uuid',
    ),
  ),
  'yiisoft/yii2-codeception' => 
  array (
    'name' => 'yiisoft/yii2-codeception',
    'version' => '2.0.5.0',
    'alias' => 
    array (
      '@yii/codeception' => $vendorDir . '/yiisoft/yii2-codeception',
    ),
  ),
  'yiisoft/yii2-bootstrap' => 
  array (
    'name' => 'yiisoft/yii2-bootstrap',
    'version' => '2.0.6.0',
    'alias' => 
    array (
      '@yii/bootstrap' => $vendorDir . '/yiisoft/yii2-bootstrap',
    ),
  ),
  'yiisoft/yii2-debug' => 
  array (
    'name' => 'yiisoft/yii2-debug',
    'version' => '2.0.7.0',
    'alias' => 
    array (
      '@yii/debug' => $vendorDir . '/yiisoft/yii2-debug',
    ),
  ),
  'yiisoft/yii2-gii' => 
  array (
    'name' => 'yiisoft/yii2-gii',
    'version' => '2.0.5.0',
    'alias' => 
    array (
      '@yii/gii' => $vendorDir . '/yiisoft/yii2-gii',
    ),
  ),
  'omnilight/yii2-scheduling' => 
  array (
    'name' => 'omnilight/yii2-scheduling',
    'version' => '1.0.7.0',
    'alias' => 
    array (
      '@omnilight/scheduling' => $vendorDir . '/omnilight/yii2-scheduling',
    ),
    'bootstrap' => 'omnilight\\scheduling\\Bootstrap',
  ),
);
