document.addEventListener('DOMContentLoaded', function () {
    const audioGuideBtn = document.getElementById('audio-guide-btn');
    if (!audioGuideBtn) return;

    let isSpeaking = false;
    const synth = window.speechSynthesis;

    const navigateGuide = `
        Welcome to Medicare. This audio guide will help you navigate our website using your keyboard.
        You can use the following shortcuts at any time:
        Press Shift and L to go to the Login page.
        Press Shift and R to go to the Registration page.
        Press Shift and H to return to the Home page.
        Press Shift and C to go to the Contact page.
        And Press Shift and G to toggle this audio guide on or off.
        
        At the top of the page, you will find the navigation menu.
        In the center, there are quick access buttons for booking an appointment.
        If you need further assistance, please use these shortcuts or click this button again to stop the audio.
    `;

    function toggleAudio() {
        if (isSpeaking) {
            synth.cancel();
            isSpeaking = false;
            audioGuideBtn.classList.remove('btn-danger');
            audioGuideBtn.classList.add('btn-info');
            audioGuideBtn.innerHTML = '<i class="bi bi-volume-up"></i> Audio Guide';
        } else {
            const utterThis = new SpeechSynthesisUtterance(navigateGuide);
            utterThis.onend = function () {
                isSpeaking = false;
                audioGuideBtn.classList.remove('btn-danger');
                audioGuideBtn.classList.add('btn-info');
                audioGuideBtn.innerHTML = '<i class="bi bi-volume-up"></i> Audio Guide';
            };
            synth.speak(utterThis);
            isSpeaking = true;
            audioGuideBtn.classList.remove('btn-info');
            audioGuideBtn.classList.add('btn-danger');
            audioGuideBtn.innerHTML = '<i class="bi bi-volume-mute"></i> Stop Guide';
        }
    }

    audioGuideBtn.addEventListener('click', toggleAudio);

    // Global keyboard shortcuts
    document.addEventListener('keydown', function (e) {
        // Shift + Key combinations
        if (e.shiftKey) {
            const key = e.key.toUpperCase();

            switch (key) {
                case 'L':
                    window.location.href = '/login';
                    break;
                case 'R':
                    window.location.href = '/register';
                    break;
                case 'H':
                    window.location.href = '/';
                    break;
                case 'C':
                    window.location.href = '/contact';
                    break;
                case 'G':
                    toggleAudio();
                    break;
            }
        }
    });
});
