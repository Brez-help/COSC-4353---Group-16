//gets the data from the form
const gallonsRequested = document.querySelector('#gallonsRequested');
const deliverlyDate = document.querySelector('#deliverlyDate');
const deliverFrom = document.querySelector('#deliverFrom');
const suggestedPrice = document.querySelector('#suggestedPrice');
const myForm = document.querySelector('#myform');
const msg =document.querySelector('.msg');

myForm.addEventListener('submit',onSubmit);


function onSubmit(e) {
    e.preventDefault();
    let today = new Date().toISOString().slice(0,10);
    if(gallonsRequested.value === '' || deliverlyDate.value === '' || deliverFrom.value ==='' || suggestedPrice.value === '') {
        //gets the current date
        //checks to see if everything is filled out
        msg.classList.add('error');
        msg.innerHTML = 'Please enter all fields';

        setTimeout(() =>msg.remove(), 3000);
    }
    else if (today >= deliverlyDate.value) {//checks to make sure the date isn't a past,current, or tomorrow
        msg.classList.add('error');
        msg.innerHTML = 'Please enter date that is not a previous, current, or the next';

        setTimeout(() =>msg.remove(), 3000);
    }
    else if(gallonsRequested.value < 1) {//checks to make sure that the gallon requested is greater than 0
        msg.classList.add('error');
        msg.innerHTML = 'Please enter values greater than';

        setTimeout(() =>msg.remove(), 3000);
    }
    else if(suggestedPrice.value <= 0) {//checks to make sure that the suggested price is greater than 0
        msg.classList.add('error');
        msg.innerHTML = 'Please enter a value greater than 0';

        setTimeout(() =>msg.remove(), 3000);
    }
    else if(gallonsRequested.value !== '' && deliverlyDate.value !== '' && deliverFrom.value !=='' && suggestedPrice.value !== '') {
        //start adding stuff to the table
        var table = document.getElementById('mytable');
        var row = table.insertRow();
        var cell1 = row.insertCell(); //make cells to add stuff to the table equal
        var cell2 = row.insertCell();
        var cell3 = row.insertCell();
        var cell4 = row.insertCell();
        var cell5 = row.insertCell();
        var cell6 = row.insertCell();
        cell1.innerHTML = gallonsRequested.value;
        cell2.innerHTML = 'NA';
        cell3.innerHTML = deliverlyDate.value;
        cell4.innerHTML = deliverFrom.value;
        cell5.innerHtML = suggestedPrice.value;
        cell6.innerHTML = 'NA';
    }

    gallonsRequested.value = ''; //empty values
    deliverlyDate.value = '';
    deliverFrom.value = '';
    suggestedPrice.value = '';
    msg.value = '';
    myForm.value = '';


}

