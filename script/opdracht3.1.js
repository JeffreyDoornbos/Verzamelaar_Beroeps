let output = document.getElementById("output");
let table = document.getElementById("myTable");

function success() {
    let studenten = JSON.parse(this.responseText);
    console.log(studenten);

    let aantal = studenten.length;

    for (let i = 0; i < aantal; i++)
    {
        let row         = table.insertRow(i+1);
        let studentnummer       = row.insertCell(0);
        let studentnaam       = row.insertCell(1);
   
        studentnummer.innerHTML =  studenten[i].studentNaam;
        studentnaam.innerHTML =  studenten[i].studentNummer;

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

// Haal initieel al de studenten op die in de database staan
getStudent();



nieuweStudent.addEventListener("submit",function(event){

    console.log ("FORMULIER");
    let naaminvoer = document.getElementById("studentNaam").value;
    let leerlingnummer = document.getElementById("studentNummer").value;

    let student = {studentNaam: naaminvoer, studentNummer: leerlingnummer};
    let jsonleerling = JSON.stringify(student);

    console.log(jsonleerling);

    let xhr = new XMLHttpRequest();
    xhr.onerror = error;
    xhr.open('POST', 'jsonWrite.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(jsonleerling);

});

