<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Foto $foto
 */
use Cake\I18n\FrozenTime;
$time = FrozenTime::now();
?>
<?php
    $likecount = count($foto->likefoto);
?>

<?php
$this->assign('title', __('Foto'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Foto'), 'url' => ['action' => 'index']],
    ['title' => __('View')],
]);
?>

<div class="view card card-primary card-outline">
    <div class="card-header d-sm-flex">
        <center> <h1 class="card-title"><?= h($foto->judul) ?></h1></center>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('Lokasifile') ?></th>
                <td><?= $this->Html->image($foto->lokasifile, ['alt' => 'CakePHP','width'=>'200px']); ?></td>
            </tr>
            <tr>
                <th><?= __('Album') ?></th>
                <td><?= $foto->has('album') ? $this->Html->link($foto->album->nama_album, ['controller' => 'Album', 'action' => 'view', $foto->album->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('User') ?></th>
                <td><?= $foto->has('user') ? $this->Html->link($foto->user->username, ['controller' => 'Users', 'action' => 'view', $foto->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Tgl Unggah') ?></th>
                <td><?= h($foto->tgl_unggah->format('j-F-Y H:i:s')) ?></td>
            </tr>
            <tr>
                <th><?= __('Like') ?></th>
                <td><?= $likecount ?></td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <?php if($this->Identity->get('id')=== $foto->user_id) : ?>
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $foto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $foto->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <?php endif; ?>
                        <?php
                        $likefoto = $foto->isLiked($this->Identity->get('id'));
                        if ($likefoto) {
                            echo $this->Form->create(null, [
                                'url' => [
                                    'controller' => 'Likefoto',
                                    'action' => 'delete',
                                    $likefoto->id
                                ],
                                'type' => 'post'
                            ]);
                            echo $this->Form->button('<i class="fa fa-heart"></i>', [
                                'class' => 'btn btn-danger mr-3',
                                'escapeTitle' => false
                            ]);
                        } else {
                            echo $this->Form->create(null, [
                                'url' => [
                                    'controller' => 'Likefoto',
                                    'action' => 'add'
                                ],
                                'type' => 'post'
                            ]);
                            echo $this->Form->control('tgl_like', [
                                'value' => $time->i18nFormat('yyyy-MM-dd HH:mm:ss'),
                                'type'=>'hidden',
                            ]);
                            echo $this->Form->control('user_id', [
                                'type'=>'hidden',
                                'value' => $this->Identity->get('id')
                            ]);
                            echo $this->Form->input('foto_id', [
                                'type'=>'hidden',
                                'value' => $foto->id
                            ]);
                            echo $this->Form->button('<i class="fa fa-heart"></i>', [
                                'class' => 'btn btn-outline-secondary mr-3',
                                'escapeTitle' => false
                            ]);
                        }
                        echo $this->Form->end();
                        ?>
            <?php if($this->Identity->get('id')=== $foto->user_id) : ?>
        <div class="ml-auto">
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foto->id], ['class' => 'btn btn-secondary']) ?>
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
        <?= $this->Text->autoParagraph(h($foto->deskripsi)); ?>
    </div>
</div>

<div class="related related-komentar view card">
    <div class="card-header d-flex">
        <h3 class="card-title"><?= __('Related Komentar') ?></h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <tr>
                <th><?= __('User Id') ?></th>
                <th><?= __('Isi Komentar') ?></th>
                <th><?= __('Tgl Komentar') ?></th>
            </tr>
            <?php if (empty($foto->komentar)) : ?>
                <tr>
                    <td colspan="6" class="text-muted">
                        <?= __('Komentar record not found!') ?>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($foto->komentar as $komentar) : ?>
                    <tr>
                        <td><?= h($users[$komentar->user_id]) ?></td>
                        <td><?= h($komentar->isi_komentar) ?></td>
                        <td><?= h($komentar->tgl_komentar->format('j-F-Y H:i:s')) ?></td>
                        <?php if($this->Identity->get('id')=== $komentar->user_id) : ?>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Komentar', 'action' => 'edit', $komentar->id], ['class' => 'btn btn-xs btn-outline-primary']) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Komentar', 'action' => 'delete', $komentar->id], ['class' => 'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $komentar->id)]) ?>
                        </td>
                        <?php endif; ?>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <tr>
            <?= $this->Form->create(null, ['url' => ['controller'=>'komentar', 'action' => 'add'],'role'=>'form']) ?>
                <td colspan='6' >
                <div class="card-body">
                <?= $this->Form->input('foto_id', ['value' => $foto->id, 'class' => 'form-control', 'type'=>'hidden'])?>
                <?= $this->Form->control('user_id', ['value' => $this->Identity->get('id'), 'class' => 'form-control' , 'type'=>'hidden' ]) ?>
                <?= $this->Form->control('isi_komentar',['type'=>'textarea']) ?>
                <?= $this->Form->control('tgl_komentar',['value'=>$time->i18nFormat('yyyy-MM-dd HH:mm:ss'),'type'=>'hidden']) ?>
            </div>
            <div class="card-footer d-flex">
                <div class="ml-auto">
                    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>
                </td>
                <?= $this->Form->end() ?>
            </tr>
        </table>

    </div>
</div>

