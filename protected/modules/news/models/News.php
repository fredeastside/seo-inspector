<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property string $link
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $short_content
 * @property string $content
 * @property string $created
 * @property string $public
 */
class News extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{news}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('link, name, title, description, keywords, short_content, content, created', 'required'),
            array('link, name, title, description, keywords', 'length', 'max'=>255),
            array('public', 'length', 'max'=>1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, link, name, title, description, keywords, short_content, content, created, public', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'link' => 'Link',
            'name' => 'Name',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'short_content' => 'Short Content',
            'content' => 'Content',
            'created' => 'Created',
            'public' => 'Public',
        );
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

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('link',$this->link,true);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('description',$this->description,true);
        $criteria->compare('keywords',$this->keywords,true);
        $criteria->compare('short_content',$this->short_content,true);
        $criteria->compare('content',$this->content,true);
        $criteria->compare('created',$this->created,true);
        $criteria->compare('public',$this->public,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    protected function beforeValidate() {

        if($this->getIsNewRecord()) {
            $this->created = new CDbExpression('CURRENT_TIMESTAMP');
        }

        return parent::beforeValidate();
    }
}