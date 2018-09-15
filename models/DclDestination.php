<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dcl_destination".
 *
 * @property int $id
 * @property string $company_name
 * @property string $open_hour
 * @property string $close_hour
 * @property string $build_name
 * @property int $floor
 * @property int $phone
 * @property string $email
 * @property string $profile
 * @property string $picture
 * @property string $address
 */
class DclDestination extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dcl_destination';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'open_hour', 'close_hour', 'build_name', 'floor', 'phone', 'email', 'profile', 'picture', 'address'], 'required'],
            [['open_hour', 'close_hour'], 'safe'],
            [['floor', 'phone'], 'integer'],
            [['profile', 'address'], 'string'],
            [['company_name', 'build_name'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['picture'], 
                'file', 
                'skipOnEmpty' => false,
                'extensions' => 'png, jpg',
                'maxSize' => 512000, //500 kilobytes is 500 * 1024 bytes = 512 000 bytes
                'tooBig' => 'Ukuran maksimal file 500kb'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Nama Perusahaan',
            'open_hour' => 'Jam Buka',
            'close_hour' => 'Jam Tutup',
            'build_name' => 'Lokasi Gedung',
            'floor' => 'Lantai',
            'phone' => 'Telepon',
            'email' => 'Email',
            'profile' => 'Profil Gedung',
            'picture' => 'Gambar Gedung',
            'address' => 'Alamat',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->picture->saveAs('uploads/' . $this->picture->baseName . '.' . $this->picture->extension);
            return true;
        } else {
            return false;
        }
    }
}
