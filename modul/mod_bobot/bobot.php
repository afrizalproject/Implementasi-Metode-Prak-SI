                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Bobot</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="redirect.php?module=home">Dashboard</a></li>
                            <li class="breadcrumb-item active">Bobot</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="col-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Form Bobot</h4>
                                            <p class="card-description">
                                                Input Bobot untuk Kriteria
                                            </p>
                                            <?php
                                        $aksi="modul/mod_bobot/aksi_bobot.php";
                                        $result = $conn->query("SELECT * FROM kriteria");
                                        $bobot = $conn->query("SELECT * FROM bobot");

                                        echo '<div class="card-header">
                                                  <i class="fas fa-table me-1"></i>
                                                  bobot
                                              </div>
                                              <section class="inner-page">
                                                <div class="container">
                                                  <table class="table">';

                                        echo '<thead>
                                          <tr>
                                            <th scope="col">ID bobot</th>
                                            <th scope="col">ID Kriteria</th>
                                            <th scope="col">Value</th>
                                          </tr>
                                        </thead>';

                                        while ($row = $bobot->fetch_array()) { 
                                          echo "<tbody>
                                                <tr>
                                                  <td>$row[idbobot]</td>
                                                  <td>$row[idkriteria]</td>
                                                  <td>$row[value]</td>
                                                </tr>
                                                </tbody>";
                                        }
                                        echo      '</table>
                                                </div>
                                              </section>';

                                        echo "<form class='forms-sample' action='$aksi?module=bobot&act=insert' method='POST'>
                                            <div class='form-group'>
                                            <label for='value'>Value</label>
                                            <input type='text' class='form-control mb-3' name='value' placeholder='Nilai untuk bobot kriteria'>
                                            <label for='id_kriteria'>Kriteria</label>
                                        ";
                                        
                                        echo "<select name='idkriteria' class='form-select'>";
                                        while ($row = $result->fetch_array()) {
                                            echo "<option value='$row[idkriteria]'>kriteria : $row[namakriteria]</option>";
                                        }
                                        echo "</select>
                                        </div>
                                        <button type='submit' class='btn btn-primary mr-2 my-3'>Insert</button>
                                        </form>";
                                    ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>