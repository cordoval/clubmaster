<?php

namespace Club\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AdminProfileEmail extends AbstractType
{
  public function buildForm(FormBuilder $builder, array $options)
  {
    $builder->add('email_address');
  }

  public function getDefaultOptions(array $options)
  {
    return array(
      'data_class' => 'Club\UserBundle\Entity\ProfileEmail'
    );
  }

  public function getName()
  {
    return 'admin_profile_email';
  }
}
