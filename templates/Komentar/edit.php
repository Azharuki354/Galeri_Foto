<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Komentar $komentar
 */
?>

<?php
$this->assign('title', __('Edit Komentar'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Komentar'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $komentar->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($komentar) ?>
    <div class="card-body">
        <?= $this->Form->control('foto_id', ['options' => $foto, 'class' => 'form-control']) ?>
        <?= $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control']) ?>
        <?= $this->Form->control('isi_komentar') ?>
        <?= $this->Form->control('tgl_komentar') ?>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $komentar->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $komentar->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $komentar->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>