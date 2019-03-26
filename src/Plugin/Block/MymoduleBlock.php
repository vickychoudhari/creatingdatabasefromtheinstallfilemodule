<?php

namespace Drupal\mymodule\Plugin\Block;

use Drupal\Core\Form\FormInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Form\FormBase;
/**
	 * Provides a 'CustomBlock' block.
	 *
	 * @Block(
	 *  id = "customblock",
	 *  admin_label = @Translation("THE FORM API USER INFO  "),
	 * )
	 */

class MymoduleBlock extends BlockBase {
	  public function build() {
  $form = \Drupal::formBuilder()->getForm('Drupal\resume\Form\ResumeForm');
    return $form;
  }

}