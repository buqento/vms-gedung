<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_log".
 *
 * @property int $id
 * @property string $visit_code
 * @property string $checkin
 * @property string $checkout
 * @property int $status
 */
class UserLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['checkin', 'checkout'], 'safe'],
            [['status'], 'integer'],
            [['visit_code'], 'string', 'max' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'visit_code' => 'Kode Kunjungan',
            'checkin' => 'Checkin',
            'checkout' => 'Checkout',
            'status' => 'Status',
        ];
    }
}
