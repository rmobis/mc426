<?php

namespace Tests\Unit;

use \App\Requisition;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RequisitionTest extends TestCase {
	public function testCanInstantiateARequisition() {
		$req = new Requisition();
		$this->assertNotNull($req);
	}

	public function testRequisitionValidatesRequiredField() {
		$req = new Requisition();
		$req->title = null;
	}
}
