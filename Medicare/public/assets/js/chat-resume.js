(function () {
    'use strict';

    function appendBubble(container, text, type) {
        const row = document.createElement('div');
        row.className = 'chat-row ' + type;

        const avatar = document.createElement('span');
        avatar.className = 'chat-avatar ' + type;
        avatar.textContent = type === 'user' ? 'VOUS' : 'IA';

        const bubble = document.createElement('div');
        bubble.className = 'chat-bubble ' + type;
        bubble.textContent = text;

        if (type === 'user') {
            row.appendChild(bubble);
            row.appendChild(avatar);
        } else {
            row.appendChild(avatar);
            row.appendChild(bubble);
        }

        container.appendChild(row);
        container.scrollTop = container.scrollHeight;
    }

    function setLoading(loadingEl, sendButton, active) {
        loadingEl.classList.toggle('active', active);
        sendButton.disabled = active;
    }

    document.addEventListener('DOMContentLoaded', function () {
        const app = document.getElementById('chatResumeApp');
        if (!app) {
            return;
        }

        const messageUrl = app.dataset.messageUrl;
        const messagesEl = document.getElementById('chatMessages');
        const promptInput = document.getElementById('chatPromptInput');
        const textInput = document.getElementById('chatTextInput');
        const topicSelect = document.getElementById('chatTopicSelect');
        const sendButton = document.getElementById('chatSendButton');
        const loadingEl = document.getElementById('chatLoading');
        const quickButtons = document.querySelectorAll('[data-quick-message]');

        if (!messageUrl || !messagesEl || !promptInput || !textInput || !topicSelect || !sendButton || !loadingEl) {
            return;
        }

        async function sendMessage(prompt) {
            const userPrompt = (prompt || '').trim();
            if (!userPrompt) {
                appendBubble(messagesEl, 'Veuillez saisir une demande de synthese.', 'bot');
                return;
            }

            const payload = {
                message: userPrompt,
                topicId: topicSelect.value ? parseInt(topicSelect.value, 10) : 0,
                text: textInput.value || ''
            };

            appendBubble(messagesEl, userPrompt, 'user');
            setLoading(loadingEl, sendButton, true);

            try {
                const response = await fetch(messageUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const data = await response.json();
                if (!response.ok) {
                    appendBubble(messagesEl, data.error || 'Une erreur est survenue pendant la generation du resume professionnel.', 'bot');
                } else {
                    appendBubble(messagesEl, data.reply || 'Aucune reponse generee.', 'bot');
                }
            } catch (error) {
                appendBubble(messagesEl, 'Erreur reseau. Verifiez la connexion puis reessayez.', 'bot');
            } finally {
                setLoading(loadingEl, sendButton, false);
            }
        }

        sendButton.addEventListener('click', function () {
            const prompt = promptInput.value;
            promptInput.value = '';
            sendMessage(prompt);
        });

        promptInput.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                const prompt = promptInput.value;
                promptInput.value = '';
                sendMessage(prompt);
            }
        });

        quickButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const message = btn.getAttribute('data-quick-message') || '';
                promptInput.value = message;
                sendMessage(message);
            });
        });
    });
})();
