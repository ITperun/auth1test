<?php
declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Database\Explorer;

final class MessageFacade
{
    public function __construct(
        private Explorer $database,
    ) {
    }

    /**
     * Достаем все сообщения по порядку, чтобы показать их в чате
     */
    public function getMessages(): Nette\Database\Table\Selection
    {
        return $this->database->table('messages')->order('created_at ASC');
    }

    /**
     * Сохраняем новое сообщение от пользователя
     */
    public function addMessage(int $senderId, string $content): void
    {
        // В MessageFacade.php внутри addMessage:
$this->database->table('messages')->insert([
    'sender_id' => $senderId,
    'content' => $content,
    'created_at' => new \DateTime, // Добавь эту строчку ✨
]);
    }
}