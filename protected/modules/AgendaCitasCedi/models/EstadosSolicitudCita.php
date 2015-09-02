<?php

/**
 * This is the model class for table "m_estadossolicitudcita".
 *
 * The followings are the available columns in table 'm_estadossolicitudcita':
 * @property integer $IdEstadoSolicitudCita
 * @property string $NombreEstadoSolicitudCita
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class EstadosSolicitudCita extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_EstadosSolicitudCita';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdEstadoSolicitudCita, NombreEstadoSolicitudCita, IdUsuarioGraba, FechaGraba, IdUsuarioModifica', 'required'),
			array('IdEstadoSolicitudCita, IdUsuarioGraba, IdUsuarioModifica', 'numerical', 'integerOnly'=>true),
			array('NombreEstadoSolicitudCita', 'length', 'max'=>45),
			array('FechaModifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdEstadoSolicitudCita, NombreEstadoSolicitudCita, IdUsuarioGraba, FechaGraba, IdUsuarioModifica, FechaModifica', 'safe', 'on'=>'search'),
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
			'IdEstadoSolicitudCita' => 'Id Estado Solicitud Cita',
			'NombreEstadoSolicitudCita' => 'Nombre Estado Solicitud Cita',
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

		$criteria->compare('IdEstadoSolicitudCita',$this->IdEstadoSolicitudCita);
		$criteria->compare('NombreEstadoSolicitudCita',$this->NombreEstadoSolicitudCita,true);
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
	 * @return EstadosSolicitudCita the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function listData() {
            $data = self::model()->findAll(array('order' => 'NombreEstadoSolicitudCita'));
            $lst = CHtml::listData($data, 'IdEstadoSolicitudCita', 'NombreEstadoSolicitudCita');
            return $lst;
        }   
        
        public static function getNombreEstadoSolicitudCita($_Id){

            $elNombre = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='NombreEstadoSolicitudCita';  // seleccionar solo la columna 'title'
            $criteria->condition='IdEstadoSolicitudCita=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elEstadoSolicitudCita = EstadosSolicitudCita::model()->find($criteria); // $params no es necesario            
            
            if ($elEstadoSolicitudCita != null){                
                $elNombre = $elEstadoSolicitudCita->NombreEstadoSolicitudCita;                
            }
            return $elNombre;
            
        }
        
}
