

<?php
    include ("db.php");


    
    try {
       function KontrolSession($dbCheck = false)
       {  if(!isset("Id") || !isset("Email") ) {
               response(false,"Session Kaydı yok",false);
        }
        $kontrol=$db->query("SELECT * FROM users WHERE  id='$id' AND email='$email'");
        $kontrol->execute();
        $sonuc = $kontrol->fetchAll();

        if(count( $sonuc) == 0)
        {
                response(false,"Geçersiz Session",false);
         }else{
                    response( $sonuc[0],"",true);
                }
                catch (PDOException $e) {
                    response(false,"Hata Oluştu",false);
            
            }
        
        // if( $datas->rowCount() < 1){
        //     response(false,"Geçersiz Session",false);
        // } else{
        //     response($kontrol[0],"",true);
        // }
        

    // //     session_start();
    // // $id = $_SESSION["Id"];
    // // try {
    // //     if(!isset($id)){
    // //         response(false,"Önce Giriş Yapmalısınız",false);
    // //     }
    // //     $infoQuery=$db->query("SELECT * FROM users WHERE  id='$id'");
    // //     $infoQuery->execute();
    // //     $datas = $infoQuery->fetchAll();
    // //     if(count($datas) == 0){
    // //         response(false,"Geçersiz Session",false);
    // //     }else{
    // //         response($datas[0],"",true);
    // //     }
    // // } catch (\Throwable $th) {
    // //     response(false,"Hata Oluştu",false);
    // // }
?>







