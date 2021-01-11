<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pokemons Controller
 *
 * @property \App\Model\Table\PokemonsTable $Pokemons
 * @method \App\Model\Entity\Pokemon[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PokemonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 30,
        ];

        $pokemons = $this->Pokemons->find('all')->contain(['PokemonStats.Stats', 'PokemonTypes.Types']);
        $pokemons = $this->paginate($pokemons);

        $this->set(compact('pokemons'));
    }

    /**
     * View method
     *
     * @param string|null $id Pokemon id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pokemon = $this->Pokemons->get($id, [
            'contain' => ['PokemonStats.Stats', 'PokemonTypes.Types'],
        ]);

        // on recupere le nom d'un type par son id
        $nameOfType = $this->getTableLocator()->get('types')->find()->all()->combine("id","name")->toArray();

        $this->set(compact('pokemon'));
        $this->set(compact('nameOfType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pokemon id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pokemon = $this->Pokemons->get($id);
        if ($this->Pokemons->delete($pokemon)) {
            $this->Flash->success(__('The pokemon has been deleted.'));
        } else {
            $this->Flash->error(__('The pokemon could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
