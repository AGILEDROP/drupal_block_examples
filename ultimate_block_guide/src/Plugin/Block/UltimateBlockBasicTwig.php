<?php

namespace Drupal\ultimate_block_guide\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block that uses twig to render its content.
 *
 * @Block(
 *   id = "ultimate_block_basic_twig",
 *   admin_label = @Translation("Ultimate guide to blocks: render with twig"),
 *   category = "Examples"
 * )
 */
class UltimateBlockBasicTwig extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'basic_twig_block',
      '#text' => 'This is a block that was rendered with twig!',
    ];
  }

}
