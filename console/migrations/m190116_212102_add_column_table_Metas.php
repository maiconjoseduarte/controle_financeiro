<?php

use yii\db\Migration;

/**
 * Class m190116_212102_add_column_table_Metas
 */
class m190116_212102_add_column_table_Metas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\frontend\models\Metas::tableName(),'observacoes', $this->string(255));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(\frontend\models\Metas::tableName(), 'observacoes');
    }
}
