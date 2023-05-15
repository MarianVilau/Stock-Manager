---
# MySqli_DB - database.php

---
Clasa `MySqli_DB` este utilizată pentru gestionarea conexiunii și interogărilor bazelor de date folosind extensia MySQLi.

## Configurare inițială

- Asigurați-vă că ați inclus fișierul `config.php` care conține informațiile de configurare pentru conexiunea la baza de date.

```php
require_once(LIB_PATH_INC . DS . "config.php");
```

## Utilizare

- Pentru a utiliza clasa `MySqli_DB`, creați o nouă instanță a clasei:

```php
$db = new MySqli_DB();
```

- După crearea instanței, puteți utiliza următoarele metode și funcționalități:

### Metoda `db_connect()`

Deschide conexiunea la baza de date folosind informațiile de configurare preluate din `config.php`.

```php
$db->db_connect();
```

### Metoda `db_disconnect()`

Închide conexiunea la baza de date, dacă aceasta este deschisă.

```php
$db->db_disconnect();
```

### Metoda `query($sql)`

Execută o interogare SQL folosind conexiunea la baza de date și returnează rezultatul interogării.

```php
$result = $db->query($sql);
```

### Metode pentru manipularea rezultatelor interogărilor

```php
$result = $db->fetch_array($statement);
$result = $db->fetch_object($statement);
$result = $db->fetch_assoc($statement);
$count = $db->num_rows($statement);
$id = $db->insert_id();
$affectedRows = $db->affected_rows();
```

### Metoda `escape($str)`

Elimină caracterele speciale dintr-un șir de caractere, pentru a preveni atacuri de tipul SQL injection.

```php
$escapedStr = $db->escape($str);
```

### Metoda `while_loop($loop)`

Iterează prin rezultatul unei interogări folosind o buclă `while` și returnează un array cu toate rândurile rezultatului.

```php
$results = $db->while_loop($loop);
```

## Exemplu de utilizare

```php
// Crearea unei instanțe a clasei
$db = new MySqli_DB();

// Executarea unei interogări
$sql = "SELECT * FROM table";
$result = $db->query($sql);

// Utilizarea rezultatului interogării
while ($row = $db->fetch_assoc($result)) {
    // Procesare rând
}

// Închiderea conexiunii la baza de date
$db->db_disconnect();
```
---

# Funcții utile - function.php

---
Acest fișier conține o serie de funcții utile pentru diverse operațiuni comune în PHP.

## Funcția `real_escape($str)`

Această funcție elimină caracterele speciale dintr-un șir de caractere pentru a fi folosit într-o instrucțiune SQL. Utilizează funcția `mysqli_real_escape_string()` pentru a realiza acest lucru.

```php
function real_escape($str){
  global $con;
  $escape = mysqli_real_escape_string($con,$str);
  return $escape;
}
```

## Funcția `remove_junk($str)`

Această funcție elimină caracterele HTML și convertește caracterele speciale în entități HTML pentru a preveni injectarea de cod sau probleme de securitate.

```php
function remove_junk($str){
  $str = nl2br($str);
  $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
  return $str;
}
```

## Funcția `first_character($str)`

Această funcție convertește primul caracter dintr-un șir în majusculă și înlocuiește cratimele cu spații.

```php
function first_character($str){
  $val = str_replace('-'," ",$str);
  $val = ucfirst($val);
  return $val;
}
```

## Funcția `validate_fields($var)`

Această funcție verifică dacă câmpurile de intrare nu sunt goale. Primește un array cu numele câmpurilor și verifică dacă acestea sunt setate și nenule.

```php
function validate_fields($var){
  global $errors;
  foreach ($var as $field) {
    $val = remove_junk($_POST[$field]);
    if(isset($val) && $val==''){
      $errors = $field ." can't be blank.";
      return $errors;
    }
  }
}
```
---

# Configurarea și inițializarea aplicației - load.php

---
Acest fragment de cod conține declarațiile și includerile necesare pentru configurarea și inițializarea aplicației.

## Definirea constantelor

```php
define("URL_SEPARATOR", '/');

define("DS", DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', realpath(dirname(__FILE__)));
define("LIB_PATH_INC", SITE_ROOT . DS);
```

- `URL_SEPARATOR` - definește separatorul de URL-uri ca fiind caracterul oblic (`/`).
- `DS` - definește separatorul de directoare, bazat pe constanta `DIRECTORY_SEPARATOR` a PHP.
- `SITE_ROOT` - definește calea absolută către directorul rădăcină al aplicației.
- `LIB_PATH_INC` - definește calea către directorul de biblioteci (`LIB_PATH_INC`) în cadrul directorului rădăcină al aplicației.

## Includerea fișierelor necesare

```php
require_once(LIB_PATH_INC . 'config.php');
require_once(LIB_PATH_INC . 'functions.php');
require_once(LIB_PATH_INC . 'session.php');
require_once(LIB_PATH_INC . 'upload.php');
require_once(LIB_PATH_INC . 'database.php');
require_once(LIB_PATH_INC . 'sql.php');
```

- `config.php` - conține configurațiile aplicației, cum ar fi informațiile de conectare la baza de date.
- `functions.php` - conține funcții utile care sunt utilizate în întreaga aplicație.
- `session.php` - gestionează sesiunea utilizatorului și oferă funcții pentru lucrul cu sesiunile.
- `upload.php` - conține funcții pentru încărcarea fișierelor.
- `database.php` - conține clasa `MySqli_DB` care facilitează lucrul cu baza de date MySQLi.
- `sql.php` - conține funcții utile pentru construirea și executarea interogărilor SQL.
---

# Funcții pentru interogări SQL - sql.php

---
## Declarații și configurări inițiale

```php
<?php
  require_once("load.php");

  define("URL_SEPARATOR", '/');

  define("DS", DIRECTORY_SEPARATOR);

  defined('SITE_ROOT') ? null : define('SITE_ROOT', realpath(dirname(__FILE__)));
  define("LIB_PATH_INC", SITE_ROOT . DS);

  require_once(LIB_PATH_INC . 'config.php');
  require_once(LIB_PATH_INC . 'functions.php');
  require_once(LIB_PATH_INC . 'session.php');
  require_once(LIB_PATH_INC . 'upload.php');
  require_once(LIB_PATH_INC . 'database.php');
  require_once(LIB_PATH_INC . 'sql.php');
?>
```

- Codul începe prin includerea fișierului `load.php`.
- Se definește constanta `URL_SEPARATOR` cu valoarea '/' și constanta `DS` cu valoarea `DIRECTORY_SEPARATOR` (separatorul specific sistemului de operare).
- Se definește constanta `SITE_ROOT` care reprezintă calea absolută către directorul rădăcină al proiectului utilizând funcția `realpath(dirname(__FILE__))`.
- Se definește constanta `LIB_PATH_INC` care reprezintă calea către directorul `LIB_PATH_INC` (presupunând că este un subdirector al directorului rădăcină).
- Se includ fișierele `config.php`, `functions.php`, `session.php`, `upload.php`, `database.php` și `sql.php` utilizând calea definită de `LIB_PATH_INC`.

## Funcții pentru interogări în baza de date

### Funcția `find_all($table)`

```php
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM " . $db->escape($table));
   }
}
```

- Această funcție primește un nume de tabel ca parametru.
- Verifică dacă tabelul există în baza de date utilizând funcția `tableExists($table)`.
- Dacă tabelul există, se execută o interogare pentru a selecta toate înregistrările din tabel și se returnează rezultatul folosind funcția `find_by_sql($sql)`.

### Funcția `find_by_sql($sql)`

```php
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
```

- Această funcție primește un șir SQL ca parametru.
- Se execută interogarea SQL folosind funcția `$db->query($sql)`.
- Se parcurge rezultatul interogării și se stochează fiecare înregistrare într-un array.
- Se returnează array-ul rezultat.


### Funcția `find_by_id($table, $id)`

Această funcție primește numele unei tabele și un ID și returnează un singur rând din tabela respectivă, bazat pe ID-ul specificat. Funcția folosește variabila globală `$db` pentru a accesa baza de date.

#### Parametri:
- `$table`: Numele tabelei în care se face căutarea.
- `$id`: ID-ul utilizat pentru căutarea.

#### Rezultat:
- Dacă tabela există, funcția va executa o interogare pentru a selecta rândul cu ID-ul specificat. Dacă găsește un rezultat, acesta va fi returnat. În caz contrar, va fi returnat `null`.

### Funcția `delete_by_id($table, $id)`

Această funcție primește numele unei tabele și un ID și șterge un rând din tabela respectivă, bazat pe ID-ul specificat. Funcția utilizează variabila globală `$db` pentru a accesa baza de date.

#### Parametri:
- `$table`: Numele tabelei din care se face ștergerea.
- `$id`: ID-ul rândului care trebuie șters.

#### Rezultat:
- Dacă tabela există, funcția va executa o interogare pentru a șterge rândul cu ID-ul specificat. Dacă ștergerea are succes și un singur rând este afectat, funcția va returna `true`. În caz contrar, va returna `false`.

### Funcția `count_by_id($table)`

Această funcție primește numele unei tabele și returnează numărul total de înregistrări din tabela respectivă, bazat pe numărul de coloane 'id'. Funcția folosește variabila globală `$db` pentru a accesa baza de date.

#### Parametri:
- `$table`: Numele tabelei pentru care se face numărătoarea.

#### Rezultat:
- Dacă tabela există, funcția va executa o interogare pentru a număra numărul total de înregistrări folosind coloana 'id'. Rezultatul va fi returnat sub forma unui array asociativ cu cheia 'total'.

### Funcția `tableExists($table)`

Această funcție primește numele unei tabele și verifică dacă tabela există în baza de date. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și execută o interogare pentru a verifica prezența tabelei.

#### Parametri:
- `$table`: Numele tabelei care trebuie verificată.

#### Rezultat:
- Dacă interogarea returnează rezultate, înseamnă că tabela există și funcția va returna `true`. În caz contrar, va returna `false`.

### Funcția `authenticate($username='', $password='')`

Această funcție primește un nume de utilizator și o parolă și verifică dacă acestea corespund unui utilizator existent în tabela 'users' din baza de date. Funcția utilizează variabila globală `$db` pentru a accesa baza de date.

#### Parametri:
- `$username`: Numele de utilizator pentru autentificare.
- `$password`: Parola pentru autentificare.

#### Rezultat:
- Funcția va executa o interogare pentru a căuta un utilizator în tabela 'users' cu numele de utilizator specificat. Dacă găsește un rezultat și parola introdusă corespunde parolei utilizatorului, funcția va returna ID-ul utilizatorului găsit. În caz contrar, va returna `false`.

### Funcția `authenticate_v2($username='', $password='')`

Această funcție este similară cu `authenticate()`, dar returnează întregul rând al utilizatorului găsit în loc de doar ID-ul. Funcția utilizează variabila globală `$db` pentru a accesa baza de date.

#### Parametri:
- `$username`: Numele de utilizator pentru autentificare.
- `$password`: Parola pentru autentificare.

#### Rezultat:
- Funcția va executa o interogare pentru a căuta un utilizator în tabela 'users' cu numele de utilizator specificat. Dacă găsește un rezultat și parola introdusă corespunde parolei utilizatorului, funcția va returna întregul rând al utilizatorului găsit. În caz contrar, va returna `false`.


### Funcția `current_user()`

Această funcție returnează utilizatorul curent autentificat pe baza ID-ului de sesiune. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și funcția `find_by_id()` pentru a găsi utilizatorul cu ID-ul specificat în tabela 'users'.

#### Rezultat:
- Funcția returnează utilizatorul curent sau `null` dacă nu există un ID de sesiune valid sau utilizatorul nu poate fi găsit în tabela 'users'.

### Funcția `find_all_user()`

Această funcție returnează o listă cu toți utilizatorii din baza de date. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și efectuează o interogare pentru a obține informațiile utilizatorilor, inclusiv numele, numele de utilizator, nivelul de utilizator, statusul, ultima autentificare și numele grupului de utilizatori (dacă există) alături de fiecare utilizator.

#### Rezultat:
- Funcția returnează un array cu rezultatele obținute din interogare.

### Funcția `updateLastLogIn($user_id)`

Această funcție actualizează data și ora ultimei autentificări a unui utilizator în tabela 'users' pe baza ID-ului de utilizator furnizat. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și actualizează înregistrarea utilizatorului cu data și ora curentă.

#### Parametri:
- `$user_id`: ID-ul utilizatorului pentru care se actualizează ultima autentificare.

#### Rezultat:
- Funcția returnează `true` dacă actualizarea a fost realizată cu succes și `false` în caz contrar.

## Descriere

### Funcția `find_by_groupName($val)`

Această funcție verifică dacă există un nume de grup specificat în tabela 'user_groups'. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și efectuează o interogare pentru a verifica existența numelui de grup specificat.

#### Parametri:
- `$val`: Numele grupului de verificat.

#### Rezultat:
- Funcția returnează `true` dacă nu există nicio înregistrare cu numele de grup specificat și `false` în caz contrar.

### Funcția `find_by_groupLevel($level)`

Această funcție verifică dacă există un nivel de grup specificat în tabela 'user_groups'. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și efectuează o interogare pentru a verifica existența nivelului de grup specificat.

#### Parametri:
- `$level`: Nivelul de grup de verificat.

#### Rezultat:
- Funcția returnează `true` dacă nu există nicio înregistrare cu nivelul de grup specificat și `false` în caz contrar.

### Funcția `page_require_level($require_level)`

Această funcție verifică dacă nivelul de utilizator curent are acces la o anumită pagină, pe baza nivelului de acces necesar. Funcția utilizează variabila globală `$session` pentru a verifica dacă utilizatorul este autentificat și funcțiile `current_user()` și `find_by_groupLevel()` pentru a obține nivelul de utilizator curent și nivelul de grup al utilizatorului respectiv.

#### Parametri:
- `$require_level`: Nivelul de acces necesar pentru a vizualiza pagina.

#### Rezultat:
- Dacă utilizatorul nu este autentificat, funcția redirecționează către pagina de autentificare.
- Dacă nivelul de grup al utilizatorului este inactiv, funcția afișează un mesaj de eroare și redirecționează către pagina principală.
- Dacă nivelul de utilizator curent este mai mic sau egal cu nivelul de acces necesar, funcția returnează `true`.
- În caz contrar, funcția afișează un mesaj de eroare și redirecționează către pagina principală.

### Funcția `join_product_table()`

Această funcție returnează o listă cu toate produsele din baza de date, alături de informații suplimentare. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și efectuează o interogare pentru a obține informațiile despre produse, inclusiv ID-ul, numele, cantitatea, prețul de achiziție și vânzare, ID-ul media, data, numele categoriei și numele fișierului media asociat (dacă există).

#### Rezultat:
- Funcția returnează un array cu rezultatele obținute din interogare.

### Funcția `update_product_qty($qty, $p_id)`

Această funcție actualizează cantitatea unui produs în baza de date. Funcția primește cantitatea nouă și ID-ul produsului și folosește variabila globală `$db` pentru a accesa baza de date. Se efectuează o interogare de actualizare pentru a scădea cantitatea produsului cu cantitatea specificată.

#### Parametri:
- `$qty`: Cantitatea nouă a produsului.
- `$p_id`: ID-ul produsului.

#### Rezultat:
- Funcția returnează `true` dacă actualizarea a avut succes și `false` în caz contrar.

### Funcția `find_recent_product_added($limit)`

Această funcție returnează o listă cu produsele recent adăugate în baza de date. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și efectuează o interogare pentru a obține informațiile despre produsele recent adăugate, inclusiv ID-ul, numele, prețul de vânzare, ID-ul media, numele categoriei și numele fișierului media asociat (dacă există).

#### Parametri:
- `$limit`: Numărul maxim de produse de afișat.

#### Rezultat:
- Funcția returnează un array cu rezultatele obținute din interogare.

### Funcțîa `find_higest_saleing_product($limit)`

Această funcție returnează o listă cu produsele cele mai vândute. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și efectuează o interogare pentru a obține numele produselor, numărul total de produse vândute și cantitatea totală vândută. Produsele sunt ordonate descrescător după cantitatea totală vândută.

#### Parametri:
- `$limit`: Numărul maxim de produse de afișat.

#### Rezultat:
- Funcția returnează un array cu rezultatele obținute din interogare.

### Funcția `find_all_sale()`

Această funcție returnează o listă cu toate vânzările din baza de date. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și efectuează o interogare pentru a obține informațiile despre vânzări, inclusiv ID-ul, cantitatea, prețul, data și numele produsului vândut.

#### Rezultat:
- Funcția returnează un array cu rezultatele obținute din interogare.


### Funcția `find_recent_sale_added($limit)`

Această funcție returnează o listă cu vânzările recente adăugate în baza de date. Funcția utilizează variabila globală `$db` pentru a accesa baza de date și efectuează o interogare pentru a obține informațiile despre vânzările recente, inclusiv ID-ul, cantitatea, prețul, data și numele produsului vândut. Vânzările sunt ordonate descrescător după dată.

#### Parametri:
- `$limit`: Numărul maxim de vânzări de afișat.

#### Rezultat:
- Funcția returnează un array cu rezultatele obținute din interogare.

### Funcția `find_sale_by_dates($start_date, $end_date)`

Această funcție returnează un raport de vânzări pentru un interval de timp specificat. Funcția primește data de început și data de sfârșit și utilizează variabila globală `$db` pentru a accesa baza de date. Se efectuează o interogare pentru a obține informații despre vânzări, inclusiv data, numele produsului, prețul de vânzare, prețul de achiziție, numărul total de înregistrări, cantitatea totală vândută, valoarea totală de vânzare și valoarea totală de achiziție. Rezultatele sunt grupate după dată și nume de produs și ordonate descrescător după dată.

#### Parametri:
- `$start_date`: Data de început a intervalului.
- `$end_date`: Data de sfârșit a intervalului.

#### Rezultat:
- Funcția returnează un obiect cu rezultatele obținute din interogare.

### Funcția `find_product_by_dates($start_date, $end_date)`

Această funcție returnează produsele înregistrate într-un anumit interval de timp specificat. Funcția primește data de început și data de sfârșit și utilizează variabila globală `$db` pentru a accesa baza de date. Se efectuează o interogare pentru a obține informații despre produse, inclusiv ID-ul, numele, cantitatea, prețul de achiziție, prețul de vânzare, ID-ul media asociat (pentru imagine) și data înregistrării. Produsele sunt selectate în funcție de data înregistrării și ordonate crescător după ID.

#### Parametri:
- `$start_date`: Data de început a intervalului.
- `$end_date`: Data de sfârșit a intervalului.

#### Rezultat:
- Funcția returnează un obiect cu rezultatele obținute din interogare.

---
##  Clasa `Media` - upload.php

---
Această clasă este responsabilă pentru manipularea fișierelor media, inclusiv încărcarea și procesarea acestora. Clasa conține metode pentru încărcarea de fișiere, verificarea extensiei fișierului, procesarea fișierului încărcat, precum și metode pentru manipularea imaginilor de produs și a imaginilor de utilizator.

#### Proprietăți:

- `imageInfo`: Informații despre imagine (obținute cu ajutorul funcției `getimagesize`).
- `fileName`: Numele fișierului.
- `fileType`: Tipul fișierului (MIME type).
- `fileTempPath`: Calea fișierului temporar.
- `userPath`: Destinația pentru încărcarea imaginilor de utilizator.
- `productPath`: Destinația pentru încărcarea imaginilor de produs.
- `errors`: Un array pentru stocarea erorilor.
- `upload_errors`: Un array cu mesaje de eroare asociate codurilor de eroare ale încărcării fișierelor.
- `upload_extensions`: Un array cu extensiile de fișiere permise pentru încărcare.

#### Metode:

- `file_ext($filename)`: Verifică dacă extensia fișierului este una permisă.
- `upload($file)`: Metoda responsabilă cu încărcarea fișierului. Verifică dacă fișierul a fost încărcat corect, are extensia permisă și setează proprietățile obiectului cu informații despre fișierul încărcat.
- `process()`: Verifică dacă există erori și dacă fișierul este disponibil și poate fi procesat. Verifică dacă calea de destinație este accesibilă și dacă fișierul deja există. Returnează rezultatul procesării.
- `process_media()`: Procesează fișierul media (utilizat pentru imaginile de produs). Verifică erorile, disponibilitatea fișierului și accesibilitatea căii de destinație. Mută fișierul încărcat în directorul de destinație și inserează informațiile în baza de date. Returnează rezultatul procesării.
- `process_user($id)`: Procesează fișierul imagine utilizator. Verifică erorile, disponibilitatea fișierului, accesibilitatea căii de destinație și existența ID-ului utilizatorului. Generează un nou nume de fișier pentru imagine, șterge imaginea veche asociată utilizatorului (dacă există), mută fișierul încărcat în directorul de destinație și actualizează informațiile în baza de date. Returnează rezultatul procesării.
- `update_userImg($id)`: Actualizează informațiile imaginii utilizatorului în baza de date.
- `user_image_destroy($id)`: Șterge imaginea veche asociată unui utilizator din directorul de destinație și returnează rezultatul acțiunii.
- `insert_media()`: Inserează informațiile despre fișierul media în baza de date.
- `media_destroy($id, $file_name)`: Șterge fișierul media asociat unui ID specific și elimină înregistrarea corespunzătoare din baza de date. Șterge fișierul din directorul de destinație și returnează rezultatul acțiunii.
