<?php
/**
 * @var \App\View\AppView $this
 */

$this->layout = 'CakeLte.login';
?>

<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg"><?= __('Register a new membership') ?></p>

        <?= $this->Form->create() ?>

        <?= $this->Form->control('username', [
            'placeholder' => __('Username'),
            'label' => false,
            'append' => '<i class="fas fa-user"></i>',
        ]) ?>

        <?= $this->Form->control('email', [
            'placeholder' => __('Email'),
            'label' => false,
            'append' => '<i class="fas fa-envelope"></i>',
        ]) ?>

        <?= $this->Form->control('password', [
            'placeholder' => __('Password'),
            'label' => false,
            'append' => '<i class="fas fa-lock"></i>',
        ]) ?>
        <?= $this->Form->control('nama_lengkap', [
            'placeholder' => __('Nama Lengkap'),
            'label' => false,
            'append' => '<i class="fas fa-user"></i>',
        ]) ?>
        <?= $this->Form->control('alamat', [
            'placeholder' => __('Alamat'),
            'label' => false,
            'append' => '<i class="fas fa-location"></i>',
        ]) ?>


        <div class="row">
            <div class="col-8">
                <?= $this->Form->control('agree_terms', [
                    'label' => 'I agree to the <a href="#">terms</a>',
                    'type' => 'checkbox',
                    'custom' => true,
                    'escape' => false,
                ]) ?>
            </div>
            <div class="col-4">
                <?= $this->Form->control(__('Register'), [
                    'type' => 'submit',
                    'class' => 'btn btn-primary btn-block',
                ]) ?>
            </div>
        </div>

        <?= $this->Form->end() ?>
        <!-- /.social-auth-links -->

        <?= $this->Html->link(__('I already have a membership'), ['action' => 'login']) ?>
    </div>
    <!-- /.register-card-body -->
</div>