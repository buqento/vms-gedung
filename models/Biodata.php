<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biodata".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $telepon
 * @property int $jeniskelamin
 * @property string $foto
 */
class Biodata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'telepon', 'jeniskelamin', 'foto'], 'required'],
            [['jeniskelamin'], 'integer'],
            [['nama'], 'string', 'max' => 50],
            [['alamat'], 'string', 'max' => 250],
            [['telepon'], 'string', 'max' => 12],
            [['foto'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telepon' => 'Telepon',
            'jeniskelamin' => 'Jeniskelamin',
            'foto' => 'Foto',
        ];
    }
}
