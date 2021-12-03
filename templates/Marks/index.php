<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mark[]|\Cake\Collection\CollectionInterface $marks
 * @var トランプのマークリスト $markList
 * @var トランプのリスト $trumpList
 */
?>
<div class="marks index content">
    <?= $this->Form->create(null, ['url' =>['controller' => 'Marks', 'action' => 'buttonAction', 'id' => 'mark-form']]) ?>
        <div><h1>マークのリスト</h1></div>
        <?= $this->Form->label('marks','トランプのマーク') ?>
        <?=
            $this->Form->select('marks', $markList,[
                'class' => 'markList', 'id' => 'mark', 'empty' => true,
            ])
        ?>
        <div><h1>トランプのリスト</h1></div>
        <?= $this->Form->label('trump', 'トランプの番号とマーク') ?>
        <?= $this->Form->select('trump', $trumpList,[
            'class' => '', 'id' => 'trump', 'empty' => true,
        ])
        ?>

        <?= $this->Form->button('<i class="far fa-hand-point-up"></i> SUBMIT !',[
            'type' => 'submit','escapeTitle' => false, 'name' => 'buttonType', 'value' => 'submit', 'for' => 'mark-form'
        ])
        ?>
        <?= $this->Form->button('<i class="far fa-hand-point-up"></i> COPY !',[
            'escapeTitle' => false,'type' => 'submit', 'name' => 'buttonType', 'value' => 'copy', 'for' => 'mark-form'
        ])
        ?>

    <?= $this->Form->end() ?>
</div>
