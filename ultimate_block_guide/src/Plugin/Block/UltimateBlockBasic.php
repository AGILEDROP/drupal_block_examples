<?php

namespace Drupal\ultimate_block_guide\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block with a simple text.
 *
 * @Block(
 *   id = "ultimate_block_basic",
 *   admin_label = @Translation("Ultimate guide to blocks: basic"),
 *   category = "Examples"
 * )
 */
class UltimateBlockBasic extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => 'This is a simple block that displays some text!',
    ];
  }

}
