<?php if ($success_message = session()->get('success_message')) : ?>

    <div class="success-message" style="color: green; font-style: italic"><?= $success_message ?></div>

<?php endif; ?>

<?php if ($errors = session()->get('errors')) : ?>

    <?php foreach ($errors as $error) : ?>

        <div class="error-message" style="color: red; font-style: italic;">
            <?= $error ?>
        </div>

    <?php endforeach; ?>

<?php endif; ?>