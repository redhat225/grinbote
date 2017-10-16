<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypeBenefits Controller
 *
 * @property \App\Model\Table\TypeBenefitsTable $TypeBenefits
 */
class TypeBenefitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $typeBenefits = $this->paginate($this->TypeBenefits);

        $this->set(compact('typeBenefits'));
        $this->set('_serialize', ['typeBenefits']);
    }

    /**
     * View method
     *
     * @param string|null $id Type Benefit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeBenefit = $this->TypeBenefits->get($id, [
            'contain' => ['Benefits']
        ]);

        $this->set('typeBenefit', $typeBenefit);
        $this->set('_serialize', ['typeBenefit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeBenefit = $this->TypeBenefits->newEntity();
        if ($this->request->is('post')) {
            $typeBenefit = $this->TypeBenefits->patchEntity($typeBenefit, $this->request->data);
            if ($this->TypeBenefits->save($typeBenefit)) {
                $this->Flash->success(__('The type benefit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type benefit could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeBenefit'));
        $this->set('_serialize', ['typeBenefit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Benefit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeBenefit = $this->TypeBenefits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeBenefit = $this->TypeBenefits->patchEntity($typeBenefit, $this->request->data);
            if ($this->TypeBenefits->save($typeBenefit)) {
                $this->Flash->success(__('The type benefit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The type benefit could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('typeBenefit'));
        $this->set('_serialize', ['typeBenefit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Benefit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeBenefit = $this->TypeBenefits->get($id);
        if ($this->TypeBenefits->delete($typeBenefit)) {
            $this->Flash->success(__('The type benefit has been deleted.'));
        } else {
            $this->Flash->error(__('The type benefit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
