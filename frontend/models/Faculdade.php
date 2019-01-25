<?php

namespace frontend\models;

use phpDocumentor\Reflection\Types\Self_;
use Yii;

/**
 * This is the model class for table "Faculdade".
 *
 * @property int $id
 * @property string $nome
 * @property string $semestre
 * @property string $parcela
 * @property string $dataVencimento
 * @property double $valor
 * @property string $dataPagamento
 * @property double $valorPago
 * @property string $dataCriacao
 * @property double $desconto
 * @property double $juros
 */
class Faculdade extends \yii\db\ActiveRecord
{
    // Nomes

    const MAICON = 1;
    const MONICA = 2;

    public static $NOMES = [
        self::MAICON => 'Maicon',
        self::MONICA => 'Monica',
    ];

    public static $SEMESTRE = [
        1 => '2017/1',
        2 => '2017/2',
        3 => '2018/1',
        4 => '2018/2',
        5 => '2019/1',
        6 => '2019/2',
        7 => '2020/1',
        8 => '2020/2',
    ];

//    const P1 = '1';
//    const P2 = '2';
//    const P3 = '3';
//    const P4 = '4';
//    const P5 = '5';
//    const P6 = '6';
//    const P7 = '7';
//
//    public static $SEMESTRE = [
//        self::P1 => '1ª Semestre',
//        self::P2 => '2ª Semestre',
//        self::P3 => '3ª Semestre',
//        self::P4 => '4ª Semestre',
//        self::P5 => '5ª Semestre',
//        self::P6 => '6ª Semestre',
//        self::P7 => '7ª Semestre',
//    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Faculdade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['semestre', 'parcela'], 'string', 'max' => 10],
            [['dataVencimento', 'dataPagamento', 'dataCriacao'], 'safe'],
            [['valor', 'valorPago', 'desconto', 'juros'], 'number'],
            [['nome'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'semestre' => 'Semestre',
            'parcela' => 'Parcela',
            'dataVencimento' => 'Data Vencimento',
            'valor' => 'Valor',
            'dataPagamento' => 'Data Pagamento',
            'valorPago' => 'Valor Pago',
            'dataCriacao' => 'Data Criacao',
            'desconto' => 'Desconto',
            'juros' => 'Juros',
        ];
    }

    /**
     * Calcula descontos ou juros pagos
     */
    public function calcula()
    {
        if ($this->valorPago < $this->valor) {
            $this->desconto = $this->valor - $this->valorPago;
        } else if ($this->valorPago > $this->valor) {
            $this->juros = $this->valorPago - $this->valor;
        }
    }
}
