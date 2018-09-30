<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dcl_floor".
 *
 * @property int $id
 * @property string $floor
 */
class DclFloor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dcl_floor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floor'], 'required'],
            [['floor'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floor' => 'Floor',
        ];
    }


}
