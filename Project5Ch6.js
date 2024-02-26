/*    JavaScript 7th Edition
      Chapter 6
      Chapter Case Project 4

      Author: Camila Lopez
      Date:   18 february 2024

      Filename: Project5Ch6.js
*/

// Reserve ticket form -------------------------------------
//----------------------------------------------------------

// Display message when submit
function checkEmptyUserInput(element) {
    if (element.value === '') {
        const id = element.id;
        // show error
        const errorElement = document.getElementById(`${id}-error`);
        errorElement.style.display = 'block';
        // add change callback for further changes
        element.addEventListener('change', () => {
            errorElement.style.display = 'none';
        });
        return true;
    }
    return false;
}

// Callback function of form submission
function onSubmit(){
    const form = document.getElementById('ticket-reservation');
    let elements = form.elements;
    const { time, date, pickup, destination, payMethod } = elements;
    let emptyDate = checkEmptyUserInput(date);
    let emptyTime = checkEmptyUserInput(time);
    let emptyPickup = checkEmptyUserInput(pickup);
    let emptyDestination = checkEmptyUserInput(destination);
    let emptyPayMethod = checkEmptyUserInput(payMethod);

    // Check if any of the field values is empty
    let emptyForm = [emptyDate, emptyTime, emptyDestination, emptyPickup, emptyPayMethod]
        .some((value) => value);

    // Check if empty - Display success message
    if (!emptyForm) {
        let displayMessage = document.getElementById('displayMessage');
        displayMessage.textContent = 'Your reservation has been made, thank you!';
        document.getElementById('msgContainer').style.display = 'block';
    }
}

