<?php  
  include 'connect.php';
  
  if(isset($_POST["query"])){
    $output = '';
    $keywords = "%".$_POST["query"]."%";
    $sql = "SELECT * FROM tb_karyawan WHERE nama_karyawan LIKE :keywords AND status=1 LIMIT 10";
    $query= $dbh -> prepare($sql);
    $query-> bindParam('keywords', $keywords, PDO::PARAM_STR);
    $query-> execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $output = '<ul class="list-unstyled" style=" background-color:#eee;
    cursor:pointer;
    width: 100%; ">';


    if($query -> rowCount() > 0)
        {
            foreach ($results as $result)
            { 
                $output .= '<li style="padding:12px;
                border:thin solid #F0F8FF; :hover{
                    background-color:#7FFFD4;}">'.($result->nama_karyawan).'</li>';  
            }
        }
        else
        {
            $output .= '<li>Tidak ada yang cocok.</li>';  
        }

        $output .= '</ul>';
        echo $output;
    }
?>