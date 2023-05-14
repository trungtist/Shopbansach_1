
function CheckPassword(inputtxt) {
    var paswd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/;
    if (paswd.test(inputtxt)) {
        return true;
    }
    else {
        return false;
    }
}