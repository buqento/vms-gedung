<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_app".
 *
 * @property string $id
 * @property string $guest_name
 * @property string $id_number
 * @property string $phone_number
 * @property string $email
 * @property string $photo
 * @property string $username
 * @property string $password
 * @property string $authKey
 */
class UserApp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_app';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_name', 'email'], 'string', 'max' => 50],
            [['id_number', 'username', 'password'], 'string', 'max' => 30],
            [['phone_number'], 'string', 'max' => 12],
            [['photo'], 'string', 'max' => 100],
            [['authKey'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guest_name' => 'Nama Lengkap',
            'id_number' => 'Nomor Identitas',
            'phone_number' => 'Nomor Telepon',
            'email' => 'Email',
            'photo' => 'Foto',
            'username' => 'Nama Pengguna',
            'password' => 'Kata Sandi',
            'authKey' => 'Auth Key',
        ];
    }
}
