<?php 
                                $sql = "SELECT tb_karyawan.nama_karyawan,tb_inventory.nama_aset,tb_inventory.kode_rfid,tb_pinjaminventory.tgl_pinjam,tb_pinjaminventory.tgl_kembali,tb_pinjaminventory.id as rid from  tb_pinjaminventory join tb_karyawan on tb_karyawan.kode_rfid=tb_pinjaminventory.id_penanggungjawab join tb_inventory on tb_inventory.id=tb_pinjaminventory.asset_Id order by tb_pinjaminventory.id desc";
                                $query = $dbh -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                    foreach($results as $result)
                                    {               ?>
                                    <?php
                                        $cnt=$cnt+1;
                                    }
                                }
                                    ?>