<?php

namespace Drupal\my_module\Controller;
use Drupal\Core\Controller\ControllerBase;


class HelloController extends ControllerBase {

    public function showContent(){
        $config = \Drupal::config('my_module.settings');
        $description = $config->get('description')['value'];
        $picture = $config->get('picture')['value'];
        $organization = $config->get('organization_name');
        return [
          'markup1' => ['#markup'=> $picture],
          'markup2' => ['#markup'=> $organization],
          'markup3' => ['#markup'=> $description],
        ];
    }

}
