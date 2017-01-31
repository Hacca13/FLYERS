-------------------------------------------------------------------------------NOTE----------------------------------------------------------------------

- Aggiunere i permessi in lettura e scrittura alla cartella uploads sul proprio server. Tasto destro sulla cartella "uploads"-> Proprietà ->Sicurezza e
i permessi.

- La costante "UPLOAD_FOLDER" in "index.php" cambia da server a server, in base a dove è stato installato Flyers, se non viene cambiata l'upload
e il download dei file non funziona. Si raccomanda di mettere il path completo, prima di "/FLYERS" alias "DOMINIO_SITO". Un esempio con la catella di
Xampp è "define('UPLOAD_FOLDER', "C:/xampp/htdocs")".
