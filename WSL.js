/*    JavaScript 7th Edition
      Chapter 5
      Chapter Case Project 4

      Author: Camila Lopez
      Date:   17 february 2024

      Filename: WSL.js
*/

// Parts of nav bar
const hamburger = document.querySelector('.hamburger');
const sidebar = document.querySelector('.sideNav');

// Add eventListener to hamburger button when click_ open or close
hamburger.addEventListener('click', () => {
    sidebar.classList.toggle('open');
})






