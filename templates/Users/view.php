<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
use Cake\I18n\FrozenTime;
$time = FrozenTime::now();
?>

<?php
$this->assign('title', __('User'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Users'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <h2 class="card-title"><?= h($user->username) ?></h2>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
        <tr>
                <th><?= __('Nama Lengkap') ?></th>
                <td><?= h($user->nama_lengkap) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th><?= __('Alamat') ?></th>
                <td><?= h($user->alamat) ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Html->link(__('logout'), ['controller'=>'users', 'action'=>'logout'] , ['confirm' => __('Apakah anda yakin untuk logout ?'), 'class' => 'btn btn-danger']) 
            ?>
        </div>
        <div class="ml-auto">
        
        </div>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<div class="view text card">
    <div class="card-header">
        <h3 class="card-title"><?= __('Alamat') ?></h3>
    </div>
    <div class="card-body">
        <?= $this->Text->autoParagraph(h($user->alamat)); ?>
    </div>
</div>

<div class="related related-album view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Album') ?></h3>

    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Nama Album') ?></th>
                <th><?= __('Deskripsi') ?></th>
                <th><?= __('Tgl Dibuat') ?></th>
            </tr>
            <?php if (empty($user->album)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Album record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->album as $album) : ?>
                    <tr>
                        <td><?= h($album->nama_album) ?></td>
                        <td><?= h($album->deskripsi) ?></td>
                        <td><?= h($album->tgl_dibuat->format('j-F-Y H:i:s')) ?></td>
                        
                        <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Album', 'action' => 'view', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                        <?php if($this->Identity->get('id')=== $album->user_id) : ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Album', 'action' => 'edit', $album->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Album', 'action' => 'delete', $album->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $album->id)]) ?>
                        <?php endif; ?>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>

<div class="related related-foto view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Foto') ?></h3>

    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Album Id') ?></th>
                <th><?= __('Judul') ?></th>
                <th><?= __('Deskripsi') ?></th>
                <th><?= __('Tgl Unggah') ?></th>
                <th><?= __('Foto') ?></th>
            </tr>
            <?php if (empty($user->foto)) : ?>
                <tr>
                    <td colspan="8" class="text-muted">
                        <?= __('Foto record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($user->foto as $foto) : ?>
                    <tr>
                        <td><?= h($foto->album_id) ?></td>
                        <td><?= h($foto->judul) ?></td>
                        <td><?= h($foto->deskripsi) ?></td>
                        <td><?= $this->Html->image($foto->lokasifile, ['alt' => 'CakePHP','width'=>'100px']) ?></td>                       
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
    </div>
</div>

