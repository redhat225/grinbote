<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\I18n;
/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 */
class SalesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $user=$this->Auth->user('role');
        $this->paginate = [
            'Sales'=>[
                'join'=>[
                    "users" => [
                        'table' => 'users',
                        'type' => 'INNER',
                        'conditions' => 'Sales.user_id = users.id'
                    ],
                    'sites'=>[
                       'table' => 'sites',
                       'type' => 'INNER',
                       'conditions' => 'users.site_id = sites.id'  
                                ],
                    'areas'=>[
                        'table'=>'areas',
                        'type'=>'INNER',
                        'conditions' => 'sites.area_id = areas.id',
                        ]
                ],
                'fields'=>['sites.nom','areas.nom', 'customer', 'adress','id','created','printed','modified','total','reward','users.nom','users.prenom','users.id','impressed'],
                'order'=>['created'=>'DESC'],
                'sortWhitelist'=>['sites.nom','areas.nom', 'customer', 'adress','id','created', 'modified','total','reward','users.nom','users.prenom','users.id']

            ]
        ];
        $sales = $this->paginate('Sales');
                $this->set(compact('sales','user'));
        $this->set('_serialize', ['sales']);
    }

    public function printed()
    {
        if($this->request->is('ajax'))
        {
            $total=$this->request->data['total'];
                            $query1=$this->Sales->Gifts->find()
                                               ->where(['plancher <='=>$total,'id !='=>0,"DATEDIFF(DATE_FORMAT(NOW(),'%Y-%m-%d'),DATE_ADD(DATE_FORMAT(created,'%Y-%m-%d'),INTERVAL validity DAY))"])
                                                ->andWhere('(won-gagnant)>0')
                                               ->limit(1)
                                               ->order('RAND()')
                                               ->select()
                                               ->toArray();
                    if(empty($query1))
                    {
                        $query1=0;
                        $ticket=0;
                    }
                    else
                    {
                        $count=$query1[0]->count;
                        $gagnant=$query1[0]->gagnant;
                        $id=$query1[0]->id;
                        $count++;
                        if(($query1[0]->ratio-$count)==0)
                        {
                            $count=0;
                            $gagnant++;
                            $ticket=$query1[0]->id;
                        }
                        else
                        {
                         $ticket=0;
                        }
                        $query2=$this->Sales->Gifts->query();
                        $query2->update()
                                ->set(['count'=>$count,'gagnant'=>$gagnant])
                                ->where(['id'=>$id])
                                ->execute();
                    }


                    $id=$this->request->data['id'];
                    $reward=$this->request->data['reward'];
                    $query=$this->Sales->query();
                    $query->update()
                                    ->set(['printed'=>1,'impressed'=> $query->func()->now(),'reward'=>$reward,'gift_id'=>$ticket])
                                    ->where(['id'=>$id])
                                    ->execute();


                    exit();
        }

    }

    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
                                    // $query1=$this->Sales->Gifts->find()
                                    //            ->where(['plancher <='=>10000,'id !='=>0,"DATEDIFF(DATE_FORMAT(NOW(),'%Y-%m-%d'),DATE_ADD(DATE_FORMAT(created,'%Y-%m-%d'),INTERVAL validity DAY))"])
                                    //             ->andWhere('(won-gagnant)>0')
                                    //            ->limit(1)
                                    //            ->order('RAND()')
                                    //            ->select()
                                    //            ->toArray();
        $user=$this->Auth->user();
         $sale = $this->Sales->get($id, [
            'contain' => ['Users', 'Baskets','Gifts']
        ]);
         $time= new Time(null,'Africa/Casablanca');
        $relatedbaskets=$this->Sales->find()
                               ->join([
                                 'users'=>[
                                    'table' => 'users',
                                    'type' => 'LEFT',
                                    'conditions' => 'users.id = Sales.user_id'  
                                ],
                                'baskets'=>[
                                    'table' => 'baskets',
                                    'type' => 'LEFT',
                                    'conditions' => 'baskets.sale_id = Sales.id'  
                                  ],
                                'benefits'=>[
                                    'table' => 'benefits',
                                    'type' => 'LEFT',
                                    'conditions' => 'benefits.id = baskets.benefit_id'  
                                  ]
                                ])->select(['benefits.designation','baskets.id','baskets.price','baskets.qte'])
                               ->where(['Sales.id'=>$id]);
                               // debug($sale);
        $this->set(compact('sale','relatedbaskets','user','time'));
        $this->set('_serialize', ['sale']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sale = $this->Sales->newEntity();
        if ($this->request->is('post')) {
            $sale = $this->Sales->patchEntity($sale, $this->request->data);
            $sale->total=0;
            $sale->user_id=$this->Auth->user('id');
            if (($result=$this->Sales->save($sale))==true) {
                $this->Flash->success(__('The sale has been saved.'));
                $createdSaleId=$result->id;
                return $this->redirect(['action' => 'view',$createdSaleId]);
            } else {
                $this->Flash->error(__('The sale could not be saved. Please, try again.'));
            }
        }
        $users = $this->Sales->Users->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'users'));
        $this->set('_serialize', ['sale']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->data);
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sale could not be saved. Please, try again.'));
            }
        }
        $users = $this->Sales->Users->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'users'));
        $this->set('_serialize', ['sale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('The sale has been deleted.'));
        } else {
            $this->Flash->error(__('The sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(Event $event)
    {
        $this->viewBuilder()->layout('dashboard');
    }
}
