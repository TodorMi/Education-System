<?php

namespace Drupal\my_module\Controller;
use Drupal\Core\Controller\ControllerBase;


class HelloController extends ControllerBase {

    public function showContent(){
        $config = \Drupal::config('my_module.settings');
        $terms = $config->get('description')['value'];
        $organization = $config->get('organization_name')['value'];
        return [
            '#type' => 'markup',
            '#markup' => $terms, $organization

        ];
    }

}
