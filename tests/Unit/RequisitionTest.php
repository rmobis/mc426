<?php

namespace Tests\Unit;

use \App\Requisition;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RequisitionTest extends TestCase
{
	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testCanInstantiateARequisition()
	{
		$req = new Requisition();
		$this->assertNotNull($req);
	}
}
