odkrytie('#pwdbtn','.hiddenpwd','ZRUŠIŤ','ZMENIŤ');
odkrytie('#infobtn','.hiddeninfo','ZRUŠIŤ','ZMENIŤ');

/*potvrdujuca sprava o vymazani uctu*/
const toggleButtonDel = document.querySelector('#confirmdel');

toggleButtonDel.addEventListener('click', e => {
   var result = confirm('Ste si tým istý? Účet bude natrvalo odstránený!');
   if (result === false) {
       e.preventDefault();
   }
});

