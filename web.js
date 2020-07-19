function validateForm()
{
   var a = document.forms["myForm"]["name"].value;  
 var b = document.forms["myForm"]["phone"].value;
 var da = document.forms["myForm"]["date"].value;
 var c = document.forms["myForm"]["email"].value;
 var d = document.forms["myForm"]["address"].value;
 var e = document.forms["myForm"]["username"].value;
 var f = document.forms["myForm"]["pwd1"].value;
 var g = document.forms["myForm"]["pwd2"].value;
 var al=/^[a-zA-Z]+[\sa-zA-Z]*$/;
 var adr=/^[a-zA-Z\']+[\.\,\s\w\-]*$/;
 var un=/^[a-zA-Z]+[\@\_\#\$\w\.]*$/ ;
 var alnu=/^[a-zA-Z0-9]+[\@\_\#\$\w\.]*$/;
 var nu=/^[0-9]+$/;
 var mail= /^(([\-\w]+)\.?)+@(([\-\w]+)\.?)+\.[a-zA-Z]{2,4}$/;
   
  if (al.test(a) === false || a==="" || a===null)
{
    alert("Enter a valid Name");
return false;
}
//Use of associative array..
var flag=0;
for (var i = 0; i < document.myForm.elements['book[]'].length; i++)
{
if(document.myForm.elements['book[]'][i].checked)
{
flag=1;
break;
}
}
if(flag===0)
{
alert("Select at least one preffered book");
return false;
}
  if ( ( myForm.gender[0].checked === false ) && ( myForm.gender[1].checked === false ) && ( myForm.gender[2].checked === false ))
{
  alert ( "Select your gender " );
  return false;
}
if(da==="" || da===null)
{
alert("Enter Date of Birth");
return false;
}
  if (nu.test(b)=== false || b.length<10 || b.length>10)
  {
    alert("Enter a valid Mobile number");
return false;
  }
  if(mail.test(c)===false || c===null)
  {
  alert("Enter a valid email address!");
  return false;
  }
  if(adr.test(d)===false || d==="" || d===null)
  {
  alert("Enter your Address");
  return false;
  }
  if(un.test(e)===false || e.length<6 || e===null)
  {
  alert("Enter username of minimum 6 characters\nMust start with a letter\nCharacters ('@','#','$','_','.') are allowed");
  return false;
  }  
  if(alnu.test(f)===false || f.length<6 || f===null)
  {
  alert("Enter a valid password of minimum 6 characters");
  return false;
  }
  if (g != f || g===null)
  {
  alert("Both passwords must be same");
  return false;
  }
}
function validate() {
     var x=document.forms["main"]["usr"].value;
     var y=document.forms["main"]["pwd"].value;
     if (x==="")
     {
       alert("Username must be filled out");
    return false;
     }
     if (y==="") {
       alert("Password must be filled out");
       return false;
     }
}
function mOver(obj) {
 obj.innerHTML = "Now 3 Months of FREE Subscription!!"
}

function mOut(obj) {
 obj.innerHTML = "New Collections coming soon!!!"
}
function listofbooks()
    {
     list.style.display="block";
    }
    // function check(obj)
    // {
    // if(obj.length==0)
    // {
    // document.getElementById("ph").innerHTML="";
    // return;
    // }
    // else
    // {
    // var xhttp=new XMLHttpRequest();
    // xhttp.onreadystatechange=function{
    // if(document.readyState==4 && document.status==400)
    // {
    // document.getElementById("ph").innerHTML=document.responseText;
    // }
    // };
    // xhttp.open("GET","checkdata.php?p="+obj,true);
    // xhttp.send();
    // }
    // }


    //home.php
