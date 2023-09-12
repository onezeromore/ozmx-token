# OZMX Token Dokumentation

## 1. Einführung

### 1.1. Überblick

#### Was ist der OZMX Token?
Der OZMX Token ist eine digitale Währung, die in die WooCommerce-Plattform integriert ist und es Benutzern ermöglicht, Transaktionen durchzuführen und Belohnungen basierend auf ihren Einkäufen zu erhalten.

#### Vision und Ziel des OZMX Tokens
Unsere Vision ist es, den E-Commerce-Bereich zu revolutionieren, indem wir eine nahtlose Integration von Kryptowährungen in gängige E-Commerce-Plattformen ermöglichen. Das Ziel des OZMX Tokens ist es, sowohl für Shop-Betreiber als auch für Kunden einen Mehrwert zu schaffen, indem Transaktionen vereinfacht und Belohnungen für treue Kunden bereitgestellt werden.

### 1.2. Zweck der Dokumentation
Diese Dokumentation dient als umfassender Leitfaden für Entwickler und Interessierte, die mehr über die Integration und Funktionsweise des OZMX Tokens erfahren möchten.

## 2. Technische Details

### 2.1. Technologie
- Beschreibung der Bitcoin-Blockchain und warum sie für OZMX gewählt wurde.
- Erklärung des BRC-20 Token-Standards.

### 2.2. Integration in WooCommerce
- Wie der Token in WooCommerce integriert ist.
- Beschreibung der PHP-OZMX-Token-Integration in WooCommerce und ihrer Funktionen.

Der Code enthält die Integration von OZMX-Token in eine WooCommerce-Website. Hier sind die Hauptfunktionen und ihre Beschreibungen:

1. **Globale Einstellungen initialisieren**: Zu Beginn des Codes werden einige globale Einstellungen initialisiert, die den Gesamtbestand an OZMX-Token und die Anzahl der generierten und übertragenen Token speichern.
2. **Neuen Endpunkt für das Benutzerprofil registrieren**: Ein neuer Endpunkt namens "ozmx_token" wird für das Benutzerprofil in WooCommerce registriert.
3. **Benutzerdefiniertes Feld zur WooCommerce-Kontoseite hinzufügen**: Ein benutzerdefiniertes Feld wird zur Kontoseite hinzugefügt, das es den Benutzern ermöglicht, ihre BRC-20-Token-Wallet-Adresse einzugeben und zu aktualisieren.
4. **Benutzerdefinierten Tab zur WooCommerce-Kontomenü hinzugefügen**: Ein neuer Tab namens "OZMX Token" wird zum Kontomenü hinzugefügt.
5. **Token Generierung bei Kaufabschluss**: Wenn eine Bestellung abgeschlossen wird, werden OZMX-Token basierend auf dem Bestellwert generiert und dem Benutzerkonto gutgeschrieben.
6. **Token-Rückbuchung bei Stornierung der Bestellung**: Wenn eine Bestellung storniert wird, werden die zuvor generierten Token vom Benutzerkonto abgebucht.
7. **Token Übertragung an Benutzer**: Eine Funktion, die es ermöglicht, Token an einen bestimmten Benutzer zu übertragen.
8. **Neuen Menüpunkt im Adminbereich hinzufügen**: Ein neuer Menüpunkt namens "OZMX" wird zum WordPress-Adminbereich hinzugefügt, der es den Administratoren ermöglicht, den Tokenstand und die Wallet-Adressen der Benutzer zu überprüfen.
9. **Token-Transfer-Handler**: Eine Funktion, die den Token-Transfer von einem Benutzerkonto zu seiner externen Wallet behandelt.
10. **Anzeige von Transaktionen in umgekehrter Reihenfolge**: Die Transaktionen in "OZMX Doku / OZMX Token Transaktionsdokumentation" werden nun so angezeigt, dass die aktuellsten Einträge oben stehen.
11. **Kontrollkästchen "An eine andere Adresse liefern" und "Create an account" auf der Checkout-Seite**.


### 2.3. Sicherheit
- Maßnahmen zur Gewährleistung der Sicherheit von Transaktionen und Daten.

## 3. Benutzerführung

### 3.1. Registrierung und Anmeldung
- Schritt-für-Schritt-Anleitung zur Erstellung eines Kontos auf der OZM-Plattform.

### 3.2. Kauf von Kunst und Erhalt von OZMX Tokens
- Wie Benutzer Kunst kaufen können.
- Wie Benutzer OZMX Tokens für ihre Käufe erhalten.

### 3.3. Verwaltung von OZMX Tokens
- Wie Benutzer ihre Token-Bilanz überprüfen können.
- Übertragung von Tokens auf externe Wallets.

## 4. OZMX in der Kunstwelt

### 4.1. Vision von OZMX in der Kunst
- Wie OZMX die Kunstwelt beeinflusst und verändert.

### 4.2. Künstler und OZMX
- Wie Künstler in das OZMX-Projekt eingebunden sind.
- Vorstellung einiger Hauptkünstler und ihrer Werke.

### 4.3. Zukünftige Projekte und Pläne
- Beschreibung zukünftiger Projekte, die OZMX nutzen oder fördern.

## 5. Compliance und Regulierung

### 5.1. Rechtliche Aspekte
- Informationen zu rechtlichen Aspekten und Compliance im Zusammenhang mit OZMX.

### 5.2. Dokumentationsanforderungen
- Welche Informationen müssen dokumentiert werden, um den Anforderungen von Behörden und Regulierungsbehörden gerecht zu werden.

## 6. Fazit und Zukunftsaussichten

### 6.1. Aktueller Stand des OZMX-Projekts
- Ein Überblick über den aktuellen Stand des Projekts und seine Errungenschaften.

### 6.2. Zukunftsaussichten
- Was die Zukunft für OZMX bereithält und wie es die Kunstwelt weiterhin beeinflussen wird.

## 7. Anhänge

### 7.1. Glossar
- Definitionen von Fachbegriffen und Abkürzungen.

### 7.2. Referenzen
- Liste der Quellen und Ressourcen, die für die Erstellung der Dokumentation verwendet wurden.

## Lizenz

Dieses Plugin ist unter der [GNU General Public License v2 (GPLv2)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.de.html) lizenziert.
