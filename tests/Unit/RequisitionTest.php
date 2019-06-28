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
		$req->topic = null;
		$req->description = "hai";
		$req->category_id = 0;
		$req->save();
	}


	public function testRequisitionValidadwithoutDescription() {
		$this->expectException(\Illuminate\Database\QueryException::class);
		$req = new Requisition();
		$req->description = null;
		$req->topic = "testedescription";
		$req->category_id = 0;
		$req->save();
	}

	public function testRequisitionFailsWithNullCategory() {
		$this->expectException(\Illuminate\Database\QueryException::class);
		$req = new Requisition();
		$req->topic = "Topic #3";
		$req->description = "Test123...";
		$req->category_id = null;
		$req->save();
	}

	public function testRequisitionDisplaysRating() {
		$req = new Requisition();
		$req->topic = "Topic #3";
		$req->description = "Test123...";
		$req->category_id = NULL;
		$req->save();
	}
}
