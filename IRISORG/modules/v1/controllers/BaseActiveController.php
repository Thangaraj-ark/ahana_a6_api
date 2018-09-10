<?php

namespace IRISORG\modules\v1\controllers;

use common\filters\CorsCustom;
use yii\rest\ActiveController;

class BaseActiveController extends ActiveController
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        if (\Yii::$app->getRequest()->getMethod() === 'OPTIONS') {
//            [contentNegotiator, verbFilter, authenticator, rateLimiter]
            unset($behaviors['authenticator'], $behaviors['verbFilter']);
        }
        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => CorsCustom::className(),
        ];

        return $behaviors;
    }
}
