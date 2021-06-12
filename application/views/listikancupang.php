<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" align="center">Laporan</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                        <th>
                            No
                        </th>
                      <th>
                        Nama
                      </th>
                      <th>
                        Jenis Ikan
                      </th>
                      <th>
                        Harga
                      </th>
                      <th>
                          Status
                      </th>
                      <th>
                          Date
                      </th>
                    </thead>
                    <tbody>

                    <?php
                        $no = 1;
                        foreach($datauser as $data => $user){
                            ?>
                      <tr>
                            <td><?= $no;?></td>
                            <td><?= $user['nama'];?></td>
                            <td><?= $user['jenis_ikan'];?></td>
                            <td><?= $user['harga'];?></td>
                            <td><?= $user['status'];?></td>
                            <td><?= $user['date'];?></td>
                            
                        </tr>
                    <?php

                    $no++;
                    }
                    ?>
                        
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>