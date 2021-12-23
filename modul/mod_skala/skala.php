                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Skala</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="redirect.php?module=home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Skala</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Form Skala</h4>
                                            <p class="card-description">
                                                Input Skala Penerimaan Mahasiswa Magang Pada AfrizalProject
                                            </p>
                                            <?php
                                        $aksi="modul/mod_skala/aksi_skala.php";
                                        $skala = $conn->query("SELECT * FROM skala");

                                        echo '<div class="card-header">
                                                  <i class="fas fa-table me-1"></i>
                                                  skala
                                              </div>
                                              <section class="inner-page">
                                                <div class="container">
                                                  <table class="table">';

                                        echo '<thead>
                                          <tr>
                                            <th scope="col">ID skala</th>
                                            <th scope="col">Value</th>
                                            <th scope="col">Keterangan</th>
                                          </tr>
                                        </thead>';

                                        while ($row = $skala->fetch_array()) { 
                                          echo "<tbody>
                                                <tr>
                                                  <td>$row[idskala]</td>
                                                  <td>$row[value]</td>
                                                  <td>$row[keterangan]</td>
                                                </tr>
                                                </tbody>";
                                        }
                                        echo      '</table>
                                                </div>
                                              </section>';

                                        echo "<form class='forms-sample' action='$aksi?module=skala&act=insert' method='POST'>
                                            <div class='form-group'>
                                            <label for='value'>Value</label>
                                            <input type='text' class='form-control mb-3' name='value' placeholder='Nilai untuk Skala'>
                                            <label for='keterangan'>Keterangan</label>
                                            <input type='text' class='form-control' name='keterangan' placeholder='Keterangan untuk Skala'>
                                            </div>
                                            <button type='submit' class='btn btn-primary mr-2 my-3'>Insert</button>
                                        </form>
                                        ";
                                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>