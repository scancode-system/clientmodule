<?php

namespace Modules\Client\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Client\Repositories\ShippingCompanyRepository;

class BeforeImportClientListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $data = $event->data();
        if(isset($data['shipping_company_id']) && isset($data['shipping_company_name']))
        {
            return ['shipping_company_id' => $this->shippingCompanyId($data['shipping_company_id'], $data['shipping_company_name'])];
        }
        return [];
    }

    private function shippingCompanyId($shipping_company_id, $shipping_company_name)
    {
        $shipping_company = ShippingCompanyRepository::loadById($shipping_company_id);
        if($shipping_company)
        {
            return $shipping_company->id;
        }

        $shipping_company = ShippingCompanyRepository::loadByName($shipping_company_name);
        if(!$shipping_company)
        {
            if(!is_null($shipping_company_name))
            {
                $shipping_company = ShippingCompanyRepository::store(['id' => $shipping_company_id, 'name' => $shipping_company_name]);
            }
        } 
        if($shipping_company)
        {
            return $shipping_company->id;
        } else
        {
            return null;
        }
    }

}
