<?php

use yii\db\Migration;

/**
 * Class m181213_224558_create_table_Faculdade
 */
class m181213_224558_create_table_Faculdade extends Migration
{
    public function up()
    {
        $this->createTable('Faculdade', [
           'id' => $this->primaryKey()->notNull()->unsigned(),
           'nome' => $this->string(),
           'semestre' => $this->string(10),
           'parcela' => $this->string(10),
           'dataVencimento' => $this->dateTime(),
           'valor' => $this->double(),
           'dataPagamento' => $this->dateTime(),
           'valorPago' => $this->double(),
           'dataCriacao' => $this->dateTime(),
           'desconto' => $this->double(),
           'juros' => $this->double(),
        ]);

    }

    public function down()
    {
        $this->dropTable('Faculdade');
    }

}
