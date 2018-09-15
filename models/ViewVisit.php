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
 * @property int $destination_id
 * @property string $dt_visit
 * @property string $long_visit
 * @property string $additional_info
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
            [['destination_id'], 'integer'],
            [['dt_visit'], 'safe'],
            [['additional_info'], 'required'],
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
            'guest_name' => 'Nama Pengunjung',
            'id_number' => 'Nomor Identitas',
            'phone_number' => 'Nomor Telepon',
            'email' => 'Email',
            'photo' => 'Foto',
            'code' => 'Kode',
            'company_name' => 'Tujuan',
            'dt_visit' => 'Tanggal/Jam',
            'long_visit' => 'Lama Kunjungan',
            'additional_info' => 'Informasi Kunjungan',
        ];
    }
}
