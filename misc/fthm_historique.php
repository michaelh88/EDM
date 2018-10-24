<?php

try
	{
		$lot_client=$_REQUEST["lot_client"];
		$idcommande=$_REQUEST["idcommande"];
		$idetape=$_REQUEST["idetape"];
		$volume_doc=$_REQUEST["volume_doc"];
		$volume_piece=$_REQUEST["volume_piece"];
		$fini=$_REQUEST["fini"];
		$idtraitement=$_REQUEST["idtraitement"];
		
		$servername = "mysql55-9.pro";
		$username = "fthmgedcbc";
		$password = "ft4m33BC";
		$database='fthmgedcbc';
		
		// $servername = "localhost";
		// $username = "root";
		// $password = "pass";
		// $database='fthm';
		
		$con=mysqli_connect($servername,$username,$password,$database);
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  exit;
		  }
		mysqli_autocommit($con,true);
		// Traitement
		
		$sql="select lot_id,projet_id from lot where nom_zip='$lot_client'";
		$result=mysqli_query($con,$sql);
		$lot_id=0;
		$projet_id=0;
		$etape_projet_id=0;
		if ($row = mysqli_fetch_row($result))
		    {
				$lot_id= $row[0];
				$projet_id= $row[1];
				if ($idetape!="") {
					
					$sql="select etape_projet_id from etape_projet inner join etape on etape.etape_id=etape_projet.etape_id where projet_id=$projet_id and libelle='$idetape'";
					$result =mysqli_query($con,$sql);
					if ($row1 = mysqli_fetch_row($result))
					{
						$etape_projet_id=$row1[0];
					}
				}	
			}
			
		if ($lot_id==0)
			 echo "ko";
		else {
			  if ($idtraitement=='1') {
				 $sql="update lot SET commande_vivetic ='".$idcommande."' where lot_id=".$lot_id;
				mysqli_query($con,$sql);
				  
			  }	
              else if  ($idtraitement=='3') {
			     if ($fini=='0')
				 {
					$sql="insert into historique_lot(lot_id,etape_projet_id,volume_doc,volume_piece,datetime_debut)";
					$sql.="values ($lot_id,$etape_projet_id,$volume_doc,$volume_piece,CURRENT_TIMESTAMP)";
				 }
				 else
				 {
				   $sql="insert into historique_lot(lot_id,etape_projet_id,volume_doc,volume_piece,datetime_debut,datetime_fin)";
				   $sql.="values ($lot_id,$etape_projet_id,$volume_doc,$volume_piece,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
				 }
				 $result=mysqli_query($con,$sql);
              }	
			  
			echo $lot_id."-".$projet_id."-".$etape_projet_id;  
		}	 
			 
		mysqli_close($con);
  }
  
 catch(Exception $e)
 {
	 echo "ko";
 }		
	
    



?>
