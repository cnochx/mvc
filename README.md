# mvc
Ein simples MVC in PHP in Objektorientierter Programmierung. 

Zum Nachstellen wird benötigt:
Die drei beiliegenden Datenbanken, im Ordner /databases zu finden.
* mvc.sql (enthält die Datenbank zum Anzeigen der Statements)
* projektverwaltung.sql (enthält die Datenbank für die Ergebnisse der Statements, Aufgabe 1)
* tlnverwaltung.sql (enthält die Datenbank für die Ergebnisse der Statements, Aufgabe 2)
Des weiteren muß eine `.env` angelegt werden. Es reicht dafür das Umbenennen der `.example.env` in `.env` mit den entsprechenden Zugängen zu den Datenbanken. Zusätzlich muß der Composer im Terminal mit `composer update` aufgerufen werden, um die Bibliotheken zu laden und in den autoload psr-4 die Definition des Namespace der App zu hinterlegen. 
Benutz werden lediglich:
* vlucas/phpdotenv (https://github.com/vlucas/phpdotenv)
* ext-pdo
* twig/twig (https://github.com/twigphp/Twig)

Außer 
* modernizer (https://modernizr.com)
* Bootstrap (https://getbootstrap.com)
* fontawesome (https://fontawesome.com)
* und die Files, wie von HTML5 Boilerplate (https://html5boilerplate.com) empfohlen. 
Weiter werden keine weitere Bibliotheken benutzt.

#### Die App ist folgenderweise aufgebaut:
Die `/.htacces` im Root verweist auf `/public`, welches die Ordner und Files enthält, die vom Browser aufgerufen und benötigt werden. Die `/public/index.php` ist die ausführende Datei und verweist auf Bootstrap. Dessen Konstruktor holt die Parameter, die in `/public/.htacces` definiert sind, und legt sie in `$this→get` ab Die Module greifen auf den Parameter zu. `/public/.htacces` schreibt auch die url um, so dass die eine Url wie `localhost/aufgabe_a` möglich ist.
`$this→run()` führt die Datei aus, und integriert den Router mit den Parameter `$get`. Der `Router` zerteilt den Parameter in `res`, `req` und `next`, hinterlegt den jeweiligen intanzierten Kontroller zu dem hinterlegten `request`, der erste Parameter in der url. Der Router prüft auch, ob der instanierte Kontroller existiert und integriert `Mssg`, welches Meldungen verwaltet. Dort wird dann, der Header 404 und auf `/templates/404.html` verwiesen. Der vom `Router` instanzierte `Routing` definiert lediglich die entsprechenden `req` mit dem entsprechenden `callable closure` wie `IndexController` oder `TaskController`.
Existiert ein instanzierter Kontroller, wie `Indexcontroller` oder `Taskcontroller`, wird die Website mit den hinterlegten Variablen und den im Basiscontroller definierten Twig mit Environment und Extensions aufgerufen. `Indexcontroller` und `TaskController` enthalten auch den Namen des in `/templates/` enthaltenden template. `index.html.twig` und `task.html.twig` beschreiben nur die Blöcke Content und Teaser, `html.html.twig` enthält alle anderen Elemente der des Html. Der instanzierte Kontroller integriert das instanzierte `Model`. 

Das Basis - `Model`, eine abstrakte Klasse enthält alles Einstellungen für den mysql-verbindung mit `PDO`. Die instazierten Klassen `MVCModel`, `ProjektverwaltungsModel` und `TlnverwaltungsModel` definieren die Zugangsdaten, die in `.env` hinterlegt sind. Diese werden, je nach Verbindung mit der jeweiligen Datenbank entsprechend instanziert und defieren die jeweiligen Statements der Datenbanken. `Model` gibt die Resultate in Array, Array Single, Objekt oder Objekt Single, welche von TaskController verarbeitet werden. 

Im `TaskController` wird auch das als Objekt vorliegende Result mit einem Statement zu einer anderen Datenbank verarbeitet und in der Eigenschaft `$taskResults→example` als Array mit dem Ergebnissen der tatsächlichen Statement hinterlegt. `$taskResults→example` enthält entweder einen Nullwert oder eine Fremdschlüssel, der das Statement zu der Abfrage enthält.
`task.html.twig` schleift die Resultat entsprechend formatiert aus und stellt sie im Browser dar.

Fragen? Anmerkungen? 
martin@grellmann.eu
