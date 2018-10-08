<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "summary_pemesanan".
 *
 * @property int $id
 * @property string $guest_name
 * @property string $type_id
 * @property string $id_number
 * @property string $gender
 * @property string $phone_number
 * @property string $email
 * @property string $photo
 * @property string $address
 * @property string $visit_code
 * @property string $destination_id
 * @property string $dt_visit
 * @property string $t_visit
 * @property string $long_visit
 * @property string $additional_info
 * @property int $karyawan_id
 * @property string $tujuan_pertemuan
 * @property string $tanggal_kedatangan
 * @property string $jam_pemesanan
 * @property int $long_visit_id
 * @property int $tenant_id
 * @property int $building_id
 * @property int $floor_id
 * @property int $room_id
 */
class SummaryPemesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'summary_pemesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'karyawan_id', 'long_visit_id', 'tenant_id', 'building_id', 'floor_id', 'room_id'], 'integer'],
            [['guest_name', 'phone_number', 'email', 'photo', 'visit_code', 'destination_id', 'dt_visit', 'long_visit', 'additional_info'], 'required'],
            [['photo', 'additional_info'], 'string'],
            [['dt_visit', 'tanggal_kedatangan'], 'safe'],
            [['guest_name', 'email', 'visit_code', 'long_visit'], 'string', 'max' => 50],
            [['type_id'], 'string', 'max' => 25],
            [['id_number'], 'string', 'max' => 30],
            [['gender'], 'string', 'max' => 1],
            [['phone_number'], 'string', 'max' => 12],
            [['address', 'destination_id', 't_visit'], 'string', 'max' => 255],
            [['tujuan_pertemuan'], 'string', 'max' => 100],
            [['jam_pemesanan'], 'string', 'max' => 4],
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
            'type_id' => 'Type ID',
            'id_number' => 'Id Number',
            'gender' => 'Gender',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'photo' => 'Photo',
            'address' => 'Address',
            'visit_code' => 'Visit Code',
            'destination_id' => 'Destination ID',
            'dt_visit' => 'Dt Visit',
            't_visit' => 'T Visit',
            'long_visit' => 'Long Visit',
            'additional_info' => 'Additional Info',
            'karyawan_id' => 'Karyawan ID',
            'tujuan_pertemuan' => 'Tujuan Pertemuan',
            'tanggal_kedatangan' => 'Tanggal Kedatangan',
            'jam_pemesanan' => 'Jam Pemesanan',
            'long_visit_id' => 'Long Visit ID',
            'tenant_id' => 'Tenant ID',
            'building_id' => 'Building ID',
            'floor_id' => 'Floor ID',
            'room_id' => 'Room ID',
        ];
    }
}
