<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
 */
use Cake\I18n\FrozenTime;
$time = FrozenTime::now();
?>

<?php
$this->assign('title', __('Album'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Album'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($album->nama_album) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Nama Album') ?></th>
                <td><?= h($album->nama_album) ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $album->has('user') ? $this->Html->link($album->user->username, ['controller' => 'Users', 'action' => 'view', $album->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($album->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Tgl Dibuat') ?></th>
                <td><?= h($album->tgl_dibuat->format('j-F-Y H:i:s')) ?></td>
            </tr>
        </table>
    </div>
    <?php if($this->Identity->get('id')=== $album->user_id) : ?>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $album->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $album->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $album->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Deskripsi') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($album->deskripsi)); ?>
    </div>
</div>

<div class="related related-foto view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Foto') ?></h3>

    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('User Id') ?></th>
                <th><?= __('Judul') ?></th>
                <th><?= __('Foto') ?></th>
                <th><?= __('Deskripsi') ?></th>
                <th><?= __('Tgl Unggah') ?></th>
                <th><?= __('Action') ?></th>
            </tr>
            <?php if (empty($album->foto)) : ?>
                <tr>
                    <td colspan="8" class="text-muted">
                        <?= __('Foto record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($album->foto as $foto) : ?>
                    <tr>
                        <td><?= h($users[$foto->user_id]) ?></td>
                        <td><?= h($foto->judul) ?></td>
                        <td><?= $this->Html->image($foto->lokasifile, ['alt' => 'CakePHP','width'=>'100px']) ?></td>
                        <td><?= h($foto->deskripsi) ?></td>
                        <td><?= h($foto->tgl_unggah->format('j-F-Y H:i:s')) ?></td>
                        <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Foto', 'action' => 'view', $foto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                        <?php if($this->Identity->get('id')=== $foto->user_id) : ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Foto', 'action' => 'edit', $foto->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Foto', 'action' => 'delete', $foto->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $foto->id)]) ?>
                        <?php endif; ?>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <div class="card card-primary card-outline">
        <?= $this->Form->create(null, ['url' => ['controller'=>'foto', 'action' => 'add'],'role'=>'form','type'=>'file']) ?>
            <div class="card-body">
                <?= $this->Form->control('judul') ?>
                <?= $this->Form->control('deskripsi') ?>
                <?= $this->Form->control('tgl_unggah',['value'=>$time->i18nFormat('yyyy-MM-dd HH:mm:ss'),'type'=>'hidden']) ?>
                <?= $this->Form->control('images',['type'=>'file']) ?>
                <?= $this->Form->input('album_id', ['value' => $album->id, 'class' => 'form-control','type'=>'hidden']) ?>
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
    </div>
</div>
