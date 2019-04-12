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
			<li>
				<a href="/list" class="{{ stripos(Request::path(), 'list') !== false ? 'active' : ''  }}">
					Minhas Solicitações
				</a>
			</li>
			<li>
				<a href="/" class="{{ Request::path() == '/' ? 'active' : ''  }}">
					Nova Solicitação
				</a>
			</li>
			<!-- <li>
				<a href="#">
					Sair
				</a>
			</li> -->
		</ul>
	</div>
</div>
