<?php

namespace Drupal\my_module\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;


class MyConfigForm extends ConfigFormBase {

    public function getFormId(){
        return 'my_module_config_form';
    }

    protected function getEditableConfigNames()
    {
        return [
            'my_module.settings'
        ];
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {


        $config = $this->config('my_module.settings');

        $form['organization_name'] = [
            '#type' => 'textfield',
            '#title' => 'Name of the Organization',
            '#description' => 'Fill this field with the name of the organization',
            '#default_value' => $config->get('organization_name')
        ];

      $form['picture'] = [
        '#type' => 'text_format',
        '#title' => 'Picture of the organization',
        '#description' => 'Choose a picture',
        '#default_value' => $config->get('picture')['value'],
        '#required' => TRUE,
        ];
        $form['description'] = [
            '#type' => 'text_format',
            '#title' => 'Description of the organization',
            '#description' => 'Enter the description',
            '#default_value' => $config->get('description')['value'],
            '#required' => TRUE,
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'submit form',

        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $config = $this->config('my_module.settings');
        $config->set('organization_name',$form_state->getValue('organization_name'));
        $config->set('picture',$form_state->getValue('picture'));
        $config->set('description',$form_state->getValue('description'));

        $config->save();

        return parent::submitForm($form, $form_state);
    }
}
