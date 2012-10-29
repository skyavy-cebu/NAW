<?php

/**
 * industry actions.
 *
 * @package    symfony
 * @subpackage industry
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class industryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->industrys = Doctrine_Core::getTable('Industry')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->industry = Doctrine_Core::getTable('Industry')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->industry);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new IndustryForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new IndustryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($industry = Doctrine_Core::getTable('Industry')->find(array($request->getParameter('id'))), sprintf('Object industry does not exist (%s).', $request->getParameter('id')));
    $this->form = new IndustryForm($industry);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($industry = Doctrine_Core::getTable('Industry')->find(array($request->getParameter('id'))), sprintf('Object industry does not exist (%s).', $request->getParameter('id')));
    $this->form = new IndustryForm($industry);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($industry = Doctrine_Core::getTable('Industry')->find(array($request->getParameter('id'))), sprintf('Object industry does not exist (%s).', $request->getParameter('id')));
    $industry->delete();

    $this->redirect('industry/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $industry = $form->save();

      $this->redirect('industry/edit?id='.$industry->getId());
    }
  }
}
