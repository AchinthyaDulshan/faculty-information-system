$(document).ready(() => {

    // error codes
    // 1 --> username is empty
    // 2 --> password is empty
    // 3 --> username or password incorrect

    // Example usage
    var params = getQueryParams();
    console.log(params);

    // Accessing specific query parameters
    var paramValue =parseInt(params['error']) ; // Change 'paramName' to the desired parameter name
    

    if (paramValue == 1) {
        $('#modalMessage').text('Username is empty');
        $('#errorMessage').modal('show');
    }else if (paramValue == 2) {
        $('#modalMessage').text('Password is empty');
        $('#errorMessage').modal('show');
    }else if (paramValue == 3) {
        $('#modalMessage').text('Username or Password is incorrect');
        $('#errorMessage').modal('show');
    }

});
