<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kriteria</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="redirect.php?module=home">Dashboard</a></li>
            <li class="breadcrumb-item active">Kriteria</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Form Kriteria</h4>
                            <p class="card-description">
                                Input Kriteria Data Penerimaan Mahasiswa Magang pada AfrizalProject
                            </p>
                            <?php
                                        $aksi="modul/mod_Kriteria/aksi_kriteria.php";
                                        $kriteria = $conn->query("SELECT * FROM kriteria");

                                        echo '<div class="card-header">
                                                  <i class="fas fa-table me-1"></i>
                                                  kriteria
                                              </div>
                                              <section class="inner-page">
                                                <div class="container">
                                                  <table class="table">';

                                        echo '<thead>
                                          <tr>
                                            <th scope="col">ID kriteria</th>
                                            <th scope="col">Nama kriteria</th>
                                          </tr>
                                        </thead>';

                                        while ($row = $kriteria->fetch_array()) { 
                                          echo "<tbody>
                                                <tr>
                                                  <td>$row[idkriteria]</td>
                                                  <td>$row[namakriteria]</td>
                                                </tr>
                                                </tbody>";
                                        }
                                        echo      '</table>
                                                </div>
                                              </section>';

                                        echo "<form class='forms-sample' action='$aksi?module=kriteria&act=insert' method='POST'>
                                            <div class='form-group'>                                         
                                            <label for='nama'>Nama</label>
                                            <input type='text' class='form-control ' name='nama' placeholder='Nama Kriteria'>
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