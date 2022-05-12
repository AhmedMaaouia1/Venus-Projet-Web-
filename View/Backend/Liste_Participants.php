<?php require 'Header_Admin.php'; ?>
<?php
	include '../../Controller/ParticipantC.php';
     
	
	$participant=new participantC();
	
	$listparticipant=$participant->afficherparticipants(); 
?>
<head>
     <!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="assets/css/nivo-lightbox.css" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <!--<link rel="stylesheet"  href="event.css">-->
<link href="inscription.css" rel="stylesheet" /> 
</head>
<body>

 <div class="container mt-5">

 <h1 class="text-center text-capitalize">Liste des participant</h1>


 <!--<input style='border-color: silver; border: 1;  outline: none; border-radius: 5px;
							  ' id='myInput' 
style='border: hidden; border: 0;  outline: none; border-radius: 5px;
 border-bottom: 1px solid silver;   'class='mt-5' type='text' placeholder='Rechercher..' name='search'>-->

 <form action="pdf.php" method="post">
 <div class='table-responsive'>
<table  class='Table'><thead>
<tr><th scope='col' > id </th>
<th scope='col' > id event </th>
<th scope='col'> id participant </th>
<th scope='col'> Supprimer </th>
</tr></thead>  <tbody id='myTable'>


           <?php
				foreach($listparticipant as $participant){
			?>
			<tr>
			    <td><?php echo $participant['id_user']; ?></td>
         <td><?php echo $participant['id_event']; ?></td>
				<td><?php echo $participant['idparticipation']; ?></td>
				
				<!--<td><a href='#modif'><i class='fas fa-edit mr-1' style='color:#fd6c9e'></i></a></td>-->
				<td><a href="../../Controller/supprimerParticipant.php? idparticipation=<?php echo $participant['idparticipation']; ?>"><i class='fas fa-trash-alt ml-1' style='color:#fd6c9e'></i></a></td>
			</tr>
			<?php
				}
			?>
<a style="margin-left:1100; " value="Create PDF" id="btPrint" onclick="createPDF()" href="pdf.php" class="btn btn-primary">pdf</a>
      </form> 
 </tbody>


 </table>
 </div>

 <div class="text-center">
 <div class="form_wrapper" >
   <div class="form_container"> 
    <div class="title_container">
      <h2>envoyer un mail</h2>
    </div>
    <a  type="text" id="myInput" href="mail.php"  class="btn btn-primary" title="mail">mail</a>
    
    <script>
    function createPDF() {
        var Table = document.getElementById('myTable').innerHTML; //jebna l'id mtee table b getelement par id 

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>listparticipant</title>');   // <title> FOR PDF HEADER.
         win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('</body>');
        win.document.write('<table>');
        
        win.document.write(Table);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
   
    }
</script>
 </body>