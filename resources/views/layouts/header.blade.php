<div class="banner">
	<div class="logo-dac">
		<img src="{{ URL::asset('images/logo_dac.svg') }}" alt="" />
	</div>
	<div class="banner__title">
		<h2>Sistemas Acadêmicos - Formulário de Atendimento ao usuário</h2>
	</div>
	<div class="logo-unicamp">
		<img src="{{ URL::asset('images/logo_unicamp.svg') }}" alt="" height="50" />
	</div>
</div>
<div class="navigation">
	<div class="container">
		<ul class="menu">
			@guest
				<li>
					<a href="{{ route('login') }}" class="{{ Route::is('login') == '/' ? 'active' : '' }}">
						Entrar
					</a>
				</li>
				@if (Route::has('register'))
					<li>
						<a href="{{ route('register') }}" class="{{ Route::is('register') == '/' ? 'active' : '' }}">
							Cadastrar
						</a>
					</li>
				@endif
			@else
				<li>
					<a href="/list" class="{{ stripos(Request::path(), 'list') !== false ? 'active' : '' }}">
						Minhas Solicitações
					</a>
				</li>
				<li>
					<a href="/" class="{{ Request::path() == '/' ? 'active' : '' }}">
						Nova Solicitação
					</a>
				</li>
				<li>
					<a
						href="{{ route('logout') }}"
						class="{{ Route::is('logout') ? 'active' : '' }}"
						onclick="event.preventDefault();document.getElementById('logout-form').submit();"
					>
						Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</li>
			@endguest
		</ul>
	</div>
</div>
