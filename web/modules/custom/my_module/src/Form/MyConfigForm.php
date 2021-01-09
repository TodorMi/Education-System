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

        $form['country_of_origin'] = [
            '#type' => 'textfield',
            '#title' => 'Shop Location',
            '#description' => 'Fill this field with the shop\'s location',
            '#default_value' => $config->get('country_of_origin'),
        ];

        $form['open_shops'] = [
            '#title' => 'The shop is:',
            '#type' => 'checkbox',
            '#description' => 'Checked = Open, Unchecked = Closed',
            '#default_value' => $config->get('open_shops'),
        ];

        $form['terms_and_conditions'] = [
            '#type' => 'text_format',
            '#title' => 'Terms and conditions',
            '#description' => 'Enter the conditions',
            '#default_value' => $config->get('terms_and_conditions')['value'],
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
        $config->set('country_of_origin',$form_state->getValue('country_of_origin'));
        $config->set('open_shops',$form_state->getValue('open_shops'));
        $config->set('terms_and_conditions',$form_state->getValue('terms_and_conditions'));

        $config->save();

        return parent::submitForm($form, $form_state);
    }
}