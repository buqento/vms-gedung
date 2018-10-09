<?php

namespace app\models;
use Yii;

class DclRoom extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'dcl_room';
    }

    public function rules()
    {
        return [
            [['title', 'name'], 'string', 'max' => 15],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'name' => 'Nama Ruangan',
            'floor_id' => 'id lantai'
        ];
    }

    public static function getRoomList($floor_id)
    {
        $rooms = self::find()
            ->select(['id', 'name'])
            ->where(['floor_id' => $floor_id, 'tenant_id' => Yii::$app->user->identity->tenant_id])
            ->asArray()
            ->all();
        return $rooms;
    }
}
