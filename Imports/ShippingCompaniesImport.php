<?php

namespace Modules\Client\Imports;


use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Events\BeforeImport;
use Illuminate\Support\Facades\Storage;

use Modules\Client\Events\BeforeImportEvent;
use Modules\Client\Events\AfterImportEvent;
use Modules\Client\Repositories\ShippingCompanyRepository;
use Modules\ImportWidget\Services\SessionService;

use Exception;

class ShippingCompaniesImport implements OnEachRow, WithHeadingRow, WithEvents
{

	use Importable, RegistersEventListeners;

	private $total_rows;

	public function onRow(Row $row)
	{
		try  
		{
			$data = $this->parse($row->toArray());

			$shipping_company = ShippingCompanyRepository::loadByUniqueKeys($data['id'], $data['name']);
			if($shipping_company){
				$shipping_company = ShippingCompanyRepository::update($shipping_company, $data);
				SessionService::updated('Client', 'importShippingCompanies', true, 'ShippingCompany '.$shipping_company->id.' atualizado: '. json_encode($shipping_company->toJson())."\r\n");
			} else {
				$shipping_company = ShippingCompanyRepository::store($data);
				SessionService::new('Client', 'importShippingCompanies', true);
			}
		} catch(Exception $e) {
			SessionService::failures('Client', 'importShippingCompanies', true, $e->getMessage()."\r\n"); 
		}
		SessionService::completed('Client', 'importShippingCompanies', ($row->getRowIndex()/$this->total_rows)*100); 
	}

	private function parse($data)
	{
		return $data;	
	}


	public static function beforeImport(BeforeImport $event)
	{
		SessionService::title('Client', 'importShippingCompanies', 'Transportadoras'); 
		$cells = $event->getDelegate()->getActiveSheet()->toArray();
		$import = $event->getConcernable();
		$import->data($cells);
	}

	public function data($cells)
	{
		$this->total_rows = count($cells);
	}
}
