<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dcl_hour".
 *
 * @property int $id
 * @property string $name
 */
class DclHour extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dcl_hour';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public static function getAvailableList($availables)
    {
        $availables = Yii::$app->db->createCommand('SELECT * FROM dcl_hour WHERE id <= "'.$availables.'"')
        ->queryAll();
        return $availables;
    }
}
