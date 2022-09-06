<?php

namespace Drupal\ultimate_block_guide\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a block that has custom configuration option.
 *
 * @Block(
 *   id = "ultimate_block_basic_config",
 *   admin_label = @Translation("Ultimate guide to blocks: configuration form"),
 *   category = "Examples"
 * )
 */
class UltimateBlockBasicConfigForm extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() : array {
    // Retrieve the message from the configuration and pass it into the render
    // array.
    $message = $this->getConfiguration()['message'];

    return [
      '#theme' => 'basic_twig_block',
      '#text' => $message,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) : array {
    $form = parent::blockForm($form, $form_state);

    // Retrieve the blocks configuration as the values provided in the form
    // are stored there.
    $config = $this->getConfiguration();

    // The form field is defined and added to the form array here.
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Message'),
      '#description' => $this->t('Type the message you want visitors to see'),
      '#default_value' => $config['message'] ?? '',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) : void {
    // The configuration form validation is performed here.
    // In this example we don't want the message text to be 'Hello world!'
    if ($form_state->getValue('message') === 'Hello world!') {
      $form_state->setErrorByName(
        'message',
        $this->t('You cannot enter the most generic text ever!')
      );
    }
  }

  /**
   *
   */
  public function blockSubmit($form, FormStateInterface $form_state) : void {
    // We do this to ensure no other configuration options get lost.
    parent::blockSubmit($form, $form_state);

    // Here the value entered by the user is saved into the configuration.
    $this->configuration['message'] = $form_state->getValue('message');
  }


}
