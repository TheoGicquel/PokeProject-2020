<?php

use Cake\ORM\TableRegistry;
$pokemons = TableRegistry::getTableLocator()->get('pokemons');


//Obtention du poid moyen des pokemons de generation ?
$query = $pokemons->find();
$query->select(['averageWeight' => $query->func()->avg('weight')])->where(['generation' => 4]);
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
$fastestPokemons = $query->all();

?>




<!--Mise en forme des information sur la page (stats)-->
<h1>Dashboard / Tableau de bord et Statistiques</h1>

<h4>Poids moyen des pokémons de la 4éme génération :</h4>
<table>
    <tr>
        <th>Poid</th>
        <td><?= h($averageWeight->averageWeight) ?></td> <!--Affichage de la moyenne du poid des pokemon de generation 4-->
    </tr>
</table>



<h4>Nombre de pokémons de type fée entre les générations 1, 3 et 7 (donc cumule des générations 2, 4, 5 et 6) :</h4>
<table>
    <tr>
        <th>Nombre</th>
        <td><?= h($fairyNumber->fairyNumber) ?></td> <!--Affichage du nombre de pokemon fée cumulé des generation 2, 4, 5 et 6-->
    </tr>
</table>



<h4>Affichage des 10 premiers pokémons qui possèdent la plus grande vitesse :</h4>
<table>
    <tr>
        <th>Position</th>
        <th>Nom</td>
        <th>Vitesse</th>
    </tr>
    <?php $index = 1;

    foreach ($fastestPokemons as $pokemon) : ?>

        <tr>
            <th><?= $index ?></th> <!--Affichage de la position dans le classement du pokemon-->
            <th><?= h($pokemon->name) ?></td> <!--Affichage du nom du pokemon-->
            <th><?= h($pokemon->pokemon_stats['value']) ?></th> <!--Affichage de la vitesse du pokemon-->
        </tr>

        <?php $index++;
    endforeach; ?>
</table>