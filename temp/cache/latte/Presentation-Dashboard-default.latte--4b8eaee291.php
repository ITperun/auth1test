<?php

use Latte\Runtime as LR;

/** source: /home/perunov/user-authentication/app/Presentation/Dashboard/default.latte */
final class Template_4b8eaee291 extends Latte\Runtime\Template
{
	public const Source = '/home/perunov/user-authentication/app/Presentation/Dashboard/default.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<h1>Dashboard</h1>

<p>If you see this page, it means you have successfully logged in.</p>

<p>(<a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Sign:out')) /* line 6 */;
		echo '">Sign out</a>)</p>
';
	}
}
