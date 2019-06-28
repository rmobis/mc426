<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase {
	/**
	 * Tests if the homepage is loaded correctly
	 *
	 * @return void
	 */
	public function testHomeSendsToLogin() {
		// The user tries to load the home page
		$response = $this->get('/');

		// They get redirected to a login pager!
		$response->assertRedirect("login");
	}

	public function testLoginPromptsForLoginDetails() {
		// The user tries to load the kogin page
		$response = $this->get('/login');

		// They succeed!
		$response->assertStatus(200);

		// A nice form is shown with some field names
		$response->assertSee("E-Mail Address");
		$response->assertSee("Password");
	}
}
