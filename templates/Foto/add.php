<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto $foto
 */
use Cake\I18n\FrozenTime;
$time = FrozenTime::now();
?>

<?php
$this->assign('title', __('Add Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Foto'), 'url' => ['action' => 'index']],
    ['title' => __('Add')],
]);
?>

<div class="card card-primary card-outline">
    <?= $this->Form->create($foto, ['valueSources' => ['query', 'context'],'type'=>'file']) ?>
    <div class="card-body">
        <?= $this->Form->control('judul') ?>
        <?= $this->Form->control('deskripsi') ?>
        <?= $this->Form->control('tgl_unggah',['value'=>$time->i18nFormat('yyyy-MM-dd HH:mm:ss'),'type'=>'hidden']) ?>
        <?= $this->Form->control('images',['type'=>'file']) ?>
        <?= $this->Form->control('album_id', ['options' => $album, 'class' => 'form-control']) ?>
        <?= $this->Form->control('user_id', ['value'=>$this->Identity->get('id'), 'class' => 'form-control','type'=>'hidden']) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>