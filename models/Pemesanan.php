<?php

namespace app\models;

use Yii;

class Pemesanan extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'pemesanan';
    }

    public function rules()
    {
        return [
            [['karyawan_id', 'tujuan_pertemuan', 'tanggal_kedatangan', 'jam_pemesanan', 'long_visit_id', 'visit_code', 'tenant_id', 'room_id'], 'required'],
            [['created'], 'safe'],
            [['tujuan_pertemuan'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'karyawan_id' => 'Bertemu Dengan',
            'tujuan_pertemuan' => 'Informasi Pertemuan',
            'tanggal_kedatangan' => 'Tanggal',
            'jam_pemesanan' => 'Jam Mulai',
            'long_visit_id' => 'Durasi',
            'visit_code' => 'Kode Kunjungan',
            'tenant_id' => 'Id Tenant',
            'building_id' => 'Lokasi Gedung',
            'floor_id' => 'Lokasi Lantai',
            'room_id' => 'Ruangan',
            'created' => 'Tanggal Permohonan',
        ];
    }

    public function getPengunjung()
    {
        return $this->hasOne(Visited::className(), ['visit_code' => 'visit_code']);
    }

    public function getKaryawan()
    {
        return $this->hasOne(Karyawan::className(), ['id' => 'karyawan_id']);
    }

    public function getLongvisit()
    {
        return $this->hasOne(DclLongVisit::className(), ['id' => 'long_visit_id']);
    }

    public function getBuilding()
    {
        return $this->hasOne(DclBuilding::className(), ['id' => 'building_id']);
    }

    public function getLantai()
    {
        return $this->hasOne(DclFloor::className(), ['id' => 'floor_id']);
    }

    public function getRoom()
    {
        return $this->hasOne(DclRoom::className(), ['id' => 'room_id']);
    }

    public function getRoombook()
    {
        return $this->hasOne(DclRoombook::className(), ['id' => 'jam_pemesanan']);
    }

}
