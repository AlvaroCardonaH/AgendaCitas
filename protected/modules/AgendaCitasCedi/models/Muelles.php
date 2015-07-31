<?php

/**
 * This is the model class for table "m_muelles".
 *
 * The followings are the available columns in table 'm_muelles':
 * @property integer $IdMuelle
 * @property string $NombreMuelle
 * @property string $ObservacionesMuelle
 * @property integer $IdCedi
 * @property integer $IdTipoFabricante
 * @property integer $IdTipoMuelle
 * @property integer $IdEstadoRegistro
 * @property integer $MinimoPiezas
 * @property integer $MaximoPiezas
 * @property string $HoraAlmuerzo
 * @property string $HoraRefrigerioAM
 * @property string $HoraRefrigerioPM
 * @property string $HorarioNormalAperturaSemana
 * @property string $HorarioNormalCierreSemana
 * @property string $HorarioExtendidoAperturaSemana
 * @property string $HorarioExtendidoCierreSemana
 * @property string $HorarioNormalAperturaSabado
 * @property string $HorarioNormalCierreSabado
 * @property string $HorarioExtendidoAperturaSabado
 * @property string $HorarioExtendidoCierreSabado
 * @property integer $IdUsuarioGraba
 * @property string $FechaGraba
 * @property integer $IdUsuarioModifica
 * @property string $FechaModifica
 *
 * The followings are the available model relations:
 * @property MCedis $idCedi
 * @property MEstadosregistro $idEstadoRegistro
 * @property MTiposfabricante $idTipoFabricante
 * @property MTiposmuelle $idTipoMuelle
 */
class Muelles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_Muelles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreMuelle, IdCedi, IdTipoMuelle, IdEstadoRegistro, HoraAlmuerzo, '
                            . 'HoraRefrigerioAM, HoraRefrigerioPM, HorarioNormalAperturaSemana, '
                            . 'HorarioNormalCierreSemana, HorarioExtendidoAperturaSemana, '
                            . 'HorarioNormalAperturaSabado, HorarioNormalCierreSabado, '
                            . 'HorarioExtendidoAperturaSabado, HorarioExtendidoCierreSabado', 'required', 
                            'message' => '{attribute} no puede estar vac&iacute;o'),
			array('IdCedi, IdTipoFabricante, IdTipoMuelle, IdEstadoRegistro, MinimoPiezas, '
                            . 'MaximoPiezas', 'numerical', 'integerOnly'=>true),
			array('NombreMuelle', 'length', 'max'=>45),
			array('ObservacionesMuelle', 'length', 'max'=>255),
			array('HoraAlmuerzo, HoraRefrigerioAM, HoraRefrigerioPM, HorarioNormalAperturaSemana, '
                            . 'HorarioNormalCierreSemana, HorarioExtendidoAperturaSemana, '
                            . 'HorarioExtendidoCierreSemana, HorarioNormalAperturaSabado, '
                            . 'HorarioNormalCierreSabado, HorarioExtendidoAperturaSabado, '
                            . 'HorarioExtendidoCierreSabado', 'type', 'type'=>'time', 'timeFormat'=>'hh:mm'),
			array('HoraAlmuerzo, HoraRefrigerioAM, HoraRefrigerioPM, HorarioNormalAperturaSemana, '
                            . 'HorarioNormalCierreSemana, HorarioExtendidoAperturaSemana, '
                            . 'HorarioExtendidoCierreSemana, HorarioNormalAperturaSabado, '
                            . 'HorarioNormalCierreSabado, HorarioExtendidoAperturaSabado, '
                            . 'HorarioExtendidoCierreSabado', 'validateHourChange'),                    
                        array('HorarioNormalCierreSemana, HorarioExtendidoCierreSemana, '
                            . 'HorarioNormalCierreSabado, HorarioExtendidoCierreSabado', 'validateHourCierre'),    
                        array('MaximoPiezas', 'compare', 'compareAttribute'=>'MinimoPiezas', 'operator'=>'>'),
                        array('HoraRefrigerioAM', 'compare', 'compareAttribute'=>'HoraAlmuerzo', 'operator'=>'<'),
                        array('HoraRefrigerioPM', 'compare', 'compareAttribute'=>'HoraAlmuerzo', 'operator'=>'>'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdMuelle, NombreMuelle, ObservacionesMuelle, IdCedi, IdTipoFabricante, '
                            . 'IdTipoMuelle, IdEstadoRegistro, MinimoPiezas, MaximoPiezas, '
                            . 'HoraAlmuerzo, HoraRefrigerioAM, HoraRefrigerioPM, '
                            . 'HorarioNormalAperturaSemana, HorarioNormalCierreSemana, '
                            . 'HorarioExtendidoAperturaSemana, HorarioExtendidoCierreSemana, '
                            . 'HorarioNormalAperturaSabado, HorarioNormalCierreSabado, '
                            . 'HorarioExtendidoAperturaSabado, HorarioExtendidoCierreSabado', 
                            'safe', 'on'=>'search'),
		);
	}

        public function validateHourChange($attribute, $params) {
            
            $hora = $attribute;
            
            if (($hora == '00:00')) {
                $this->addError($hora, 'Falta Definir Hora');
            }            
        }
        
        public function validateHourCierre($attribute, $params) {
            
            $horaCierre = $attribute;
            
            if (($horaCierre == 'HorarioNormalCierreSemana') || 
                ($horaCierre == 'HorarioExtendidoCierreSemana') ||
                ($horaCierre == 'HorarioNormalCierreSabado') ||
                ($horaCierre == 'HorarioExtendidoCierreSabado')){
                $horaApertura = str_replace("Cierre", "Apertura", $horaCierre);
                if ($this->$horaApertura >= $this->$horaCierre) {
                    $this->addError($horaCierre, 'Hora de cierre debe ser mayor a hora de apertura');
                }    
            } else {
                 $this->addError($attribute, 'Validaci&oacute;n incorrecta.');
            }            
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
			'estadoregistro' => array(self::BELONGS_TO, 'EstadosRegistro', 'IdEstadoRegistro'),
			'fabricante' => array(self::BELONGS_TO, 'TiposFabricante', 'IdTipoFabricante'),
			'tipomuelle' => array(self::BELONGS_TO, 'TiposMuelle', 'IdTipoMuelle'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdMuelle' => 'ID',
			'NombreMuelle' => 'Nombre',
			'ObservacionesMuelle' => 'Observaciones',
			'IdCedi' => 'CEDI',
			'IdTipoFabricante' => 'Tipo Fabricante',
			'IdTipoMuelle' => 'Tipo Muelle',
			'IdEstadoRegistro' => 'Estado Registro',
			'MinimoPiezas' => 'Minimo Piezas',
			'MaximoPiezas' => 'Maximo Piezas',
			'HoraAlmuerzo' => 'Hora Almuerzo',
			'HoraRefrigerioAM' => 'Hora Refrigerio AM',
			'HoraRefrigerioPM' => 'Hora Refrigerio PM',
			'HorarioNormalAperturaSemana' => 'Horario Normal Apertura Semana',
			'HorarioNormalCierreSemana' => 'Horario Normal Cierre Semana',
			'HorarioExtendidoAperturaSemana' => 'Horario Extendido Apertura Semana',
			'HorarioExtendidoCierreSemana' => 'Horario Extendido Cierre Semana',
			'HorarioNormalAperturaSabado' => 'Horario Normal Apertura Sabado',
			'HorarioNormalCierreSabado' => 'Horario Normal Cierre Sabado',
			'HorarioExtendidoAperturaSabado' => 'Horario Extendido Apertura Sabado',
			'HorarioExtendidoCierreSabado' => 'Horario Extendido Cierre Sabado',
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

		$criteria->compare('IdMuelle',$this->IdMuelle);
		$criteria->compare('NombreMuelle',$this->NombreMuelle,true);
		$criteria->compare('ObservacionesMuelle',$this->ObservacionesMuelle,true);
		$criteria->compare('IdCedi',$this->IdCedi);
		$criteria->compare('IdTipoFabricante',$this->IdTipoFabricante);
		$criteria->compare('IdTipoMuelle',$this->IdTipoMuelle);
		$criteria->compare('IdEstadoRegistro',$this->IdEstadoRegistro);
		$criteria->compare('MinimoPiezas',$this->MinimoPiezas);
		$criteria->compare('MaximoPiezas',$this->MaximoPiezas);
		$criteria->compare('HoraAlmuerzo',$this->HoraAlmuerzo,true);
		$criteria->compare('HoraRefrigerioAM',$this->HoraRefrigerioAM,true);
		$criteria->compare('HoraRefrigerioPM',$this->HoraRefrigerioPM,true);
		$criteria->compare('HorarioNormalAperturaSemana',$this->HorarioNormalAperturaSemana,true);
		$criteria->compare('HorarioNormalCierreSemana',$this->HorarioNormalCierreSemana,true);
		$criteria->compare('HorarioExtendidoAperturaSemana',$this->HorarioExtendidoAperturaSemana,true);
		$criteria->compare('HorarioExtendidoCierreSemana',$this->HorarioExtendidoCierreSemana,true);
		$criteria->compare('HorarioNormalAperturaSabado',$this->HorarioNormalAperturaSabado,true);
		$criteria->compare('HorarioNormalCierreSabado',$this->HorarioNormalCierreSabado,true);
		$criteria->compare('HorarioExtendidoAperturaSabado',$this->HorarioExtendidoAperturaSabado,true);
		$criteria->compare('HorarioExtendidoCierreSabado',$this->HorarioExtendidoCierreSabado,true);
		$criteria->compare('IdUsuarioGraba',$this->IdUsuarioGraba);
		$criteria->compare('FechaGraba',$this->FechaGraba,true);
		$criteria->compare('IdUsuarioModifica',$this->IdUsuarioModifica);
		$criteria->compare('FechaModifica',$this->FechaModifica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
	public function search_cedi($_IdCedi)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                $criteria->condition='IdCedi='. $_IdCedi; 

                return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
        }        
        

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Muelles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * Retorna lista de muelles para lista desplegable
         * @return lista de muelles (id, nombre)
         */
        public static function listData() {
            $data = self::model()->findAll(array('order' => 'NombreMuelle'));
            $lst = CHtml::listData($data, 'IdMuelle', 'NombreMuelle');
            return $lst;
        }   
        
        public static function  getListaMuelles($_IdCedi){

            $muelles = Muelles::model()->findAll(
                        array(
                                  'select'=>'IdMuelle, NombreMuelle ',
                            
                                  'condition' => 'IdCedi = :IdCedi',
                                  'params'    => array(':IdCedi' => $_IdCedi),
                        )
                    );

            $listamuelles = array();

            foreach ($muelles as $reg){ 
                $listamuelles[$reg->IdMuelle] = $reg->NombreMuelle;
            }

            return $listamuelles;
        }
        
        public static function getNombreMuelle ($_Id){

            $elNombreMuelle = '';
            
            $criteria=new CDbCriteria;
            $criteria->select='NombreMuelle';  // seleccionar solo la columna 'title'
            $criteria->condition='IdMuelle=:Id';
            $criteria->params=array(':Id'=>$_Id);
            
            $elMuelle = Muelles::model()->find($criteria); // $params no es necesario            
            
            if ($elMuelle != null){                
                $elNombreMuelle = $elMuelle->NombreMuelle;                
            }
            return $elNombreMuelle;
            
        }
        
}
