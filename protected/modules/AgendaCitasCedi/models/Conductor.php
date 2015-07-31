<?php

/**
 * This is the model class for table "m_conductor".
 *
 * The followings are the available columns in table 'm_conductor':
 * @property integer $IdConductor
 * @property integer $NumeroDocumento
 * @property string $PrimerNombre
 * @property string $SegundoNombre
 * @property string $PrimerApellido
 * @property string $SegundoApellido
 * @property string $EmailConductor
 * @property string $Telefono1
 * @property string $Telefono2
 * @property integer $IdEstadoRegistro
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 */
class Conductor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_Conductor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NumeroDocumento, PrimerNombre, PrimerApellido', 'required'),
			array('NumeroDocumento, IdEstadoRegistro, IdConductor', 'numerical', 'integerOnly'=>true),
			array('PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, Telefono1, Telefono2', 'length', 'max'=>15),
			array('EmailConductor', 'length', 'max'=>80),
                        array('NumeroDocumento','unique',
                                'caseSensitive'=>true,
                                'allowEmpty'=>true,  
                                'message'=>'Número Documento Ya Existe'
                        ),                      
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdConductor, NumeroDocumento, PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, EmailConductor, Telefono1, Telefono2, IdEstadoRegistro, IdUsuarioGraba, FechaGraba, IdUsuarioModifica, FechaModifica', 'safe', 'on'=>'search'),
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
			'IdConductor' => 'ID',
			'NumeroDocumento' => 'Número Documento',
			'PrimerNombre' => 'Primer Nombre',
			'SegundoNombre' => 'Segundo Nombre',
			'PrimerApellido' => 'Primer Apellido',
			'SegundoApellido' => 'Segundo Apellido',
			'EmailConductor' => 'Email',
			'Telefono1' => 'Telefono 1',
			'Telefono2' => 'Telefono 2',
			'IdEstadoRegistro' => 'Estado',
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

		$criteria->compare('IdConductor',$this->IdConductor);
		$criteria->compare('NumeroDocumento',$this->NumeroDocumento);
		$criteria->compare('PrimerNombre',$this->PrimerNombre,true);
		$criteria->compare('SegundoNombre',$this->SegundoNombre,true);
		$criteria->compare('PrimerApellido',$this->PrimerApellido,true);
		$criteria->compare('SegundoApellido',$this->SegundoApellido,true);
		$criteria->compare('EmailConductor',$this->EmailConductor,true);
		$criteria->compare('Telefono1',$this->Telefono1,true);
		$criteria->compare('Telefono2',$this->Telefono2,true);
		$criteria->compare('IdEstadoRegistro',$this->IdEstadoRegistro);
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
	 * @return Conductor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
	public static function getConductores()
	{
            $conductores = Conductor::model()->findAll(
                        array(
                                  'select'=>'IdConductor, PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido ',
                                  'condition'=>''
                        )
                    );

            $listaConductores = array();

            foreach ($conductores as $reg){ 
                $listaConductores[$reg->IdConductor] = $reg->PrimerNombre . ' ' . $reg->SegundoNombre . ' ' . $reg->PrimerApellido . ' ' . $reg->SegundoApellido;
            }

            return $listaConductores;
            
	}
        
        public static function getConductor($_Id)
        {
            $criteria=new CDbCriteria;
            $criteria->select='CO.*';  // seleccionar solo la columna 
            $criteria->alias='CO';
            $criteria->condition='IdConductor=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elConductor = Conductor::model()->find($criteria); // $params no es necesario            
            
            return $elConductor;
        }

        public static function getNombreConductor ($_Id){

            $nombreConductor = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido ';  // seleccionar solo la columna 
            $criteria->condition='IdConductor=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elConductor = Conductor::model()->find($criteria); // $params no es necesario            
            
            if ($elConductor != null){                
                $nombreConductor = $elConductor->PrimerNombre.' '.$elConductor->SegundoNombre.' '.$elConductor->PrimerApellido.' '.$elConductor->SegundoApellido;                
            }
            return $nombreConductor;
            
        }
        
}
