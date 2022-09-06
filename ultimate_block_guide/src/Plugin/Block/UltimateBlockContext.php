<?php

namespace Drupal\ultimate_block_guide\Plugin\Block;

use Drupal\Component\Plugin\Exception\ContextException;
use Drupal\Core\Block\BlockBase;
use Drupal\user\Entity\User;

/**
 * Provides a block that uses twig to render its content.
 *
 * @Block(
 *   id = "ultimate_block_context",
 *   admin_label = @Translation("Ultimate guide to blocks: Context"),
 *   category = "Examples",
 *   context_definitions = {
 *     "user" = @ContextDefinition("entity:user", label = @Translation("User"))
 *   }
 * )
 */
class UltimateBlockContext extends BlockBase {

  /**
   * {@inheritdoc}
   * @throws \Drupal\Component\Plugin\Exception\ContextException
   */
  public function build() {

    try {
      // Get the context value. If the context is not found, ContextException
      // is thrown. Make sure to handle it accordingly.
      /** @var \Drupal\user\Entity\User $user */
      $user = $this->getContextValue('user');
    }
    catch (ContextException $e) {
      // Handle the exception here.
    }

    // If the context is found and the user isn't anonymous then return its
    // name, else write 'anon' as Drupal doesn't have default name for
    // non-logged in users.
    if ($user instanceof User && !$user->isAnonymous()) {
      return [
        '#theme' => 'context_block',
        '#name' => $user->get('name')->value,
      ];
    }
    else {
      return [
        '#theme' => 'context_block',
        '#name' => 'anon',
      ];
    }
  }

}
