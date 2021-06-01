<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior; 
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "guest".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property int $gender gender	Tinyint(1)	“1” for Male or “2” for Female
 * @property string $birthdate
 * @property string $createdAt CURRENT_TIMESTAMP
 * @property int $modifiedBy
 * @property string $modifiedDate
 *
 * @property User $modifiedBy0
 */
class Guest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guest';
    }

    public function behaviors()
    {
        return [ 
            TimestampBehavior::class,
            [
                'class'=>BlameableBehavior::class,
                'createdByAttribute' => false
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'gender', 'birthdate', 'createdAt', 'modifiedBy', 'modifiedDate'], 'required'],
            [['address'], 'string'],
            [['gender', 'modifiedBy'], 'integer'],
            [['birthdate', 'createdAt', 'modifiedDate'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['modifiedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['modifiedBy' => 'id']],
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
            'address' => 'Address',
            'gender' => 'Gender',
            'birthdate' => 'Birthdate',
            'createdAt' => 'Created At',
            'modifiedBy' => 'Modified By',
            'modifiedDate' => 'Modified Date',
        ];
    }

    /**
     * Gets query for [[ModifiedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModifiedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'modifiedBy']);
    }
}
