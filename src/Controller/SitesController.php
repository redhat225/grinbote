<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sites Controller
 *
 * @property \App\Model\Table\SitesTable $Sites
 */
class SitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Areas']
        ];
        $sites = $this->paginate($this->Sites);

        $this->set(compact('sites'));
        $this->set('_serialize', ['sites']);
    }

    /**
     * View method
     *
     * @param string|null $id Site id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $site = $this->Sites->get($id, [
            'contain' => ['Areas', 'Users']
        ]);

        $this->set('site', $site);
        $this->set('_serialize', ['site']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $site = $this->Sites->newEntity();
        if ($this->request->is('post')) {
            $site = $this->Sites->patchEntity($site, $this->request->data);
            if ($this->Sites->save($site)) {
                $this->Flash->success(__('The site has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The site could not be saved. Please, try again.'));
            }
        }
        $areas = $this->Sites->Areas->find('list', ['limit' => 200]);
        $this->set(compact('site', 'areas'));
        $this->set('_serialize', ['site']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Site id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $site = $this->Sites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $site = $this->Sites->patchEntity($site, $this->request->data);
            if ($this->Sites->save($site)) {
                $this->Flash->success(__('The site has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The site could not be saved. Please, try again.'));
            }
        }
        $areas = $this->Sites->Areas->find('list', ['limit' => 200]);
        $this->set(compact('site', 'areas'));
        $this->set('_serialize', ['site']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Site id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $site = $this->Sites->get($id);
        if ($this->Sites->delete($site)) {
            $this->Flash->success(__('The site has been deleted.'));
        } else {
            $this->Flash->error(__('The site could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
