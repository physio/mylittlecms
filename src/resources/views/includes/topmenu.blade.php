				<!-- Main Menu -->
				<nav id="menu-wrapper" >
					
					<ul id="main-menu">
						<li>
							<a href="/" {{{ (Request::is('/') ? 'class=active' : '') }}}>Home</a>
						</li>
						<li>
							<a href="/chi-siamo" {{{ (Request::is('chi-siamo') ? 'class=active' : '') }}}>Chi Siamo</a>
							<ul>
								<li>
									<a href="/team" {{{ (Request::is('team') ? 'class=active' : '') }}}>Il Nostro Team</a>
								</li>
								<li>
									<a href="/fornitori" {{{ (Request::is('fornitori') ? 'class=active' : '') }}}>I Nostri Fornitori</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="/news" {{{ (Request::is('news') ? 'class=active' : '') }}}>News</a>
						</li>						


						<li>
							<a href="/contatti" {{{ (Request::is('contatti') ? 'class=active' : '') }}}>Contatti</a>
						</li>
					</ul>
