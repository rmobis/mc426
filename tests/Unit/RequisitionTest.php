<?php

namespace Tests\Unit;

use \App\Requisition;
use \App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RequisitionTest extends TestCase {
	public function testCanInstantiateARequisition() {
		$req = new Requisition();
		$this->assertNotNull($req);
	}

	public function testRequisitionFailsWithNullTopic() {
		$this->expectException(\Illuminate\Database\QueryException::class);
		$req = new Requisition();
		$req->topic = NULL;
		$req->description = "hai";
		$req->category_id = 0;
		$req->save();
	}
}
