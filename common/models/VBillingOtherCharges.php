<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_billing_other_charges".
 *
 * @property integer $tenant_id
 * @property integer $encounter_id
 * @property integer $patient_id
 * @property integer $category_id
 * @property string $category
 * @property string $headers
 * @property string $charge
 * @property integer $visit_count
 * @property string $trans_mode
 * @property string $total_charge
 * @property integer $extra_amount
 * @property integer $concession_amount
 */
class VBillingOtherCharges extends \common\models\RActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_billing_other_charges';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tenant_id', 'encounter_id', 'patient_id', 'category_id', 'category', 'headers'], 'required'],
            [['tenant_id', 'encounter_id', 'patient_id', 'category_id', 'visit_count', 'extra_amount', 'concession_amount'], 'integer'],
            [['charge', 'total_charge'], 'number'],
            [['category', 'headers'], 'string', 'max' => 50],
            [['trans_mode'], 'string', 'max' => 1],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tenant_id' => 'Tenant ID',
            'encounter_id' => 'Encounter ID',
            'patient_id' => 'Patient ID',
            'category_id' => 'Category ID',
            'category' => 'Category',
            'headers' => 'Headers',
            'charge' => 'Charge',
            'visit_count' => 'Visit Count',
            'trans_mode' => 'Trans Mode',
            'total_charge' => 'Total Charge',
            'extra_amount' => 'Extra Amount',
            'concession_amount' => 'Concession Amount',
        ];
    }
}
