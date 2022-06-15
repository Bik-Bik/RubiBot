# TelegramBot Coding Tutorial

## Vorbereitung
Du brauchst eine Linux Umgebung mit PHP. Nutze dafür z.B. unter Windows das WSL (Windows Subsystem for Linux) mit ubuntu 20.04 oder ubuntu 22.04

## Die Aufgabe
- Mache einen Fork dieses Repos
- Erstelle für jedes Kapitel einen branch und einen Pull Request wenn du mit der Lösung zufrieden bist

## Kapitel 1
### Composer
Composer ist ein Tool um Abhängigkeiten zu Bibliotheken und Tools zu verwalten.
- Installiere composer (https://getcomposer.org/)
- Erstelle eine `composer.json`
  - Überlege einen Namespace
  - Lege einen Ordner `src` an
  - Richte in der `composer.json` autoload für Klassen aus deinem Namespace für den Ordner `src` ein
- Führe den Befehl `composer install` aus

## Kapitel 2
Guck dir die TelegramBot Api an (https://core.telegram.org/bots/api)
- Sprich mit dem BotFather und lege einen Bot an
- Lege eine `config.json` an und speichere den Token in diesem json
- Stelle sicher, dass die `config.json` niemals ins Repo gelangt
- Lege ein php script `chapter2.php` an, dass den token aus dem json liest und den Token ausgibt
  - Tipp: Benutze `file_get_contents` und `json_decode`
- Führe das script aus `php chapter2.php`

## Kapitel 3
- Binde `"guzzlehttp/guzzle": "^7.4"` als dependency in die composer.json ein
- Führe `composer update` aus
- Schreibe ein Test-Script `chapter3.php`, dass die Nachrichten vom Bot abfragt (getChat)
- Führe das script aus

## Kapitel 4
- Schreibe eine class Bot
- Sie soll mit dem Token initialisiert werden
- Schreibe eine Methode `getChat`, die Nachrichten abfragt
- Schreibe eine Methode `sendMessage`, die eine Nachricht an eine gegebene chat id schickt
- Finde deine chat id heraus
- Schreibe ein script `chapter4.php`, dass die Bot class instanziert und dir 10 Nachrichten mit den Zahlen 1 bis 10 schickt
  - Tipp: Benutze eine for schleife

## Kapitel 5
- Schreibe eine static class CryptoComApi
- Die Klasse soll Daten von der crypto.com Spot Api abfragen
- Schreibe eine methode `getPrice`, die ein Symbol als Parameter erwartet
- Die Methode soll den Preis für das gegebene Symbol zurückgeben oder einen Fehler, wenn das Symbol nicht gefunden wurde
- schreibe ein script `chapter5.php`, dass den Preis für BTCUSD ausgibt

## Kapitel 6
- Schreibe in der Bot Klasse eine Methode um Bot commands zu registrieren
- Registriere den befehl /btc
  - Tipp: setMyCommands
- Schreibe eine Methode loop
  - Wenn jemand das btc command schickt führe die Methode commandBtc aus
- Schreibe eine Methode commandBtc
  - Die Methode soll über die CryptoComApi den BTc Preis abfragen und an die Chat id die angefragt hat antworten
- Schreibe ein script `bot-runner.php`, dass in einer Endlosschleife alle 10 Sekunden die Loop Methode des Bots aufruft