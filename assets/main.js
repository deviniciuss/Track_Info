const btnAdd = document.getElementById("add");



let value;
let arrayTrack;


//Api to show all tracks
function showAllTracks() {
    fetch("http://localhost/test-cegos/api/findAllTrack.php").then((data) => {
        //convert to object    
        return data.json();
    }).then((objectData) => {
        let tableData = "";
        objectData.map((values) => {
            tableData += `<tr><td>${values.InternalClient}</td>
        <td>${values.Client}</td>
        <td>${values.Module}</td>
        <td>${values.Language}</td>
        <td>${values.URL}</td>
        <td>${values.Date}</td>
        <td>${values.Width}</td>
        <td>${values.Height}</td>
        <td>${values.Browser}</td>
        <td>${values.BrowserVersion}</td>
        <td>${values.Java}</td>
        <td>${values.Mobile}</td>
        <td>${values.OS}</td>
        <td>${values.OSVersion}</td>
        <td>${values.Cookies}</td></tr>`;
        });
        document.getElementById("table_body").innerHTML = tableData;
    })
};
showAllTracks();





//If button add pressed, call addTrack();
function buttonAdd() {




    value = document.getElementById("text").value;
    arrayTrack = hex_to_string(value).split(";");

    let track = hex_to_string(value).replace("undefined;", "");
    if (track.split(";").length != 14) {
        alert("value invalid");
    } else {
        addTrack();
    }







}
btnAdd.addEventListener("click", buttonAdd);


//Search Table
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("text");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}












//Api to add single track
function addTrack() {


    let obj = {
        "InternalClient": `${arrayTrack[0]}`,
        "Client": `${arrayTrack[1]}`,
        "Module": `${arrayTrack[2]}`,
        "Language": `${arrayTrack[3]}`,
        "URL": `${arrayTrack[4]}`,
        "Width": `${arrayTrack[5]}`,
        "Height": `${arrayTrack[6]}`,
        "Browser": `${arrayTrack[7]}`,
        "BrowserVersion": `${arrayTrack[8]}`,
        "Java": `${arrayTrack[9]}`,
        "Mobile": `${arrayTrack[10]}`,
        "OS": `${arrayTrack[11]}`,
        "OSVersion": `${arrayTrack[12]}`,
        "Cookies": `${arrayTrack[13]}`,
        "track": value
    };


    fetch("http://localhost/test-cegos/api/addTrack.php", {
        method: "POST",
        headers: { 'Content-type': 'application/json' },
        body: JSON.stringify(obj)
    }

    );
    window.location.reload();


}







//Convert hexadecimal to string
function hex_to_string(str1) {
    var hex = str1.toString();
    var str = '';
    for (var n = 0; n < hex.length; n += 2) {
        str += String.fromCharCode(parseInt(hex.substr(n, 2), 16));
    }
    return str;
}



