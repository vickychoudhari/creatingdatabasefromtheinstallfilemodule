<?php

/**
 * @file
 * Contains \Drupal\mymodule\Form\MymoduleForm.
 */
namespace Drupal\mymodule\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class MymoduleForm extends FormBase{
	/**
   * {@inheritdoc}
   */
public function getFormId(){
	return 'mymodule_form';
}

public function buildForm(array $form, FormStateInterface $form_state) {
$form['candidate_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name:'),
      '#required' => TRUE,
    );
$form['candidate_lastname'] =array(
      '#type' => 'textfield',
      '#title' => t('Last Name:'),
      '#required' => TRUE,
  );
$form['candidate_email'] =array(
      '#type' => 'email',
      '#title' => t('Email Id:'),
      '#required' => TRUE,
  );
$form['candidate_number'] = array (
      '#type' => 'tel',
      '#title' => t('Mobile no'),
    );
$form['candidate_dob'] = array (
      '#type' => 'date',
      '#title' => t('DOB'),
      '#required' => TRUE,
    );
$form['candidate_gender'] = array (
      '#type' => 'select',
      '#title' => ('Gender'),
      '#options' => array(
        'Female' => t('Female'),
        'male' => t('Male'),
      ),
    );
$form['candidate_confirmation'] = array (
      '#type' => 'radios',
      '#title' => ('Are you above 18 years old?'),
      '#options' => array(
        'Yes' =>t('Yes'),
        'No' =>t('No')
      ),
  );
$form['candidate_copy'] = array(
      '#type' => 'checkbox',
      '#title' => t('Send me a copy of the application.'),
    );
$form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }
  public function validateForm(array &$form, FormStateInterface $form_state) {
      if (strlen($form_state->getValue('candidate_number')) < 10) {
        $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
      }
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
$insert=db_insert('form_data')
      ->fields(array( 
   'name'=>$form_state->getValue(['candidate_name']),
   'lastname'=>$form_state->getValue(['candidate_lastname']),
   'email'=>$form_state->getValue(['candidate_email']),
   'number'=>$form_state->getValue(['candidate_number']),
   'DOB'=>$form_state->getValue(['candidate_dob']),
   'gender'=>$form_state->getValue(['candidate_gender']),
   'confirmation'=>$form_state->getValue(['candidate_confirmation']),
   'copy'=>$form_state->getValue(['candidate_copy']),
))
      ->execute();
      drupal_set_message(t('Then Your form is submitted'));
 $form_state->setRedirect('mymodule.mypage');
}


}


   ?>















