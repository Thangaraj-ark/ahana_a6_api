<?php

namespace IRISORG\modules\v1\controllers;

use common\filters\CorsCustom;
use yii\web\Controller;

class BaseController extends Controller
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => CorsCustom::className(),
        ];

        return $behaviors;
    }
}
