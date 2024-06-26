<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectStatus[]|\Cake\Collection\CollectionInterface $projectStatuses
 */
?>
<div class="projectStatuses index content">
    <?= $this->Html->link(__('New Project Status'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Project Statuses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('is_active') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_by') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projectStatuses as $projectStatus): ?>
                <tr>
                    <td><?= $this->Number->format($projectStatus->id) ?></td>
                    <td><?= h($projectStatus->name) ?></td>
                    <td><?= $this->Number->format($projectStatus->is_active) ?></td>
                    <td><?= $this->Number->format($projectStatus->created_by) ?></td>
                    <td><?= h($projectStatus->created_date) ?></td>
                    <td><?= $projectStatus->modified_by === null ? '' : $this->Number->format($projectStatus->modified_by) ?></td>
                    <td><?= h($projectStatus->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $projectStatus->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectStatus->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectStatus->id)]) ?>
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
