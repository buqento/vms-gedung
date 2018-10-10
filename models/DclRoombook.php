<?php

namespace app\models;

use Yii;

class DclRoombook extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'dcl_room_book';
    }

 
    public function rules()
    {
        return [
            [['room_id', 'status'], 'integer'],
            [['visit_code'], 'string', 'max' => 6],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'visit_code' => 'Kode Kunjungan',
            'name' => 'Jam',
            'room_id' => 'Room ID',
            'status' => 'Status',
        ];
    }

    public static function getRoombookList($room_id, $tanggal)
    {
        $rooms = self::find()
            ->select(['id', 'name', 'visit_code', 'room_id', 'status'])
            ->where(['room_id' => $room_id, 'dtbook' => $tanggal, 'status' => 0])
            ->asArray()
            ->all();
        return $rooms;
    }

}
