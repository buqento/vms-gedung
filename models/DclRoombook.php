<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dcl_room_book".
 *
 * @property int $id
 * @property string $jam
 * @property int $room_id
 * @property int $status
 */
class DclRoombook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dcl_room_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'status'], 'integer'],
            [['jam'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jam' => 'Jam',
            'room_id' => 'Room ID',
            'status' => 'Status',
            'name' => 'Jam Booking'
        ];
    }

    public static function getRoombookList($room_id)
    {
        $rooms = self::find()
            ->select(['id', 'name', 'room_id'])
            ->where(['room_id' => $room_id, 'status' => 0])
            ->asArray()
            ->all();
        return $rooms;
    }
}
