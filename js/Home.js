function logIn() {
    if (document.getElementById("logIn").innerText === "登录"){
        window.location.href = "Login.php";
    }
    else {
        window.location.href = "Check.php";
    }
    return false;
}

function logOut() {
    if (document.getElementById("logOut").innerText ==="注册"){
        window.location.href = "Register.php";
    }
    else {
        window.location.href = "Home.php?$login=false";
    }
    return false;
}

function cart() {
    if (document.getElementById("logIn").innerText === "登录"){
        window.location.href = "Login.php";
    }
    else {
        window.location.href = "Cart.php";
    }
    return false;
}
