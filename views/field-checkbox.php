<?php
/**
 * @var $data array
 * @var $index int
 */

$title = $data['field']['title'];
$name = $data['field']['slug'] ? $data['field']['slug'] : 'selzy-field-' . $index;
?>
<div class="b-selzy-checkbox b-selzy-form__field" data-selzy-field-name="<?= $name ?>">
    <input name="<?= $data['field']['slug'] ?>" type="checkbox" id="<?= $data['field']['slug'] ?>" class="b-selzy-checkbox__input" data-selzy-field data-validation-rules="<?= htmlspecialchars(json_encode($data['validations'])) ?>">
    <label for="<?= $data['field']['slug'] ?>" class="b-selzy-checkbox__label">
        <?= $title ?>
    </label>
    <div class="b-selzy-checkbox__error-text" data-selzy-field-error>
        <?php echo __( 'Some error text', 'selzy' ) ?>
    </div>
</div>
