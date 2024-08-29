$(document).ready(() => {

    $.post("../controllers/getStudentDetails.php", {})
        .done((result) => {

            console.log("success " + result);

            var jsonData = JSON.parse(result);
            // console.log(jsonData);

            jsonData.forEach((item) => {
                $('#txtStudentNo').val(item.studentId);
                $('#txtEmailAddress').val(item.email);
            });



        })
        .fail((xhr, status, error) => {
            console.log(error);
        });

    // getting query parameters
    var params = getQueryParams();
    console.log(params);

    if (params['error']) {
        $('#modalMessage').html(params['error']);
        $('#errorMessage').modal('show');
    }
    if (params['status']) {
        // $('#modalSucceessMessage').html('Your Email has been sent Successfully.<br>We will contact you soon.<br><hr>Thank You');
        $('#successMessage').modal('show');
    }

});
