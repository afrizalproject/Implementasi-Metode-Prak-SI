                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Alternatif</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="redirect.php?module=home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Alternatif</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Form Alternatif</h4>
                                            <p class="card-description">
                                                Input Alternatif Data Penerimaan Mahasiswa Magang pada AfrizalProject
                                            </p>
                                            <?php
                                        $aksi="modul/mod_alternatif/aksi_alternatif.php";
                                        $alternatif = $conn->query("SELECT * FROM alternatif");

                                        echo '<div class="card-header">
                                                  <i class="fas fa-table me-1"></i>
                                                  Alternatif
                                              </div>
                                              <section class="inner-page">
                                                <div class="container">
                                                  <table class="table">';

                                        echo '<thead>
                                          <tr>
                                            <th scope="col">ID Alternatif</th>
                                            <th scope="col">Nama Alternatif</th>
                                          </tr>
                                        </thead>';

                                        while ($row = $alternatif->fetch_array()) { 
                                          echo "<tbody>
                                                <tr>
                                                  <td>$row[idalternatif]</td>
                                                  <td>$row[namaalternatif]</td>
                                                </tr>
                                                </tbody>";
                                        }
                                        echo      '</table>
                                                </div>
                                              </section>';

                                        echo "<form class='forms-sample' action='$aksi?module=alternatif&act=insert' method='POST'>
                                            <div class='form-group'>
                                            <label for='nama'>Nama</label>
                                            <input type='text' class='form-control' name='nama' placeholder='Nama Alternatif'>
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