<?php

use Cake\ORM\TableRegistry;
$pokemons = TableRegistry::getTableLocator()->get('pokemons');

//Obtention du poid moyen des pokemons de generation ?
$query = $pokemons->find();
$query->select(['averageWeight' => $query->func()->avg('weight')])->where(['generation' => 0]);
$averageWeight = $query->first();

?>
<div class="pokemons index content">
    <p><?= h($averageWeight->averageWeight) ?></p>
</div>
