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
        $table->addColumn('id_medico', 'integer')
            ->addColumn('fecha', 'date')
            ->addForeignKey("id_medico","medico","id")
            ->create();
        $table = $this->table('turno');
        $table->addColumn('id_medico', 'integer')
            ->addColumn('nombre_paciente', 'string')
            ->addColumn('apellido_paciente', 'string')
            ->addColumn('tel_paciente', 'string', ['null' => true])
            ->addColumn('edad_paciente', 'string', ['null' => true])
            ->addColumn('horario_turno', 'date')
            ->addForeignKey("id_medico","medico","id")
            ->create();
        $table = $this->table('obra_social');
        $table->addColumn('nombre', 'string')
            ->create();
    }
}
