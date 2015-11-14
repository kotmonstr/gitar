<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "meta".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $keywords
 */
class Meta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url', 'title', 'description', 'keywords'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'title' => 'Название страницы',
            'description' => 'Описание страницы',
            'keywords' => 'Ключевые слова(через запятую)',
        ];
    }
// Введет оьек мета по url
    public static function getPageMeta($url)
    {
        $model = self::find()->where(['url'=> $url])->one();
        if($model){
            return $model;
        }else{
            return false;
        }
    }
}
