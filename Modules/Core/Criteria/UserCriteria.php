<?php

namespace Modules\Core\Criteria;

use Portal\Criteria\BaseCriteria;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class UserCriteria
 * @package namespace Portal\Criteria;
 */
class UserCriteria extends BaseCriteria implements CriteriaInterface
{
    protected $filterCriteria = [
        'users.name' => 'ilike',
        'users.email' => 'like',
        'pessoas.cpf_cnpj' => 'like',
        'roles.slug' => 'in',
        'users.sexo' => '=',
        'users.created_at' => 'between',
    ];

    public function apply($model, RepositoryInterface $repository)
    {
        $model = parent::apply($model, $repository);
        return $model
            ->leftJoin('pessoas', 'users.pessoa_id', 'pessoas.id')
            ->join('role_user', 'users.id', 'role_user.user_id')
            ->join('roles', 'roles.id', 'role_user.role_id')
            ->select(array_merge($this->defaultTable));
    }
}
