<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public $paginate = [
        'limit' => 30,
    ];

    public function index()
    {
        // URLの?name=ダンベルみたいな値を受け取る
        $name = $this->request->getQuery('name');
        // とりあえず一覧を表示するクエリ
        $itemList = $this->Items->find();
        // パラメーターがあったら、それで絞り込みをする
        if(!empty($name)){
            $itemList->where(['name' => $name]);
        }

        $items = $this->paginate($itemList);
        $this->set(compact('items'));
    }

    /**
     * Add method
     * 負荷のかかるメソッドの実装
     */
    public function addTestData()
    {
        $this->autoRender = false;
        $itemList = [
            'ペットボトルロケット', 'スマホカバー', 'アロマキャンドル', 'コーヒーメーカー', 'ボウル', 'タブレット端末', '収納ボックス', '無線マウス',
            'Nintendo Switch', 'トランプ', 'リモコン', 'スニーカー', 'マットレス', 'ダンベル', 'ラック'
        ];
        $bool = [true, false];

        ini_set('max_execution_time', '600');
        ini_set('memory_limit', '-1');

        for($i = 0; $i <= 50000; $i ++){
            $price = 300 + (50 * rand(1, 5000));
            $count =  5 * rand(1, 250);
            $item = $this->Items->newEmptyEntity();
            $item->id = $i;
            $item->name = $itemList[rand(0, 14)];
            $item->price = $price;
            $item->count = $count;
            $item->total_price = $price * $count;
            $item->created = date("Y-m-d H:i:s");
            $item->send_flag = $bool[rand(0, 1)];
            $this->Items->save($item);
        }
        ini_set('max_execution_time', '120');
        ini_set("memory_limit", "256M");

        return $this->redirect([
            'controller' => 'Items',
            'action' => 'index',
//            '?' => [
//              'sample' => 100,
//              'name' => 'ダンベル'
//            ],  urlにデータを載せる場合
//            '#' => 'tab3'
        ]);
    }

    public function delete()
    {
        $this->autoRender = false;
        $this->Items->deleteAll(['id >' => 0]);
    }

}
