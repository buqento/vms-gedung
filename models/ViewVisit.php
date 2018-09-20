<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_visit".
 *
 * @property string $guest_name
 * @property string $id_number
 * @property string $phone_number
 * @property string $email
 * @property string $photo
 * @property string $code
 * @property string $company_name
 * @property string $dt_visit
 * @property string $long_visit
 * @property string $additional_info
 * @property string $created
 */
class ViewVisit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_visit', 'created'], 'safe'],
            [['additional_info'], 'required'],
            [['additional_info'], 'string'],
            [['guest_name', 'email', 'code', 'long_visit'], 'string', 'max' => 50],
            [['id_number'], 'string', 'max' => 30],
            [['phone_number'], 'string', 'max' => 12],
            [['photo', 'company_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'guest_name' => 'Guest Name',
            'id_number' => 'Id Number',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'photo' => 'Photo',
            'code' => 'Code',
            'company_name' => 'Company Name',
            'dt_visit' => 'Dt Visit',
            'long_visit' => 'Long Visit',
            'additional_info' => 'Additional Info',
            'created' => 'Created',
        ];
    }
}
