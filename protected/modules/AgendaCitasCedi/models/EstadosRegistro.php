<?php

/**
 * This is the model class for table "m_estadosregistro".
 *
 * The followings are the available columns in table 'm_estadosregistro':
 * @property integer $IdEstadoRegistro
 * @property string $NombreEstadoRegistro
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 *
 * The followings are the available model relations:
 * @property Usuarios[] $IdEstadoRegistro
 */
class EstadosRegistro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $campo1; 
        public $campo2;
    
	public function tableName()
	{
		return 'm_EstadosRegistro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreEstadoRegistro', 'required', 'message' => 'Digite un texto para el campo {attribute}.'),
			array('NombreEstadoRegistro', 'length', 'max'=>45),
                        array('NombreEstadoRegistro','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Nombre Ya Existe'
                        ),                    
			array('FechaModifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdEstadoRegistro, NombreEstadoRegistro', 'safe', 'on'=>'search'),
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
			'IdEstadoRegistro' => array(self::HAS_MANY, 'Usuarios', 'IdEstadoRegistro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdEstadoRegistro' => 'ID',
			'NombreEstadoRegistro' => 'Nombre',
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

		$criteria->compare('IdEstadoRegistro',$this->IdEstadoRegistro);
		$criteria->compare('NombreEstadoRegistro',$this->NombreEstadoRegistro,true);
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
	 * @return EstadosRegistro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function  getListaEstadosRegistro(){

            $estados = EstadosRegistro::model()->findAll(
                        array(
                                  'select'=>'IdEstadoRegistro, NombreEstadoRegistro',
                                  'condition'=>''
                        )
                    );

            $listaEstados = array();
            $listaEstados [] = "";

            foreach ($estados as $reg){ 
                $listaEstados[$reg->IdEstadoRegistro] = $reg->NombreEstadoRegistro;
            }

            return $listaEstados;
        }

        public static function getEstadoRegistro ($_IdEstado){
            $elEstado = EstadosRegistro::model()->findByPk($_IdEstado);
        }
        
        public static function getNombreEstado ($_Id){
            $elNombreEstadoRegistro = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='NombreEstadoRegistro';  // seleccionar solo la columna 'title'
            $criteria->condition='IdEstadoRegistro=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elEstadoRegistro = EstadosRegistro::model()->find($criteria); // $params no es necesario            
            
            if ($elEstadoRegistro != null){                
                $elNombreEstadoRegistro = $elEstadoRegistro->NombreEstadoRegistro;                
            }
            return $elNombreEstadoRegistro;
        }
        
}
