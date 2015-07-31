<?php

/**
 * This is the model class for table "m_usuarios".
 *
 * The followings are the available columns in table 'm_usuarios':
 * @property integer $IdUsuario
 * @property string $NumeroDocumento
 * * @property string $username
 * @property string $password
 * @property string $PrimerNombre
 * @property string $SegundoNombre
 * @property string $PrimerApellido
 * @property string $SegundoApellido
 * @property string $EmailUsuario
 * @property integer $IdRol
  * @property integer $IdEstadoRegistro
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 *
 * The followings are the available model relations:
  * @property Estadosregistro $IdEstadoRegistro
 * @property Roles $IdRol
 */
class Usuarios extends CActiveRecord
{
    
   const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BANNED = 2;        //TODO
    const STATUS_REMOVED = 3;    //TODO

    //keep these in one place.
    const PASSWORD_MIN = 1;
    const PASSWORD_MAX = 50;
    const USERNAME_MIN = 3;
    const USERNAME_MAX = 45;
    const EMAIL_MAX = 125;
    const EMAIL_MIN = 5;    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_UsuariosCitasCedi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, PrimerNombre, PrimerApellido, EmailUsuario, IdRol, IdEstadoRegistro, Activo, NumeroDocumento', 'required'),
			array('IdRol, IdEstadoRegistro, Activo, NumeroDocumento', 'numerical', 'integerOnly'=>true),
			array('username, PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido', 'length', 'max'=>15),
			array('password, EmailUsuario', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdUsuario, username, password, NumeroDocumento, PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, EmailUsuario, IdRol, IdEstadoRegistro', 'safe', 'on'=>'search'),
                        array('username','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Nombre de Usuario Ya Existe'
                        ),  
                        array('EmailUsuario','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Correo Electrónico Ya Existe'
                        ),    
                        array('NumeroDocumento','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Número Documento Ya Existe'
                        ),                        
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
			'estadoregistro' => array(self::BELONGS_TO, 'Estadosregistro', 'IdEstadoRegistro'),
			'rol' => array(self::BELONGS_TO, 'Roles', 'IdRol'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdUsuario' => 'Id Usuario',
			'username' => 'Nombre Usuario',
			'password' => 'Contraseña',
                        'NumeroDocumento' => 'Documento',
			'PrimerNombre' => 'Primer Nombre',
			'SegundoNombre' => 'Segundo Nombre',
			'PrimerApellido' => 'Primer Apellido',
			'SegundoApellido' => 'Segundo Apellido',
			'EmailUsuario' => 'Correo Electrónico',
			'IdRol' => 'Rol',
			'IdEstadoRegistro' => 'Condición',
                        'Activo' => 'Estado',
			'IdUsuarioGraba' => 'Id Usuario Graba',
			'FechaGraba' => 'Fecha Graba',
			'IdUsuarioModifica' => 'Id Usuario Modifica',
			'FechaModifica' => 'Fecha Modifica',
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

		$criteria->compare('IdUsuario',$this->IdUsuario);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
                $criteria->compare('NumeroDocumento',$this->NumeroDocumento,true);
		$criteria->compare('PrimerNombre',$this->PrimerNombre,true);
		$criteria->compare('SegundoNombre',$this->SegundoNombre,true);
		$criteria->compare('PrimerApellido',$this->PrimerApellido,true);
		$criteria->compare('SegundoApellido',$this->SegundoApellido,true);
		$criteria->compare('EmailUsuario',$this->EmailUsuario,true);
		$criteria->compare('IdRol',$this->IdRol);
		$criteria->compare('IdEstadoRegistro',$this->IdEstadoRegistro);
                $criteria->compare('Activo',$this->Activo);
		$criteria->compare('IdUsuarioGraba',$this->IdUsuarioGraba);
		$criteria->compare('FechaGraba',$this->FechaGraba,true);
		$criteria->compare('IdUsuarioModifica',$this->IdUsuarioModifica);
		$criteria->compare('FechaModifica',$this->FechaModifica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function validatePassword($password)
        {
            return ($this->password == md5($password));
        }

        /**
         * Generates password hash from password and sets it to the model
         *
         * @param string $password
         */
        public function hashPassword($password)
        {
            return md5($password);
        }
        
	public static function getUsuarios($tipo)
	{
            $condicion = '';
            if ($tipo == 2){
                $condicion = 'IdRol IN (3,4)';
            }
            
            //$data = self::model()->findAll(array('order' => 'username'));
            //return CHtml::listData($data,'IdUsuario','username');		
            $usuarios = Usuarios::model()->findAll(
                        array(
                            'select'=>'IdUsuario, NumeroDocumento, PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido',
                            'condition'=>$condicion,
                        )
                    );

            $listaData = array();

            foreach ($usuarios as $reg){ 
                $listaData[$reg->IdUsuario] = $reg->PrimerNombre . ' ' . $reg->SegundoNombre . ' ' 
                        . $reg->PrimerApellido . ' ' . $reg->SegundoApellido;
            }

            return $listaData;
            
	}
        
        public static function getUsuarioDocumento($_Id)
        {
            $criteria=new CDbCriteria;
            $criteria->select='US.*';  // seleccionar solo la columna 
            $criteria->alias='US';
            $criteria->condition='NumeroDocumento=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elUsuario = Usuarios::model()->find($criteria); // $params no es necesario            
            
            return $elUsuario;
        }

        public static function getUsuarioId($_Id)
        {
            $criteria=new CDbCriteria;
            $criteria->select='US.*';  // seleccionar solo la columna 
            $criteria->alias='US';
            $criteria->condition='IdUsuario=:Id';
            $criteria->params=array(':Id'=>$_Id);            
            
            $elUsuario = Usuarios::model()->find($criteria); // $params no es necesario            

            return $elUsuario;
        }
        
        public static function getNombreUsuario ($_Id){

            $elUserName = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='*';  // seleccionar solo la columna 
            $criteria->condition='IdUsuario=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elUsuario = Usuarios::model()->find($criteria); // $params no es necesario            
            
            if ($elUsuario != null){                
                $elUserName = $elUsuario->PrimerNombre . ' ' . $elUsuario->SegundoNombre . ' '
                        . $elUsuario->PrimerApellido . ' ' . $elUsuario->SegundoApellido;                
            }
            return $elUserName;
            
        }
        
        
}
