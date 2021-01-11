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
                            <?php if (!empty($pokemon->pokemon_types)) : ?>
                                <?php foreach ($pokemon->pokemon_types as $pokemonTypes) : ?>
                                    <span class="rounded-pill bg-secondary text-white mr-3 px-3 py-2 "><?= h($nameOfType[$pokemonTypes->type_id]) ?></span>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        <table>
                        <tr>
                            <th><?= __('Name Stats') ?></th>
                            <th><?= __('Value') ?></th>
                        </tr>
                        <?php foreach ($pokemon->pokemon_stats as $pokemonStats) : ?>
                        <tr>
                            <td>
                                <?php //Affichage du bon nom en fonction de l'id stats
                                    $statAffichage=$pokemonStats->stat_id;
                                    if($statAffichage==1){
                                        echo "Hp";
                                    }elseif($statAffichage==2){
                                        echo "Attack";
                                    }elseif($statAffichage==3){
                                        echo "Defense";
                                    }elseif($statAffichage==4){
                                        echo "special-attack";
                                    }elseif($statAffichage==5){
                                        echo "special-defense";
                                    }elseif($statAffichage==6){
                                        echo "speed";
                                    }else{
                                        echo"Stats non reconnu";
                                    }
                                ?>
                            </td>
                            <td><?= h($pokemonStats->value) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                        </div>
                    </div>
                </div>
                <!-- carousel -->
                <div class="row">
                <div class="col-sm-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="<?= h($pokemon->default_front_sprite_url) ?>" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="<?= h($pokemon->default_back_sprite_url) ?>" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="<?= h($pokemon->shiny_front_sprite_url) ?>" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                </div>
            </div> <!-- /container -->
        </div> <!-- pokemons view content -->
    </div><!-- column 80 -->
</div> <!-- main row -->
