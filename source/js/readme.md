# Script_template.js

Acesta este un scurt ghid pentru a înțelege și utiliza codul JavaScript furnizat în cadrul proiectului.

## Descriere

Codul JavaScript oferă două funcționalități principale:

1. Comutarea modului de culoare între luminos și întunecat.
2. Comutarea stării barei laterale între deschisă și închisă.

## Modul de culoare

Codul pentru comutarea modului de culoare se ocupă de schimbarea între modul luminos și modul întunecat. Acesta este controlat prin intermediul unei clase CSS "dark" care este adăugată sau eliminată din elementul `<body>` al paginii.

### Utilizare

1. Pentru a comuta între modul de culoare luminos și modul întunecat, faceți clic pe elementul HTML cu clasa "mode-toggle".
2. Modul de culoare curent este reținut în stocarea locală (`localStorage`), astfel încât atunci când pagina este reîncărcată, modul de culoare selectat anterior va fi restaurat.

## Bare laterale

Codul pentru comutarea stării barei laterale se ocupă de deschiderea și închiderea barei laterale a paginii. Aceasta poate fi utilă într-un design cu o bară laterală care poate fi ascunsă sau afișată în funcție de preferințe.

### Utilizare

1. Pentru a comuta între starea deschisă și închisă a barei laterale, faceți clic pe elementul HTML cu clasa "sidebar-toggle".
2. Starea curentă a barei laterale este reținută în stocarea locală (`localStorage`), astfel încât atunci când pagina este reîncărcată, starea barei laterale selectată anterior va fi restaurată.

## Reținerea setărilor

Modul de culoare și starea barei laterale sunt reținute în stocarea locală (`localStorage`). Acest lucru înseamnă că atunci când utilizatorul comută modul de culoare sau starea barei laterale, setările respective vor fi păstrate chiar și după reîncărcarea paginii.

