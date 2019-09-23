# Apie
2019 NFQ Akademijos Backend stojimo užduotis  
Tautvydas Rušas  
Projektas patalpintas: https://tauhospital.herokuapp.com/index.php

# Projekto aprašymas
Projektas pagrinde yra parašytas php kalba. OOP padaryti neišėjo, nes pradėjau ne nuo jo ir po to buvo laiko trūkumas, tačiau stengiausi kodą parašyti suprantamą.

# Kaip veikia
#### Viešai pasiekiami failai

##### index.php
Klientas užsiregistruoja ir gauna nuorodą, kurioje gali matyti informaciją apie savo apsilankymą.
##### scoreboard.php
Švieslentė, kurioje galima matyti klientus, kurie laukia eilėje pas gydytoją.
##### doctor.php
Puslapis skirtas daktarui paspaudus mygtuką pažymėti, kad klientas buvo aptarnautas.
##### clientsite.php
Sugeneruota nuoroda klientui, kur jis gali matyti kiek jam liko laiko laukti iki vizito. Laikas atnaujinamas kas 5s.

#### Likusieji failas

##### config.php
Skirta serverio hostinimui
##### createtable.php, createdoctortable.php ir createtimetable.php
Sukuria klientu, daktaru ir laiko lenteles.
##### start.php
Iterpia kliento parašytus duomenis i duomenų bazę ir i sesijas perduoda žinutes, kurios atitinka įvestus duomenis.
##### calcduration.php
I laiku lentele ideda vizito trukmę, po to apskaičiuoja kiekvieno daktaro vizito vidutinį laiką ir pažymėtas klientas tampa aptarnautu. (Buvo galima visko netalpinti i vieną php failą, bet jau taip išėjo).
##### calculations.php
Funkcija apskaičiuoja kiek laiko klientui reikės laukti iki vizito. Jei jis yra pirmas eilėje, jis gali eiti pas daktarą, jei jis ne pirmas, tai laukimas apskaičuojamas pagal daktaro vidutinį laiką * kelintas eilėje yra klientas, gali būti ir atvejis, kai pirmas klientas užtrunka per ilgai, tuo atveju klientui bus pranešta, kad praeitas klientas užtrunka ilgiau nei tikėtasi.
##### containerStyle.css style.css
Css failai pagrąžinti visą puslapį.


# Problemos
Neįvykdyta neiviena level-3 užduotis. Daktaras gali aptarnauti tik viena klienta tuo paciu metu, jei yra paspaudžiami du checkboxai tuo pačiu metu, tai į duomenų bazę įsideda tik vienas aptarnavimo laikas.  
Taip pat turėtų būti sukurta prisijungimo sistema specialistams

# Kontaktai
tautis63@gmail.com  
+37067987256

# Ačiū už dėmesį.
