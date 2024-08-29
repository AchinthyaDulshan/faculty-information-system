$(document).ready(() => {
    
    // create display property list for fill data to tables
    const displayProperty = [{dataType: 'text', propertyName: 'courseCode'},
        {dataType: 'text', propertyName: 'courseName'},
        {dataType: 'text', propertyName: 'academicYear'},
        {dataType: 'text', propertyName: 'attempt'},
        {dataType: 'text', propertyName: 'status'},
        {dataType: 'text', propertyName: 'note'},
        {dataType: 'text', propertyName: 'grade'}
    ];

    // define empty arrays to results based on year 
    var firstYearList = [];
    var secondYearList = [];
    var thirdYearList = [];
    var FourthYearList = [];

    // make POST request for results 
    $.post("../controllers/getResults.php", {})

        .done((result) => {
            // if request was success then,

            // console.log("success");
            // incoming array convert to JSON format 
            var jsonData = JSON.parse(result);

            // get the items of the jsonData array and check their subject code
            // separate result based on subject code (year)
            jsonData.forEach((item) => {
                // PHYS 21552 --> 6th char is the year ( index--> 5 )
                var fifthCharacter = parseInt(item.courseCode.charAt(5));

                if (fifthCharacter == 1) {
                    firstYearList.push(item);
                } else if (fifthCharacter == 2) {
                    secondYearList.push(item);
                } else if (fifthCharacter == 3) {
                    thirdYearList.push(item);
                } else if (fifthCharacter == 4) {
                    FourthYearList.push(item);
                }
            });

            // console.log(firstYearList);

            // modify frontend based on results
            if (!firstYearList.length == 0) {
                $("#firstYearNav").css("visibility", "visible");
                fillDataIntoTable(firstYearResultsTable, firstYearList, displayProperty);
                calculateTotalCreditsWithGPA(firstYearList,totalCreditsFirstYear,totalNonGpaCreditsFirstYear,GPAFirstYear);
            }
            if (!secondYearList.length == 0) {
                $("#secondYearNav").css("visibility", "visible");
                fillDataIntoTable(secondYearResultsTable, secondYearList, displayProperty);
                calculateTotalCreditsWithGPA(secondYearList,totalCreditsSecondYear,totalNonGpaCreditsSecondYear,GPASecondYear);
            }
            if (!thirdYearList.length == 0) {
                $("#thirdYearNav").css("visibility", "visible");
                fillDataIntoTable(thirdYearResultsTable, thirdYearList, displayProperty);
                calculateTotalCreditsWithGPA(thirdYearList,totalCreditsThirdYear,totalNonGpaCreditsThirdYear,GPAThirdYear);
            }
            if (!FourthYearList.length == 0) {
                $("#fourthYearNav").css("visibility", "visible");
                fillDataIntoTable(fourthYearResultsTable, FourthYearList, displayProperty);
                calculateTotalCreditsWithGPA(FourthYearList,totalCreditsFourthYear,totalNonGpaCreditsFourthYear,GPAFourthYear);
            }

        })
        .fail((xhr, status, error) => {
            // if the request was failed then,
            console.log(error);
        });
     
});

// create function for calculate GPA with Credits
const calculateTotalCreditsWithGPA = (resultList, totalCreditCell, totalNonGPACreditCell, GPACell) => {

    let noOfGPACredits = 0;
    let noOfNonGPACredits = 0;
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
        } else if (isGPACounted == 0) {
            noOfNonGPACredits += credit;
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
    $(totalCreditCell).text(noOfGPACredits + noOfNonGPACredits);
    $(totalNonGPACreditCell).text(noOfNonGPACredits);
    $(GPACell).text(parseFloat(GPA).toFixed(2));
}


