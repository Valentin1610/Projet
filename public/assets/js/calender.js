document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    // Créer un événement
    let event = {
        title: 'Nouvel événement',
        start: '2023-11-21', // Date de début de l'événement (au format YYYY-MM-DD)
        end: '2023-11-21'    // Date de fin de l'événement (au format YYYY-MM-DD)
    };

    // Ajouter l'événement au calendrier
    calendar.addEvent(event);
    calendar.render();
});