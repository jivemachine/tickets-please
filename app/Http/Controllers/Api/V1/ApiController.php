<?php

namespace App\Http\Controllers\Api\V1;

use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ApiController extends Controller
{
    use ApiResponses;

    protected $policyClass;


    public function include(string $relationship): bool
    {
        $param = request()->get('include');

        if (!isset($param)) {
            return false;
        }

        $includeValues = explode(',', strtolower($param));

        return in_array(strtolower($relationship), $includeValues);
    }

    public function isAble($ability, $targetModel)
    {
        // $gate = Gate::policy($targetModel::class, $this->policyClass);
        // return $gate->authorize($ability, [$targetModel]);
        $modelClass = is_object($targetModel) ? get_class($targetModel) : $targetModel;
        $gate = Gate::policy($modelClass, $this->policyClass);
        return $gate->authorize($ability, [$targetModel]);
    }
}
