<?php

namespace AppBundle\Repository;
use DateTime;

/**
 * TaskRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaskRepository extends \Doctrine\ORM\EntityRepository
{

	public function findTasksByDay($familyId, $day, $page = 1)
	{
		$startDay = new Datetime($day);
		$endDay = new Datetime($day);
		$endDay->setTime(23, 59, 59);

	    $q = $this
	        ->createQueryBuilder('t')
	        ->where('t.start >= :dayStart')
			->andWhere('t.start <= :dayEnd')
			->setParameter('dayStart', $startDay, \Doctrine\DBAL\Types\Type::DATETIME)
			->setParameter('dayEnd', $endDay, \Doctrine\DBAL\Types\Type::DATETIME)
	        ->getQuery();

	    return $q->getResult();
	}
}
