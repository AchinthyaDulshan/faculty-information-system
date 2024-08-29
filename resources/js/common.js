// create function for fill data to tables which was get as an array using database 
const fillDataIntoTable = (tableId, datalist, columnList) => {

    // select table body & clean
    const tbody = tableId.children[1];
    tbody.innerHTML = '';

    // using object separate values and insert to table 
    datalist.forEach((ob, index) => {

        // create table row 
        const tableRow = document.createElement('tr');

        //create table data elements and assign values
        let tdId = document.createElement('td');
        tdId.innerText = index + 1;
        tableRow.appendChild(tdId);

        columnList.forEach(column => {
            var td = document.createElement('td');

            if (column.dataType == 'text') {
                td.innerText = ob[column.propertyName];
            }

            if (column.dataType == 'function') {
                td.innerHTML = column.propertyName(ob);
            }

            if (column.propertyName == 'grade') {
                if (ob['grade'] == 'C-' || ob['grade'] == 'D+' || ob['grade'] == 'D' || ob['grade'] == 'D-') {
                    tableRow.classList.add("table-warning");
                } else if (ob['grade'] == 'E') {
                    tableRow.classList.add("table-danger");
                }
                else if (ob['grade'] == 'AB') {
                    tableRow.classList.add("table-secondary");
                }
            }

            tableRow.appendChild(td);
        });

        // append table row to table body 
        tbody.appendChild(tableRow);

    })
}


// Function to parse query parameters
const getQueryParams = () => {
    var queryParams = {};
    var queryString = window.location.search.substring(1);
    var vars = queryString.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        queryParams[pair[0]] = decodeURIComponent(pair[1]);
    }
    return queryParams;
}

$(document).ready(() => {

    $.post("../controllers/getStudentDetails.php", {})
        .done((result) => {

            console.log("success " + result);

            var jsonData = JSON.parse(result);
            console.log(jsonData);

            jsonData.forEach((item) => {
                $('#nameWithInitialsProfile').text(item.name_with_initials);
                $('#fullNameProfile').text(item.fullname);
                $('#studentNoProfile').text(item.studentId);
                $('#studentBookProfile').text(item.relevant_handbook);
                $('#emailProfile').text(item.email);
                $('#mobileNoProfile').text(item.mobile);
            });

        })
        .fail((xhr, status, error) => {
            console.log(error);
        });

});
