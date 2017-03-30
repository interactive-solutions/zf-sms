<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types=1);

namespace InteractiveSolutions\Sms\Controller;

use Doctrine\Common\Collections\Criteria;
use DoctrineModule\Paginator\Adapter\Selectable;
use InteractiveSolutions\Sms\Entity\DeliveryReportEntity;
use InteractiveSolutions\Sms\InputFilter\DeliveryReportUpdateInputFilter;
use InteractiveSolutions\Sms\Repository\DeliveryReportRepositoryInterface;
use InteractiveSolutions\Sms\Service\DeliveryReportServiceInterface;
use InteractiveSolutions\Sms\SmsPermissions;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Paginator\Paginator;
use ZfrRest\Http\Exception\Client\ForbiddenException;
use ZfrRest\Mvc\Controller\AbstractRestfulController;
use ZfrRest\View\Model\ResourceViewModel;

/**
 * Class DeliveryReportController
 *
 * @method bool isGranted($permission)
 * @method Request getRequest
 * @method Response getResponse
 * @method DeliveryReportEntity getEntity($className, $id, $permission = null, $message = null)
 */
final class DeliveryReportCollectionController extends AbstractRestfulController
{
    /**
     * @var DeliveryReportRepositoryInterface
     */
    private $repository;

    /**
     * @var DeliveryReportServiceInterface
     */
    private $service;

    /**
     * DeliveryReportCollectionController constructor.
     * @param DeliveryReportRepositoryInterface $repository
     * @param DeliveryReportServiceInterface $service
     */
    public function __construct(DeliveryReportRepositoryInterface $repository, DeliveryReportServiceInterface $service)
    {
        $this->repository = $repository;
        $this->service    = $service;
    }

    /**
     * @return ResourceViewModel
     * @throws \Zend\Paginator\Exception\InvalidArgumentException
     * @throws \ZfrRest\Http\Exception\Client\ForbiddenException
     */
    public function get(): ResourceViewModel
    {
        if (!$this->isGranted(SmsPermissions::GET_DELIVERY_REPORTS)) {
            throw new ForbiddenException('User does not have permission to retrieve all sms delivery reports');
        }

        $parameters = $this->getRequest()->getQuery();

        $criteria = Criteria::create();

        if ($parameters->get('status')) {
            $criteria->andWhere(Criteria::expr()->eq('status', $parameters->get('status')));
        }

        $reports = new Paginator(new Selectable($this->repository, $criteria));
        $reports->setItemCountPerPage($parameters->get('limit', 20));
        $reports->setCurrentPageNumber($parameters->get('page', 0));

        return new ResourceViewModel(['reports' => $reports], ['template' => 'delivery-report/collection']);
    }

    /**
     * End point to receive delivery report updates
     *
     * @throws \ZfrRest\Http\Exception\Client\MethodNotAllowedException
     */
    public function post(): ResourceViewModel
    {
        $values = $this->validateIncomingData(DeliveryReportUpdateInputFilter::class);

        $report = $this->getEntity(DeliveryReportEntity::class, $values['id'], null, 'Delivery report not found');
        DeliveryReportEntity::updateStatus($report, $values);

        $this->service->update($report);

        return new ResourceViewModel(['report' => $report], ['template' => 'delivery-report/resource']);
    }
}
