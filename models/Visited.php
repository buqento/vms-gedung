<?php

namespace app\models;

use Yii;

class Visited extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visited';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_name', 'phone_number', 'email', 'photo', 'visit_code', 'destination_id', 'dt_visit', 'long_visit', 'additional_info'], 'required'],
            [['dt_visit', 'created'], 'safe'],
            [['additional_info'], 'string'],
            [['guest_name', 'email', 'visit_code', 'long_visit'], 'string', 'max' => 50],
            [['id_number'], 'string', 'max' => 30],
            [['phone_number'], 'string', 'max' => 12],
            [['photo'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guest_name' => 'Nama Pengunjung',
            'type_id' => 'Tipe Identitas',
            'id_number' => 'Nomor Identitas',
            'gender' => 'Jenis Kelamin',
            'phone_number' => 'Nomor Telepon',
            'email' => 'Email',
            'photo' => 'Foto',
            'address' => 'Alamat',
            'visit_code' => 'Kode Kunjungan',
            'destination_id' => 'Tujuan',
            'dt_visit' => 'Tanggal Kunjungan',
            'long_visit' => 'Lama Kunjungan',
            'additional_info' => 'Informasi Kunjungan',
            'created' => 'Tanggal Permohonan',
        ];
    }

    public function getStatus()
    {
        $status = 1;
        switch ($status) {
            case 1:
                $vStatus = 'Disetujui';
                break;
            case 2:
                $vStatus = 'Ditolak';
                break;
            
            default:
                $vStatus = 'Pending';
                break;
        }

        return 'pending';
    }

    public function getType()
    {
        return $this->hasOne(DclType::className(), ['id' => 'type_id']);
    }
    
    public function getTenant()
    {
        return $this->hasOne(DclDestination::className(), ['id' => 'destination_id']);
    }
}
