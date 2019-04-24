function check2() {
    window.location.href="Home.php";
    return false;
}

// function loadTip() {
//     confirm("登陆成功");
//     return false;
// }

// function loadTip() {
//     // confirm("登陆成功！");
//     // return false;
//     sessionStorage.setItem("login",true);
//     let div1 = document.getElementById("loadTip");
//     let button1 = document.createElement("button");
//     let text1 = document.createTextNode("&times;");
//     button1.appendChild(text1);
//     div1.appendChild(button1);
//
//     let strong1 = document.createElement("p");
//     let text2 = document.createTextNode("登陆成功");
//     strong1.appendChild(text2);
//     div1.appendChild(strong1);
//
//     $(document).ready(function(){
//             $("#loadTip").addClass("alert alert-success alert-dismissable");
//     });
//     return false;
// }

// function checkID() {
//     let a = document.getElementById("user");
//     if(a.value === ""){
//         document.getElementById("userTip").innerHTML="用户名不能为空";
//         return false;
//     }
//     return true;
// }
//
// function checkPassword() {
//     let a = document.getElementById("password");
//     if(a.value === ""){
//         document.getElementById("passTip").innerHTML="密码不可以为空";
//         return false;
//     }
//     return true;
// }
//
// function checkNumber() {
//     let a = document.getElementById("inputRandom");
//     if(a.value === ""){
//         document.getElementById("checkTip").innerHTML="验证码不能为空";
//         return false;
//     }
//     return true;
// }
//
// function check() {
//     if(checkID() && checkPassword() && checkNumber()){
//         alert('登录成功');
//         window.location.href="LogHome.html"
//     }
// }
//
// function checkLogID() {
//     let a = document.getElementById("logUser");
//     if(a.value === ""){
//         document.getElementById("LogTip").innerHTML="用户名不能为空";
//         return false;
//     }
//     return true;
// }
//
// function checkLogPassword1() {
//     let a = document.getElementById("password1");
//     if(a.value === ""){
//         document.getElementById("password1Tip").innerHTML="密码不能为空";
//         return false;
//     }
//     return true;
// }
//
// function checkLogPassword2() {
//     let a = document.getElementById("password2");
//     if(a.value === ""){
//         document.getElementById("password2Tip").innerHTML="确认密码不能为空";
//         return false;
//     }
//     return true;
// }
//
// function checkLogPassword3() {
//     let a = document.getElementById("password1").value;
//     let b = document.getElementById("password2").value;
//     if(a !== b){
//         document.getElementById("password3Tip").innerHTML="两次密码不一致";
//         return false;
//     }
//     return true;
// }
//
// function checkEmail() {
//     let a = document.getElementById("email");
//     if(a.value === ""){
//         document.getElementById("emailTip").innerHTML="邮箱不能为空";
//         return false;
//     }
//     return true;
// }
//










// var number=0;
//
// function LogIn() {
//     show("LogMaster")
//     random();
// }
//
// function Register() {
//     show(RegMaster)
// }
//
// function ValiEmail(field,alertText) {
//     with(field)
//     {
//         var temp1 = value.indexOf("@");
//         var temp2 = value.lastIndexOf(".");
//          if (temp1 < 1 || temp2 - temp1 < 2){
//              alert(alertText);
//              return false;
//          }
//          else {
//              return true;
//          }
//     }
// }
//
// function ValidPassword(text1,text2,alertText) {
//     with (text1, text2){
//         var temp1 = text1.value;
//         var temp2 = text2.value;
//         if (text1 != text2){
//             alert(alertText);
//             return false;
//         }
//         else {
//             return true;
//         }
//     }
// }
//
// function random(){
//     number=parseInt(Math.random()*9000+1000);
//     document.getElementById("verification").innerHTML = number;
// }
//
// function regisTurnOff(id, password1, password2, email) {
//     with(id, password1, password2, email)
//     {
//         var a = id.value;
//         var b = password1.value;
//         var c = password2.value;
//         var d = email.value;
//         if(a==""){
//             alert("请输入用户名");
//         }
//         else if(b==""){
//             alert("请输入密码");
//         }
//         else if(c==""){
//             alert("请再次输入密码");
//         }
//         else if(d==""){
//             alert("请输入邮箱");
//         }
//         else{
//             hidde("regisform");
//             hidde("regisbutton");
//         }
//
//     }
// }
// function logTurnOff( id, password, verification) {
//     with(id, password, verification)
//     {
//         var a = id.value;
//         var b = password.value;
//         var c = verification.value;
//         if(a==""){
//             alert("请输入用户名");
//         }
//         else if(b==""){
//             alert("请输入密码");
//         }
//         else if(c!=number){
//             alert("请输入正确的验证码")
//         }else{
//             hidde("LogMaster");
//             hidde("logButton");
//             hidde("regisButton");
//             document.getElementById("person").style.display="inline";
//         }
//
//     }
// }
// function hidde(parts){
//     document.getElementById(parts).style.display="none";
// }
// function show(parts){
//     document.getElementById(parts).style.display="block";
// }
// function sruename(name){
//     with(name){
//         var a=name.value;
//         if(a==""){
//             alert("用户名不能为空！")
//             return false;
//         }
//         else{return true;}
//     }
// }
// function surepassword(password){
//     with(password){
//         var a=password.value;
//         if(a==""){
//             alert("密码不能为空，请注意大小写")
//         }
//     }
// }
//     function createCode(len)
//     {
//         var seed = ['abcdefghijklmnopqrstuvwxyz',
//             'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
//             '0123456789'];               //创建需要的数据数组
//         var idx,i;
//         var result = '';   //返回的结果变量
//         for (i=0; i<len; i++) //根据指定的长度
//         {
//             idx = Math.floor(Math.random()*3); //获得随机数据的整数部分-获取一个随机整数
//             result += seed[idx].substr(Math.floor(Math.random()*(seed[idx].length)), 1);//根据随机数获取数据中一个值
//         }
//         return result; //返回随机结果
//     }
//
// function test() {
//     var inputRandom=document.getElementById("inputRandom").value;
//     var autoRandom=document.getElementById("autoRandom").innerHTML;
//     if(inputRandom===autoRandom) {
//         alert("通过验证");
//     } else {
//         alert("没有通过验证");
//     }
//
// }

