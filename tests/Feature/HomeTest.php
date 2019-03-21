<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
	/**
	 * Tests if the homepage is loaded correctly
	 *
	 * @return void
	 */
	public function testBasicTest()
	{
		// The user tries to load the home page
		$response = $this->get('/');

		// They succeed!
		$response->assertStatus(200);

		// A nice form is shown with some field names		
		$response->assertSee("Assunto");
		$response->assertSee("Categoria");
		$response->assertSee("Descrição");
	}
}
