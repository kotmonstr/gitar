<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property integer $status
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['content','alias'], 'string'],
            [['status'], 'integer'],
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
            'name' => 'Наименование',
            'content' => 'Содержание',
            'status' => 'Опубликовать',
            'alias' => 'Url к странице на латинице (Пример: _my_favorite_page)',
        ];
    }
    public static function getUrlAbouteMe(){
        $isExistPageAbouteMe = self::find()->where(['id'=>'2','status'=>1])->one();
        if($isExistPageAbouteMe){
            return '/site/show?id=2';
        }else{
            return '/site/about';
        }
    }
}
