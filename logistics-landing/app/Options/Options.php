<?php

namespace App\Options;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Options as Field;
use StoutLogic\AcfBuilder\FieldNameCollisionException;

class Options extends Field
{
    /**
     * The option page menu name.
     *
     * @var string
     */
    public $name = 'Настройки лендинга';

    /**
     * The option page menu slug.
     *
     * @var string
     */
    public $slug = 'options';

    /**
     * The option page document title.
     *
     * @var string
     */
    public $title = 'Настройки лендинга';

    /**
     * The option page permission capability.
     *
     * @var string
     */
    public $capability = 'edit_theme_options';

    /**
     * The option page menu position.
     *
     * @var int
     */
    public $position = PHP_INT_MAX;

    /**
     * The option page visibility in the admin menu.
     *
     * @var boolean
     */
    public $menu = true;

    /**
     * The slug of another admin page to be used as a parent.
     *
     * @var string
     */
    public $parent = null;

    /**
     * The option page menu icon.
     *
     * @var string
     */
    public $icon = null;

    /**
     * Redirect to the first child page if one exists.
     *
     * @var boolean
     */
    public $redirect = true;

    /**
     * The post ID to save and load values from.
     *
     * @var string|int
     */
    public $post = 'options';

    /**
     * The option page autoload setting.
     *
     * @var bool
     */
    public $autoload = true;

    /**
     * The additional option page settings.
     *
     * @var array
     */
    public $settings = [];

    /**
     * Localized text displayed on the submit button.
     */
    public function updateButton(): string
    {
        return __('Обновить', 'acf');
    }

    /**
     * Localized text displayed after form submission.
     */
    public function updatedMessage(): string
    {
        return __('Обновлено!', 'acf');
    }

    /**
     * The option page field group.
     * @throws FieldNameCollisionException
     */
    public function fields(): array
    {
        $options = Builder::make('options');

        $options
            ->addGroup('table', [
                'label' => 'Таблица',
                'instructions' => 'Только значения, шапка таблицы не меняется.',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '80%',
                    'class' => '',
                    'id' => '',
                ],
                'layout' => 'block'
            ])
            ->addText('sub_field_row_1_col_1', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_1_col_2', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_2_col_1', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_2_col_2', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_3_col_1', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_3_col_2', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_4_col_1', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_4_col_2', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_5_col_1', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_5_col_2', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_6_col_1', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->addText('sub_field_row_6_col_2', [
                'label' => '',
                'wrapper' => [ 'width' => '50%']
            ])
            ->endGroup()
            ->addGroup('сonditions', [
                'label' => 'Условия',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [],
                'wrapper' => [
                    'width' => '80%',
                    'class' => '',
                    'id' => '',
                ],
                'layout' => 'block'
            ])
            ->addText('condition_1', [
                'label' => 'Заголовок',
                'wrapper' => [ 'width' => '100%']
            ])
            ->addTextarea('condition_textarea_1', [
                'label' => 'Описание',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '<br>', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addText('condition_2', [
                'label' => 'Заголовок',
                'wrapper' => [ 'width' => '100%']
            ])
            ->addTextarea('condition_textarea_2', [
                'label' => 'Описание',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '<br>', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addText('condition_3', [
                'label' => 'Заголовок',
                'wrapper' => [ 'width' => '100%']
            ])
            ->addTextarea('condition_textarea_3', [
                'label' => 'Описание',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '<br>', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addText('condition_4', [
                'label' => 'Заголовок',
                'wrapper' => [ 'width' => '100%']
            ])
            ->addTextarea('condition_textarea_4', [
                'label' => 'Описание',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '<br>', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addText('condition_5', [
                'label' => 'Заголовок',
                'wrapper' => [ 'width' => '100%']
            ])
            ->addTextarea('condition_textarea_5', [
                'label' => 'Описание',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '<br>', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addText('condition_6', [
                'label' => 'Заголовок',
                'wrapper' => [ 'width' => '100%']
            ])
            ->addTextarea('condition_textarea_6', [
                'label' => 'Описание',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '<br>', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addText('condition_7', [
                'label' => 'Заголовок',
                'wrapper' => [ 'width' => '100%']
            ])
            ->addTextarea('condition_textarea_7', [
                'label' => 'Описание',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '<br>', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->addText('condition_8', [
                'label' => 'Заголовок',
                'wrapper' => [ 'width' => '100%']
            ])
            ->addTextarea('condition_textarea_8', [
                'label' => 'Описание',
                'instructions' => '',
                'required' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '<br>', // Possible values are 'wpautop', 'br', or ''.
            ])
            ->endGroup();



        return $options->build();
    }
}
