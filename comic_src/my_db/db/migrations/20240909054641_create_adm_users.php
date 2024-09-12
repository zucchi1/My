<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateAdmUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table("adm_admin_users");
        $table
            ->addColumn('mail_address', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
            // 'created_at' カラムを追加 (デフォルトで現在の日時を設定)
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false
            ])

            // 'updated_at' カラムを追加 (デフォルトで現在の日時を設定し、更新時に自動更新)
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
                'null' => false
            ])
            ->create();
    }
}
