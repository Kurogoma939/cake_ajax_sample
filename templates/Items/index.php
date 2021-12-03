<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="items index content">
    <h3><?= __('Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('count') ?></th>
                    <th><?= $this->Paginator->sort('total_price') ?></th>
                    <th><?= $this->Paginator->sort('send_flag') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $this->Number->format($item->id) ?></td>
                    <td><?= h($item->name) ?></td>
                    <td><?= $this->Number->format($item->price) ?></td>
                    <td><?= $this->Number->format($item->count) ?></td>
                    <td><?= $this->Number->format($item->total_price) ?></td>
                    <td>
                        <?php if($item->send_flag === true): ?>
                            <?= $this->Form->input('send_flag[]',['type' => 'checkbox', 'class' => 'send_flag', 'checked', 'value' => $item->id]) ?>
                        <?php else: ?>
                            <?= $this->Form->input('send_flag[]',['type' => 'checkbox', 'class' => 'send_flag' , 'value' => $item->id]) ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?=
                         // date("Y-m-d", (int)$item->created)  これはViewでは使えない
                        $item->created->i18nFormat("Y-M-d")
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
