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
            [['name', 'building_id', 'floor_id', 'tenant_id'], 'required'],
            [['building_id', 'floor_id', 'tenant_id'], 'integer'],
            [['name'], 'string', 'max' => 15],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Ruangan',
            'building_id' => 'Nama Gedung',
            'floor_id' => 'Nama Lantai',
            'tenant_id' => 'Nama Tenant'
        ];
    }

    public function getTenant()
    {
        return $this->hasOne(DclDestination::className(), ['id' => 'tenant_id']);
    }

    public function getFloor()
    {
        return $this->hasOne(DclFloor::className(), ['id' => 'floor_id']);
    }

    public static function getRoomList()
    {
        $rooms = self::find()
            ->select(['name'])
            ->where(['tenant_id' => Yii::$app->user->identity->tenant_id])
            ->indexBy('id')
            ->column();
        return $rooms;
    }
}
