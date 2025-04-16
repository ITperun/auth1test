<?php

use Latte\Runtime as LR;

/** source: /home/perunov/user-authentication/app/Presentation/Sign/in.latte */
final class Template_a2d8918aec extends Latte\Runtime\Template
{
	public const Source = '/home/perunov/user-authentication/app/Presentation/Sign/in.latte';

	public const Blocks = [
		['content' => 'blockContent', 'title' => 'blockTitle'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 4 */;
		echo "\n";
		$this->renderBlock('bootstrap-form', ['signInForm'] + [], 'html') /* line 6 */;
		echo '
<p class="text-center"><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('up')) /* line 8 */;
		echo '">Don\'t have an account yet? Sign up.</a></p>
';
	}


	/** n:block="title" on line 4 */
	public function blockTitle(array $ʟ_args): void
	{
		echo '<h1>Sign In</h1>
';
	}
}
