<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trump[]|\Cake\Collection\CollectionInterface $trumps
 */
?>
<div class="trumps index content">
    <?= $this->Html->link(__('New Trump'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Trumps') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('mark_id') ?></th>
                    <th><?= $this->Paginator->sort('number') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trumps as $trump): ?>
                <tr>
                    <td><?= $this->Number->format($trump->id) ?></td>
                    <td><?= $trump->has('mark') ? $this->Html->link($trump->mark->name, ['controller' => 'Marks', 'action' => 'view', $trump->mark->id]) : '' ?></td>
                    <td><?= $this->Number->format($trump->number) ?></td>
                    <td><?= h($trump->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $trump->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trump->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trump->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trump->id)]) ?>
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
