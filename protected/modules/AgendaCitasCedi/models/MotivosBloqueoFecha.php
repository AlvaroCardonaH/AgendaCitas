<?php

/**
 * This is the model class for table "m_motivosbloqueofecha".
 *
 * The followings are the available columns in table 'm_motivosbloqueofecha':
 * @property integer $IdMotivoBloqueo
 * @property string $DescripcionMotivoBloqueo
 * @property string $ObservacionesMotivoBloqueo
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class MotivosBloqueoFecha extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_MotivosBloqueoFecha';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('DescripcionMotivoBloqueo', 'required'),
			array('DescripcionMotivoBloqueo', 'length', 'max'=>45),
			array('ObservacionesMotivoBloqueo', 'length', 'max'=>255),
                        array('DescripcionMotivoBloqueo','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Descripción de Motivo Ya Existe'
                        ),                                                            
			array('FechaModifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdMotivoBloqueo, DescripcionMotivoBloqueo, ObservacionesMotivoBloqueo', 'safe', 'on'=>'search'),
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
                    'fechasbloqueadas' => array(self::HAS_MANY, 'FechasBloqueadas', 'IdMotivoBloqueo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdMotivoBloqueo' => 'ID',
			'DescripcionMotivoBloqueo' => 'Descripcion',
			'ObservacionesMotivoBloqueo' => 'Observaciones',
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

		$criteria->compare('IdMotivoBloqueo',$this->IdMotivoBloqueo);
		$criteria->compare('DescripcionMotivoBloqueo',$this->DescripcionMotivoBloqueo,true);
		$criteria->compare('ObservacionesMotivoBloqueo',$this->ObservacionesMotivoBloqueo,true);
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
	 * @return MotivosBloqueoFecha the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function listData() {
            $data = self::model()->findAll(array('order' => 'DescripcionMotivoBloqueo'));
            $lst = CHtml::listData($data, 'IdMotivoBloqueo', 'DescripcionMotivoBloqueo');
            return $lst;
        }   
        
        public static function getDescripcionMotivo ($_Id){

            $laDescripcion = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='DescripcionMotivoBloqueo';  // seleccionar solo la columna 'title'
            $criteria->condition='IdMotivoBloqueo=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elMotivoBloqueo = MotivosBloqueoFecha::model()->find($criteria); // $params no es necesario            
            
            if ($elMotivoBloqueo != null){                
                $laDescripcion = $elMotivoBloqueo->Nombre;                
            }
            return $laDescripcion;
            
        }
        
}
