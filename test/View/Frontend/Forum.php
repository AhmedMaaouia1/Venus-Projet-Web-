
<?php
                            require '../../Controller/topicC.php';

                        
                            $TopicC = new topicC();
                            $Topics = $TopicC->affichertopic();
                        ?>
<?php require 'Header.php'; ?>
    <html lang="en">
    
    
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
    <!-- CSS here -->
    
    <link rel="stylesheet" href="assets1/css/forum.css">



</head>

    





  


</head>



    <body>
    
      <!-- Hero Area Start-->
      <div class="slider-area ">
            <div class="single-slider slider-height2 slider-height2-d d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Forum</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
        <form method="post">

        <div class="input-group searchMb">
    <input id="search-input" type="search" name="search" id="form1" class="form-control" placeholder="search" />
    <button id="search-button" type="submit" name="submit" class="btn btn" style="background-color:#fd6c9e;color:white">
    <i class="fas fa-search"></i>
  </button>
  </div>
 

	
</form>

</div>
      
<?php
    require_once '../connexiondb.php';
$connexiondb=connexiondb::getConnexion();

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $connexiondb->prepare("SELECT * FROM `topic` WHERE titre = '$str' OR descrip='$str' OR contenu='$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($Topic = $sth->fetch())
	{   
		?>
		
        <article class="blog_item">
       
                                <div class="blog_item_img">
                                    <img class="L rounded-0 " src="assets1/img/blog/single_blog_2.png" alt="">
                                    
                                    <a href="#" class="blog_item_date">
                                        <h3>15</h3>
                                        <p>Jan</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="">
                                        <h2><?php echo $Topic->titre; ?></h2>
                                        <h4><?php echo $Topic->descrip; ?></h4>
                                    </a>
                                    <p><?php echo $Topic->contenu; ?></p>
                                    <ul class="blog-info-link">
                                  
                                    <li><?='<a "'.$Topic->idtopic.'" "'.$Topic->view_count.'" class="view fa-solid fa-eye" "> ('.$Topic->view_count.')</a>'; ?></li>
                                
                                    <li><?='<a data-postidl="'.$Topic->idtopic.'" data-likes="'.$Topic->like_count.'" class="like fa-solid fa-thumbs-up" ">Like ('.$Topic->like_count.')</a>'; ?></li>
                                    <li><?='<a data-postidd="'.$Topic->idtopic.'" data-dislikes="'.$Topic->dislike_count.'" class="dislike fa-solid fa-thumbs-down" ">Dislike ('.$Topic->dislike_count.')</a>'; ?></li>
                                        <li><a href="comments.php?id=<? echo$Topic->idtopic; ?>"><i class="fa fa-comments"></i> comments</a></li>
                                    </ul>
                                </div>
                            </article>
        
       
<?php 
	} 
		
		
		else{
			echo "Name Does not exist";
        }
    }
    ?>
    
   
    <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="L " src="assets1/img/blog/single_blog_2.png" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>15</h3>
                                        <p>Jan</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="regle.php">
                                        <h2>Forum Règles:</h2>
                                    </a>
                                    <p>CI, vous trouvez les Règles du forum que vous devez lire avant de mettre un commentaire.</p>
                                    <ul class="blog-info-link">
                                        <li><button><i class="fa fa-user"></i> Please read before you post</button></li>
                                
                                        <li><button ><i class="fa fa-comments"></i> Comments</button></li>
                                    </ul>
                                </div>
                            </article>
    
          
                       
 <?php   
 
  require_once '../connexiondb.php';
  $connexionDB = connexionDB::getConnexion();

  
  if (isset($_POST['like'])) {
   $post_idL = $_POST['like'];
   $requete = "UPDATE topic SET like_count=like_count+1 , dislike_count=dislike_count-1 where idtopic='$post_idL'";
  
   $querry = $connexionDB->prepare($requete);
   $querry->execute();
 
             
  }
  if (isset($_POST['dislike'])) {
    $post_idD = $_POST['dislike'];
    $requeteD = "UPDATE topic SET like_count=like_count-1 , dislike_count=dislike_count+1 where idtopic='$post_idD'";
  
    $querryD = $connexionDB->prepare($requeteD);
    $querryD->execute();
   
          
   }
                    $i=0;
                        foreach ($Topics as $Topic) {
                         $i++;  
            
                ?>
              
              <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="L " src="assets1/img/blog/single_blog_2.png" alt="">
                                    <a href="#" class="blog_item_date">
                                    <?php
                                     if ($Topic['view_count'] >=6){
                                      ?><p>Most Viewed</p> <?php   }?>
                                        
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" >
                                        <h2><a <?= $Topic['idtopic']; ?>>Topic <?php echo $i; ?>: <?= $Topic['titre']; ?></a></h2>
                                        <h4><?= $Topic['descrip']; ?></h4>
                                    </a>
                                    <p><?= $Topic['contenu']; ?></p>
                                    
                                    <ul class="blog-info-link">
                                    <li><button <?= $Topic['idtopic']; ?>  ><i class="fa fa-eye" aria-hidden="true"></i><?= $Topic['view_count']; ?></button></li>
                                    <li><?='<button data-postidl="'.$Topic['idtopic'].'" data-likes="'.$Topic['like_count'].'" class="like fa fa-thumbs-up" ">Like ('.$Topic['like_count'].') </button>'; ?> </li>
                                    <li><?='<button  data-postidd="'.$Topic['idtopic'].'" data-dislikes="'.$Topic['dislike_count'].'" class="dislike fa fa-thumbs-down"" ">Dislike ('.$Topic['dislike_count'].')</button>'; ?></li>
                                        <li><a href="comments.php?id=<?= $Topic['idtopic']; ?>"><i class="fa fa-comments"></i> Comments</a></li>
                                    </ul>
                                </div>
                            </article>
             

           
            
                <?php
                        }
                    
                ?>
       
    
               
            </div>

   
<!------dislike script---->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(".like").click(function(){
    let buttonl = $(this)
    let post_idL = $(buttonl).data('postidl')
$.post("forum.php",
{
    'like' : post_idL
},
function(data, status){
    $(buttonl).html("Like (" + ($(buttonl).data('likes')+1) + ")")
    $(buttonl).data('likes', $(buttonl).data('likes')+1)
});
});
$(".dislike" ).click(function(){
    let buttonD = $(this)
    let post_idD = $(buttonD).data('postidd')
    
   
    
    
$.post("forum.php",
{ 
    'dislike' : post_idD,
    
    
},

function(data, status){
    $(buttonD).html("dislike (" + ($(buttonD).data('dislikes')+1) + ")")
    $(buttonD).data('dislikes', $(buttonD).data('dislikes')+1)
    
    
});
});


</script>
<!---end dislike like script---->
</body>

</html>
<?php require 'Footer.php'; ?>