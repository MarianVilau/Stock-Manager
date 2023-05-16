## Style.css

Acest fișier `.md` conține codul CSS responsiv pentru un design al unei pagini web.

### Responsive

Codul CSS este construit pentru a asigura un design responsive al paginii web, adică adaptabilitatea la diferite dimensiuni ale ecranului. Sunt utilizate media queries pentru a modifica stilurile CSS în funcție de lățimea ecranului. Sunt definite reguli specifice pentru ecranele cu o lățime mai mică sau egală cu 1000px, 780px, 560px și 400px.

### Variabile CSS

Sunt definite mai multe variabile CSS în secțiunea `:root`. Aceste variabile sunt utilizate pentru a seta culorile principale și alte valori folosite în design.

### Setări globale

Codul CSS de mai sus conține setările globale care se aplică tuturor elementelor din pagină. Aceste setări includ:
- Margin și padding setate la 0 pentru toate elementele
- Box-sizing setat la `border-box`
- Font-family setat la `'Poppins', sans-serif`

### Partea de responsivitate a designului

Stilurile CSS din fișierul de mai sus sunt construite pentru a asigura o experiență responsivă și adaptabilă la diferite dispozitive. În special, sunt aplicate următoarele modificări:

- Meniul de navigare (`nav`) are o lățime de 250px și rămâne fixat în partea stângă a paginii. Pe ecrane mai mici, lățimea meniului se schimbă la 73px pentru a face loc conținutului.
- Când meniul de navigare are clasa `.close`, anumite elemente cum ar fi numele logo-ului și numele de meniu devin invizibile pentru a economisi spațiu.
- Secțiunea `nav .menu-items` conține link-uri către diferite pagini și utilizează flexbox pentru a le afișa vertical.
- Pentru link-urile din meniu (`nav .menu-items li a`), se aplică stiluri pentru a indica atunci când utilizatorul plasează cursorul pe deasupra lor (`:hover`).
- Conținutul principal al paginii (`div.content`) este poziționat relativ față de meniul de navigare și se schimbă în lățime pentru a se potrivi spațiului disponibil. Pe ecrane mai mici, acest conținut se ajustează pentru a se potrivi cu noul spațiu.
- Secțiunea `.dash-content` conține mai multe elemente cu clasele `.title`, `.boxes` și `.activity` care sunt aranjate în mod responsiv folosind flexbox și se adaptează la dimensiunile ecranului.
- Media queries sunt folosite pentru a schimba stilurile CSS în funcție de lățimea ecranului, asigurându-se că designul rămâne corespunzător pe dispozitive de diferite dimensiuni.

Acestea sunt doar câteva dintre aspectele de design responsiv acoperite în acest cod.

---

# Stylesheet pentru formulare - style_form.css

---

Acest fișier README.md oferă informații despre stilurile CSS utilizate pentru formularele web.

## Descriere

Acest stylesheet conține stilurile CSS care pot fi aplicate la formularele web pentru a le formata și a le oferi un aspect mai plăcut și coerent. Stilurile sunt definite folosind clasele CSS, ceea ce permite aplicarea ușoară a acestora la elementele HTML.

## Clase CSS disponibile

### Dimensiuni și margini

- `.px-4` - Adaugă un padding de 1rem pe partea stângă și pe partea dreaptă a elementului.
- `.py-3` - Adaugă un padding de 0.75rem în partea de sus și în partea de jos a elementului.
- `.mb-4` - Adaugă un margin-bottom de 1rem la element.
- `.mb-8` - Adaugă un margin-bottom de 2rem la element.
- `.rescale` - Modifică margin-top-ul cu -3.1em pentru a reașeza elementul.
- `.rescale2` - Modifică margin-top-ul cu -5.1em pentru a reașeza elementul.
- `.mt-1` - Adaugă un margin-top de 0.25rem la element.
- `.mt-4` - Adaugă un margin-top de 1rem la element.
- `.w-100` - Setează lățimea elementului la 100%.
- `.w-90` - Setează lățimea elementului la 87%.
- `.w-50` - Setează lățimea elementului la 49%.
- `.w-30` - Setează lățimea elementului la 31%.

### Culori și stiluri de fundal

- `.bg-form` - Setează culoarea de fundal a elementului la valoarea variabilei `--panel-color`.
- `.rounded-lg` - Setează un border-radius de 0.5rem pentru a rotunji colțurile elementului.
- `.shadow-md` - Adaugă o umbrire subtilă la element folosind `box-shadow`.
- `.border-gray` - Setează culoarea chenarului la valoarea variabilei `--black-light-color`.
- `.text-gray` - Setează culoarea textului la valoarea variabilei `--text-color`.

### Text și fonturi

- `.text-sm` - Setează dimensiunea fontului la 0.875rem.
- `.text-lg` - Setează dimensiunea fontului la 1.125rem.
- `.text-color` - Setează culoarea textului la valoarea variabilei `--text-color`.
- `.font-semibold` - Setează greutatea fontului la 600 (font semi-îngroșat).

### Focus și interacțiune

- `.focus\:border-purple-400:focus` - Setează culoarea chenarului la #ac94fa atunci când elementul primește focus.
- `.focus\:outline-none:focus` - Elimină conturul elementului când acesta primește focus.
- `.focus\:shadow-outline-purple:focus` - Adaugă o umbră de contur la element când acesta primește focus, utilizând `box-shadow`.
- `.form-input` - Stabilește stilurile de bază pentru un element de intrare în formular, inclusiv fundalul, culoarea chenarului, dimensiunea fontului și padding-ul.
- `.form-input::-moz-placeholder` - Setează stilurile pentru textul placeholder într-un element de intrare în formular pentru browserul Mozilla Firefox.
- `.form-input:-ms-input-placeholder` - Setează stilurile pentru textul placeholder într-un element de intrare în formular pentru browserul Microsoft Internet Explorer și Microsoft Edge.
- `.form-input::-ms-input-placeholder` - Setează stilurile pentru textul placeholder într-un element de intrare în formular pentru browserul Microsoft Internet Explorer și Microsoft Edge.
- `.form-input::placeholder` - Setează stilurile pentru textul placeholder într-un element de intrare în formular.
- `.form-input:focus` - Setează stilurile pentru un element de intrare în formular atunci când primește focus, inclusiv conturul și culoarea chenarului.
- `.form-select` - Stabilește stilurile de bază pentru un element de selectare în formular, inclusiv fundalul, culoarea chenarului, dimensiunea fontului și padding-ul.
- `.form-select::-ms-expand` - Setează stilurile pentru butonul de expandare într-un element de selectare în formular pentru browserul Microsoft Internet Explorer și Microsoft Edge.

### Alte stiluri

- `.more-align` - Setează stilurile pentru alinierea conținutului într-un container, utilizând `display: flex` și `justify-content: space-between`.
- `.block` - Setează elementul ca fiind un bloc cu `display: block`.
- `.title` - Setează stilurile pentru un titlu, inclusiv alinierea conținutului, margini și dimensiuni de font.
- `.title i` - Setează stilurile pentru un icon în cadrul unui titlu, inclusiv dimensiuni, fundal, culoare și aliniere.
- `.title .text` - Setează stilurile pentru textul din cadrul unui titlu, inclusiv dimensiune de font, greutate și culoare.

---

# Stylesheet pentru tabele - style_tabele.css

---
Acest stylesheet conține o serie de clase CSS pentru a defini stiluri utile pentru tabele. Acestea pot fi utilizate pentru a personaliza aspectul tabelelor într-un proiect web.

## Utilizarea claselor

Clasele CSS din acest stylesheet pot fi adăugate la elementele HTML relevante pentru a aplica stilurile corespunzătoare. Exemplul de utilizare al fiecărei clase este prezentat mai jos:

### Clase pentru dimensiuni și spațiere

- `.min-w-0` - Setează lățimea minimă a elementului la 0.
- `.overflow-hidden` - Ascunde conținutul care depășește limitele elementului.
- `.rounded-lg` - Adaugă o bordură rotunjită elementului cu un radius de 0.5rem.
- `.shadow-xs` - Adaugă o umbră subtilă elementului utilizând `box-shadow`.
- `.overflow-x-auto` - Permite elementului să aibă o bară de derulare orizontală când conținutul depășește dimensiunile sale.
- `.whitespace-no-wrap` - Previne întreruperea textului la finalul liniei.
- `.text-xs` - Setează dimensiunea fontului la 0.75rem.
- `.text-sm` - Setează dimensiunea fontului la 0.875rem.
- `.text-lg` - Setează dimensiunea fontului la 1.125rem.
- `.text-xl` - Setează dimensiunea fontului la 1.25rem.
- `.text-2xl` - Setează dimensiunea fontului la 1.5rem.
- `.text-6xl` - Setează dimensiunea fontului la 4rem.
- `.font-semibold` - Setează greutatea fontului la 600.
- `.tracking-wide` - Adaugă un spațiu suplimentar între caractere cu `letter-spacing`.
- `.text-left` - Aliniază textul la stânga.
- `.uppercase` - Transformă textul în majuscule.
- `.text-header` - Setează culoarea textului la var(--panel-color).
- `.text-gray` - Setează culoarea textului la var(--text-color).
- `.border-b` - Adaugă o linie de subliniere la partea de jos a elementului cu o lățime de 1px.
- `.border-t` - Adaugă o linie de subliniere la partea de sus a elementului cu o lățime de 1px.
- `.dark\:border-gray-700` - Setează culoarea bordurii la var(--box4-color) în modul întunecat.
- `.dark\:border-gray-800` - Setează culoarea bordurii la #1a1c23 în modul întunecat.
- `.bg-gray-50` - Setează culoarea de fundal la var(--box4-color).
- `.alt-color` - Setează culoarea de fundal la var(--head-color).
- `.back-color` - Setează culoarea de fundal la var(--panel-color).
- `.flex` - Setează elementul să utilizeze flexbox.
- `.pull-right` - Aliniază elementele la dreapta folosind `float: right`.
- `.in-line` - Setează elementul să fie afișat în linie folosind `display: inline-block`.
- `.items-center` - Alinează elementele copil în centru pe axa verticală.
- `.relative` - Setează poziția relativă a elementului.
- `.hidden` - Ascunde elementul prin `display: none`.
- `.w-8` - Setează lățimea elementului la 2rem.
- `.h-8` - Setează înălțimea elementului la 2rem.
- `.mr-3` - Adaugă o margine la dreapta a elementului de 0.75rem.
- `.rounded-full` - Adaugă o bordură rotunjită elementului cu un radius de 9999px.
- `.md\:block` - Setează elementul să fie afișat ca bloc pe dispozitivele de dimensiune medie și mai mari.
- `.object-cover` - Redimensionează conținutul pentru a umple complet elementul, păstrând proporțiile originale.
- `.h-full` - Setează înălțimea elementului la 100%.
- `.absolute` - Setează poziția absolută a elementului.
- `.inset-0` - Setează marginile dreapta și stânga la 0.
- `.inset-y-0` - Setează marginile de sus și de jos la 0.
- `.shadow-inner` - Adaugă o umbră interioară subtilă elementului utilizând `box-shadow`.
- `.leading-tight` - Setează spațiul între liniile de text la 1.25.
- `.text-green-700` - Setează culoarea textului la #046c4e.
- `.bg-green-100` - Setează culoarea de fundal la #def7ec.
- `.dark\:bg-green-700` - Setează culoarea de fundal la #046c4e în modul întunecat.
- `.dark\:text-green-100` - Setează culoarea textului la #def7ec în modul întunecat.
- `.text-red-700` - Setează culoarea textului la #6c0404.
- `.bg-red-100` - Setează culoarea de fundal la #f7dede.
- `.dark\:bg-red-700` - Setează culoarea de fundal la #bd1111 în modul întunecat.
- `.dark\:text-red-100` - Setează culoarea textului la #f7dede în modul întunecat.
- `.w-5` - Setează lățimea elementului la 1.25rem.
- `.h-5` - Setează înălțimea elementului la 1.25rem.
- `.grid` - Setează elementul să utilizeze grid layout.
- `.sm\:grid-cols-9` - Setează structura de coloane a gridului pe dispozitivele de dimensiune mică și mai mari cu 9 coloane de dimensiune egală.

---

# Login Page Stylesheet - style_login.css

This is a CSS stylesheet for a login page. It includes styles for the body, login container, navigation, labels, input fields, and submit button.

## Body

The body element has a white background color and uses the 'Montserrat' font family. The font size is set to 16px with a line height of 1.25 and a letter spacing of 1px.

## Login Container

The login container has a relative position and a z-index of 0. It is centered on the page with a margin of 4rem auto 0. The container has a padding of 2rem 4rem 0 4rem and a width of 100%, but is limited to a maximum width of 500px. The container has a minimum height of 600px and uses an image as a background. The box-shadow property creates a shadow effect.

## Navigation

The navigation is contained within the login container and has a relative position. It uses flexbox to align the navigation items to the left and right of the container. The navigation items have a list-style of none and are displayed inline-block. The active item is highlighted with a background color that changes on hover. The item text is displayed in uppercase and has a font size of 1.25rem.

## Labels

The labels for the input fields are displayed with a block style and have a left padding of 1rem. The label text is displayed in uppercase with a font size of 0.75rem and a margin-bottom of 1rem.

## Input Fields

The input fields have a transparent border and a background color of rgba(255, 255, 255, 0.25). On hover or focus, the border becomes opaque and the background becomes transparent. The color is white with a font size of 1.15rem. The input fields are also given a border radius of 1.5rem. The checkbox input field is positioned absolutely, and the label for it is positioned relative with a left padding of 1.5rem and a top margin of 2rem.

## Submit Button

The submit button is displayed as a block element and is centered with a margin-top of 1rem. It has a white text color, uppercase text, and a letter spacing of 1px. The font size is 1rem and the font family is 'Montserrat'. The button has a border radius of 2rem and a background color of #FF5A5F. On hover, the background color changes to rgba(255, 90, 95, 0.84).

---

# Stylesheet pentru Rapoarte - style_reports.css

---

Acest stylesheet este destinat utilizării în rapoarte și oferă stiluri specifice pentru tipărire. Acesta include clase pentru stilizarea elementelor și setări specifice pentru mediul de tipărire.

## Clase

- `.page-break` - Această clasă poate fi utilizată pentru a introduce o pauză de pagină în timpul tipăririi. Ea are următoarele proprietăți:
    - `page-break-before: always` - Întrerupe pagina înaintea elementului.
    - `width: auto` - Lățimea este setată la `auto`, ceea ce înseamnă că va ocupa întreaga lățime disponibilă.
    - `margin: auto` - Marginile orizontale sunt setate automat pentru a centra elementul pe pagină.

- `.sale-head` - Această clasă poate fi utilizată pentru stilizarea antetului unui raport de vânzări. Are următoarele proprietăți:
    - `margin: 40px 0` - Setează marginile de sus și de jos la 40px și marginile laterale la 0.
    - `text-align: center` - Alinează conținutul la centru.

- `.sale-head h1, .sale-head strong` - Această regula se aplică elementelor `h1` și `strong` din cadrul clasei `.sale-head`. Are următoarele proprietăți:
    - `padding: 10px 20px` - Setează paddingul la 10px pe verticală și 20px pe orizontală.
    - `display: block` - Elementele vor fi afișate ca blocuri.

- `.sale-head h1` - Această regula se aplică elementului `h1` din cadrul clasei `.sale-head`. Are următoarele proprietăți:
    - `margin: 0` - Elimină marginile elementului.
    - `border-bottom: 1px solid #212121` - Adaugă o linie sub element cu o grosime de 1px și culoarea `#212121`.

- `.table > thead:first-child > tr:first-child > th` - Această regula se aplică primului element `th` din primul rând (`tr`) al primului `thead` dintr-un element `table`. Are următoarele proprietăți:
    - `border-top: 1px solid #000` - Adaugă o linie superioară elementului cu o grosime de 1px și culoarea `#000`.

- `table thead tr th` - Această regula se aplică elementelor `th` din cadrul unui `thead` al unui element `table`. Are următoarele proprietăți:
    - `text-align: center` - Alignează conținutul celulelor la centru.
    - `border: 1px solid #ededed` - Adaugă o bordură cu o grosime de 1px și culoarea `#ededed` în jurul celulelor.

- `table tbody tr td` - Această regula se aplică elementelor `td` din cadrul unui `tbody` al unui element `table`. Are următoarele proprietăți:
    - `vertical-align: middle` - Alinează conținutul celulelor vertical în centru.

- `.sale-head, table.table thead tr th, table tbody tr td, table tfoot tr td` - Această regula se aplică elementelor `.sale-head`, celulelor `th` din `thead`, celulelor `td` din `tbody` și celulelor `td` din `tfoot` din cadrul unui element `table`. Are următoarele proprietăți:
    - `border: 1px solid #212121` - Adaugă o bordură cu o grosime de 1px și culoarea `#212121` în jurul elementelor.
    - `white-space: nowrap` - Forțează textul să rămână pe o singură linie, fără întreruperi de linie.

- `.sale-head h1, table thead tr th, table tfoot tr td` - Această regula se aplică elementelor `h1` din `.sale-head`, celulelor `th` din `thead` și celulelor `td` din `tfoot` din cadrul unui element `table`. Are următoarele proprietăți:
    - `background-color: #f8f8f8` - Setează culoarea de fundal a elementelor la `#f8f8f8`.

- `tfoot` - Această regula se aplică elementului `tfoot` din cadrul unui element `table`. Are următoarele proprietăți:
    - `color: #000` - Setează culoarea textului la `#000`.
    - `text-transform: uppercase` - Transformă textul în majuscule.
    - `font-weight: 500` - Setează grosimea fontului la 500.

## Media Query pentru tipărire

Acest stylesheet include și un media query pentru tipărire (`@media print`). În acest media query, se aplică următoarele stiluri pentru elementele `html` și `body` în timpul procesului de tipărire:
- `font-size: 9.5pt` - Setează dimensiunea fontului la 9.5 puncte.
- `margin: 0` - Elimină marginile exterioare.
- `padding: 0` - Elimină paddingul.
