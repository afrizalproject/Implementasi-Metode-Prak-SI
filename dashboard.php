                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <?php 
                            include('config.php');
                            //metode SAW
                            $matrixSAW  = $conn->query("SELECT vmatrixkeputusan.* FROM vmatrixkeputusan GROUP BY idmatrix ");
                            $normalisasiSAW = $conn->query("SELECT vnormalisasi.* FROM vnormalisasi GROUP BY idmatrix ");
                            $rangkingSAW = $conn->query("SELECT vrangking.* FROM vrangking GROUP BY idalternatif ");

                            //metode WP
                            $matrixWP  = $conn->query("SELECT vmatrixkeputusan.* FROM vmatrixkeputusan GROUP BY idmatrix ");
                            $normalisasiWP = $conn->query("SELECT wp_normalisasiterbobot.* FROM wp_normalisasiterbobot");
                            $pangkatWP = $conn->query("SELECT wp_pangkat.* FROM wp_pangkat");
                            $nilaiSWP = $conn->query("SELECT wp_nilais.* FROM wp_nilais GROUP BY idalternatif ");
                            $nilaiVWP = $conn->query("SELECT wp_nilaiv.* FROM wp_nilaiv");

                            //Metode Topsis
                            $pembagi = $conn->query("SELECT * FROM topsis_pembagi");
                            $normalisasiTopsis = $conn->query("SELECT * FROM topsis_normalisasi");
                            $normalisasiTerbobot = $conn->query("SELECT * FROM topsis_terbobot");
                            $nilaiMaxMin = $conn->query("SELECT * FROM topsis_maxmin");
                            $sipsin = $conn->query("SELECT * FROM topsis_sipsin");
                            $nilaiv = $conn->query("SELECT * FROM topsis_nilaiv");

                            //Metode Meultimoora
                            $matrixMM  = $conn->query("SELECT vmatrixkeputusan.* FROM vmatrixkeputusan GROUP BY idmatrix ");
                            $normalisasipraMM = $conn->query("SELECT * FROM multimoora_1 ");
                            $normalisasiMM = $conn->query("SELECT * FROM multimoora_2 ");
                            $ratiosystemMM = $conn->query("SELECT * FROM multimoora_3 ");
                            $fmfMM = $conn->query("SELECT * FROM multimoora_4 ");


                            // Kontrol Metode
                            echo '<div class="card-header">
                                      <i class="fas fa-table me-1"></i>
                                      Metode
                                  </div>
                                  <section class="inner-page">
                                    <div class="container">
                                      <table class="table">';

                            echo '<thead>
                            <tr>
                              <th scope="col">Metode</th>
                              <th scope="col">Detail</th>
                            </tr>
                          </thead>';
                              echo "<tbody>
                                    <tr>
                                      <td><a href='?module=home&metode=saw'>SAW</a></td>
                                      <td>
                                        <button onclick='detailTable(`matrixSAW`)'>Matrix Keputusan</button>
                                        <button onclick='detailTable(`normalisasiSAW`)'>Normalisasi</button>
                                        <button onclick='detailTable(`rangkingSAW`)'>Rangking</button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td><a href='?module=home&metode=wp'>WP</a></td>
                                      <td>
                                        <button onclick='detailTable(`matrixWP`)'>Matrix Keputusan</button>
                                        <button onclick='detailTable(`normalisasiWP`)'>Normalisasi</button>
                                        <button onclick='detailTable(`pangkatWP`)'>Nilai Pangkat Pra-nilai S</button>
                                        <button onclick='detailTable(`nilaiSWP`)'>NilaiS</button>
                                        <button onclick='detailTable(`nilaiVWP`)'>NilaiV / Rangking</button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td><a href='?module=home&metode=topsis'>TOPSIS</a></td>
                                      <td>
                                        <button onclick='detailTable(`pembagiTopsis`)'>Pembagi</button>
                                        <button onclick='detailTable(`normalisasiTopsis`)'>Normalisasi</button>
                                        <button onclick='detailTable(`terbobotTopsis`)'>Normalisasi Terbobot</button>
                                        <button onclick='detailTable(`maxmin`)'>Nilai Max & Min</button>
                                        <button onclick='detailTable(`sipsin`)'>SIP & SIN</button>
                                        <button onclick='detailTable(`nilaiv`)'>NialiV</button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td><a href='?module=home&metode=multimoora'>MULTIMOORA</a></td>
                                      <td>
                                        <button onclick='detailTable(`matrix_m`)'>Matrix</button>
                                        <button onclick='detailTable(`normalisasipra_m`)'>Normalisasi Pra</button>
                                        <button onclick='detailTable(`normalisasi_m`)'>Normalisasi</button>
                                        <button onclick='detailTable(`ratiosystem_m`)'>Ratio System  & Min dan Max 
Reference 
Point</button>
                                        <button onclick='detailTable(`fmf_m`)'>Full Multicative Form</button>
                                      </td>
                                    </tr>
                                    </tbody>";
                            echo      '</table>
                                    </div>
                                  </section>';
                            
                            


                            echo '<h4 class="mt-4"><i class="fas fa-table me-1"></i>Details</h4>';
                            if ($_GET['module']=='home' && $_GET['metode']=='saw') {
                                  // matrix keputusan
                                  echo '<div class="card-header">
                                          <i class="fas fa-table me-1"></i>
                                          Matrix Keputusan
                                        </div>
                                  <section class="inner-page">
                                    <div class="container" id="matrixSAW" style="display:none">
                                      <table class="table">';

                                      echo '<thead>
                                      <tr>
                                        <th scope="col">ID Matrix</th>
                                        <th scope="col">ID Alternatif</th>
                                        <th scope="col">Nama Alternatif</th>
                                        <th scope="col">ID Kriteria</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">ID Bobot</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Keterangan</th>
                                      </tr>
                                    </thead>';

                                      while ($row = $matrixSAW->fetch_array()) { 
                                        echo "<tbody>
                                              <tr>
                                                <td>$row[idmatrix]</td>
                                                <td>$row[idalternatif]</td>
                                                <td>$row[namaalternatif]</td>
                                                <td>$row[idkriteria]</td>
                                                <td>$row[namakriteria]</td>
                                                <td>$row[idbobot]</td>
                                                <td>$row[value]</td>
                                                <td>$row[nilai]</td>
                                                <td>$row[keterangan]</td>
                                              </tr>
                                              </tbody>";
                                      }
                                      echo      '</table>
                                              </div>
                                            </section>';
                                      

                                      // Normalisasi
                                      echo '<div class="card-header">
                                            <i class="fas fa-table me-1"></i>
                                            Normalisasi
                                        </div>
                                        <section class="inner-page">
                                          <div class="container" id="normalisasiSAW" style="display:none">
                                            <table class="table">';

                                      echo '<thead>
                                      <tr>
                                        <th scope="col">ID Matrix</th>
                                        <th scope="col">ID Alternatif</th>
                                        <th scope="col">Nama Alternatif</th>
                                        <th scope="col">ID Kriteria</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">ID Bobot</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Normalisasi</th>
                                      </tr>
                                    </thead>';

                                      while ($row = $normalisasiSAW->fetch_array()) { 
                                        echo "<tbody>
                                              <tr>
                                                <td>$row[idmatrix]</td>
                                                <td>$row[idalternatif]</td>
                                                <td>$row[namaalternatif]</td>
                                                <td>$row[idkriteria]</td>
                                                <td>$row[namakriteria]</td>
                                                <td>$row[idbobot]</td>
                                                <td>$row[value]</td>
                                                <td>$row[nilai]</td>
                                                <td>$row[keterangan]</td>
                                                <td>$row[normalisasi]</td>
                                              </tr>
                                              </tbody>";
                                      }
                                      echo      '</table>
                                              </div>
                                            </section>';


                                    // Rangking
                                    echo '<div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Rangking
                                </div>
                                <section class="inner-page">
                                  <div class="container" id="rangkingSAW" style="display:none">
                                    <table class="table">';

                              echo '<thead>
                              <tr>
                                <th scope="col">ID Alternatif</th>
                                <th scope="col">Nama Alternatif</th>
                                <th scope="col">Rangking</th>
                              </tr>
                            </thead>';

                              while ($row = $rangkingSAW->fetch_array()) { 
                                echo "<tbody>
                                      <tr>
                                        <td>$row[idalternatif]</td>
                                        <td>$row[namaalternatif]</td>
                                        <td>$row[rangking]</td>
                                      </tr>
                                      </tbody>";
                              }
                              echo      '</table>
                                      </div>
                                    </section>';



                            }elseif ($_GET['module']=='home' && $_GET['metode']=='wp') {
                              // matrix keputusan
                              echo '<div class="card-header">
                                      <i class="fas fa-table me-1"></i>
                                      Matrix Keputusan
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="matrixWP" style="display:none">
                                        <table class="table">';

                              echo '<thead>
                                      <tr>
                                        <th scope="col">ID Matrix</th>
                                        <th scope="col">ID Alternatif</th>
                                        <th scope="col">Nama Alternatif</th>
                                        <th scope="col">ID Kriteria</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">ID Bobot</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Keterangan</th>
                                      </tr>
                                    </thead>';

                                while ($row = $matrixWP->fetch_array()) { 
                                  echo "<tbody>
                                        <tr>
                                          <td>$row[idmatrix]</td>
                                          <td>$row[idalternatif]</td>
                                          <td>$row[namaalternatif]</td>
                                          <td>$row[idkriteria]</td>
                                          <td>$row[namakriteria]</td>
                                          <td>$row[idbobot]</td>
                                          <td>$row[value]</td>
                                          <td>$row[nilai]</td>
                                          <td>$row[keterangan]</td>
                                        </tr>
                                        </tbody>";
                                }
                                
                                echo      '</table>
                                        </div>
                                      </section>';
                                

                                // Normalisasi
                                echo '<div class="card-header">
                                      <i class="fas fa-table me-1"></i>
                                      Normalisasi
                                  </div>
                                  <section class="inner-page">
                                    <div class="container" id="normalisasiWP" style="display:none">
                                      <table class="table">';

                                echo '<thead>
                                <tr>
                                  <th scope="col">ID Bobot</th>
                                  <th scope="col">ID Kriteria</th>
                                  <th scope="col">Value</th>
                                  <th scope="col">Jumlah</th>
                                  <th scope="col">Normalisasi</th>
                                </tr>
                              </thead>';

                                while ($row = $normalisasiWP->fetch_array()) { 
                                  echo "<tbody>
                                        <tr>
                                          <td>$row[idbobot]</td>
                                          <td>$row[idkriteria]</td>
                                          <td>$row[value]</td>
                                          <td>$row[jumlah]</td>
                                          <td>$row[normalisasi_w]</td>
                                        </tr>
                                        </tbody>";
                                }
                                echo      '</table>
                                        </div>
                                      </section>';


                                // Nilai Pangkat
                                echo '<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Nilai Pangkat
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="pangkatWP" style="display:none">
                                        <table class="table">';

                                  echo '<thead>
                                  <tr>
                                    <th scope="col">ID Matrix</th>
                                    <th scope="col">ID Alternatif</th>
                                    <th scope="col">Nama Alternatif</th>
                                    <th scope="col">ID Kriteria</th>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">ID Bobot</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Normalisasi_WP</th>
                                    <th scope="col">Pangkat</th>
                                  </tr>
                                </thead>';

                                  while ($row = $pangkatWP->fetch_array()) { 
                                    echo "<tbody>
                                          <tr>
                                            <td>$row[idmatrix]</td>
                                            <td>$row[idalternatif]</td>
                                            <td>$row[namaalternatif]</td>
                                            <td>$row[idkriteria]</td>
                                            <td>$row[namakriteria]</td>
                                            <td>$row[idbobot]</td>
                                            <td>$row[value]</td>
                                            <td>$row[nilai]</td>
                                            <td>$row[keterangan]</td>
                                            <td>$row[normalisasi_w]</td>
                                            <td>$row[pangkat]</td>
                                          </tr>
                                          </tbody>";
                                  }
                                  echo      '</table>
                                          </div>
                                        </section>';


                                // Nilai S
                                echo '<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                NilaiS
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="nilaiSWP" style="display:none">
                                        <table class="table">';

                                  echo '<thead>
                                  <tr>
                                    <th scope="col">ID Alternatif</th>
                                    <th scope="col">Nama Alternatif</th>
                                    <th scope="col">nilaiS</th>
                                  </tr>
                                </thead>';

                                  while ($row = $nilaiSWP->fetch_array()) { 
                                    echo "<tbody>
                                          <tr>
                                            <td>$row[idalternatif]</td>
                                            <td>$row[namaalternatif]</td>
                                            <td>$row[nilaiS]</td>
                                          </tr>
                                          </tbody>";
                                  }
                                  echo      '</table>
                                          </div>
                                        </section>';


                                // Nilai V
                                echo '<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                NilaiV / Rangking
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="nilaiVWP" style="display:none">
                                        <table class="table">';

                                  echo '<thead>
                                  <tr>
                                    <th scope="col">ID Alternatif</th>
                                    <th scope="col">Nama Alternatif</th>
                                    <th scope="col">nilaiV</th>
                                  </tr>
                                </thead>';

                                  while ($row = $nilaiVWP->fetch_array()) { 
                                    echo "<tbody>
                                          <tr>
                                            <td>$row[idalternatif]</td>
                                            <td>$row[namaalternatif]</td>
                                            <td>$row[nilaiv]</td>
                                          </tr>
                                          </tbody>";
                                  }
                                  echo      '</table>
                                          </div>
                                        </section>';


                            }elseif ($_GET['module']=='home' && $_GET['metode']=='topsis') {
                              // matrix keputusan
                              echo '<div class="card-header">
                                      <i class="fas fa-table me-1"></i>
                                      Pembagi
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="pembagiTopsis" style="display:none">
                                        <table class="table">';

                              echo '<thead>
                                      <tr>
                                        <th scope="col">ID Kriteria</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">Bagi</th>
                                      </tr>
                                    </thead>';

                                while ($row = $pembagi->fetch_array()) { 
                                  echo "<tbody>
                                        <tr>
                                          <td>$row[idkriteria]</td>
                                          <td>$row[namakriteria]</td>
                                          <td>$row[bagi]</td>
                                        </tr>
                                        </tbody>";
                                }
                                
                                echo      '</table>
                                        </div>
                                      </section>';
                                

                                // Normalisasi
                                echo '<div class="card-header">
                                      <i class="fas fa-table me-1"></i>
                                      Normalisasi
                                  </div>
                                  <section class="inner-page">
                                    <div class="container" id="normalisasiTopsis" style="display:none">
                                      <table class="table">';

                                echo '<thead>
                                <tr>
                                  <th scope="col">ID Matrix</th>
                                  <th scope="col">ID Alternatif</th>
                                  <th scope="col">Nama Alternatif</th>
                                  <th scope="col">ID Kriteria</th>
                                  <th scope="col">Nama Kriteria</th>
                                  <th scope="col">Bobot</th>
                                  <th scope="col">Value</th>
                                  <th scope="col">Nilai</th>
                                  <th scope="col">Keterangan</th>
                                  <th scope="col">Normalisasi</th>
                                </tr>
                              </thead>';

                                while ($row = $normalisasiTopsis->fetch_array()) { 
                                  echo "<tbody>
                                        <tr>
                                          <td>$row[idmatrix]</td>
                                          <td>$row[idalternatif]</td>
                                          <td>$row[namaalternatif]</td>
                                          <td>$row[idkriteria]</td>
                                          <td>$row[namakriteria]</td>
                                          <td>$row[idbobot]</td>
                                          <td>$row[value]</td>
                                          <td>$row[nilai]</td>
                                          <td>$row[keterangan]</td>
                                          <td>$row[normalisasi]</td>
                                        </tr>
                                        </tbody>";
                                }
                                echo      '</table>
                                        </div>
                                      </section>';


                                // Nilai Pangkat
                                echo '<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Normalisasi Terbobot
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="terbobotTopsis" style="display:none">
                                        <table class="table">';

                                  echo '<thead>
                                  <tr>
                                    <th scope="col">ID Matrix</th>
                                    <th scope="col">ID Alternatif</th>
                                    <th scope="col">Nama Alternatif</th>
                                    <th scope="col">ID Kriteria</th>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Normalisasi</th>
                                    <th scope="col">Normalisasi Terbobot</th>
                                  </tr>
                                </thead>';

                                  while ($row = $normalisasiTerbobot->fetch_array()) { 
                                    echo "<tbody>
                                          <tr>
                                          <td>$row[idmatrix]</td>
                                          <td>$row[idalternatif]</td>
                                          <td>$row[namaalternatif]</td>
                                          <td>$row[idkriteria]</td>
                                          <td>$row[namakriteria]</td>
                                          <td>$row[idbobot]</td>
                                          <td>$row[value]</td>
                                          <td>$row[nilai]</td>
                                          <td>$row[keterangan]</td>
                                          <td>$row[normalisasi]</td>
                                          <td>$row[terbobot]</td>
                                          </tr>
                                          </tbody>";
                                  }
                                  echo      '</table>
                                          </div>
                                        </section>';


                                // Nilai Max Min
                                echo '<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Nilai Max & Min
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="maxmin" style="display:none">
                                        <table class="table">';

                                  echo '<thead>
                                  <tr>
                                    <th scope="col">ID Matrix</th>
                                    <th scope="col">ID Kriteria</th>
                                    <th scope="col">Nama Kriteria</th>
                                    <th scope="col">Maximum</th>
                                    <th scope="col">Minimum</th>
                                  </tr>
                                </thead>';

                                  while ($row = $nilaiMaxMin->fetch_array()) { 
                                    echo "<tbody>
                                          <tr>
                                            <td>$row[idmatrix]</td>
                                            <td>$row[idkriteria]</td>
                                            <td>$row[namakriteria]</td>
                                            <td>$row[maximum]</td>
                                            <td>$row[minimum]</td>
                                          </tr>
                                          </tbody>";
                                  }
                                  echo      '</table>
                                          </div>
                                        </section>';


                                // Nilai SIP SIN
                                echo '<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Sip & Sin
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="sipsin" style="display:none">
                                        <table class="table">';

                                  echo '<thead>
                                  <tr>
                                    <th scope="col">ID Alternatif</th>
                                    <th scope="col">D+</th>
                                    <th scope="col">D-</th>
                                  </tr>
                                </thead>';

                                  while ($row = $sipsin->fetch_array()) { 
                                    echo "<tbody>
                                          <tr>
                                            <td>$row[idalternatif]</td>
                                            <td>$row[dplus]</td>
                                            <td>$row[dmin]</td>
                                          </tr>
                                          </tbody>";
                                  }
                                  echo      '</table>
                                          </div>
                                        </section>';


                                // Nilai V
                                echo '<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                NilaiV
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="nilaiv" style="display:none">
                                        <table class="table">';

                                  echo '<thead>
                                  <tr>
                                    <th scope="col">ID Alternatif</th>
                                    <th scope="col">D+</th>
                                    <th scope="col">D-</th>
                                    <th scope="col">NilaiV</th>
                                  </tr>
                                </thead>';

                                  while ($row = $nilaiv->fetch_array()) { 
                                    echo "<tbody>
                                          <tr>
                                            <td>$row[idalternatif]</td>
                                            <td>$row[dplus]</td>
                                            <td>$row[dmin]</td>
                                            <td>$row[nilaiv]</td>
                                          </tr>
                                          </tbody>";
                                  }
                                  echo      '</table>
                                          </div>
                                        </section>';
                                      }


                                      //metode multimoora
                            elseif ($_GET['module']=='home' && $_GET['metode']=='multimoora') {
                              // matrix keputusan
                              echo '<div class="card-header">
                                      <i class="fas fa-table me-1"></i>
                                      Matrix
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="matrix_m" style="display:none">
                                        <table class="table">';

                              echo '<thead>
                                      <tr>
                                        <th scope="col">ID Matrix</th>
                                        <th scope="col">ID Alternative</th>
                                        <th scope="col">Nama Alternative</th>
                                        <th scope="col">ID Kriteria</th>
                                        <th scope="col">Nama Kriteria</th>
                                        <th scope="col">ID Bobot</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Keterangan</th>
                                      </tr>
                                    </thead>';

                                while ($row = $matrixMM->fetch_array()) { 
                                  echo "<tbody>
                                        <tr>
                                          <td>$row[idmatrix]</td>
                                          <td>$row[idalternatif]</td>
                                          <td>$row[namaalternatif]</td>
                                          <td>$row[idkriteria]</td>
                                          <td>$row[namakriteria]</td>
                                          <td>$row[idbobot]</td>
                                          <td>$row[value]</td>
                                          <td>$row[nilai]</td>
                                          <td>$row[keterangan]</td>
                                        </tr>
                                        </tbody>";
                                }
                                
                                echo      '</table>
                                        </div>
                                      </section>';
                                

                                // Normalisasi Pra
                                echo '<div class="card-header">
                                      <i class="fas fa-table me-1"></i>
                                      Normalisasi Pra
                                  </div>
                                  <section class="inner-page">
                                    <div class="container" id="normalisasipra_m" style="display:none">
                                      <table class="table">';

                                echo '<thead>
                                <tr>
                                  <th scope="col">ID Matrix</th>
                                  <th scope="col">ID Alternatif</th>
                                  <th scope="col">Nama Alternatif</th>
                                  <th scope="col">ID Kriteria</th>
                                  <th scope="col">Nama Kriteria</th>
                                  <th scope="col">ID Bobot</th>
                                  <th scope="col">Value</th>
                                  <th scope="col">Nilai</th>
                                  <th scope="col">Keterangan</th>
                                  <th scope="col">Pra</th>
                                </tr>
                              </thead>';

                                while ($row = $normalisasipraMM->fetch_array()) { 
                                  echo "<tbody>
                                        <tr>
                                          <td>$row[idmatrix]</td>
                                          <td>$row[idalternatif]</td>
                                          <td>$row[namaalternatif]</td>
                                          <td>$row[idkriteria]</td>
                                          <td>$row[namakriteria]</td>
                                          <td>$row[idbobot]</td>
                                          <td>$row[value]</td>
                                          <td>$row[nilai]</td>
                                          <td>$row[keterangan]</td>
                                          <td>$row[pra]</td>
                                        </tr>
                                        </tbody>";
                                }
                                echo      '</table>
                                        </div>
                                      </section>';

                                // Normalisasi
                                echo '<div class="card-header">
                                      <i class="fas fa-table me-1"></i>
                                      Normalisasi
                                  </div>
                                  <section class="inner-page">
                                    <div class="container" id="normalisasi_m" style="display:none">
                                      <table class="table">';

                                echo '<thead>
                                <tr>
                                  <th scope="col">ID Matrix</th>
                                  <th scope="col">ID Alternatif</th>
                                  <th scope="col">Nama Alternatif</th>
                                  <th scope="col">ID Kriteria</th>
                                  <th scope="col">Nama Kriteria</th>
                                  <th scope="col">ID Bobot</th>
                                  <th scope="col">Value</th>
                                  <th scope="col">Nilai</th>
                                  <th scope="col">Keterangan</th>
                                  <th scope="col">Pra</th>
                                  <th scope="col">Normalisasi</th>
                                </tr>
                              </thead>';

                                while ($row = $normalisasiMM->fetch_array()) { 
                                  echo "<tbody>
                                        <tr>
                                          <td>$row[idmatrix]</td>
                                          <td>$row[idalternatif]</td>
                                          <td>$row[namaalternatif]</td>
                                          <td>$row[idkriteria]</td>
                                          <td>$row[namakriteria]</td>
                                          <td>$row[idbobot]</td>
                                          <td>$row[value]</td>
                                          <td>$row[nilai]</td>
                                          <td>$row[keterangan]</td>
                                          <td>$row[pra]</td>
                                          <td>$row[normalisasi]</td>
                                        </tr>
                                        </tbody>";
                                }
                                echo      '</table>
                                        </div>
                                      </section>';


                                // Ratio System
                                                                echo '<div class="card-header">
                                      <i class="fas fa-table me-1"></i>
                                      Ratio System  & Min dan Max 
Reference 
Point
                                  </div>
                                  <section class="inner-page">
                                    <div class="container" id="ratiosystem_m" style="display:none">
                                      <table class="table">';

                                echo '<thead>
                                <tr>
                                  <th scope="col">ID Matrix</th>
                                  <th scope="col">ID Alternatif</th>
                                  <th scope="col">Nama Alternatif</th>
                                  <th scope="col">ID Kriteria</th>
                                  <th scope="col">Nama Kriteria</th>
                                  <th scope="col">ID Bobot</th>
                                  <th scope="col">Value</th>
                                  <th scope="col">Nilai</th>
                                  <th scope="col">Keterangan</th>
                                  <th scope="col">Pra</th>
                                  <th scope="col">Normalisasi</th>
                                  <th scope="col">Normalisasi Terbobot</th>
                                </tr>
                              </thead>';

                                while ($row = $ratiosystemMM->fetch_array()) { 
                                  echo "<tbody>
                                        <tr>
                                          <td>$row[idmatrix]</td>
                                          <td>$row[idalternatif]</td>
                                          <td>$row[namaalternatif]</td>
                                          <td>$row[idkriteria]</td>
                                          <td>$row[namakriteria]</td>
                                          <td>$row[idbobot]</td>
                                          <td>$row[value]</td>
                                          <td>$row[nilai]</td>
                                          <td>$row[keterangan]</td>
                                          <td>$row[pra]</td>
                                          <td>$row[normalisasi]</td>
                                          <td>$row[normalisasibobot]</td>
                                        </tr>
                                        </tbody>";
                                }
                                echo      '</table>
                                        </div>
                                      </section>';


                                // FMF
                                echo '<div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Full Multicative Form
                                    </div>
                                    <section class="inner-page">
                                      <div class="container" id="fmf_m" style="display:none">
                                        <table class="table">';

                                  echo '<thead>
                                  <tr>
                                    <th scope="col">ID Alternatif</th>
                                    <th scope="col">Hasil</th>
                                  </tr>
                                </thead>';

                                  while ($row = $fmfMM->fetch_array()) { 
                                    echo "<tbody>
                                          <tr>
                                            <td>$row[idalternatif]</td>
                                            <td>$row[hasil]</td>
                                          </tr>
                                          </tbody>";
                                  }
                                  echo      '</table>
                                          </div>
                                        </section>';


                                
                                      }
                          ?>
                        </div>
                    </div>
                </main>


                <script>
function detailTable(detail) {
    var x = document.getElementById(detail);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
                </script>