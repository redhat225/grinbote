<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Benefits Controller
 *
 * @property \App\Model\Table\BenefitsTable $Benefits
 */
class BenefitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypeBenefits']
        ];
        $benefits = $this->paginate($this->Benefits);

        $this->set(compact('benefits'));
        $this->set('_serialize', ['benefits']);
    }

    /**
     * View method
     *
     * @param string|null $id Benefit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $benefit = $this->Benefits->get($id, [
            'contain' => ['TypeBenefits', 'Baskets']
        ]);
        $this->set('benefit', $benefit);
        $this->set('_serialize', ['benefit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $benefit = $this->Benefits->newEntity();

        if ($this->request->is('post')) {
            $benefit = $this->Benefits->patchEntity($benefit, $this->request->data);
            if ($this->Benefits->save($benefit)) {
                $this->Flash->success(__('The benefit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The benefit could not be saved. Please, try again.'));
            }
        }
        $typeBenefits = $this->Benefits->TypeBenefits->find('all');
        $this->set(compact('benefit', 'typeBenefits'));
        $this->set('_serialize', ['benefit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Benefit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $benefit = $this->Benefits->get($id, [
            'contain' => ['TypeBenefits']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $benefit = $this->Benefits->patchEntity($benefit, $this->request->data);
            if ($this->Benefits->save($benefit)) {
                $this->Flash->success(__('The benefit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The benefit could not be saved. Please, try again.'));
            }
        }
        $typeBenefits = $this->Benefits->TypeBenefits->find()->select(['nom','id']);
        $typeBenefits->toArray();
        $this->set(compact('benefit', 'typeBenefits'));
        $this->set('_serialize', ['benefit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Benefit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $benefit = $this->Benefits->get($id);
        if ($this->Benefits->delete($benefit)) {
            $this->Flash->success(__('The benefit has been deleted.'));
        } else {
            $this->Flash->error(__('The benefit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

        public function beforeRender(Event $event)
    {
        $this->viewBuilder()->layout('dashboard');
    }
}
