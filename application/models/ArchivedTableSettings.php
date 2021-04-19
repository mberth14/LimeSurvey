<?php

/**
 * This is the model class for table "{{archived_table_settings}}".
 *
 * The followings are the available columns in table '{{archived_table_settings}}':
 * @property integer $id
 * @property integer $survey_id
 * @property integer $user_id
 * @property string $tbl_name
 * @property string $tbl_type
 * @property string $created
 * @property string $properties
 */
class ArchivedTableSettings extends LSActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{archived_table_settings}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['survey_id, user_id, tbl_name, tbl_type, created, properties', 'required'],
            ['survey_id, user_id', 'numerical', 'integerOnly' => true],
            ['tbl_name', 'length', 'max' => 255],
            ['tbl_type', 'length', 'max' => 10],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, survey_id, user_id, tbl_name, tbl_type, created, properties', 'safe', 'on' => 'search'],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'survey_id'  => 'Survey',
            'user_id'    => 'User',
            'tbl_name'   => 'Tbl Name',
            'tbl_type'   => 'Tbl Type',
            'created'    => 'Created',
            'properties' => 'Properties',
        ];
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria();

        $criteria->compare('id', $this->id);
        $criteria->compare('survey_id', $this->survey_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('tbl_name', $this->tbl_name, true);
        $criteria->compare('tbl_type', $this->tbl_type, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('properties', $this->properties, true);

        return new CActiveDataProvider(
            $this,
            [
                'criteria' => $criteria,
            ]
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ArchivedTableSettings the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
