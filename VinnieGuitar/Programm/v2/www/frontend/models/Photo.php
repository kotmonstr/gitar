<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property string $name
 * @property integer $items_id
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'items_id'], 'required'],
            [['items_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'items_id' => 'товар Id',
        ];
    }

    public function getItems()
    {
        return $this->hasOne(Items::className(), ['id' => 'items_id']);
    }

/*
 *  Вернет либо все фотки либо ограниченное количество пармам 2
 */
    public static function getPhotos($items_id,$q = null)
    {

        $q ? $model = self::find()->where(['items_id' => $items_id])->limit($q)->all() : $model = self::find()->where(['items_id' => $items_id])->all();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }
    /*
 *  Вернет одно фото
 */
    public static function getNameByItemId($items_id)
    {

         $model = self::find()->where(['items_id' => $items_id])->one();
        if ($model) {
            return '/upload/items_images/'.$model->name;
        } else {
            return false;
        }
    }

    public static function  getPhotosHTML($items_id)
    {
        {
            $str = '';
            $model = self::find()->where(['items_id' => $items_id])->all();
            if ($model) {
                foreach ($model as $photo) {
                    $str .= "<img src='/upload/items_images/" .$photo->name. "' alt='' width='100px' height='100px' >";
                }
                return $str;
            } else {
                return false;
            }

        }
    }
}
