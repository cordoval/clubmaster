<?php

namespace Club\AccountBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Ledger
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Ledger extends EntityRepository
{
  public function getCount($filter)
  {
    $qb = $this->getQueryBuilder();
    $qb = $this->filterAccount($qb, $filter['account']);
    return count($qb->getQuery()->getResult());
  }

  public function getWithPagination($filter, $order_by, $offset = 0, $limit = 0) {
    $qb = $this->getQueryBuilder();
    $qb = $this->filterAccount($qb,$filter['account']);

    if ((isset($offset)) && (isset($limit))) {
      if ($limit > 0) {
        $qb->setFirstResult($offset);
        $qb->setMaxResults($limit);
      }
    }

    return $qb
      ->getQuery()
      ->getResult();
  }

  private function getQueryBuilder()
  {
    return $this->_em->createQueryBuilder()
      ->select('l')
      ->from('ClubAccountBundle:Ledger','l');
  }

  private function filterAccount($qb,$account)
  {
    return $qb
      ->andWhere('l.account = :account')
      ->setParameter('account',$account);
  }
}