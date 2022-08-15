# Requirements

Those apply to Ubuntu 18.04.
* php,
* php-mysql.

[A tutorial showing how to set up a LAMP server on Ubuntu 18.04](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04)

# Baza danych

Składa się z 5 tabel:
RESULTS - tutaj zapisywane są wyniki
SUPER_USERS - tutaj są użytkownicy z uprawnieniami admina
TESTS_DOC - tutaj są informacje o plikach konfiguracyjnych testów
TESTS_FILE - tutaj są ścieżki do danych które są poddawane ocenie
USER - tabela z użytkownikami którzy wykonują testy 

# Panel Administratora

Na razie jest jedno konto administratora, żeby dodać więcej należy dodać nowego użytkownika z poziomu bazy danych do tabeli SUPER_USERS, a hasło musi być skrótem z funkcji MD5 (tak jak jest to robione w admin_data.php)
Z panelu admina można konfigurować testy i dodawać nowe.

# Panel użytkownika

Tutaj wybieramy numer indeksu i język i przechodzmi do wykonywania testów. 

Od strony kodu
Panel użytkownika: index.php
Panel admina: index_admin.php

Jeżeli rozpoczynamy test przechodzimy przez text_conf.php gdzie ustalane są i pobierane informacje o teście tzn. czy można wykonać dla danego użytkownika jeśli tak to pobierane są informacje o danych do testów. Jeżeli wystąpi jakiś błąd np. z bazą danych, zostaniemy cofnięci do panelu logowania. Jeżeli użytkownik wykonał już test zostanie o tym poinformowany przez stosowny komunikat, który pojawi się na stronie testStart.php. Na tej stronie również pojawi się informacja gdy będziemy mogli wykonać test. Jeżeli możemy wykonać test przechodzimy do testDescription.php gdzie przez 8 sekund jest widoczny komunikat że test zaraz się zacznie, tutaj jest już inny wygląd. Z tego pliku przechodzimy do przedstawiania kolejnych danych testowych na stronie testItemN.php. Gdy przedstawiany film się zakończy lub klikniemy na przedstawiony obraz przechodzimy do testMOS.php gdzie wybieramy wartość. Po wybraniu wartości i naciśnięciu 'Dalej' następuje zapis wartości do bazy przez stronę next_page.php. Sytuacja powtarza się aż wszystkie elementy nie zostaną ocenione, gdy to się stanie, przechodzimy do strony testEnd.php gdzie otrzymujemy komunikat o wykonaniu testu. 
Są jeszcze pliki rozpoczynające się od admin_... przeznaczone są do zapisywania i modyfikacji tego co dzieje się w panelu admina.

# Foldery

TestDoc - tu zapisywane są pliki konfiguracyjne
js - zawiera pliki javascript
img - zawiera obrazki jakie miały być użyte na potrzeby wyglądu strony
Data - tu w folderach Video i Img powinny znajdować się dane testowe
css - folder z plikami css

# Komentarz kogoś próbującego uruchomić interfejs

> Próbowałem dodać nowy plik konfiguracyjny i udało mi się, warto pamiętać że nazwa nowego pliku musi być unikatowa. Co do modyfikacji tabeli TESTS_FILE, to ta tabela modyfikowana jest w momencie poprawnego dodania pliku konfiguracyjnego i tylko wtedy system otwiera plik i wrzuca ścieżki do tabeli, później plik jest nieużywany dlatego jego modyfikacja powodowała dziwne zachowania. Ścieżki do danych przedstawianych w czasie testu brane są bezpośrednio z bazy danych. W tabeli TESTS_DOC kolumna NUMBER odpowiada za numer testu (np. jeżeli chcielibyśmy przeprowadzić ponownie test na tej samej grupie i tych samych danych, wtedy zmieniamy numer testu). W innym przypadku użytkownicy nie będą mogli wykonać testu (już go wykonali). Dodałem plik konfiguracyjny test_28112016, a w nim ścieżki do filmów w Data/margaret1 ale przeglądarki nie potrafą ich otworzyć - ani FF ani Chrome.

Autor: Łukasz Zieliński [zielinski100@gmail.com](mailto:zielinski100@gmail.com)
Data: 16 October 2016 at 14:54:48 GMT+2 (z późniejszymi zmianami)