<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class RemoveSpritesFromPokemons extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('pokemons');
        $table->removeColumn('default_front_sprite_url')->save();
        $table->removeColumn('default_back_sprite_url')->save();
        $table->removeColumn('default_shiny_sprite_url')->save();
              
    }

}
