<?php

namespace Drupal\mymodule\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

class MymoduleController extends ControllerBase {
	/**
   * Generates an user bulk upload page.
   */
  public function mymodule() {






 $result = \Drupal::database()->select('form_data', 'n')
            ->fields('n', array('id', 'name', 'lastname', 'email', 'number', 'DOB', 'gender', 'confirmation', 'copy'))
            ->execute()->fetchAllAssoc('id');
            // echo '<pre>';
            // print_r($result);
            // die();
// Create the row element.
    $rows = array();
    foreach ($result as $row => $conten) {
      $rows[] = array(
        'data' => array($conten->id, $conten->name, $conten->lastname, $conten->email, $conten->number, $conten->DOB, $conten->gender, $conten->confirmation, $conten->copy));
    }
    // echo '<pre>';
    // print_r($rows);
    // die();
// Create the header.
    $header = array('Id', 'Name', 'Lastname','Email','Number','DOB','Gender','Confirmation','Copy');
    $output = array(
      '#type' => 'table',    // Here you can write #type also instead of #theme.
      '#header' => $header,
      '#rows' => $rows
    );
    // echo '<pre>';
    // print_r($output);
    // die();
    return $output;																											

}
}

