function test()
{   
    var nomevent=document.getElementById("nomevent").value; 
    var verif=/(?=.[a-z])(?=.[A-Z])$/;
    if (!nomevent.match(verif)) {alert ("le nom de l'evenement  doit etre tous en lettres ");};


    var date= document.getElementById("dateevent").value;
    var date1=new Date(date);
    var date2=Date.now();
    if (date2<date1)
   { alert("La date de l'evenment doit être antérieure à la date actuelle.");}
 

   var lieuevent=document.getElementById("lieuevent").value; 
   var verif=/(?=.[a-z])(?=.[A-Z])$/;
   if (!lieuvent.match(verif)) {alert ("le lieu de l'evenement  doit etre tous en lettres ");};


    
}

