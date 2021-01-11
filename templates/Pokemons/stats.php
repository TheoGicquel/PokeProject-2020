<?php

use Cake\ORM\TableRegistry;
$pokemons = TableRegistry::getTableLocator()->get('pokemons');

//Obtention du poid moyen des pokemons de generation ?
$query = $pokemons->find();
$query->select(['averageWeight' => $query->func()->avg('weight')])->where(['generation' => 0]);
$averageWeight = $query->first();





//Obtention du nombre de pokemon fée cumulée des générations 2, 4, 5 et 6
$query = $pokemons->find()->Join('pokemon_types')->Join('types');
$query->select(['fairyNumber' => $query->func()->count('*')])
->where(['types.name' => 'fairy'])
->andwhere(['pokemon_types.type_id = types.id'])
->andwhere(['pokemons.id = pokemon_types.pokemon_id'])
->andwhere(['OR' => [['pokemons.generation' => 2], ['pokemons.generation' => 4], ['pokemons.generation' => 5], ['pokemons.generation' => 6]]]);
$fairyNumber = $query->first();





//Obtention des 10 premier pokemons qui possède la plus grande vitesse
$query = $pokemons->find()->Join('pokemon_stats')->Join('stats');
$query->select(['pokemon_stats.value', 'pokemons.name'])
->where(['stats.name' => 'speed'])
->andwhere(['pokemon_stats.stat_id = stats.id'])
->andwhere(['pokemons.id = pokemon_stats.pokemon_id'])
->order(['pokemon_stats.value' => 'DESC'])
->limit(10);
$fastestPokemon = $query->all();

?>
<div class="pokemons index content">
    <h4>Poids moyen des pokémons de la 4éme génération :</h4>
    <p><?= h($averageWeight->averageWeight) ?></p>

    <h4>Nombre de pokémons de type fée entre les générations 1, 3 et 7 (donc générations 2, 4, 5 et 6) :</h4>
    <p><?= h($fairyNumber->fairyNumber) ?></p>

    <?php $index = 1;

    foreach ($fastestPokemon as $pokemon) : ?>

        <tr>
            <th><?= $index ?></th>
            <th><?= h($pokemon->name) ?></td>
            <th><?= h($pokemon->pokemon_stats['value']) ?></th>
        </tr>
    
        <?php $index++;
    endforeach; ?>
</div>
