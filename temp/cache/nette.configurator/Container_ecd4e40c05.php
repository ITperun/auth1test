<?php
// source: /home/perunov/user-authentication/config/common.neon
// source: /home/perunov/user-authentication/config/services.neon
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_ecd4e40c05 extends Nette\DI\Container
{
	protected array $tags = [
		'nette.inject' => [
			'application.1' => true,
			'application.2' => true,
			'application.3' => true,
			'application.4' => true,
		],
	];

	protected array $aliases = [
		'application' => 'application.application',
		'cacheStorage' => 'cache.storage',
		'database.default' => 'database.default.connection',
		'database.default.context' => 'database.default.explorer',
		'httpRequest' => 'http.request',
		'httpResponse' => 'http.response',
		'nette.database.default' => 'database.default',
		'nette.database.default.context' => 'database.default.explorer',
		'nette.httpRequestFactory' => 'http.requestFactory',
		'nette.latteFactory' => 'latte.latteFactory',
		'nette.presenterFactory' => 'application.presenterFactory',
		'nette.templateFactory' => 'latte.templateFactory',
		'nette.userStorage' => 'security.userStorage',
		'session' => 'session.session',
		'user' => 'security.user',
	];

	protected array $wiring = [
		'Nette\DI\Container' => [['container']],
		'Nette\Application\Application' => [['application.application']],
		'Nette\Application\IPresenterFactory' => [['application.presenterFactory']],
		'Nette\Application\LinkGenerator' => [['application.linkGenerator']],
		'Nette\Caching\Storage' => [['cache.storage']],
		'Nette\Database\Connection' => [['database.default.connection']],
		'Nette\Database\IStructure' => [['database.default.structure']],
		'Nette\Database\Structure' => [['database.default.structure']],
		'Nette\Database\Conventions' => [['database.default.conventions']],
		'Nette\Database\Conventions\DiscoveredConventions' => [['database.default.conventions']],
		'Nette\Database\Explorer' => [['database.default.explorer']],
		'Nette\Http\RequestFactory' => [['http.requestFactory']],
		'Nette\Http\IRequest' => [['http.request']],
		'Nette\Http\Request' => [['http.request']],
		'Nette\Http\IResponse' => [['http.response']],
		'Nette\Http\Response' => [['http.response']],
		'Nette\Bridges\ApplicationLatte\LatteFactory' => [['latte.latteFactory']],
		'Nette\Application\UI\TemplateFactory' => [['latte.templateFactory']],
		'Nette\Bridges\ApplicationLatte\TemplateFactory' => [['latte.templateFactory']],
		'Nette\Security\Passwords' => [['security.passwords']],
		'Nette\Security\UserStorage' => [['security.userStorage']],
		'Nette\Security\User' => [['security.user']],
		'Nette\Http\Session' => [['session.session']],
		'Tracy\ILogger' => [['tracy.logger']],
		'Tracy\BlueScreen' => [['tracy.blueScreen']],
		'Tracy\Bar' => [['tracy.bar']],
		'Nette\Routing\RouteList' => [['01']],
		'Nette\Routing\Router' => [['01']],
		'ArrayAccess' => [2 => ['01', 'application.1', 'application.2']],
		'Nette\Application\Routers\RouteList' => [['01']],
		'Nette\Application\UI\Presenter' => [2 => ['application.1', 'application.2']],
		'Nette\Application\UI\Control' => [2 => ['application.1', 'application.2']],
		'Nette\Application\UI\Component' => [2 => ['application.1', 'application.2']],
		'Nette\ComponentModel\Container' => [2 => ['application.1', 'application.2']],
		'Nette\ComponentModel\Component' => [2 => ['application.1', 'application.2']],
		'Nette\Application\IPresenter' => [2 => ['application.1', 'application.2', 'application.3', 'application.4']],
		'Nette\Application\UI\Renderable' => [2 => ['application.1', 'application.2']],
		'Nette\Application\UI\StatePersistent' => [2 => ['application.1', 'application.2']],
		'Nette\Application\UI\SignalReceiver' => [2 => ['application.1', 'application.2']],
		'Nette\ComponentModel\IContainer' => [2 => ['application.1', 'application.2']],
		'Nette\ComponentModel\IComponent' => [2 => ['application.1', 'application.2']],
		'App\Presentation\Sign\SignPresenter' => [2 => ['application.1']],
		'App\Presentation\Dashboard\DashboardPresenter' => [2 => ['application.2']],
		'NetteModule\ErrorPresenter' => [2 => ['application.3']],
		'NetteModule\MicroPresenter' => [2 => ['application.4']],
		'Nette\Security\Authenticator' => [['02']],
		'Nette\Security\IAuthenticator' => [['02']],
		'App\Model\UserFacade' => [['02']],
		'App\Presentation\Accessory\FormFactory' => [['03']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
	}


	public function createService01(): Nette\Application\Routers\RouteList
	{
		return App\Core\RouterFactory::createRouter();
	}


	public function createService02(): App\Model\UserFacade
	{
		return new App\Model\UserFacade($this->getService('database.default.explorer'), $this->getService('security.passwords'));
	}


	public function createService03(): App\Presentation\Accessory\FormFactory
	{
		return new App\Presentation\Accessory\FormFactory($this->getService('security.user'));
	}


	public function createServiceApplication__1(): App\Presentation\Sign\SignPresenter
	{
		$service = new App\Presentation\Sign\SignPresenter($this->getService('02'), $this->getService('03'));
		$service->injectPrimary(
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__2(): App\Presentation\Dashboard\DashboardPresenter
	{
		$service = new App\Presentation\Dashboard\DashboardPresenter;
		$service->injectPrimary(
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->injectRequireLoggedUser();
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__3(): NetteModule\ErrorPresenter
	{
		return new NetteModule\ErrorPresenter($this->getService('tracy.logger'));
	}


	public function createServiceApplication__4(): NetteModule\MicroPresenter
	{
		return new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('01'));
	}


	public function createServiceApplication__application(): Nette\Application\Application
	{
		$service = new Nette\Application\Application(
			$this->getService('application.presenterFactory'),
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('http.response'),
		);
		Nette\Bridges\ApplicationDI\ApplicationExtension::initializeBlueScreenPanel(
			$this->getService('tracy.blueScreen'),
			$service,
		);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel(
			$this->getService('01'),
			$this->getService('http.request'),
			$this->getService('application.presenterFactory'),
		));
		return $service;
	}


	public function createServiceApplication__linkGenerator(): Nette\Application\LinkGenerator
	{
		return new Nette\Application\LinkGenerator(
			$this->getService('01'),
			$this->getService('http.request')->getUrl()->withoutUserInfo(),
			$this->getService('application.presenterFactory'),
		);
	}


	public function createServiceApplication__presenterFactory(): Nette\Application\IPresenterFactory
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback(
			$this,
			5,
			'/home/perunov/user-authentication/temp/cache/nette.application/touch',
		));
		$service->setMapping(['*' => 'App\Presentation\*\**Presenter']);
		return $service;
	}


	public function createServiceCache__storage(): Nette\Caching\Storage
	{
		return new Nette\Caching\Storages\FileStorage('/home/perunov/user-authentication/temp/cache');
	}


	public function createServiceContainer(): Nette\DI\Container
	{
		return $this;
	}


	public function createServiceDatabase__default__connection(): Nette\Database\Connection
	{
		$service = new Nette\Database\Connection(
			'mysql:host=127.0.0.1;dbname=quickstart',
			/*sensitive{*/'root'/*}*/,
			/*sensitive{*/'root'/*}*/,
			[],
		);
		Nette\Bridges\DatabaseTracy\ConnectionPanel::initialize(
			$service,
			true,
			'default',
			true,
			$this->getService('tracy.bar'),
			$this->getService('tracy.blueScreen'),
		);
		return $service;
	}


	public function createServiceDatabase__default__conventions(): Nette\Database\Conventions\DiscoveredConventions
	{
		return new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
	}


	public function createServiceDatabase__default__explorer(): Nette\Database\Explorer
	{
		return new Nette\Database\Explorer(
			$this->getService('database.default.connection'),
			$this->getService('database.default.structure'),
			$this->getService('database.default.conventions'),
			$this->getService('cache.storage'),
		);
	}


	public function createServiceDatabase__default__structure(): Nette\Database\Structure
	{
		return new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
	}


	public function createServiceHttp__request(): Nette\Http\Request
	{
		return $this->getService('http.requestFactory')->fromGlobals();
	}


	public function createServiceHttp__requestFactory(): Nette\Http\RequestFactory
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	public function createServiceHttp__response(): Nette\Http\Response
	{
		$service = new Nette\Http\Response;
		$service->cookieSecure = $this->getService('http.request')->isSecured();
		return $service;
	}


	public function createServiceLatte__latteFactory(): Nette\Bridges\ApplicationLatte\LatteFactory
	{
		return new class ($this) implements Nette\Bridges\ApplicationLatte\LatteFactory {
			public function __construct(
				private Container_ecd4e40c05 $container,
			) {
			}


			public function create(): Latte\Engine
			{
				$service = new Latte\Engine;
				$service->setTempDirectory('/home/perunov/user-authentication/temp/cache/latte');
				$service->setAutoRefresh(true);
				$service->setStrictTypes(false);
				$service->setStrictParsing(false);
				$service->enablePhpLinter(null);
				$service->setLocale(null);
				func_num_args() && $service->addExtension(new Nette\Bridges\ApplicationLatte\UIExtension(func_get_arg(0)));
				$service->addExtension(new Nette\Bridges\CacheLatte\CacheExtension($this->container->getService('cache.storage')));
				$service->addExtension(new Nette\Bridges\FormsLatte\FormsExtension);
				return $service;
			}
		};
	}


	public function createServiceLatte__templateFactory(): Nette\Bridges\ApplicationLatte\TemplateFactory
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory(
			$this->getService('latte.latteFactory'),
			$this->getService('http.request'),
			$this->getService('security.user'),
			$this->getService('cache.storage'),
			null,
		);
		Nette\Bridges\ApplicationDI\LatteExtension::initLattePanel($service, $this->getService('tracy.bar'), false);
		return $service;
	}


	public function createServiceSecurity__passwords(): Nette\Security\Passwords
	{
		return new Nette\Security\Passwords;
	}


	public function createServiceSecurity__user(): Nette\Security\User
	{
		$service = new Nette\Security\User($this->getService('security.userStorage'), $this->getService('02'));
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	public function createServiceSecurity__userStorage(): Nette\Security\UserStorage
	{
		return new Nette\Bridges\SecurityHttp\SessionStorage($this->getService('session.session'));
	}


	public function createServiceSession__session(): Nette\Http\Session
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setOptions(['cookieSamesite' => 'Lax']);
		return $service;
	}


	public function createServiceTracy__bar(): Tracy\Bar
	{
		return Tracy\Debugger::getBar();
	}


	public function createServiceTracy__blueScreen(): Tracy\BlueScreen
	{
		return Tracy\Debugger::getBlueScreen();
	}


	public function createServiceTracy__logger(): Tracy\ILogger
	{
		return Tracy\Debugger::getLogger();
	}


	public function initialize(): void
	{
		// di.
		(function () {
			$this->getService('tracy.bar')->addPanel(new Nette\Bridges\DITracy\ContainerPanel($this));
		})();
		// http.
		(function () {
			$response = $this->getService('http.response');
			$response->setHeader('X-Powered-By', 'Nette Framework 3');
			$response->setHeader('Content-Type', 'text/html; charset=utf-8');
			$response->setHeader('X-Frame-Options', 'SAMEORIGIN');
			Nette\Http\Helpers::initCookie($this->getService('http.request'), $response);
		})();
		// session.
		(function () {
			$this->getService('session.session')->autoStart(false);
		})();
		// tracy.
		(function () {
			if (!Tracy\Debugger::isEnabled()) { return; }
			$logger = $this->getService('tracy.logger');
		})();
	}


	protected function getStaticParameters(): array
	{
		return [
			'appDir' => '/home/perunov/user-authentication/app',
			'wwwDir' => '/home/perunov/user-authentication/www',
			'vendorDir' => '/home/perunov/user-authentication/vendor',
			'rootDir' => '/home/perunov/user-authentication',
			'debugMode' => true,
			'productionMode' => false,
			'consoleMode' => false,
			'tempDir' => '/home/perunov/user-authentication/temp',
		];
	}
}
