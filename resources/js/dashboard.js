$(document).ready(() => {

    // define empty arrays to results based on year 
    const firstYearList = [];
    const secondYearList = [];
    const thirdYearList = [];
    const FourthYearList = [];
    const firstYearListForChart = [['Subject', 'Grade']];
    const secondYearListForChart = [['Subject', 'Grade']];
    const thirdYearListForChart = [['Subject', 'Grade']];
    const FourthYearListForChart = [['Subject', 'Grade']];


    // make POST request for results 
    $.post("../controllers/getResults.php", {})

        .done((result) => {
            // if request was success then,

            // incoming array convert to JSON format 
            var jsonData = JSON.parse(result);

            // get the items of the jsonData array and check their subject code
            // separate result based on subject code (year)
            jsonData.forEach((item) => {
                // PHYS 21552 --> 6th char is the year ( index--> 5 )
                var fifthCharacter = parseInt(item.courseCode.charAt(5));

                if (fifthCharacter == 1) {
                    firstYearList.push(item);
                    firstYearListForChart.push([item.courseCode, item.grade]);
                } else if (fifthCharacter == 2) {
                    secondYearList.push(item);
                    secondYearListForChart.push([item.courseCode, item.grade]);
                } else if (fifthCharacter == 3) {
                    thirdYearList.push(item);
                    thirdYearListForChart.push([item.courseCode, item.grade]);
                } else if (fifthCharacter == 4) {
                    FourthYearList.push(item);
                    FourthYearListForChart.push([item.courseCode, item.grade]);
                }
            });

            // console.log(firstYearListForChart);
            // modify frontend based on results
            if (!firstYearList.length == 0) {
                $("#firstYearGPACardArea").css("visibility", "visible");
                calculateGPA(firstYearList, firstYearGPA);
            }
            if (!secondYearList.length == 0) {
                $("#secondYearGPACardArea").css("visibility", "visible");
                calculateGPA(secondYearList, secondYearGPA);
            }
            if (!thirdYearList.length == 0) {
                $("#thirdYearGPACardArea").css("visibility", "visible");
                calculateGPA(thirdYearList, thirdYearGPA);
            }
            if (!FourthYearList.length == 0) {
                $("#fourthYearGPACardArea").css("visibility", "visible");
                calculateGPA(FourthYearList, fourthYearGPA);
            }

            generateChart(firstYearListForChart, 'chart_div_1');
            $('#chart_div_2').hide();
            $('#chart_div_3').hide();
            $('#chart_div_4').hide();
        })
        .fail((xhr, status, error) => {
            // if the request was failed then,
            console.log(error);
        });

    addAndRemoveCardStyle(firstYearGPACard);

    // Click event handler for firstYearGPACard
    $('#firstYearGPACardArea').click(function () {
        generateChart(firstYearListForChart, 'chart_div_1');
        // firstYearGPACard.classList.add('selectedCard');

        addAndRemoveCardStyle(firstYearGPACard);
        // Show chart_div_1 and hide others
        $('#chart_div_1').show();
        $('#chart_div_2').hide();
        $('#chart_div_3').hide();
        $('#chart_div_4').hide();
    });

    // Click event handler for secondYearGPACard
    $('#secondYearGPACardArea').click(function () {
        generateChart(secondYearListForChart, 'chart_div_2');
        addAndRemoveCardStyle(secondYearGPACard);
        // Show chart_div_2 and hide others
        $('#chart_div_1').hide();
        $('#chart_div_2').show();
        $('#chart_div_3').hide();
        $('#chart_div_4').hide();
    });
    // Click event handler for secondYearGPACard
    $('#thirdYearGPACardArea').click(function () {
        generateChart(thirdYearListForChart, 'chart_div_3');
        // Show chart_div_2 and hide others
        $('#chart_div_1').hide();
        $('#chart_div_2').hide();
        $('#chart_div_3').show();
        $('#chart_div_4').hide();
    });
    // Click event handler for secondYearGPACard
    $('#fourthYearGPACardArea').click(function () {
        generateChart(fourthYearListForChart, 'chart_div_4');

        // Show chart_div_2 and hide others
        $('#chart_div_1').hide();
        $('#chart_div_2').hide();
        $('#chart_div_3').hide();
        $('#chart_div_4').show();
    });


});


// create function for calculate GPA with Credits
const calculateGPA = (resultList, GPACell) => {

    let noOfGPACredits = 0;
    let totalPoints = 0;
    let totalCredits = 0;

    // Create a map to store the highest grade for each subject
    const highestGrades = new Map();

    // Iterate through the resultList
    resultList.forEach((ob, index) => {
        const courseCode = ob['courseCode'];
        const isGPACounted = ob['Is_GPA_Counted'];
        const gpaValue = parseFloat(ob['gpa_value']);

        const credit = parseInt(courseCode.charAt(9));

        if (isGPACounted == 1) {
            // Update the highest grade for the subject if GPA is counted
            if (!highestGrades.has(courseCode) || gpaValue > highestGrades.get(courseCode)) {
                highestGrades.set(courseCode, gpaValue);
            }
            noOfGPACredits += credit;
        }
        // console.log(highestGrades);
    });

    // Calculate total points and credits using the highest grades
    for (const [subject, gradeValue] of highestGrades.entries()) {
        const credit = parseInt(subject.charAt(9));
        totalCredits += credit;
        totalPoints += gradeValue * credit;
    }

    const GPA = totalPoints / totalCredits;

    // Update the HTML elements with the calculated values
    $(GPACell).text(parseFloat(GPA).toFixed(2));
}

const generateChart = (list, chartArea) => {
    google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart);

    list.sort((a, b) => {
        const order = ['AB', 'E', 'D-', 'D', 'D+', 'C-', 'C', 'C+', 'B-', 'B', 'B+', 'A-', 'A', 'A+',];
        return order.indexOf(a[1]) - order.indexOf(b[1]);
    });

    function drawChart() {
        var data = google.visualization.arrayToDataTable(list);

        var options = {
            // chart: {
            //     title: 'Your Result',
            //     subtitle: 'Sales, Expenses, and Profit: 2014-2017',
            // },
            bars: 'vertical', // Required for Material Bar Charts.

        };

        var chart = new google.charts.Bar(document.getElementById(chartArea));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
}

const addAndRemoveCardStyle = (selectedCard) => {
    let cards = ['firstYearGPACard', 'secondYearGPACard', 'thirdYearGPACard', 'fourthYearGPACard'];

    for (const card of cards) {
        if (selectedCard != card) {
            document.getElementById(card).classList.remove('selectedCard');
            document.getElementById(card).classList.add('GPA_Card');
        }
    }
    // console.log(selectedCard);
    selectedCard.classList.remove('GPA_Card');
    selectedCard.classList.add('selectedCard');
}