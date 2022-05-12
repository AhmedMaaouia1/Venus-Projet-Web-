
<?php require 'Header_Admin.php'; ?>
<?php
	include '../../Controller/ParticipantC.php';
     
	
	$participant=new participantC();
	
	$listparticipant=$participant->afficherparticipants(); 
?>





<div class="container mt-5">

 <h1 class="text-center text-capitalize">Liste des participant</h1>


 <!--<input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;
							  ' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>-->
 <div class='table-responsive'>
<table  class='table'><thead>
<tr><th scope='col' > id </th>
<th scope='col' > id event </th>
<th scope='col'> id participant </th>

</tr></thead>  <tbody id='myTable'>


           <?php
				foreach($listparticipant as $participant){
			?>
			<tr>
			    <td><?php echo $participant['id_user']; ?></td>
         <td><?php echo $participant['id_event']; ?></td>
				<td><?php echo $participant['idparticipation']; ?></td>
                </tr>
                <?php
				}
			?>

 </tbody>


 </table>

