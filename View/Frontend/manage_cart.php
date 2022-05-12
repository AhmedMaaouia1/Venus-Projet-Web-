<?php 
include_once '../../Controller/produitC.php';
if(!isset($_SESSION)) {
    session_start();
}


if (isset($_SESSION['Login'])){

    header("location:login.php");
}else {


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["addtocart"]))
    {
        if(isset($_SESSION['cart']))
        {
           
           
            $myitems=array_column($_SESSION['cart'],'Item_id');
            if(in_array($_POST['Item_id'],$myitems))
            {
                echo "<script>
                alert('Item already Added');
                window.location.href='acceuil.php';
                </script>";
            }
                else
            {
                $check = new produitC();
                $checkquantite = $check -> QuantityProd2((int)$_POST['Item_id'],1);
            $count=count($_SESSION['cart']);
            if ($checkquantite){
            $_SESSION['cart'][$count]=array('Item_Name'=>$_POST['Item_Name'],'Item_id'=>$_POST['Item_id'],'Price'=>$_POST['price'],'Quantity'=>1);
            echo "<script>
            alert('Merci votre produit est ajouter au panier');
            window.location.href='cart.php';
            </script>";
            }else {
                echo "<script>
                alert('Quantite insuffisant');
                window.location.href='acceuil.php';
                </script>";
            }
            }

        }
                else
                {
                    $check = new produitC();
                    $checkquantite = $check -> QuantityProd2((int)$_POST['Item_id'],1);
        
                    if ($checkquantite){
                        $_SESSION['cart'][0]=array('Item_Name'=>$_POST['Item_Name'],'Item_id'=>$_POST['Item_id'],'Price'=>$_POST['price'],'Quantity'=>1);
                        echo"<script>
                  alert('Merci votre produit est ajouter au panier');
                        window.location.href='acceuil.php';
                        </script>";
                    }else {
                     
                        
                            echo "<script>
                            alert('Quantite == 0');
                            window.location.href='acceuil.php';
                            </script>";
                    }
                }   
        
     }


 
 
     if(isset($_POST['Remove_Item']))
            {
               foreach($_SESSION['cart'] as $key=> $value)
               {
                   if($value['Item_Name']==$_POST['Item_Name'])
                   {
                    unset($_SESSION['cart'][$key]);  
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo "<script>
                   
                    window.location.href='cart.php';
                    </script>";
                   }
               }
           
           
            }  
            if(isset($_POST['Mod_Quantity']))
            {
                foreach($_SESSION['cart'] as $key=> $value)
                {
                    if($value['Item_Name']==$_POST['Item_Name'])
                    {
                     $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
                     
                     echo "<script>
                     window.location.href='cart.php';
                     </script>";
                    }
                }
            
            
             }  

}


}


?>