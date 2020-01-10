<!-- Modal -->
  <div class="modal fade" id="id<?php echo $id=$row['id'];  ?>" role="dialog">
          <?php 
            // $koneksi = mysqli_connect('localhost','root','','test'); 
              $sql   = "SELECT * FROM dokumentasi WHERE id = $id";
              $result2  = $koneksi->query($sql);
              $row2       = mysqli_fetch_assoc($result2);
               
          ?>
 
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $row2["uraian_kegiatan"]; ?></h4>
        </div>
        <div class="modal-body">
          <img src="assets/upload/<?php echo $row2['gambar']; ?>" width='50%' height='50%'>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
       
    </div>
  </div>
   
</div>