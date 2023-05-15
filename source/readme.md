---

## Adaugarea unei intrări noi în baza de date - add_group.php

---
### Scopul codului
Codul are ca scop adăugarea unui nou grup în baza de date a unei aplicații. Este necesară autentificarea ca utilizator cu nivel de permisiune specificat (sau mai mare) pentru a putea accesa această pagină.

### Fluxul codului

1. Verificarea acțiunii POST: Codul verifică dacă s-a trimis un formular cu acțiunea "add" prin metoda POST.
2. Validarea câmpurilor: Se validează câmpurile obligatorii, verificând dacă sunt completate corect.
3. Verificarea existenței grupului: Se verifică dacă numele grupului și nivelul grupului introduse nu există deja în baza de date. Dacă există o potrivire, se afișează un mesaj de eroare și se redirecționează utilizatorul înapoi la pagina de adăugare a grupului.
4. Inserarea în baza de date: Dacă nu există erori și câmpurile sunt valide, se inserează grupul în baza de date utilizând valorile introduse.
5. Mesaje de succes sau eroare: Dacă inserarea în baza de date are succes, se afișează un mesaj de succes și utilizatorul este redirecționat înapoi la pagina de adăugare a grupului. În caz contrar, se afișează un mesaj de eroare și utilizatorul este redirecționat înapoi la pagina de adăugare a grupului.
6. Interfața utilizatorului: Se afișează interfața utilizatorului pentru adăugarea unui nou grup. Aceasta conține un formular cu câmpurile necesare: numele grupului, nivelul grupului și starea (activ/inactiv).

### Observații
- Codul face referire la fișiere și funcții care nu sunt incluse aici (`load.php`, `page_require_level()`, `remove_junk()`, `display_msg()`, etc.), deci este posibil să existe dependențe de alte părți ale aplicației.
- Interfața utilizatorului utilizează clasă CSS pentru stilizare (`bg-form`, `rounded-lg`, etc.), dar stilizarea exactă nu este specificată în codul furnizat.

---

## Ștergerea unei intrări din baza de date - delete_group.php

---

### Scopul codului
Codul are ca scop ștergerea unui grup din baza de date a unei aplicații. Este necesară autentificarea ca utilizator cu nivel de permisiune specificat (sau mai mare) pentru a putea accesa această pagină.

### Fluxul codului

1. Verificarea nivelului de permisiune: Codul verifică nivelul de permisiune al utilizatorului pentru a determina dacă acesta are acces la pagina de ștergere a grupului. Este necesar un nivel de permisiune de cel puțin 1.
2. Ștergerea grupului: Se șterge grupul din baza de date utilizând funcția `delete_by_id()`. ID-ul grupului este preluat din parametrul GET cu cheia 'id'.
3. Mesaje de succes sau eroare: Dacă ștergerea are succes, se afișează un mesaj de succes și utilizatorul este redirecționat înapoi la pagina de grupuri. În caz contrar, se afișează un mesaj de eroare și utilizatorul este redirecționat înapoi la pagina de grupuri.

---
# Editarea unei intrări din baza de date - edit_group.php

---
Codul reprezintă o pagină PHP pentru editarea informațiilor despre un grup existent într-o aplicație. Această pagină este accesibilă doar utilizatorilor cu un nivel de permisiune de cel puțin cel specificat prin parametru.

## Fluxul codului

1. Verificarea nivelului de permisiune: Se verifică nivelul de permisiune al utilizatorului pentru a determina dacă acesta are dreptul să acceseze pagina de editare a grupului.
2. Găsirea grupului: Se caută grupul în baza de date utilizând funcția `find_by_id()`. ID-ul grupului este preluat din parametrul GET cu cheia 'id'. Dacă grupul nu este găsit în baza de date, se afișează un mesaj de eroare și utilizatorul este redirecționat către pagina de grupuri.
3. Actualizarea grupului: Dacă utilizatorul a apăsat butonul de "Update" și nu există erori de validare, se preiau noile informații despre grup (nume, nivel și status) din formular și se actualizează în baza de date prin intermediul unei interogări de tipul `UPDATE`. Dacă actualizarea este realizată cu succes și numărul de rânduri afectate este 1, se afișează un mesaj de succes și utilizatorul este redirecționat către pagina de editare a grupului. În caz contrar, se afișează un mesaj de eroare și utilizatorul este redirecționat înapoi la pagina de editare a grupului.
4. Afișarea formularului: Formularul afișează informațiile curente ale grupului în câmpurile corespunzătoare și le permite utilizatorului să le modifice. Numele grupului și nivelul grupului sunt afișate ca valori prestabilite în câmpurile de introducere, iar statusul grupului este afișat ca o opțiune selectată sau neluată în funcție de valoarea curentă a grupului.

---

# Afișarea tutor datelor din tabela - group.php

---
Acest cod reprezintă o pagină PHP pentru afișarea tuturor grupurilor dintr-o aplicație. Această pagină este accesibilă doar utilizatorilor cu un nivel de permisiune specificat.

## Fluxul codului

1. Verificarea nivelului de permisiune: Se verifică nivelul de permisiune al utilizatorului pentru a determina dacă acesta are dreptul să acceseze pagina de afișare a grupurilor.
2. Obținerea tuturor grupurilor: Se utilizează funcția `find_all()` pentru a obține toate grupurile din baza de date.
3. Afișarea grupurilor: Folosind o structură de buclă `foreach`, se afișează informațiile despre fiecare grup într-un rând al tabelului. Informațiile afișate includ numărul grupului, numele grupului, nivelul grupului și statusul grupului. Statusul este afișat ca un text cu fundal colorat, indicând dacă grupul este activ sau inactiv.
4. Butonul "Add New Group": Utilizatorul are opțiunea de a adăuga un nou grup prin apăsarea butonului "Add New Group". Acesta este un link către pagina "add_group.php".
5. Acțiuni: În fiecare rând al tabelului, sunt afișate două butoane: unul pentru editare și unul pentru ștergere. Butonul de editare este un link către pagina "edit_group.php", unde utilizatorul poate modifica informațiile despre grupul respectiv. Butonul de ștergere este un link către pagina "delete_group.php", unde utilizatorul poate șterge grupul respectiv.
