<?php

namespace Drupal\ultimate_block_guide\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block that uses twig to render its content.
 *
 * @Block(
 *   id = "ultimate_block_custom_css",
 *   admin_label = @Translation("Ultimate guide to blocks: custom CSS"),
 *   category = "Examples"
 * )
 */
class UltimateBlockCustomCss extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#theme' => 'css_block',
      // You can attach the css library here, by using the following structure:
      /*'#attached' => [
        'library' => [
          'ultimate_block_guide/js_lib',
        ],
      ],*/
    ];
  }

}
