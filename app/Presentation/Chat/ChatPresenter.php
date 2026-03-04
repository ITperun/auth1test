<?php
declare(strict_types=1);

namespace App\Presentation\Chat;

use App\Model\MessageFacade;
use App\Presentation\Accessory\RequireLoggedUser;
use Nette;

final class ChatPresenter extends Nette\Application\UI\Presenter
{
    // Этот трейт автоматически перенаправит на логин, если юзер не залогинен ✨
    use RequireLoggedUser;

    public function __construct(
        private MessageFacade $messageFacade,
    ) {
    }

    public function renderDefault(): void
    {
        // Загружаем историю сообщений для отображения при входе
        $this->template->messages = $this->messageFacade->getMessages();
        // Передаем ID текущего пользователя для JS
        $this->template->userId = $this->getUser()->getId();
        $this->template->userName = $this->getUser()->getIdentity()->getData()['username'] ?? 'Лисичка';
    }

    /**
     * Этот метод мы будем вызывать через AJAX, чтобы сохранить сообщение в базу
     */
    // Измени эту строку в ChatPresenter.php:
public function handleSaveMessage(string $content = ''): void // <--- Добавь = ''
{
    if ($content !== '') {
        $this->messageFacade->addMessage($this->getUser()->getId(), $content);
        $this->sendJson(['status' => 'ok']);
    }
}
}