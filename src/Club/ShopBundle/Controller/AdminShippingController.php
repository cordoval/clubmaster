<?php

namespace Club\ShopBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminShippingController extends Controller
{
  /**
   * @Route("/shop/shipping", name="admin_shop_shipping")
   * @Template()
   */
  public function indexAction()
  {
    $em = $this->getDoctrine()->getEntityManager();
    $shippings = $em->getRepository('ClubShopBundle:Shipping')->findAll();

    return array(
      'shippings' => $shippings
    );
  }

  /**
   * @Route("/shop/shipping/new", name="admin_shop_shipping_new")
   * @Template()
   */
  public function newAction()
  {
    $shipping = new \Club\ShopBundle\Entity\Shipping();
    $res = $this->process($shipping);

    if ($res instanceOf RedirectResponse)
      return $res;

    return array(
      'form' => $res->createView()
    );
  }

  /**
   * @Route("/shop/shipping/edit/{id}", name="admin_shop_shipping_edit")
   * @Template()
   */
  public function editAction($id)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $shipping = $em->find('ClubShopBundle:Shipping',$id);

    $res = $this->process($shipping);

    if ($res instanceOf RedirectResponse)
      return $res;

    return array(
      'shipping' => $shipping,
      'form' => $res->createView()
    );
  }

  /**
   * @Route("/shop/shipping/delete/{id}", name="admin_shop_shipping_delete")
   */
  public function deleteAction($id)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $shipping = $em->find('ClubShopBundle:Shipping',$this->getRequest()->get('id'));

    $em->remove($shipping);
    $em->flush();

    $this->get('session')->setFlash('notify',sprintf('Shipping %s deleted.',$shipping->getShippingName()));

    return $this->redirect($this->generateUrl('admin_shop_shipping'));
  }

  protected function process($shipping)
  {
    $form = $this->createForm(new \Club\ShopBundle\Form\Shipping(), $shipping);

    if ($this->getRequest()->getMethod() == 'POST') {
      $form->bindRequest($this->getRequest());
      if ($form->isValid()) {
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($shipping);
        $em->flush();

        $this->get('session')->setFlash('notice','Your changes were saved!');

        return $this->redirect($this->generateUrl('admin_shop_shipping'));
      }
    }

    return $form;
  }
}
