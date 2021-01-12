<?php

namespace Drupal\quote_module\Plugin\Block;
use Drupal\Core\Block\BlockBase;


class QuoteBlock extends BlockBase {


  public function build() {

    return [
      '#markup' => $this->getRandomQuote(),
      '#cache' => [
        'max-age' => 0
      ],
    ];
  }

  private function getRandomQuote() {
    $quotes = [
      '<h3>Start where you are. Use what you have. Do what you can. <i>Arthur Ashe</i></h3>',
      '<h3>Don’t wish it were easier; wish you were better. <i>Jim Rohn</i></h3>',
      '<h3>The secret to getting ahead is getting started. <i>Unknown</i></h3>',
      '<h3>Success is the sum of small efforts, repeated day in and day out. <i>Robert Collier</i></h3>',
      '<h3>Don’t let what you cannot do interfere with what you can do. <i>John Wooden</i></h3>',
      '<h3>Failure is the opportunity to begin again more intelligently. <i>Henry Ford</i></h3>',
      '<h3>If it’s important to you, you’ll find a way. If not, you’ll find an excuse. <i>Unknown</i></h3>',
    ];
    return $quotes[array_rand($quotes)];
  }


}

