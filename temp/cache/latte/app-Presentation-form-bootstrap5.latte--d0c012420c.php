<?php

use Latte\Runtime as LR;

/** source: /home/perunov/user-authentication/app/Presentation/form-bootstrap5.latte */
final class Template_d0c012420c extends Latte\Runtime\Template
{
	public const Source = '/home/perunov/user-authentication/app/Presentation/form-bootstrap5.latte';

	public const Blocks = [
		0 => ['bootstrap-form' => 'blockBootstrap_form'],
		'local' => ['controls' => 'blockControls', 'control' => 'blockControl'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '



';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['error' => '7', 'control' => '17', 'key' => '51', 'foo' => '51'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {define bootstrap-form, $name} on line 3 */
	public function blockBootstrap_form(array $ʟ_args): void
	{
		extract($this->params);
		$name = $ʟ_args[0] ?? $ʟ_args['name'] ?? null;
		unset($ʟ_args);

		$form = $this->global->formsStack[] = is_object($ʟ_tmp = $name) ? $ʟ_tmp : $this->global->uiControl[$ʟ_tmp] /* line 4 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo '<form';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), [], false) /* line 4 */;
		echo '>
';
		ob_start(fn() => '');
		try {
			echo '	<ul class="alert alert-danger">';
			ob_start();
			try {
				echo "\n";
				foreach ($form->ownErrors as $error) /* line 7 */ {
					echo '		<li>';
					echo LR\Filters::escapeHtmlText($error) /* line 7 */;
					echo '</li>
';

				}

				echo '	';

			} finally {
				$ʟ_ifc[0] = rtrim(ob_get_flush()) === '';
			}
			echo '</ul>
';

		} finally {
			if ($ʟ_ifc[0] ?? null) {
				ob_end_clean();

			} else {
				echo ob_get_clean();
			}
		}
		echo "\n";
		$this->renderBlock('controls', [$form->getControls()] + [], 'html') /* line 10 */;
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(end($this->global->formsStack), false) /* line 4 */;
		echo '</form>
';
		array_pop($this->global->formsStack);
	}


	/** {define local controls, array $controls} on line 15 */
	public function blockControls(array $ʟ_args): void
	{
		extract($this->params);
		$controls = $ʟ_args[0] ?? $ʟ_args['controls'] ?? null;
		unset($ʟ_args);

		foreach ($iterator = $ʟ_it = new Latte\Essential\CachingIterator($controls, $ʟ_it ?? null) as $control) /* line 17 */ {
			if (!$control->getOption('rendered') && $control->getOption('type') !== 'hidden') /* line 18 */ {
				echo '	<div';
				echo ($ʟ_tmp = array_filter(['mb-3', 'row', $control->required ? 'required' : null, $control->error ? 'is-invalid' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 19 */;
				echo '>

		<div class="col-sm-3 col-form-label">';
				echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item($control, $this->global)->getLabel()) /* line 22 */;
				echo '</div>

		<div class="col-sm-9">
';
				$this->renderBlock('control', [$control] + [], 'html') /* line 25 */;
				if ($control->getOption('type') === 'button') /* line 26 */ {
					while ($iterator->nextValue?->getOption('type') === 'button') /* line 27 */ {
						echo '					';
						echo Nette\Bridges\FormsLatte\Runtime::item($iterator->nextValue, $this->global)->getControl()->addAttributes(['class' => 'btn btn-secondary']) /* line 28 */;
						echo "\n";
						$iterator->next() /* line 29 */;
					}
				}
				echo "\n";
				ob_start(fn() => '');
				try {
					echo '			<span class=invalid-feedback>';
					ob_start();
					try {
						echo LR\Filters::escapeHtmlText($control->error) /* line 34 */;

					} finally {
						$ʟ_ifc[1] = rtrim(ob_get_flush()) === '';
					}
					echo '</span>
';

				} finally {
					if ($ʟ_ifc[1] ?? null) {
						ob_end_clean();

					} else {
						echo ob_get_clean();
					}
				}
				ob_start(fn() => '');
				try {
					echo '			<span class=form-text>';
					ob_start();
					try {
						echo LR\Filters::escapeHtmlText($control->getOption('description')) /* line 35 */;

					} finally {
						$ʟ_ifc[2] = rtrim(ob_get_flush()) === '';
					}
					echo '</span>
';

				} finally {
					if ($ʟ_ifc[2] ?? null) {
						ob_end_clean();

					} else {
						echo ob_get_clean();
					}
				}
				echo '		</div>
	</div>
';
			}

		}
		$iterator = $ʟ_it = $ʟ_it->getParent();
	}


	/** {define local control, Nette\Forms\Controls\BaseControl $control} on line 41 */
	public function blockControl(array $ʟ_args): void
	{
		extract($this->params);
		$control = $ʟ_args[0] ?? $ʟ_args['control'] ?? null;
		unset($ʟ_args);

		if (in_array($control->getOption('type'), ['text', 'select', 'textarea', 'datetime', 'file'], true)) /* line 43 */ {
			echo '		';
			echo Nette\Bridges\FormsLatte\Runtime::item($control, $this->global)->getControl()->addAttributes(['class' => 'form-control']) /* line 44 */;
			echo '

';
		} elseif ($control->getOption('type') === 'button') /* line 46 */ {
			echo '		';
			echo Nette\Bridges\FormsLatte\Runtime::item($control, $this->global)->getControl()->addAttributes(['class' => 'btn btn-primary']) /* line 47 */;
			echo '

';
		} elseif (in_array($control->getOption('type'), ['checkbox', 'radio'], true)) /* line 49 */ {
			$items = $control instanceof Nette\Forms\Controls\Checkbox ? [''] : $control->getItems() /* line 50 */;
			foreach ($items as $key => $foo) /* line 51 */ {
				echo '		<div class="form-check">
			';
				echo Nette\Bridges\FormsLatte\Runtime::item($control, $this->global)->getControlPart($key)->addAttributes(['class' => 'form-check-input']) /* line 52 */;
				echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item($control, $this->global)->getLabelPart($key))?->addAttributes(['class' => 'form-check-label']) /* line 52 */;
				echo '
		</div>
';

			}

			echo "\n";
		} elseif ($control->getOption('type') === 'color') /* line 55 */ {
			echo '		';
			echo Nette\Bridges\FormsLatte\Runtime::item($control, $this->global)->getControl()->addAttributes(['class' => 'form-control form-control-color']) /* line 56 */;
			echo '

';
		} else /* line 58 */ {
			echo '		';
			echo Nette\Bridges\FormsLatte\Runtime::item($control, $this->global)->getControl() /* line 59 */;
			echo "\n";
		}
	}
}
