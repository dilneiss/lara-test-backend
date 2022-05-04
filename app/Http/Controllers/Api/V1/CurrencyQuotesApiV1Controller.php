<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Helper\ArrayHelper;
use App\Http\Requests\CurrencyPriceRequest;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyQuotesApiV1Controller extends Controller
{

    protected Currency $model;

    public function __construct(Currency $model)
    {
        $this->model = $model;
    }

    public function price(CurrencyPriceRequest $request): JsonResource
    {

        $symbols = ArrayHelper::ExplodeCommaUnique($request->symbols);

        $data = $this->model->orderBy('id', 'desc')->whereIn('symbol', $symbols)->get();

        return CurrencyResource::collection($data);

    }

}
