<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $header
 * @property string $content
 * @property string $image
 */
class News extends \yii\db\ActiveRecord
{
    public $file;

    /** @inheritdoc */
    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            // устанавливаем точное время для сообщения
            if ($this->isNewRecord) {
                $this->created_at = time();
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'integer'],
            [['header', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Заголовок',
            'content' => 'Содержание',
            'image' => 'Картинка',
            'created_at' => 'Время',
        ];
    }

    /*
     *  Выведет последние новости
     */
    public static function getlastNews($q = 4)
    {
        $model = self::find()->orderBy('created_at DESC')->limit($q)->asArray()->all();
        if($model){
            return $model;
        }else{
            return false;
        }
    }
}
