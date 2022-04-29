
//gets the data from the form
const gallonsRequested = document.querySelector('#gallonsRequested');
const deliverlyDate = document.querySelector('#deliverlyDate');
const deliverFrom = document.querySelector('#deliverFrom');
const suggestedPrice = document.querySelector('#suggestedPrice');
const myForm = document.querySelector('#myform');
const msg =document.querySelector('.msg');

class pricingModule{
    constructor(suggestedPrice, gallonsRequested){
        this.suggestedPrice = suggestedPrice;
        this.gallonsRequested = gallonsRequested;
    }
    getTotalPrice() {
        return 230.34;
    }
}

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

    /*gallonsRequested.value = ''; //empty values
    deliverlyDate.value = '';
    deliverFrom.value = '';
    suggestedPrice.value = '';
    msg.value = '';
    myForm.value = '';*/


}

