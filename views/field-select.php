<?php
/**
 * @var $data array
 * @var $index int
 */

$isRequired = $data['validations']['required'];
$title = $data['field']['title'];
$options = $data['field']['options'];
$name = $data['field']['slug'] ? $data['field']['slug'] : 'selzy-field-' . $index;
?>
<div class="b-selzy-field <?= $isRequired ? 'b-selzy-field_required' : '' ?> b-selzy-form__field" data-selzy-field-name="<?= $name ?>">
    <label for="<?= $data['field']['slug'] ?>" class="b-selzy-field__label">
        <?= $title ?>
    </label>
    <select name="<?= $data['field']['slug'] ?>" id="<?= $data['field']['slug'] ?>" class="b-selzy-field__input" data-selzy-field data-validation-rules="<?= htmlspecialchars(json_encode($data['validations'])) ?>">
        <?php foreach ($options as $option):?>
            <option value="<?=$option?>">
                <?=$option?>
            </option>
        <?php endforeach;?>
    </select>
    <div class="b-selzy-field__error-text" data-selzy-field-error>
        Какой-то текст ошибки
    </div>
</div>
