/*odkrytie pridania tanku*/
const toggleButtonInsert = document.querySelector('#insertbtncontacts');
const divListInsert = document.querySelector('.hiddenInsertContacts');

divListInsert.style.display = 'none';

toggleButtonInsert.addEventListener('click', () => {
    if (divListInsert.style.display === 'none') {
        divListInsert.style.display = 'block';
        toggleButtonInsert.innerHTML = 'ZRUŠIŤ';
    } else {
        divListInsert.style.display = 'none';
        toggleButtonInsert.innerHTML = 'VYTVORIŤ';
    }
});

/*odkrytie ukazania sprav typu ucet*/
const toggleButtonShowUcet = document.querySelector('#contactUcet');
const divListShowUcet = document.querySelector('.hiddenUcet');

divListShowUcet.style.display = 'none';

toggleButtonShowUcet.addEventListener('click', () => {
    if (divListShowUcet.style.display === 'none') {
        divListShowUcet.style.display = 'block';
        toggleButtonShowUcet.innerHTML = 'SKRYŤ';
    } else {
        divListShowUcet.style.display = 'none';
        toggleButtonShowUcet.innerHTML = 'UKÁZAŤ';
    }
});

/*odkrytie ukazania sprav typu platby*/
const toggleButtonShowPlatby = document.querySelector('#contactPlatby');
const divListShowPlatby = document.querySelector('.hiddenPlatby');

divListShowPlatby.style.display = 'none';

toggleButtonShowPlatby.addEventListener('click', () => {
    if (divListShowPlatby.style.display === 'none') {
        divListShowPlatby.style.display = 'block';
        toggleButtonShowPlatby.innerHTML = 'SKRYŤ';
    } else {
        divListShowPlatby.style.display = 'none';
        toggleButtonShowPlatby.innerHTML = 'UKÁZAŤ';
    }
});

/*odkrytie ukazania sprav typu technicke*/
const toggleButtonShowTechnicke = document.querySelector('#contactTechnicke');
const divListShowTechnicke = document.querySelector('.hiddenTechnicke');

divListShowTechnicke.style.display = 'none';

toggleButtonShowTechnicke.addEventListener('click', () => {
    if (divListShowTechnicke.style.display === 'none') {
        divListShowTechnicke.style.display = 'block';
        toggleButtonShowTechnicke.innerHTML = 'SKRYŤ';
    } else {
        divListShowTechnicke.style.display = 'none';
        toggleButtonShowTechnicke.innerHTML = 'UKÁZAŤ';
    }
});

/*odkrytie ukazania sprav typu herne*/
const toggleButtonShowHerne = document.querySelector('#contactHerne');
const divListShowHerne = document.querySelector('.hiddenHerne');

divListShowHerne.style.display = 'none';

toggleButtonShowHerne.addEventListener('click', () => {
    if (divListShowHerne.style.display === 'none') {
        divListShowHerne.style.display = 'block';
        toggleButtonShowHerne.innerHTML = 'SKRYŤ';
    } else {
        divListShowHerne.style.display = 'none';
        toggleButtonShowHerne.innerHTML = 'UKÁZAŤ';
    }
});

/*odkrytie ukazania sprav typu nahlasenie a odvolanie*/
const toggleButtonShowNahlasenie = document.querySelector('#contactNahlasenie');
const divListShowNahlasenie = document.querySelector('.hiddenNahlasenie');

divListShowNahlasenie.style.display = 'none';

toggleButtonShowNahlasenie.addEventListener('click', () => {
    if (divListShowNahlasenie.style.display === 'none') {
        divListShowNahlasenie.style.display = 'block';
        toggleButtonShowNahlasenie.innerHTML = 'SKRYŤ';
    } else {
        divListShowNahlasenie.style.display = 'none';
        toggleButtonShowNahlasenie.innerHTML = 'UKÁZAŤ';
    }
});