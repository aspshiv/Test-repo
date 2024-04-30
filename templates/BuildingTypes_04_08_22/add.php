<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildingType $buildingType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Building Types'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buildingTypes form content">
            <?= $this->Form->create($buildingType) ?>
            <fieldset>
                <legend><?= __('Add Building Type') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('order_flag');
                    echo $this->Form->control('is_active');
                    echo $this->Form->control('created_by');
                    echo $this->Form->control('created_date', ['empty' => true]);
                    echo $this->Form->control('modified_by');
                    echo $this->Form->control('modified_date', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
