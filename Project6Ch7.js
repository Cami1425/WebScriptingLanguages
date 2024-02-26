/*    JavaScript 7th Edition
      Chapter 6
      Chapter Case Project 4

      Author: Camila Lopez
      Date:   18 february 2024

      Filename: Project5Ch6.js
*/

// Array list from select checkbox -------------------------
//----------------------------------------------------------

// Empty array for selected checkbox
const selectedProducts = [];

// Feedback messages for onChange
const feedbackMessages = {
    veryLikely: 'We are glad you are enjoying our products, we hope to see you soon.',
    someLikely: 'We appreciate you sending us your feedback. While you enjoy your products, we continue working in making things right.',
    NoLikelyNoUnlikely: 'It is our pleasure to hear your valuable feedback. We are working in making things right.',
    unlikely: 'We appreciate all feedback. Thank you for bringing your issue to our attention. We are working in making things right.',
    veryUnlikely: "We read your feedback, and we’re sorry our product didn't suit your needs."
}

// Add feedback message when onchange_ input name, radio feedback
function addFeedbackMessage() {
    let feedbackElement = document.getElementById('feedback');

    // accessing to the input "name" value
    let personName = document.getElementById('name').value;

    // accessing to the selected feedback rating
    let selectedFeedbackValue = (document.querySelector('input[name="feedback"]:checked') || {}).value;
    let feedbackMessage = feedbackMessages[selectedFeedbackValue] || '';

    // display feedback message on screen, concatenate array values to string
    feedbackElement.textContent = `Thanks ${personName} for using our products ${selectedProducts.join(', ')}. 
    
    ${feedbackMessage}`;
}

// Add selected product when checked to array select products
function addSelectedProduct(productName) {
    let productIndex = selectedProducts.indexOf(productName);
    let productIsSelectedAlready = productIndex !== -1;
    if (productIsSelectedAlready) {
        // we have to remove it
        selectedProducts.splice(productIndex, 1);
    } else {
        // we add the product
        selectedProducts.push(productName);
    }

    addFeedbackMessage();
}