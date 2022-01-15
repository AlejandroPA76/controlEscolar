<?php

namespace App\Resolvers;

use Exception;
use App\Models\PlataformaPago;

class PaymentPlatformResolver
{
    protected $plataformaPagos;

    public function __construct()
    {
        $this->plataformaPagos = PlataformaPago::all();
    }

    public function resolveService($plataformaPagosId)
    {
        $name = strtolower($this->plataformaPagos->firstWhere('id', $plataformaPagosId)->name);

        $service = config("services.{$name}.class");

        if ($service) {
            return resolve($service);
        }

        throw new Exception('The selected payment platform is not in the configuration');
    }
}
