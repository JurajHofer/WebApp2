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

divListUpdate.style.display = 'none';

toggleButtonUpdate.addEventListener('click', () => {
    if (divListUpdate.style.display === 'none') {
        divListUpdate.style.display = 'block';
        toggleButtonUpdate.innerHTML = 'ZRUŠIŤ';
    } else {
        divListUpdate.style.display = 'none';
        toggleButtonUpdate.innerHTML = 'ZMENIŤ';
    }
});