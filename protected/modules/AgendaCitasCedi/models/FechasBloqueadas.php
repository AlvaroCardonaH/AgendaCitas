<?php

/**
 * This is the model class for table "m_fechasbloqueadas".
 *
 * The followings are the available columns in table 'm_fechasbloqueadas':
 * @property integer $IdFechaBloqueada
 * @property string $IdCedi
 * @property string $Fecha 
 * @property string $IdMuelle
 * @property string $HoraInicio
 * @property string $HoraFinal
 * @property integer $IdMotivoBloqueo
 * @property string $ObservacionesBloqueo
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 *
 * The followings are the available model relations:
 * @property MMotivosbloqueofecha $idMotivoBloqueo
 */
class FechasBloqueadas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_FechasBloqueadas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Fecha, IdMotivoBloqueo, ObservacionesBloqueo, HoraInicio, HoraFinal', 'required'),
			array('IdMotivoBloqueo, IdCedi, IdMuelle', 'numerical', 'integerOnly'=>true),
			array('HoraInicio, HoraFinal', 'length', 'max'=>10),
			array('ObservacionesBloqueo', 'length', 'max'=>255),
                        array('IdMuelle', 'validarExisteCedi'),
                        array('HoraFinal', 'validarDatosBloqueo'),
                        array('HoraFinal', 'compare', 'compareAttribute'=>'HoraInicio', 'operator'=>'>'),
			array('FechaModifica', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdFechaBloqueada, IdCedi, IdMuelle, Fecha, HoraInicio, HoraFinal, IdMotivoBloqueo, ObservacionesBloqueo', 'safe', 'on'=>'search'),
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
                    'motivobloqueo' => array(self::BELONGS_TO, 'MotivosBloqueoFecha', 'IdMotivoBloqueo'),
                    'cedi' => array(self::BELONGS_TO, 'Cedi', 'IdCedi'),
                    'muelle' => array(self::BELONGS_TO, 'Muelles', 'IdMuelle'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdFechaBloqueada' => 'ID',
			'Fecha' => 'Fecha',
                        'IdCedi' => 'Cedi',
                        'IdMuelle' => 'Muelle',
			'HoraInicio' => 'Hora Inicio',
			'HoraFinal' => 'Hora Final',
			'IdMotivoBloqueo' => 'Motivo Bloqueo',
			'ObservacionesBloqueo' => 'Observaciones',
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

		$criteria->compare('IdFechaBloqueada',$this->IdFechaBloqueada);
		$criteria->compare('Fecha',$this->Fecha,true);
                $criteria->compare('IdCedi',$this->IdCedi,true);
                $criteria->compare('IdMuelle',$this->IdMuelle,true);
		$criteria->compare('HoraInicio',$this->HoraInicio,true);
		$criteria->compare('HoraFinal',$this->HoraFinal,true);
		$criteria->compare('IdMotivoBloqueo',$this->IdMotivoBloqueo);
		$criteria->compare('ObservacionesBloqueo',$this->ObservacionesBloqueo,true);
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
	 * @return FechasBloqueadas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function validarExisteCedi($attribute_name,$params){
            
            if (!empty($this->IdMuelle) && empty($this->IdCedi)){
                $this->addError('ObservacionesBloqueo','Falta Especificar CEDI');                            
            }
        }
        
        public function validarDatosBloqueo($attribute_name,$params){
            
            $elMensaje = null;            
                        
            if (!empty($this->Fecha) && !empty($this->HoraInicio) && !empty($this->HoraFinal)){
                
                $bloqueosfecha = $this->getDatosBloqueoFecha($this->Fecha);
                
                foreach ($bloqueosfecha as $reg){
            
                    $horaexiste = false;
                    $horamodifica = false;
                    
                    // Validar Rango de Horas
                    if (($reg->HoraInicio <= $this->HoraInicio) &&
                        ($reg->HoraFinal >= $this->HoraFinal)){
                        $horaexiste = true;
                    }else{
                        if (($reg->HoraInicio >= $this->HoraInicio) &&
                            ($reg->HoraInicio <= $this->HoraFinal)){
                            $horamodifica = true;
                        }else{
                            if (($reg->HoraFinal >= $this->HoraInicio) &&
                                ($reg->HoraFinal <= $this->HoraFinal)){
                                $horamodifica = true;
                            }
                        }
                    } // Fin validar rango de horas
                    
                    if (($reg->IdFechaBloqueada != $this->IdFechaBloqueada)){
                        if(empty($reg->IdCedi)){
                            if ($horaexiste || $horamodifica){
                                $elMensaje = 'Ya Esta Registrada La Novedad a Nivel de Fecha';                        
                            }
                        }else{
                            if (empty($reg->IdMuelle)){
                                if ($horaexiste || $horamodifica){
                                    $elMensaje = 'Ya Esta Registrada La Novedad a Nivel de CEDI';
                                }
                            }else{
                                if ($reg->IdMuelle == $this->IdMuelle){
                                    if ($horaexiste || $horamodifica){
                                        $elMensaje = 'Ya Esta Registrada La Novedad a Nivel de MUELLE';
                                    }                                    
                                }
                            }
                        }
                    }
                    
                } // Ciclo foreach
                
            } // Valida existen datos
            

            if ($elMensaje){
                $this->addError('ObservacionesBloqueo',$elMensaje);
            }    
            
	} // fin metodo 
        
        public static function getDatosBloqueoFecha ($_Fecha){

            $losdatosbloqueo = FechasBloqueadas::model()->findAll(
                  array(
                      'select'    => '*',
                      'condition' => 'Fecha = :laFecha',
                      'params'    => array(':laFecha' => $_Fecha),
                  )
              );            
            
            return $losdatosbloqueo;
            
        }
        
                
}
