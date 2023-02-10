<?php
/* @var $this WPSELZY_Form */
/* @var $form array */
/* @var $contact_list int */

$formTitle = $form['commonSettings']['form']['title']['value'];
$formDescription = $form['commonSettings']['form']['description']['value'];
$formButton = $form['commonSettings']['form']['button']['value'];
$messages = [
    'success_text' => $form['commonSettings']['messages']['successText'],
    'validation_error_text' => $form['commonSettings']['messages']['validationErrorText'],
    'server_error_text' => $form['commonSettings']['messages']['serverErrorText'],
    'min_length_error_text' => $form['commonSettings']['messages']['minLengthErrorText'],
    'max_length_error_text' => $form['commonSettings']['messages']['maxLengthErrorText'],
    'min_number_error_text' => $form['commonSettings']['messages']['minNumberErrorText'],
    'max_number_error_text' => $form['commonSettings']['messages']['maxNumberErrorText'],
    'reg_exp_error_text' => $form['commonSettings']['messages']['regExpErrorText'],
    'required_error_text' => $form['commonSettings']['messages']['requiredErrorText'],
    'email_error_text' => $form['commonSettings']['messages']['emailErrorText']
];
?>
<script>
    var selzyValidationErrorTexts = {
        minLengthErrorText: '<?= $messages['min_length_error_text'] ?>',
        maxLengthErrorText: '<?= $messages['max_length_error_text'] ?>',
        minNumberErrorText: '<?= $messages['min_number_error_text'] ?>',
        maxNumberErrorText: '<?= $messages['max_number_error_text'] ?>',
        regExpErrorText: '<?= $messages['reg_exp_error_text'] ?>',
        requiredErrorText: '<?= $messages['required_error_text'] ?>',
        emailErrorText: '<?= $messages['email_error_text'] ?>'
    }
</script>
<style>
    .b-selzy-form {
        <?php foreach ($form['commonSettings']['form']['styles'] as $name => $style) {
            echo SelzyFormFieldStyle::getStyleName($name) . ': ' . $style . ";\n";
        } ?>
    }
    .b-selzy-form .b-selzy-form__title {
        <?php foreach ($form['commonSettings']['form']['title']['styles'] as $name => $style) {
            echo SelzyFormFieldStyle::getStyleName($name) . ': ' . $style . ";\n";
        } ?>
    }
    .b-selzy-form .b-selzy-form__description {
        <?php foreach ($form['commonSettings']['form']['description']['styles'] as $name => $style) {
            echo SelzyFormFieldStyle::getStyleName($name) . ': ' . $style . ";\n";
        } ?>
    }
    .b-selzy-form .b-selzy-form__submit-button {
        <?php foreach ($form['commonSettings']['form']['button']['styles'] as $name => $style) {
            echo SelzyFormFieldStyle::getStyleName($name) . ': ' . $style . ";\n";
        } ?>
    }
    .b-selzy-form .b-selzy-form__button-box svg circle {
        fill: <?= $form['commonSettings']['form']['button']['styles']['backgroundColor'] ?> !important;
    }
    <?php foreach ($form['fields'] as $index => $field) : ?>
        <?php if ($field['field']['title']) :?>
            <?php $fieldName = $field['field']['slug'] ? $field['field']['slug'] : 'selzy-field-' . $index; ?>
            .b-selzy-form .b-selzy-field[data-selzy-field-name="<?= $fieldName ?>"],
            .b-selzy-form .b-selzy-checkbox[data-selzy-field-name="<?= $fieldName ?>"] {
                <?php foreach ($field['styles'] as $name => $style) {
                    if ($style) {
                        if (
                                SelzyFormFieldStyle::getStyleName($name) === 'font-size' ||
                                SelzyFormFieldStyle::getStyleName($name) === 'font-weight' ||
                                SelzyFormFieldStyle::getStyleName($name) === 'color' ||
                                SelzyFormFieldStyle::getStyleName($name) === 'line-height' ||
                                SelzyFormFieldStyle::getStyleName($name) === 'margin'
                        ) {
                            echo SelzyFormFieldStyle::getStyleName($name) . ': ' . $style . ";\n";
                        }
                    }
                } ?>
            }
            .b-selzy-form .b-selzy-field[data-selzy-field-name="<?= $fieldName ?>"] .b-selzy-field__input,
            .b-selzy-form .b-selzy-checkbox[data-selzy-field-name="<?= $fieldName ?>"] .b-selzy-checkbox__input {
                <?php foreach ($field['styles'] as $name => $style) {
                    if ($style) {
                        if (
                            SelzyFormFieldStyle::getStyleName($name) !== 'font-size' &&
                            SelzyFormFieldStyle::getStyleName($name) !== 'font-weight' &&
                            SelzyFormFieldStyle::getStyleName($name) !== 'color' &&
                            SelzyFormFieldStyle::getStyleName($name) !== 'line-height' &&
                            SelzyFormFieldStyle::getStyleName($name) !== 'margin'
                        ) {
                            echo SelzyFormFieldStyle::getStyleName($name) . ': ' . $style . ";\n";
                        }
                    }
                } ?>
            }
        <?php endif;?>
    <?php endforeach;?>
</style>

<div class="b-selzy-form" data-contact-list="<?= $contact_list ?>">
    <div class="b-selzy-form__header">
        <?php if ($formTitle): ?>
            <div class="b-selzy-form__title">
                <?= $formTitle ?>
            </div>
        <?php endif;?>

        <?php if ($formDescription): ?>
            <div class="b-selzy-form__description">
                <?= $formDescription ?>
            </div>
        <?php endif;?>
    </div>

    <div class="b-selzy-form__main">
        <?php foreach ($form['fields'] as $index => $field) : ?>
            <?php if ($field['field']['title']) :?>
                <?= Selzy\ViewWrapper\View::render(SelzyFormFieldTypes::getView($field['field']['type']), [
                    'data' => $field,
                    'index' => $index
                ]) ?>
            <?php endif;?>
        <?php endforeach; ?>
    </div>

    <div class="b-selzy-form__footer">
        <?php if ($formButton): ?>
            <div class="b-selzy-form__button-box">
                <div class="b-selzy-form__submit-button">
                    <?= $formButton ?>
                </div>

                <svg width="40px" height="40px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;">
                    <circle cx="75" cy="50" fill="#363a3c" r="6.39718">
                        <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.875s"></animate>
                    </circle>
                    <circle cx="67.678" cy="67.678" fill="#363a3c" r="4.8">
                        <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.75s"></animate>
                    </circle>
                    <circle cx="50" cy="75" fill="#363a3c" r="4.8">
                        <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.625s"></animate>
                    </circle>
                    <circle cx="32.322" cy="67.678" fill="#363a3c" r="4.8">
                        <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.5s"></animate>
                    </circle>
                    <circle cx="25" cy="50" fill="#363a3c" r="4.8">
                        <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.375s"></animate>
                    </circle>
                    <circle cx="32.322" cy="32.322" fill="#363a3c" r="4.80282">
                        <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.25s"></animate>
                    </circle>
                    <circle cx="50" cy="25" fill="#363a3c" r="6.40282">
                        <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.125s"></animate>
                    </circle>
                    <circle cx="67.678" cy="32.322" fill="#363a3c" r="7.99718">
                        <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="0s"></animate>
                    </circle>
                </svg>
            </div>
        <?php endif;?>

        <div class="b-selzy-form__messages">
            <?php if($messages['success_text']):?>
                <div class="b-selzy-form__message b-selzy-form__message_success-text b-selzy-form__message_success">
                    <?= $messages['success_text'] ?>
                </div>
            <?php endif;?>

            <?php if($messages['validation_error_text']):?>
                <div class="b-selzy-form__message b-selzy-form__message_validation-error-text b-selzy-form__message_error">
                    <?= $messages['validation_error_text'] ?>
                </div>
            <?php endif;?>

            <?php if($messages['server_error_text']):?>
                <div class="b-selzy-form__message b-selzy-form__message_server-error-text b-selzy-form__message_error">
                    <?= $messages['server_error_text'] ?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
