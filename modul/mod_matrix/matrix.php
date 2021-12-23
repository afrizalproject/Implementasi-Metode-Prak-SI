                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Matrix</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="redirect.php?module=home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Matrix</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Form Matrix</h4>
                                            <p class="card-description">
                                                Input Matrix untuk DSS
                                            </p>
                                            <?php
                                        $aksi="modul/mod_matrix/aksi_matrix.php";

                                        $alternatif = $conn->query("SELECT * FROM alternatif");
                                        $bobot = $conn->query("SELECT * FROM bobot, kriteria WHERE bobot.idkriteria=kriteria.idkriteria");
                                        $skala = $conn->query("SELECT * FROM skala");
                                        $matrix = $conn->query("SELECT * FROM matrixkeputusan");

                                        echo '<div class="card-header">
                                                  <i class="fas fa-table me-1"></i>
                                                  matrix
                                              </div>
                                              <section class="inner-page">
                                                <div class="container">
                                                  <table class="table">';

                                        echo '<thead>
                                          <tr>
                                            <th scope="col">ID matrix</th>
                                            <th scope="col">ID Alternatif</th>
                                            <th scope="col">ID Bobot</th>
                                            <th scope="col">ID Skala</th>
                                          </tr>
                                        </thead>';

                                        while ($row = $matrix->fetch_array()) { 
                                          echo "<tbody>
                                                <tr>
                                                  <td>$row[idmatrix]</td>
                                                  <td>$row[idalternatif]</td>
                                                  <td>$row[idbobot]</td>
                                                  <td>$row[idskala]</td>
                                                </tr>
                                                </tbody>";
                                        }
                                        echo      '</table>
                                                </div>
                                              </section>';

                                        // Alternatif
                                        echo "<form class='forms-sample' action='$aksi?module=matrix&act=insert' method='POST'>
                                            <div class='form-group'>";
                                        
                                        echo "<label for='id_alternatif'>Alternatif</label>
                                            <select name='id_alternatif' class='form-select mb-3'>";
                                        while ($row = $alternatif->fetch_array()) {
                                            echo "<option value='$row[idalternatif]'>$row[namaalternatif]</option>";
                                        }
                                        echo "</select>";


                                        // Bobot
                                        echo "<label for='id_bobot'>bobot</label>
                                            <select name='id_bobot' class='form-select mb-3'>";
                                        while ($row = $bobot->fetch_array()) {
                                            echo "<option value='$row[idbobot]'>kriteria : $row[namakriteria], Nilai Bobot : $row[value]</option>";
                                        }
                                        echo "</select>";


                                        // Skala
                                        echo "<label for='id_skala'>skala</label>
                                            <select name='id_skala' class='form-select mb-3'>";
                                        while ($row = $skala->fetch_array()) {
                                            echo "<option value='$row[idskala]'>value : $row[value], Keterangan : $row[keterangan]</option>";
                                        }
                                        echo "</select>
                                        </div>
                                        <button type='submit' class='btn btn-primary mr-2'>Insert</button>
                                        </form>";
                                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>