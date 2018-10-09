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

    public static function getRoombookList($room_id)
    {
        $rooms = self::find()
            ->select(['id', 'name'])
            ->where(['room_id' => $room_id, 'status' => 0])
            ->asArray()
            ->all();
        return $rooms;
    }

    public static function getAvailableList($availables)
    {
        $availables = Yii::$app->db->createCommand('SELECT id, name FROM dcl_room_book WHERE id < "'.$availables.'"')
        ->queryAll();
        return $availables;
    }
}
