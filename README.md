autopilot
=========

sc_trans web PHP control panel

## Wymagania

- **PHP 8.0 lub nowszy** (zaktualizowano z PHP 5)
- Dostęp do shell_exec() (funkcja musi być włączona w php.ini)
- SHOUTcast Transcoder (sc_trans)

## Instalacja

1. Ściągamy pliki projektu
2. Edytujemy plik `autopilot.php` zmieniając w nim ścieżki do katalogów:
   - `$catalog` - ścieżka do katalogu z sc_trans (nie zapomnij o kończącym slashu)
   - `$sc_trans` - nazwa pliku wykonywalnego sc_trans
   - `$sc_trans_conf` - nazwa pliku konfiguracyjnego
   - `$mp3` - nazwa skryptu generującego playlistę
3. To samo robimy w `sc_trans.config` i `make_playlist`
4. Wgrywamy na serwer i sprawdzamy czy działa

## Zmiany w wersji PHP 8.x

✅ Zaktualizowano krótkie tagi PHP (`<?` → `<?php`)
✅ Dodano `declare(strict_types=1)` dla lepszej kontroli typów
✅ Dodano zabezpieczenia przed command injection (`escapeshellcmd()`)
✅ Dodano walidację parametrów GET (whitelist)
✅ Dodano escapowanie HTML (`htmlspecialchars()`) dla bezpieczeństwa XSS
✅ Dodano type hints i return types
✅ Zmodernizowano strukturę HTML5 z DOCTYPE
✅ Poprawiono formatowanie kodu zgodnie z PSR-12

## Bezpieczeństwo

Aplikacja została zabezpieczona przed:
- Command injection attacks
- XSS (Cross-Site Scripting)
- Invalid input parameters

## Autor

https://bauer.net.pl
