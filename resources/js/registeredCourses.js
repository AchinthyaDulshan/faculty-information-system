$(document).ready(() => {
    
    const displayProperty = [{dataType: 'text', propertyName: 'courseCode'},
        {dataType: 'text', propertyName: 'courseName'},
        {dataType: 'text', propertyName: 'academicYear'}
    ];

    var firstYearCoursesList = [];
    var secondYearCoursesList = [];
    var thirdYearCoursesList = [];
    var FourthYearCoursesList = [];

    $.post("../controllers/getRegisteredCourses.php", {})
        .done((result) => {

            console.log("success " + result);

            var jsonData = JSON.parse(result);
            console.log(jsonData);

            jsonData.forEach((item) => {
                var fifthCharacter = parseInt(item.courseCode.charAt(5));
                if (fifthCharacter == 1) {
                    firstYearCoursesList.push(item);
                } else if (fifthCharacter == 2) {
                    secondYearCoursesList.push(item);
                } else if (fifthCharacter == 3) {
                    thirdYearCoursesList.push(item);
                } else if (fifthCharacter == 4) {
                    FourthYearCoursesList.push(item);
                }
            });

            console.log(JSON.stringify(firstYearCoursesList) + "\n");
            console.log(JSON.stringify(secondYearCoursesList) + "\n");

            if (!firstYearCoursesList.length == 0) {
                $("#firstYearCoursesNav").css("visibility", "visible");
                fillDataIntoTable(firstYearCourses, firstYearCoursesList, displayProperty);
                calculateTotalCredits(firstYearCoursesList,totalCreditsFirstYear,totalNonGpaCreditsFirstYear);
            }
            if (!secondYearCoursesList.length == 0) {
                $("#secondYearCoursesNav").css("visibility", "visible");
                fillDataIntoTable(secondYearCourses, secondYearCoursesList, displayProperty);
                calculateTotalCredits(secondYearCoursesList,totalCreditsSecondYear,totalNonGpaCreditsSecondYear);
            }
            if (!thirdYearCoursesList.length == 0) {
                $("#thirdYearCoursesNav").css("visibility", "visible");
                fillDataIntoTable(thirdYearCourses, thirdYearCoursesList, displayProperty);
                calculateTotalCredits(thirdYearCoursesList,totalCreditsThirdYear,totalNonGpaCreditsThirdYear);
            }
            if (!FourthYearCoursesList.length == 0) {
                $("#fourthYearCoursesNav").css("visibility", "visible");
                fillDataIntoTable(fourthYearCourses, FourthYearCoursesList, displayProperty);
                calculateTotalCredits(FourthYearCoursesList,totalCreditsFourthYear,totalNonGpaCreditsFourthYear);
            }


        })
        .fail((xhr, status, error) => {
            console.log(error);
        });

        
});

//create function for get total credits
const calculateTotalCredits = (courseList, totalCreditCell, totalNonGPACreditCell) => {

    let noOfGPACredits = 0;
    let noOfNonGPACredits = 0;

    courseList.forEach((ob, index) => {

        if (ob['Is_GPA_Counted'] == 1) {
            noOfGPACredits += parseInt(ob['courseCode'].charAt(9));
        } else if (ob['Is_GPA_Counted'] == 0) {
            noOfNonGPACredits += parseInt(ob['courseCode'].charAt(9));
        }
    });

    $(totalCreditCell).text(noOfGPACredits + noOfNonGPACredits);
    $(totalNonGPACreditCell).text(noOfNonGPACredits);
    
}

