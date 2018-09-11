<?php

namespace IRISORG\modules\v1\controllers;

use common\models\PhaBrand;
use common\models\PhaBrandDivision;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\BaseActiveRecord;
use yii\filters\auth\QueryParamAuth;
use yii\filters\ContentNegotiator;
use yii\web\Response;

/**
 * WardController implements the CRUD actions for CoTenant model.
 */
class PharmacybrandrepController extends BaseActiveController {

    public $modelClass = 'common\models\PhaBrandRepresentative';

    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
        ];
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

    public function actions() {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider() {
        /* @var $modelClass BaseActiveRecord */
        $modelClass = $this->modelClass;

        return new ActiveDataProvider([
            'query' => $modelClass::find()->tenant()->active()->orderBy(['created_at' => SORT_DESC]),
            'pagination' => false,
        ]);
    }

    public function actionRemove() {
        $id = Yii::$app->getRequest()->post('id');
        if ($id) {
            $model = $modelClass::find()->where(['rep_id' => $id])->one();
            $model->remove();
            $activity = 'Brand Representatives Deleted Successfully (#' . $model->rep_1_name . ' )';
            CoAuditLog::insertAuditLog(PhaBrandRepresentative::tableName(), $id, $activity);
            return ['success' => true];
        }
    }

    public function actionGetallbrands() {
        $list = PhaBrand::find()->tenant()->status()->active()->all();
        return ['brandList' => $list];
    }

    public function actionGetalldivisions() {
        $list = PhaBrandDivision::find()->tenant()->status()->active()->all();
        return ['divisionList' => $list];
    }

}
