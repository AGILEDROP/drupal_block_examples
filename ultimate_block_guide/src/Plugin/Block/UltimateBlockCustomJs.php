<?php

namespace Drupal\ultimate_block_guide\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block that uses twig to render its content.
 *
 * @Block(
 *   id = "ultimate_block_custom_js",
 *   admin_label = @Translation("Ultimate guide to blocks: custom JS"),
 *   category = "Examples"
 * )
 */
class UltimateBlockCustomJs extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'js_block',
      '#attached' => [
        'library' => [
          'ultimate_block_guide/js_lib',
        ],
      ],
    ];
  }

}
