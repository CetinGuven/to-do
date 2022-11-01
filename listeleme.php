
<?php

include ("db.php");
include "response.php";

session_start();
$json = file_get_contents("php://input");
$data = json_decode($json);

$listeleme=$data->listeleme;
$kisi = $_SESSION["Id"];

$query=$db->prepare("SELECT * FROM gorev_ayrıntı WHERE users_id='$kisi'");
$query->execute();

    while($row=$query->fetch(PDO::FETCH_ASSOC) ){
        // $data obje tipinde ayarlanacak ve her veriye uygun bir field belirlenecek

        response( $row["title"]." ".$row["date_time"]." ".$row["status"],true,true);

       //echo $row["id"]. " ".$row["title"]." ".$row["date_time"]." ".$row["status"]."<br>";

       
       // $row->id."-" .$row->title."-" .$row->date_time."-". $row->users_id."-" .$row->status."<br>";
        // $datas listesine $data elementini ekle
    }
//     response($datas,"listelendi.",true, );

// else{
//     response(false, "Veri yok", false);
// }

     

?>


<?php

// include ("db.php");
// include "response.php";

// session_start();
// $json = file_get_contents("php://input");
// $data = json_decode($json);

// $listeleme=$data->listeleme;
// $kisi = $_SESSION["Id"];

// // sorgu kişi bilgisine göre ozelleştirilecek
// $query=$db->prepare("SELECT * FROM users  WHERE id='$kisi'");
// $query->execute();

// // response liste tipinde verecek  
// if($query->rowCount()){
//     $datas = array();
//     while($row=$query->fetch(PDO::FETCH_OBJ) ){
//         // $data obje tipinde ayarlanacak ve her veriye uygun bir field belirlenecek

//         $row->id."-" .$row->title."-" .$row->date_time."-". $row->users_id."-" .$row->status."<br>";
//         // $datas listesine $data elementini ekle
//     }
//     response($datas,"listelendi.",true, );

// }else{
//     response(false, "Veri yok", false);
// }

     

?>