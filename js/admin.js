/*odkrytie pridania tanku*/
const toggleButtonInsert = document.querySelector('#insertbtn');
const divListInsert = document.querySelector('.hiddenInsert');

divListInsert.style.display = 'none';

toggleButtonInsert.addEventListener('click', () => {
    if (divListInsert.style.display === 'none') {
        divListInsert.style.display = 'block';
        toggleButtonInsert.innerHTML = 'ZRUŠIŤ';
    } else {
        divListInsert.style.display = 'none';
        toggleButtonInsert.innerHTML = 'PRIDAŤ';
    }
});

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

/*alert pri vymazani tanku*/
// const toggleButtonDelete = document.querySelector('#deletebtn');
// let idtankdelete = document.getElementById('tankiddelete');
//
// toggleButtonDelete.addEventListener('click', listener => {
//     if (idtankdelete.value === '') {
//         alert('Nezadal si ID tanku!');
//     } else {
//         let result = confirm('Ste si tým istý? Tank bude natrvalo odstránený!');
//         if (result === false) {
//            listener.preventDefault();
//         }
//     }
// });

/*odkrytie pridania temy*/
const toggleButtonInsertTheme = document.querySelector('#insertbtnthemes');
const divListInsertTheme = document.querySelector('.hiddeninsertthemes');

divListInsertTheme.style.display = 'none';

toggleButtonInsertTheme.addEventListener('click', () => {
    if (divListInsertTheme.style.display === 'none') {
        divListInsertTheme.style.display = 'block';
        toggleButtonInsertTheme.innerHTML = 'ZRUŠIŤ';
    } else {
        divListInsertTheme.style.display = 'none';
        toggleButtonInsertTheme.innerHTML = 'PRIDAŤ';
    }
});