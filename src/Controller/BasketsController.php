<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Baskets Controller
 *
 * @property \App\Model\Table\BasketsTable $Baskets
 */
class BasketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sales', 'Benefits']
        ];
        $baskets = $this->paginate($this->Baskets);

        $this->set(compact('baskets'));
        $this->set('_serialize', ['baskets']);
    }

    /**
     * View method
     *
     * @param string|null $id Basket id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $basket = $this->Baskets->get($id, [
            'contain' => ['Sales', 'Benefits']
        ]);

        $this->set('basket', $basket);
        $this->set('_serialize', ['basket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $basket = $this->Baskets->newEntity();
        if ($this->request->is('post')) {

                $itemsValue=(count($this->request->data['price']));
                $total=0;
                for ($i=0; $i<$itemsValue ; $i++) 
                { 
                        $total+=$this->request->data['price'][$i]*$this->request->data['qte'][$i];
                }
                
                $sale=$this->Baskets->Sales->find('all')->where(['id'=>$this->request->data['sale_id']])->first();
                $sale->total+=$total;
                $this->Baskets->Sales->save($sale);

                $done=true;
                 for ($i=0; $i<$itemsValue ; $i++) 
                { 
                    $data=[
                        'sale_id'=>$this->request->data['sale_id'],
                        'benefit_id'=>$this->request->data['benefit_id'][$i],
                        'qte'=>$this->request->data['qte'][$i],
                        'price'=>$this->request->data['price'][$i]
                    ];
                    $basket = $this->Baskets->newEntity($data);
                    if(!($this->Baskets->save($basket)))
                        $done=false;
                }
                if($done)
                    echo $response="ok";
                else
                    echo $response="Une/plusieurs lignes n'ont pas pu être enregistrées veuillez réessayer";
                exit();
        }
        $benefits = $this->Baskets->Benefits->find();
        $this->set(compact('basket', 'sales', 'benefits'));
        $this->set('_serialize', ['basket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Basket id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $basket = $this->Baskets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $basket = $this->Baskets->patchEntity($basket, $this->request->data);
            if ($this->Baskets->save($basket)) {
                $this->Flash->success(__('The basket has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The basket could not be saved. Please, try again.'));
            }
        }
        $sales = $this->Baskets->Sales->find('list', ['limit' => 200]);
        $benefits = $this->Baskets->Benefits->find('list', ['limit' => 200]);
        $this->set(compact('basket', 'sales', 'benefits'));
        $this->set('_serialize', ['basket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Basket id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $sale = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $basket = $this->Baskets->get($id);
        $relatedSale = $this->Baskets->Sales->get($sale);
        $relatedSale->total-=($basket->price*$basket->qte);
        if($this->Baskets->Sales->save($relatedSale))
        {
            if ($this->Baskets->delete($basket)) {
                $this->Flash->success(__('The basket has been deleted.'));
                return $this->redirect(['controller'=>'Sales','action'=>'view',$sale]);
            } else {
                $this->Flash->error(__('The basket could not be deleted. Please, try again.'));
            }
        }


        return $this->redirect(['action' => 'index']);
    }
}
