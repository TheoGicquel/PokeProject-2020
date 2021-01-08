<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(__('Delete Pokemon'), ['action' => 'delete', $pokemon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemon->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pokemons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pokemons view content">
            <div class="container">
                <div class="row"><!-- nouvelle maquette -->
                    <div class="col-sm-6">
                        <!-- !TODO creer un nouveau style css -->
                        <img class="img-thumbnail" style="object-fit: cover;width:100%;height:100%;max-height:none" src="<?= h($pokemon->default_front_sprite_url) ?>" alt="default sprite">     
                    </div>
                    <div class="col-sm-6 table-responsive">
                        <h3><?= h($pokemon->name) ?></h3>
                        <span class="rounded-pill bg-secondary text-white mr-3 px-3 py-2">type1</span><span class="rounded-pill bg-secondary text-white mr-3 px-3 py-2">type2</span>
                            <table>
                                <tr>
                                    <th>HP</th>
                                    <th>?</th>
                                </tr>
                                <tr>
                                    <th>Defense</th>
                                    <th>?</th>
                                </tr>
                                <tr>
                                    <th>Attack</th>
                                    <th>?</th>
                                </tr>
                                <tr>
                                    <th>Special Attack</th>
                                    <th>?</th>
                                </tr>
                                <tr>
                                    <th>Special Defense</th>
                                    <th>?</th>
                                </tr>
                                <tr>
                                    <th>Speed</th>
                                    <th>?</th>
                                </tr>


                            </table>
                        </div>
                    </div>
                </div>
                <!-- carousel -->
                <div class="row">
                </div>
<!-- 
                <div class="row"><!-- page originale --><!-- 
                    <h3><?= h($pokemon->name) ?></h3>
                    <table>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($pokemon->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Default Front Sprite Url') ?></th>
                            <td><?= h($pokemon->default_front_sprite_url) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <td><?= $this->Number->format($pokemon->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Height') ?></th>
                            <td><?= $this->Number->format($pokemon->height) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Weight') ?></th>
                            <td><?= $this->Number->format($pokemon->weight) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Pokedex Number') ?></th>
                            <td><?= $this->Number->format($pokemon->pokedex_number) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= h($pokemon->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified') ?></th>
                            <td><?= h($pokemon->modified) ?></td>
                        </tr>
                    </table>
                    <div class="related">
                        <h4><?= __('Related Pokemon Stats') ?></h4>
                        <?php if (!empty($pokemon->pokemon_stats)) : ?>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Pokemon Id') ?></th>
                                    <th><?= __('Stat Id') ?></th>
                                    <th><?= __('Value') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($pokemon->pokemon_stats as $pokemonStats) : ?>
                                <tr>
                                    <td><?= h($pokemonStats->id) ?></td>
                                    <td><?= h($pokemonStats->pokemon_id) ?></td>
                                    <td><?= h($pokemonStats->stat_id) ?></td>
                                    <td><?= h($pokemonStats->value) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'PokemonStats', 'action' => 'view', $pokemonStats->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'PokemonStats', 'action' => 'edit', $pokemonStats->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'PokemonStats', 'action' => 'delete', $pokemonStats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonStats->id)]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="related">
                        <h4><?= __('Related Pokemon Types') ?></h4>
                        <?php if (!empty($pokemon->pokemon_types)) : ?>
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Pokemon Id') ?></th>
                                    <th><?= __('Type Id') ?></th>
                                    <th><?= __('Created') ?></th>
                                    <th><?= __('Modified') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($pokemon->pokemon_types as $pokemonTypes) : ?>
                                <tr>
                                    <td><?= h($pokemonTypes->id) ?></td>
                                    <td><?= h($pokemonTypes->pokemon_id) ?></td>
                                    <td><?= h($pokemonTypes->type_id) ?></td>
                                    <td><?= h($pokemonTypes->created) ?></td>
                                    <td><?= h($pokemonTypes->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'PokemonTypes', 'action' => 'view', $pokemonTypes->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'PokemonTypes', 'action' => 'edit', $pokemonTypes->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'PokemonTypes', 'action' => 'delete', $pokemonTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pokemonTypes->id)]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        <?php endif; ?>
                    </div>            
                </div><!-- Fin page originale -->
            
            </div> <!-- /container -->
        </div> <!-- pokemons view content -->
    </div><!-- column 80 -->
</div> <!-- main row -->
