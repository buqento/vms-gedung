<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dcl_room".
 *
 * @property int $id
 * @property string $title
 */
class DclRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dcl_room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'name'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
            ->where(['floor_id' => $floor_id])
            ->asArray()
            ->all();
        return $rooms;
    }
}
