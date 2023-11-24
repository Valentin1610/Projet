<?php

require __DIR__ . '/../../models/User.php';
require __DIR__ . '/../../models/User_Event.php';
require __DIR__ . '/../../models/Event.php';
require __DIR__ . '/../../models/Category.php';
require __DIR__ . '/../../config/init.php';


try {
    $title = "Calendrier des événements • Guide Ultime de Super Mario ";
    $errors = [];
    $script = "";
    $css = "style.css";
    $description = "Envie de vous inscrire à un événement ? Participez à des tournois pour devenir le meilleur dans un jeu en particulier.";
    $categories = Category::getall();

    // Création d'un tableau avec les mois de l'année

    $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    // Initialisation d'un tableau vide permettant de boucler lors de l'affichage
    $calendar = [];

    // Récupération des données utilisateur

    $year = $_GET['year'] ?? date('Y');
    $month = $_GET['month'] ?? date('m');

    // Calcul des variables permettant de générer le tableau de données

    $firstDayInMonth = date('N', strtotime("$year-$month-01"));
    $nbDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // On boucle jusqu'au premier jour du mois pour gérer les jours précédents le mois courant
    for ($i = 1; $i < $firstDayInMonth; $i++) {
        array_push($calendar, null);
    }

    // On boucle sur tous les jours du mois
    for ($i = 1; $i <= $nbDaysInMonth; $i++) {
        array_push($calendar, $i);
    }

    // Calcul du nombre de semaines dans le mois
    $nbWeeks = count($calendar) / 7;

    
} catch (\Throwable $th) {
    $errors = $th->getMessage();
    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/events.php';
include __DIR__ . '/../../views/templates/footer.php';
