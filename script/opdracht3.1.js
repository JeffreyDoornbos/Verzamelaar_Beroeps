let output = document.getElementById("output");
let table = document.getElementById("myTable");

function success() {
    let film = JSON.parse(this.responseText);
    console.log(film);

    let aantal = film.length;

    for (let i = 0; i < aantal; i++)
    {
        let row         = table.insertRow(i+1);
        let studentnummer       = row.insertCell(0);
        let studentnaam       = row.insertCell(1);
        let beschrijving    = row.insertCell(2);
   
        studentnummer.innerHTML =  film[i].filmNaam;
        studentnaam.innerHTML =  film[i].beoordeling;
        beschrijving = film[i].beschrijving

    }


}
function error(err) {
    console.error('Error Occurred :', err);
}

function getStudent(){
    let xhr = new XMLHttpRequest();
    xhr.onload = success;
    xhr.onerror = error;
    xhr.open('GET', 'jsonRead.php', true);
    xhr.send();
}

// Haal initieel al de film op die in de database staan
getStudent();




nieuweStudent.addEventListener("submit",function(event){

    console.log ("FORMULIER");
    let naaminvoer = document.getElementById("filmNaam").value;
    let leerlingnummer = document.getElementById("beoordeling").value;
    let beschrijvinginv = document.getElementById("beschrijving").value;

    let student = {filmNaam: naaminvoer, beoordeling: leerlingnummer, beschrijving: beschrijvinginv};
    let jsonleerling = JSON.stringify(student);

    console.log(jsonleerling);

    let xhr = new XMLHttpRequest();
    xhr.onerror = error;
    xhr.open('POST', 'jsonWrite.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(jsonleerling);

});

