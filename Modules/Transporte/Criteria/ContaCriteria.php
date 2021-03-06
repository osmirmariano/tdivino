<?php

namespace Modules\Transporte\Criteria;

use Portal\Criteria\BaseCriteria;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class NewsletterCriteria
 * @package namespace Portal\Criteria;
 */
class ContaCriteria extends BaseCriteria
{
    protected $filterCriteria = [
        'transporte_contas.user_id'      =>'=',
    ];
}
