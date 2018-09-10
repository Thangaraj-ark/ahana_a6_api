<?php

namespace common\filters;

use Yii;
use yii\filters\Cors;

class CorsCustom extends Cors
{
    public function beforeAction($action)
    {
        parent::beforeAction($action);
        if (Yii::$app->getRequest()->getMethod() === 'OPTIONS') {
            Yii::$app->getResponse()->getHeaders()->set('Allow', 'POST GET PUT');
            Yii::$app->end();
//            Yii::$app->getResponse()->getHeaders()->set('Allow', 'POST GET PUT');
//            Yii::$app->getRequest()->getHeaders()->set('Allow', 'POST GET PUT');
//            Yii::$app->getRequest()->getHeaders()->set('Allow', ['x-domain-path', 'config-route', 'request-time']);
            Yii::$app->end();
        }

        return true;
    }
}

