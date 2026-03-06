document.addEventListener('DOMContentLoaded', function () {
    const audioGuideBtn = document.getElementById('audio-guide-btn');
    if (!audioGuideBtn) return;

    let isSpeaking = false;
    const synth = window.speechSynthesis;

    const navigateGuide = `
        Welcome to Medicare. This audio guide will help you navigate our website.
        At the top of the page, you will find the navigation menu.
        From left to right, the links are:
        Home, to return to the main page.
        About, to learn more about our medical center.
        Services, to see what treatments we offer.
        Departments, to browse our specialized units.
        And Contact, to reach out to us.
        On the right side of the header, you can find the Login and Register buttons or your Profile if you are already signed in.
        In the center of the page, there are quick access buttons for booking an appointment.
        If you need further assistance, please use your keyboard to navigate or click this button again to stop the audio.
    `;

    audioGuideBtn.addEventListener('click', function () {
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
    });

    // Handle language awareness if needed
    const currentLocale = document.documentElement.lang || 'en';
    // You could provide translated versions of navigateGuide here
});
