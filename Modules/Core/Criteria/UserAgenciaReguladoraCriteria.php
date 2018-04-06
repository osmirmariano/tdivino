<?php

namespace Modules\Core\Criteria;

use Modules\Core\Models\User;
use Portal\Criteria\BaseCriteria;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class UserCriteria
 * @package namespace Portal\Criteria;
 */
class UserAgenciaReguladoraCriteria extends BaseCriteria implements CriteriaInterface
{
    protected $filterCriteria = [
        'users.name'      =>'ilike',
        'users.email'     =>'like',
        'users.sexo'      =>'=',
        'users.created_at'=>'between',
    ];

    public function apply($model, RepositoryInterface $repository)
    {
        $model = parent::apply($model, $repository);
        return $model
            ->join('role_user','users.id','role_user.user_id')
            ->join('roles','roles.id','role_user.role_id')
			->where('roles.slug', User::FORNECEDOR)
			->where('users.apto_agencia', true)
            ->select(array_merge($this->defaultTable));
    }
}
