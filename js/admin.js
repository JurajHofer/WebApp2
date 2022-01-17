odkrytie('#insertbtn','.hiddenInsert','ZRUŠIŤ','PRIDAŤ');
odkrytie('#insertbtnthemes','.hiddeninsertthemes','ZRUŠIŤ','PRIDAŤ');

/*odkrytie upravy parametrov tanku*/
const toggleButtonUpdate = document.querySelector('#updatebtn');
const divListUpdate = document.querySelector('.hiddenUpdate');
let idtankupdate = document.getElementById('tankidupdate');

divListUpdate.style.display = 'none';

toggleButtonUpdate.addEventListener('click', () => {
    if (idtankupdate.value === '') {
        alert('Nezadal si ID tanku!');
    } else {
        if (divListUpdate.style.display === 'none') {
            divListUpdate.style.display = 'block';
            toggleButtonUpdate.innerHTML = 'ZRUŠIŤ';
        } else {
            divListUpdate.style.display = 'none';
            toggleButtonUpdate.innerHTML = 'ZMENIŤ';
        }
    }
});

function alert(button,id,alerttext,confirmtext) {
    const togglebtn = document.querySelector(button);
    let iddel = document.getElementById(id);

    togglebtn.addEventListener('click', listener => {
        if (iddel.value === '') {
            alert(alerttext);
        } else {
            let result = confirm(confirmtext);
            if (result === false) {
                listener.preventDefault();
            }
        }
    });
}

alert('#deletebtn','tankiddelete','Nezadal si ID tanku!','Ste si tým istý? Tank bude natrvalo odstránený!');
alert('#deletebtnthemes','themeiddelete','Nezadal si ID témy!','Ste si tým istý? Téma bude natrvalo odstránená!');


