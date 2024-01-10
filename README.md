Temat: Zestawienie danych na temat wysokości stóp procentowych i cen mieszkań w okresie
w latach 2000-2012 z uwzględnieniem regionów i typów mieszkań.

Program służy do wyświetlania tabeli z informacjami o mieszkaniach na sprzedaż w Singapurze w latach 2000-2012 dla użytkownika o roli Admin. 
Może on dokonywać exportu oraz importu plików JSON oraz XML.
Dla użytkownika o roli user wyświetlane są wykresy.
Na stronie głównej są 3 przyciski, którymi możemy przejść do usług REST, SOAP i ORM.

Użyte technologie:
PHP version: 8.2.0
Visual Studio Code
Docker Desktop

Uruchomienie programu Docker Desktop, a następnie otworzenie projektu w programie VS Code.
W terminalu zastosować polecenie: docker-compose up --build

Baza danych w localhost:8080.
Dane do zalogowania w bazie:
Login: root
Hasło: MYSQL_ROOT_PASSWORD
Należy zaimportować plik users.sql oraz folder mieszkania.sql.gz (test zawiera to samo co folder mieszkania.sql.gz, ale z powodu limitu należało skompresować plik).

W przeglądarce należy wpisać localhost:8000, aby przejść do strony z programem.

Dane do logowania na stronie stworzonego programu:
user => ws ws ADMIN (login, hasło, rola)
user1 => user user USER
