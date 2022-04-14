<?php require 'Header_Admin.php'; ?>

<body>

<div class="container mt-5">
 <h1 class="text-center text-capitalize">liste des Admins</h1>
<div class="text-end">

<a href="#" class="btn btn" style="background-color:#fd6c9e;color:white" >Ajouter Admin</a>


</div>


 <input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;
							  ' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>
 <div class='table-responsive'>
<table class='table'><thead>
<tr><th scope='col' > # </th>
<th scope='col'> Nom </th>
<th scope='col'> Prenom </th>

<th scope='col'>Email</th>

<th scope='col'> Mot de passe </th>

<th> Action </th>
</tr></thead>  <tbody id='myUL'>


<tr><th scope='row' >1</th>
<td >Maaouia</td>
<td >Ahmed</td>



<td >Ahmed@esprit.tn</td>
<td >azerty123</td>


<td><a href='#'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
<a  href='#'><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
</tr>

<tr><th scope='row' >1</th>
<td >Maaouia</td>
<td >Ahmed</td>



<td >Ahmed@esprit.tn</td>
<td >azerty123</td>


<td><a href='#'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
<a  href='#'><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
</tr>


<tr><th scope='row' >1</th>
<td >Maaouia</td>
<td >Ahmed</td>



<td >Ahmed@esprit.tn</td>
<td >azerty123</td>


<td><a href='#'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a>
<a  href='#'><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
</tr>

</tbody>


</table></div>






</div>



</body>