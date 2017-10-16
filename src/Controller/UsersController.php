<?php
namespace App\Controller;

use App\Controller\AppController;
    use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function forgotten()
    {

    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['forgotten','add','logout']);
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function login()
    {   
        if($this->request->is('ajax'))
        {
            if($this->request->is('post'))
            {
                $user=$this->Auth->identify();
                if($user)
                {
                    $this->Auth->setUser($user);
                    echo $reponse="ok";
                    exit();
                }
                else
                {
                    echo $reponse="ko";
                    exit();
                }
            }
        }
         $this->viewBuilder()->layout('login');
    }

    public function index()
    {

        $this->paginate=[
            'Users' => [
                'join'=>[
                        'sites'=>[
                       'table' => 'sites',
                       'type' => 'INNER',
                       'conditions' => 'Users.site_id = sites.id'  
                                ],
                        'areas'=>[
                        'table'=>'areas',
                        'type'=>'INNER',
                        'conditions' => 'sites.area_id = areas.id',
                        ]
                    ],
                    'fields'=>['sites.nom','areas.nom', 'nom', 'prenom', 'id', 'phone','role'],
                'sortWhitelist'=>['sites.nom','areas.nom', 'nom', 'prenom', 'id', 'phone','role']
            ]
        ];
        $users = $this->paginate('Users');
        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
        $this->viewBuilder()->layout('dashboard');
    }   



    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Sales','Sites']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $sites=$this->Users->Sites->find()->select(['id','nom']);
        $this->set(compact('user','sites'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)

    {
       
        $user = $this->Users->get($id, [
            'contain' => ['Sites']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            $query=$this->Users->find('password',[
                    'id'=>$id
                ]);
            if($this->Users->verifyPassword($this->request->data['password'],$query[0]->password))
            {

                  if ($this->Users->save($user)) {

                     $this->Flash->success(__('The user has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
                   }
            }
                $this->Flash->error(__('Mauvais mot de passe.'));
        }
        $sites=$this->Users->Sites->find()->select(['nom','id']);
        $this->set(compact('user','sites'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
