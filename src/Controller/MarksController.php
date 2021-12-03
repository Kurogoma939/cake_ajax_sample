<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Marks Controller
 *
 * @property \App\Model\Table\MarksTable $Marks
 * @method \App\Model\Entity\Mark[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MarksController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // $this->viewBuilder()->disableAutoLayout(false);  // デフォルトテンプレートを使用したくない場合
        $this->Trumps = TableRegistry::getTableLocator()->get('Trumps');
    }
    /**
     * Index method
     */
    public function index()
    {
        /* マークのセレクトボックス用データ */
        $this->set('markList', $this->Marks->find('list',
            [
                'keyField' => 'id', # セレクトボックスのvalue（見えない部分：Postされるデータ）
                'valueField' => 'name', # セレクトボックスの見える部分
            ]
        )
            ->distinct('id')); # 重複排除できる。Groupより確実

        /* トランプのセレクトボックス用データ */
        $this->set('trumpList', $this->Trumps->find('list',
            [
                'keyField' => 'id', # セレクトボックスのvalue（見えない部分：Postされるデータ）
                'valueField' => 'name', # セレクトボックスの見える部分
            ]
        ));
    }


    public function changeMark()
    {
        // デバッグ用：かなり細かい情報がわかるので、根本的に詰まった時に良い。
//        $request = $this->getRequest();
        // 通常のリクエスト受け取り用
        $request = $this->request->getData();
        $markId = $request['markId'];

        // トランプリストを、取得したmark_idで絞り込み
        $trumpList = $this->Trumps->find('list',
            [
                'keyField' => 'id', # セレクトボックスのvalue（見えない部分：Postされるデータ）
                'valueField' => 'name', # セレクトボックスの見える部分
            ]
        )
            ->where(['mark_id' => $markId])
            ->order(['id' => 'ASC']);

        // JavaScriptに返す値（key部分参照する値になる）
        $response = [
            'trumpList' => $trumpList
        ];

        // Json形式にして返す
        return $this->getResponse()->withStringBody(json_encode($response));
    }

    public function changeTrump()
    {
        $request = $this->request->getData();
        $trumpId = $request['trumpId'];

        // あえて全件受け渡す
        $markList = $this->Marks->find('list',
            [
                'keyField' => 'id', # セレクトボックスのvalue（見えない部分：Postされるデータ）
                'valueField' => 'name', # セレクトボックスの見える部分
            ]
        )
            ->order(['id' => 'ASC']);

        // 識別ように、選ばれたマークを抽出
        $selectTrump = $this->Trumps->get($trumpId);
        $selectMark = $this->Marks->find()->select('id')
            ->where(['id' => $selectTrump->mark_id])->first();

        // JavaScriptに返す値（key部分参照する値になる）
        $response = [
            'markList' => $markList,
            'selectMarkId' => $selectMark->id,
        ];

        // Json形式にして返す
        return $this->getResponse()->withStringBody(json_encode($response));
    }

    /**
     * ボタンによってアクションを分けるメソッド
     */
    public function buttonAction(){
        $request = $this->request->getData();
        $buttonName = $request[ 'buttonType' ];

        // 同一フォームなので、ボタン名で分岐
        switch ($buttonName) {
            case 'submit':
                return $this->submitAction($request);
            case 'copy':
                return $this->copyAction($request);
            default:
                return $this->redirect([
                    'controller' => 'SystemError',
                    'action' => 'index',
                ]);
        }
    }

    public function submitAction($request)
    {
        dd('SUBMIT!!');
    }

    public function copyAction($request)
    {
        dd('COPY !!');
    }

}
