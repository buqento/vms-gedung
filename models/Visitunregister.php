<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visit_unregister".
 *
 * @property int $id
 * @property string $guest_name
 * @property string $id_number
 * @property string $phone_number
 * @property string $email
 * @property string $photo
 * @property string $code
 * @property int $destination_id
 * @property string $dt_visit
 * @property string $long_visit
 * @property string $additional_info
 */
class Visitunregister extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visit_unregister';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_name', 'phone_number', 'email', 'photo', 'code', 'destination_id', 'dt_visit', 'long_visit', 'additional_info'], 'required'],
            [['destination_id'], 'integer'],
            [['dt_visit'], 'safe'],
            [['additional_info'], 'string'],
            [['guest_name', 'email', 'code', 'long_visit'], 'string', 'max' => 50],
            [['id_number'], 'string', 'max' => 30],
            [['phone_number'], 'string', 'max' => 12],
            [['photo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guest_name' => 'Guest Name',
            'id_number' => 'Id Number',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'photo' => 'Photo',
            'code' => 'Code',
            'destination_id' => 'Destination ID',
            'dt_visit' => 'Dt Visit',
            'long_visit' => 'Long Visit',
            'additional_info' => 'Additional Info',
        ];
    }
}
