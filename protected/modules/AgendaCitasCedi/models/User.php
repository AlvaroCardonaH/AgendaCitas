<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $primernombre
 * @property string $segundonombre
 * @property string $primerapellido
 * @property string $segundoapellido
 * @property integer $rol_id
 * @property integer $IdFabricante
 *
 * The followings are the available model relations:
 * @property TSolicitudescita[] $tSolicitudescitas
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, auth_key, password_hash, email, created_at, updated_at, primernombre, primerapellido', 'required'),
			array('status, created_at, updated_at, rol_id, IdFabricante', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('auth_key', 'length', 'max'=>32),
			array('password_hash, password_reset_token, email', 'length', 'max'=>255),
			array('primernombre, segundonombre, primerapellido, segundoapellido', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, auth_key, password_hash, password_reset_token, email, status, created_at, updated_at, primernombre, segundonombre, primerapellido, segundoapellido, rol_id, IdFabricante', 'safe', 'on'=>'search'),
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
			'tSolicitudescitas' => array(self::HAS_MANY, 'TSolicitudescita', 'IdUser'),
                        'rol' => array(self::BELONGS_TO, 'Roles', 'rol_id'),
                        'fabricante' => array(self::BELONGS_TO, 'Fabricante', 'IdFabricante'),  
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'auth_key' => 'Auth Key',
			'password_hash' => 'Password Hash',
			'password_reset_token' => 'Password Reset Token',
			'email' => 'Email',
			'status' => 'Status',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'primernombre' => 'Primernombre',
			'segundonombre' => 'Segundonombre',
			'primerapellido' => 'Primerapellido',
			'segundoapellido' => 'Segundoapellido',
			'rol_id' => 'Rol',
			'IdFabricante' => 'Id Fabricante',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('auth_key',$this->auth_key,true);
		$criteria->compare('password_hash',$this->password_hash,true);
		$criteria->compare('password_reset_token',$this->password_reset_token,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('primernombre',$this->primernombre,true);
		$criteria->compare('segundonombre',$this->segundonombre,true);
		$criteria->compare('primerapellido',$this->primerapellido,true);
		$criteria->compare('segundoapellido',$this->segundoapellido,true);
		$criteria->compare('rol_id',$this->rol_id);
		$criteria->compare('IdFabricante',$this->IdFabricante);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
