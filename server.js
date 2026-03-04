const io = require('socket.io')(3000, {
    cors: {
        origin: "*", // Позволяем нашему Nette-сайту подключаться
        methods: ["GET", "POST"]
    }
});

console.log('✨ Волшебный сервер сокетов запущен на порту 3000! ✨');

io.on('connection', (socket) => {
    console.log('🦊 Кто-то пушистый подключился к чату...');

    // Слушаем событие отправки сообщения от клиента
    socket.on('send_message', (data) => {
        console.log('Новое сообщение:', data);
        
        // Пересылаем сообщение всем остальным (и самому отправителю тоже)
        io.emit('receive_message', {
            name: data.name,
            text: data.text,
            time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
        });
    });

    socket.on('disconnect', () => {
        console.log('Лисичка покинула чат... 🍃');
    });
});