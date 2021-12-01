/*odkrytie zadania hesla*/
const toggleButtonPwd = document.querySelector('#pwdbtn');
const divListPwd = document.querySelector('.hiddenpwd');

divListPwd.style.display = 'none';

toggleButtonPwd.addEventListener('click', () => {
   if (divListPwd.style.display === 'none') {
        divListPwd.style.display = 'block';
        toggleButtonPwd.innerHTML = 'ZRUŠIŤ';
   } else {
       divListPwd.style.display = 'none';
       toggleButtonPwd.innerHTML = 'ZMENIŤ';
   }
});

/*odkrytie zadania mena a emailu*/
const toggleButtonInfo = document.querySelector('#infobtn');
const divListInfo = document.querySelector('.hiddeninfo');

divListInfo.style.display = 'none';

toggleButtonInfo.addEventListener('click', () => {
    if (divListInfo.style.display === 'none') {
        divListInfo.style.display = 'block';
        toggleButtonInfo.innerHTML = 'ZRUŠIŤ';
    } else {
        divListInfo.style.display = 'none';
        toggleButtonInfo.innerHTML = 'ZMENIŤ';
    }
});

/*potvrdujuca sprava o vymazani uctu*/
const toggleButtonDel = document.querySelector('#confirmdel');

toggleButtonDel.addEventListener('click', e => {
   var result = confirm('Ste si tým istý? Účet bude natrvalo odstránený!');
   if (result == false) {
       e.preventDefault();
   }
});

