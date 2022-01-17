function odkrytie(button, div, text1, text2) {
    const toggleBtn = document.querySelector(button);
    const divList = document.querySelector(div);

    divList.style.display = 'none';

    toggleBtn.addEventListener('click', () => {
        if (divList.style.display === 'none') {
            divList.style.display = 'block';
            toggleBtn.innerHTML = text1;
        } else {
            divList.style.display = 'none';
            toggleBtn.innerHTML = text2;
        }
    });
}

odkrytie('#contactUcet','.hiddenUcet','SKRYŤ','UKÁZAŤ');
odkrytie('#contactPlatby','.hiddenPlatby','SKRYŤ','UKÁZAŤ');
odkrytie('#contactTechnicke','.hiddenTechnicke','SKRYŤ','UKÁZAŤ');
odkrytie('#contactHerne','.hiddenHerne','SKRYŤ','UKÁZAŤ');
odkrytie('#contactNahlasenie','.hiddenNahlasenie','SKRYŤ','UKÁZAŤ');

odkrytie('#insertbtncontacts','.hiddenInsertContacts','ZRUŠIŤ','VYTVORIŤ');
