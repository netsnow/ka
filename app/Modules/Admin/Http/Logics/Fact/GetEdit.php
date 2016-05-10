<?php

namespace App\Modules\Admin\Http\Logics\Fact;

use App\Eloquents\Fact;
use Exception;
use Request;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getFact();
    }

    protected function getFact()
    {
        $getFact = Fact::find($this->factId);

        if (!$getFact) {
            abort(404, '没有这个品牌');
        }

        $this->result['fact'] = $getFact;
    }
}
