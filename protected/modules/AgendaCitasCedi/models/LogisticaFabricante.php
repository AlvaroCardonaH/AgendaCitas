<?php

/**
 * This is the model class for table "m_logisticafabricante".
 *
 * The followings are the available columns in table 'm_logisticafabricante':
 * @property integer $IdLogisticaFabricante
 * @property integer $IdFabricante
 * @property integer $IdCedi
 * @property integer $IdTransportador
 * @property string $ObservacionesLogistica
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class LogisticaFabricante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_LogisticaFabricante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdFabricante, IdCedi, ObservacionesLogistica, IdUsuarioResponsable', 'required'),
			array('IdLogisticaFabricante, IdFabricante, IdCedi, IdTransportador, IdUsuarioResponsable', 'numerical', 'integerOnly'=>true),
			array('ObservacionesLogistica', 'length', 'max'=>255),
                        array('IdFabricante, IdCedi, IdTransportador', 'validFabricanteCedi','on'=>'insert'),
                        array('IdUsuarioResponsable','validarRolUsuario'),
			array('FechaModifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdLogisticaFabricante, IdFabricante, IdCedi, IdTransportador, IdUsuarioResponsable, ObservacionesLogistica, IdUsuarioGraba, FechaGraba, IdUsuarioModifica, FechaModifica', 'safe', 'on'=>'search'),
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
                    'cedi' => array(self::BELONGS_TO, 'Cedi', 'IdCedi'),
                    'fabricante' => array(self::BELONGS_TO, 'Fabricante', 'IdFabricante'),
                    'transportador' => array(self::BELONGS_TO, 'Transportador', 'IdTransportador'),
                    'responsable' => array(self::BELONGS_TO, 'Usuarios', 'IdUsuarioResponsable'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdLogisticaFabricante' => 'ID',
			'IdFabricante' => 'Fabricante',
			'IdCedi' => 'Cedi',
			'IdTransportador' => 'Transportador',
                        'IdUsuarioResponsable' => 'Responsable',
			'ObservacionesLogistica' => 'Observaciones Logistica',
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
                
		$criteria->compare('IdLogisticaFabricante',$this->IdLogisticaFabricante);
		$criteria->compare('IdFabricante',$this->IdFabricante);
		$criteria->compare('IdCedi',$this->IdCedi);
		$criteria->compare('IdTransportador',$this->IdTransportador);
                $criteria->compare('IdUsuarioResponsable',$this->IdUsuarioResponsable);
		$criteria->compare('ObservacionesLogistica',$this->ObservacionesLogistica,true);
		$criteria->compare('IdUsuarioGraba',$this->IdUsuarioGraba);
		$criteria->compare('FechaGraba',$this->FechaGraba,true);
		$criteria->compare('IdUsuarioModifica',$this->IdUsuarioModifica);
		$criteria->compare('FechaModifica',$this->FechaModifica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>array(
                            'defaultOrder'=>'IdFabricante, IdTransportador',
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LogisticaFabricante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function validarRolUsuario($attribute_name,$params){
            
            $usuario = Usuarios::getUsuarioId($this->IdUsuarioResponsable);
            
            if ($usuario){
                if ((!empty($this->IdFabricante)) && (empty($this->IdTransportador))){
                    if ($usuario->IdRol != 3){
                        $this->addError('IdResponsable',
	                 'Responsable Debe Tener Rol de Fabricante');
                    }
                }else if ((!empty($this->IdFabricante)) && (!empty($this->IdTransportador))){
                    if ($usuario->IdRol != 4){
                        $this->addError('IdResponsable',
	                 'Responsable Debe Tener Rol de Transportador');
                    }                                        
                }
            }
        }
        
        public function validFabricanteCedi($attribute_name,$params){

	    if(!empty($this->IdFabricante) && !empty($this->IdCedi) && !empty($this->IdTransportador)){
                if ($this->getFabricanteCedi($this->IdFabricante, $this->IdCedi, $this->IdTransportador)){
                    $this->addError('IdTransportador',
	                 'Ya Tiene Un Transportador Asigando Para El CEDI Seleccionado');
                }
            }                          
	}
        
        public static function getFabricanteCedi ($_IdFab, $_IdCedi, $_IdTransp){

            $criteria=new CDbCriteria;
            $criteria->select='IdLogisticaFabricante';  // seleccionar solo la columna 'title'
            $criteria->addCondition('IdFabricante=:IdFab','AND');
            $criteria->addCondition('IdCedi=:IdCedi', 'AND');
            $criteria->addCondition('IdTransportador=:IdTransp');
            $criteria->params=array(':IdFab'=>$_IdFab,':IdCedi'=>$_IdCedi, ':IdTransp'=>$_IdTransp);
            
            $laLogistica = LogisticaFabricante::model()->find($criteria); // $params no es necesario            
            
            return $laLogistica;
            
        }                
}
