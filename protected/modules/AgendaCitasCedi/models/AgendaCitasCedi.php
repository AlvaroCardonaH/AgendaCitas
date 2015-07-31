<?php

/**
 * This is the model class for table "t_agendacitascedi".
 *
 * The followings are the available columns in table 't_agendacitascedi':
 * @property integer $IdEventoAgenda
 * @property integer $IdMuelle
 * @property string $TituloEvento
 * @property string $FechaInicio
 * @property string $FechaFinal
 * @property string $ObservacionesEvento
 * @property integer $IdusuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class AgendaCitasCedi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AgendaCitasCedi the static model class
	 */
    
         public $FechaSolicitudCita;
         public $HoraSolicitudCita;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_agendacitascedi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdMuelle, FechaSolicitudCita, HoraSolicitudCita', 'required'),
			array('IdMuelle', 'numerical', 'integerOnly'=>true),
			array('TituloEvento', 'length', 'max'=>45),
			array('ObservacionesEvento', 'length', 'max'=>255),
			array('FechaFinal, FechaGraba, FechaModifica', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('IdEventoAgenda, IdMuelle, TituloEvento, FechaInicio, FechaFinal, ObservacionesEvento, IdusuarioGraba, FechaGraba, IdUsuarioModifica, FechaModifica', 'safe', 'on'=>'search'),
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
			'IdEventoAgenda' => 'Id Evento Agenda',
			'IdMuelle' => 'Id Muelle',
			'TituloEvento' => 'Titulo Evento',
			'FechaInicio' => 'Fecha Inicio',
			'FechaFinal' => 'Fecha Final',
			'ObservacionesEvento' => 'Observaciones Evento',
			'IdusuarioGraba' => 'Idusuario Graba',
			'FechaGraba' => 'Fecha Graba',
			'IdUsuarioModifica' => 'Id Usuario Modifica',
			'FechaModifica' => 'Fecha Modifica',
                        'FechaSolicitudCita'=>'Fecha Solicitud',
                        'HoraSolicitudCita'=>'Hora Solicitud',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('IdEventoAgenda',$this->IdEventoAgenda);
		$criteria->compare('IdMuelle',$this->IdMuelle);
		$criteria->compare('TituloEvento',$this->TituloEvento,true);
		$criteria->compare('FechaInicio',$this->FechaInicio,true);
		$criteria->compare('FechaFinal',$this->FechaFinal,true);
		$criteria->compare('ObservacionesEvento',$this->ObservacionesEvento,true);
		$criteria->compare('IdusuarioGraba',$this->IdusuarioGraba);
		$criteria->compare('FechaGraba',$this->FechaGraba,true);
		$criteria->compare('IdUsuarioModifica',$this->IdUsuarioModifica);
		$criteria->compare('FechaModifica',$this->FechaModifica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}