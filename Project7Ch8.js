/*    JavaScript 7th Edition
      Chapter 8
      Chapter Project 7

      Author: Camila Lopez
      Date:   04 March 2024

      Filename: Project7Ch8.js
*/

// Retrieve JASON file when click Check Winners button------
//----------------------------------------------------------

let winnerButton = document.getElementById("uploadButton");
let containerBox = document.getElementById("container");

// Function to load JSON file
winnerButton.onchange = function() {
    // Retrieve information about the selected file
    let JSONfile = this.files[0];

    // Read the contents of the selected file
    let fr = new FileReader();
    fr.readAsText(JSONfile);

    // Once the file has finished loading, parse the JSON file
    fr.onload=function(){

        // Convert contents of the JSON data in fr.result
        let winners = JSON.parse(fr.result);
        makeWinnerTable(winners);
    }
};

// Create table to display winners
function makeWinnerTable(winners) {
    let winnersTable = document.createElement("table");
    let headerRow = document.createElement("tr");

    // Create a table row containing property names stored in the JSON file
    for (let prop in winners.directory[0]) {
        let headerCell = document.createElement("th");

        // Store prop ad the text content of header
        headerCell.textContent = prop;

        // Append headerCell to the headerRow
        headerRow.appendChild(headerCell);
    }
    // Append headerRow to the winnersTable
    winnersTable.appendChild(headerRow);


    // Create table rows containing the property values for each entry in the directory
    for (let i = 0; i < winners.directory.length; i++) {
        let tableRow = document.createElement("tr");

        // For loop in for the properties listed in the winners.directory[i]
        for (let prop in winners.directory[i]) {
            let tableCell = document.createElement("td");
            // Store value of winners.directory[i][prop] as text content of tableCell
            tableCell.textContent = winners.directory[i][prop];

            // Append the tableCell to the tableRow object
            tableRow.appendChild(tableCell);
        }

        // Append tableRow to the winnersTable object
        winnersTable.appendChild(tableRow);
    }

    // Append winnersTable to the containerBox object
    containerBox.appendChild(winnersTable);
}
