<?php
namespace Drupal\quote_block\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Quote Block' Block.
 *
 * @Block(
 *   id = "quote_block",
 *   admin_label = @Translation("Quote block"),
 *   category = @Translation("Quote block"),
 * )
 */
class QuoteBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->getRandQuote(),
      '#cache' => [
        'max-age' => 0
      ],
    ];
  }

  private function getRandQuote() {
    $quotes = [
      '<h3>"Start where you are. Use what you have. Do what you can. <i>-Anne Frank</i>"</h3>',
      '<h3>"The secret of success is to do the common things uncommonly well. <i>-John D. Rockefeller</i>"</h3>',
      '<h3>"Strive for progress, not perfection. <i>-Unknown</i>"</h3>',
      '<h3>"There are two kinds of people in this world: those who want to get things done and those who don’t want to make mistakes. <i>-John Maxwell</i>"</h3>',
      '<h3>"The secret to getting ahead is getting started. <i>-Unknown</i>"</h3>',
      '<h3>"There is no substitute for hard work. <i>-Thomas Edison</i>"</h3>',
      '<h3>"The only place where success comes before work is in the dictionary. <i>-Vidal Sassoon</i>"</h3>',
      '<h3>"Don’t let what you cannot do interfere with what you can do. <i>-John Wooden</i>"</h3>',
    ];
    return $quotes[array_rand($quotes)];
  }

}
