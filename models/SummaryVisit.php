<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "summary_visit".
 *
 * @property string $destination_id
 * @property string $company_name
 * @property string $jumlah
 */
class SummaryVisit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'summary_visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['destination_id', 'company_name'], 'required'],
            [['jumlah'], 'integer'],
            [['destination_id'], 'string', 'max' => 255],
            [['company_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'destination_id' => 'Destination ID',
            'company_name' => 'Tenant',
            'jumlah' => 'Jumlah Kunjungan',
        ];
    }
}
