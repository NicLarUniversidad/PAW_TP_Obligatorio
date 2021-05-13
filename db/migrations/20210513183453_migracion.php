<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Migracion extends AbstractMigration
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
        $table = $this->table('medico');
        $table->addColumn('nombre', 'string')
            ->addColumn('apellido', 'string')
            ->addColumn('CUIT', 'string', ['null' => true])
            ->create();
        $table = $this->table('disponibilidad');
        $table->addColumn('id-medico', 'integer')
            ->addColumn('fecha', 'date')
            ->addForeignKey("id-medico","medico","id")
            ->create();
        $table = $this->table('turno');
        $table->addColumn('id-medico', 'integer')
            ->addColumn('nombre-paciente', 'string')
            ->addColumn('apellido-paciente', 'string')
            ->addColumn('tel-paciente', 'string', ['null' => true])
            ->addColumn('edad-paciente', 'string', ['null' => true])
            ->addColumn('horario-turno', 'date')
            ->addForeignKey("id-medico","medico","id")
            ->create();
        $table = $this->table('obra-social');
        $table->addColumn('nombre', 'string')
            ->create();
    }
}
