<?php

// Controllo se il form è stato inviato
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['messaggio'])) {

    // Recupero i dati dal form
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $messaggio = filter_input(INPUT_POST, 'messaggio', FILTER_SANITIZE_STRING);

    // Formatto il messaggio per il file txt
    $contenutoReport = "Nome: $nome\nEmail: $email\nMessaggio: $messaggio\n\n";

    // Nome del file per il report
    $nomeFile = "report_informazioni.txt";

    // Apro il file in modalità append (aggiunge i nuovi dati alla fine)
    $fp = fopen($nomeFile, 'a');

    // Scrivo il contenuto del report nel file
    fwrite($fp, $contenutoReport);

    // Chiudo il file
    fclose($fp);

    // Messaggio di conferma
    echo "<p>Grazie per aver inviato la tua richiesta! I tuoi dati sono stati salvati nel file: $nomeFile.</p>";

} else {
    // Errore se il form non è stato inviato
    echo "<p>Errore: Si prega di compilare tutti i campi del modulo.</p>";
}
