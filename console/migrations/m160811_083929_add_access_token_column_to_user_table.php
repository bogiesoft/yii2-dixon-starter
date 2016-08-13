<?php

use yii\db\Migration;

/**
 * Handles adding access_token to table `user`.
 */
class m160811_083929_add_access_token_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'access_token', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'access_token');
    }
}
