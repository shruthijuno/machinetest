<?php

require_once('connect.php');
Class Actions{

   
   function getReport(){
      $Dbobj = new DbConnection(); 
      return $query = mysqli_query($Dbobj->getdbconnect(), "SELECT * FROM documents");

   }


    function getDocumentList(){
      $Dbobj = new DbConnection(); 
      return $query = mysqli_query($Dbobj->getdbconnect(), "SELECT * FROM documents where status=1");
  
   }



   function docDelete($id){

      
 if (isset($_POST["delete"])) {
   $Dbobj = new DbConnection(); 
   $id = $_POST["doc_id"];   

  $query = mysqli_query($Dbobj->getdbconnect(), "UPDATE documents SET status = '0'  WHERE document_id = $id");


   if( $modify){
      echo '<script language="javascript">';
      echo 'alert("delete document")';
      echo '</script>';
    }  
   
   }

   }

function uploadDoc(){
   if (isset($_POST["Upload"])) {

      $upload_folder = "uploads/";
      $doc_path = $upload_folder . basename($_FILES["document"]["name"]);
      $doc_name  = basename($_FILES["document"]["name"]);
      
      if(basename($_FILES["photo"]["name"])!= ''){
         
         $pic_sql="INSERT INTO documents (document_name,document_path,status,created_on)
         VALUES ( '$doc_name','$doc_path',1,)";
         $pic_result = mysqli_query($Dbobj->getdbconnect(),$doc_sql); 
         
         $move = move_uploaded_file($_FILES['document']['tmp_name'], $doc_path);
      }
      
      if ($pic_result) {
         echo '<script language="javascript">';
         echo 'alert("Uploaded successfully")';
         echo '</script>';
      } 
      else{
         echo '<script language="javascript">';
         echo 'alert("something went wrong try again later")';
         echo '</script>';
      }
   
}

}

}














