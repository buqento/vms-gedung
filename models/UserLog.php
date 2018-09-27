<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_log".
 *
 * @property int $id
 * @property string $visit_code
 * @property string $gate
 * @property string $time_pass
 * @property string $status
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
            [['time_pass'], 'safe'],
            [['visit_code'], 'string', 'max' => 6],
            [['gate'], 'string', 'max' => 5],
            [['status'], 'string', 'max' => 3],
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
            'gate' => 'Pintu',
            'time_pass' => 'Waktu',
            'status' => 'Status',
        ];
    }
}
