<?php

use yii\db\Migration;

/**
 * Class m190112_182231_create_metas
 */
class m190112_182231_create_metas extends Migration
{

    const CATEGORIA = 'Categoria';
    const Metas = 'Metas';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::CATEGORIA, [
           'id' => $this->primaryKey()->unsigned(),
           'nome' => $this->string()
        ]);


        $this->createTable(self::Metas, [
           'id' => $this->primaryKey()->unsigned()->notNull(),
           'idCategoria' => $this->integer()->unsigned(),
           'descricao' => $this->string(),
           'valorPrevisto' => $this->double(),
           'valorGasto' => $this->double(),
           'dataVencimento' => $this->date()->defaultValue(null),
           'status' => $this->integer()->defaultValue(0)
        ]);

        $this->addForeignKey('add_metas_categoria',self::Metas, 'idCategoria', self::CATEGORIA, 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('add_metas_categoria', self::Metas);
        $this->dropTable(self::Metas);
        $this->dropTable(self::CATEGORIA);

    }
}
