function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
alert("adresse mail valid!");
document.form1.text1.focus();
return true;
}
else
{
alert("adresse mail non valid!");
document.form1.text1.focus();
return false;
}
}