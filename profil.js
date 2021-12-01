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
       toggleButtonPwd.innerHTML = 'ZMENIŤ HESLO';
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
        toggleButtonInfo.innerHTML = 'ZMENIŤ UDAJE';
    }
});

/*potvrdujuca sprava o vymazani uctu*/
const toggleButtonDel = document.querySelector('#confirmdel');

toggleButtonDel.addEventListener('click', e => {
   var result = confirm('Si si isty?');
   if (result == false) {
       e.preventDefault();
   }
});

