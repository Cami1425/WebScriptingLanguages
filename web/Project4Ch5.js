/*    JavaScript 7th Edition
      Chapter 5
      Chapter Case Project 4

      Author: Camila Lopez
      Date:   17 february 2024

      Filename: WSL.js
*/

// ------------------- Project 4 Chapter 5 Page  ---------------

// Web security Education section---------------------------
//----------------------------------------------------------
// EventListener to load function createGoodPracList
window.addEventListener("load", createGoodPracList);

// List of Navigator Object Properties
function createGoodPracList() {
    let practicesList =document.getElementById("practicesList");

    // Good practices in the list
    let strongPass = document.createElement("li");
    let factAuthentication = document.createElement("li");
    let secureNet = document.createElement("li");
    let update = document.createElement("li");
    let suspicLinks = document.createElement("li");
    let backup = document.createElement("li");

    // Content of the list _ Display good Practices
    strongPass.textContent = "Use unique and strong passwords for all accounts";
    factAuthentication.textContent = "Use multi-factor authentication for applications";
    secureNet.textContent = "Use secure and encrypted networks (HTTPS)";
    update.textContent = "Maintain software, browser, antivirus and applications update";
    suspicLinks.textContent = "Do not click on unknown and suspicious links";
    backup.textContent = "Backup important data often to avoid loss";

    // Append element nodes
    practicesList.appendChild(strongPass);
    strongPass.id = "strongPass";

    practicesList.appendChild(factAuthentication);
    factAuthentication.id = "factAuthentication";

    practicesList.appendChild(secureNet);
    secureNet.id = "secureNet";

    practicesList.appendChild(update);
    update.id= "update";

    practicesList.appendChild(suspicLinks);
    suspicLinks.id= "suspicLinks";

    practicesList.appendChild(backup);
    backup.id= "backup";

}


// Navigation Properties section-------------------------------
//----------------------------------------------------------

// EventListener to load function createNavPropertiesList
window.addEventListener("load", createNavPropertiesList);

// List of Navigator Object Properties
function createNavPropertiesList (){

    let navPropertiesList = document.getElementById("navPropertiesList");

    // Properties in the list
    let appName = document.createElement("li");
    let appVersion = document.createElement("li");
    let geoLocation = document.createElement("li");
    let language = document.createElement("li");
    let onLine = document.createElement("li");
    let platform = document.createElement("li");

    // Content of the list _ Display navigator properties
    appName.textContent = "Browser Name: " + navigator.appName;
    appVersion.textContent = "Browser Version: " + navigator.appVersion;
    geoLocation.textContent = "Geolocation: " + navigator.geolocation;
    language.textContent = "Language: " + navigator.language;
    onLine.textContent = "Online Status: " + (navigator.onLine ? "Online" : "Offline");
    platform.textContent = "Platform: " + navigator.platform;

    // Append element nodes
    navPropertiesList.appendChild(appName);
    appName.id = "appName";

    navPropertiesList.appendChild(appVersion);
    appVersion.id = "appVersion";

    navPropertiesList.appendChild(geoLocation);
    geoLocation.id = "geoLocation";

    navPropertiesList.appendChild(language);
    language.id = "Language";

    navPropertiesList.appendChild(onLine);
    onLine.id = "online";

    navPropertiesList.appendChild(platform);
    platform.id = "platform";
}

// Screen Properties section-------------------------------
//----------------------------------------------------------

// EventListener to load function createScreenPropertiesList
window.addEventListener("load", createScreenPropertiesList);

// List of Navigator Object Properties
function createScreenPropertiesList (){

    let screenPropertiesList = document.getElementById("screenPropertiesList");

    // Properties in the list
    let availHeight = document.createElement("li");
    let availWidth = document.createElement("li");
    let colorDepth = document.createElement("li");
    let height = document.createElement("li");
    let pixelDepth = document.createElement("li");
    let width = document.createElement("li");

    // Content of the list _ Display screen properties
    availHeight.textContent = "Available Screen Height: " + screen.availHeight + " pixels";
    availWidth.textContent = "Available Screen Width: " + screen.availWidth + " pixels";
    colorDepth.textContent = "Color Depth: " + screen.colorDepth + " bits";
    height.textContent = "Screen Height: " + screen.height + " pixels";
    pixelDepth.textContent = "Pixel Depth: " + screen.pixelDepth + " bits per pixel";
    width.textContent = "Screen Width: " + screen.width + " pixels";

    // Append element nodes
    screenPropertiesList.appendChild(availHeight);
    availHeight.id = "availHeight";

    screenPropertiesList.appendChild(availWidth);
    availWidth.id = "availWidth";

    screenPropertiesList.appendChild(colorDepth);
    colorDepth.id = "colorDepth";

    screenPropertiesList.appendChild(height);
    height.id = "height";

    screenPropertiesList.appendChild(pixelDepth);
    pixelDepth.id = "pixelDepth";

    screenPropertiesList.appendChild(width);
    width.id = "width";
}

// Additional Resources section-------------------------------
//----------------------------------------------------------
window.addEventListener("load", additionalResList);

// List of additional resources
function additionalResList() {

    let additionalResources = document.getElementById("additionalResources");

    // List of links and summary
    let privAndSecLink = createListItem("Privacy and Security:", "https://www.coe.int/en/web/digital-citizenship-education/privacy-and-security#:~:text=Users%20who%20are%20aware%20of,sustainable%20for%20themselves%20and%20others.", " The council of Europe webpage, specify the importance for the users to be aware of privacy risks online and what preventive actions can be taken.");
    let webSecLink = createListItem("Cybersecurity Best Practices:", "https://www.cisa.gov/topics/cybersecurity-best-practices#:~:text=Using%20strong%20passwords%2C%20updating%20your,to%20both%20individuals%20and%20organizations.", " The Cyber security and infrastructure Security Agency webpage, provide guidance on cyber security best practices.");
    let cyberPracticesLink = createListItem("Why cyber security is so important:", "https://strategynewmedia.com/why-web-security-is-important/#:~:text=Web%20security%20is%20important%20to,networks%2C%20and%20other%20IT%20infrastructures.", " The Strategy New Media webpage, highlight the significance and consequences of inadequate web security.");

    // Append element nodes
    additionalResources.appendChild(privAndSecLink);
    additionalResources.appendChild(webSecLink);
    additionalResources.appendChild(cyberPracticesLink);

    // Function to create list items
    function createListItem(title, href, summary) {
        let anchor = document.createElement("a");
        anchor.textContent = title;
        anchor.href = href;

        let span = document.createElement("span");
        span.textContent = summary;

        let listLink = document.createElement("li");
        listLink.appendChild(anchor);
        listLink.appendChild(span);

        return listLink;
    }
}
