<?php
$this->load->view('admin/head');
?>

<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>

<!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">

    <div class="callout callout-danger">
        <h4>Selamat Datang,
            <?php echo $this->session->userdata('nama'); ?>
        </h4>

    </div>

    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Petunjuk Penggunaan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <dl>
                <dt> Data Guru</dt>
                <dd>
                    Data Guru Memiliki berbagai fungsi dan kegunaan diantaranya :
                    <ol>
                        <li>Menambah Data Guru</li>
                        <li>Mencari Data Guru</li>
                        <li>Menampilkan, Melihat Serta Memberikan Mengenai Informasi Data Guru</li>
                        <li>Mengedit Data Guru</li>
                        <li>Menghapus Data Guru</li>
                    </ol>
                </dd>
            </dl>
            <dl>
                <dt> Data Siswa</dt>
                <dd>
                    Data Siswa Memiliki berbagai fungsi dan kegunaan diantaranya :
                    <ol>
                        <li>Menambah Data Siswa</li>
                        <li>Mencari Data Siswa </li>
                        <li>Menampilkan, Melihat Serta Memberikan Mengenai Informasi Data Siswa</li>
                        <li>Mengedit Data Siswa</li>
                        <li>Menghapus Data Siswa</li>
                    </ol>
                </dd>
                <dd>
                    Data Kelas Yang Terdapat Didalam Fitur Data Siswa Memiliki Berbagai Fungsi dan Kegunaan
                    diantaranya :
                </dd>
                <ol>
                    <li>Menambah Data Kelas</li>
                    <li>Mencari Data kelas</li>
                    <li>Menampilkan, Melihat Serta Memberikan Iformasi Mengenai Data Kelas</li>
                    <li>Mengedit Data Kelas</li>
                    <li>Menghapus Data Kelas</li>
                </ol>
            </dl>
            </dl>
            <dl>
                <dt> Kelola Soal Ujian</dt>
                <dd>
                    Kelola Soal Ujian Memiliki berbagai fungsi dan kegunaan diantaranya :
                    <ol>
                        <li>Menambah Data Soal Ujian</li>
                        <li>Memilih Data Mata Pelajaran</li>
                        <li>Mencari Data Soal Ujian </li>
                        <li>Menampilkan, Melihat Serta Memberikan Informasi Mengenai Data Soal Ujian</li>
                        <li>Melihat Data Mata Pelajaran</li>
                        <li>Mengedit Data Soal Ujian</li>
                        <li>Menghapus Data Soal Ujian</li>
                    </ol>
                </dd>
                <dd>
                    Data Mata Pelajaran Yang Terdapat Didalam Fitur Kelola Soal Ujian Memiliki Berbagai Fungsi dan
                    Kegunaan
                    diantaranya :
                </dd>
                <ol>
                    <li>Menambah Data Mata Pelajaran</li>
                    <li>Mencari Data Mata Pelajaran</li>
                    <li>Menampilkan, Melihat Serta Memberikan Iformasi Mengenai Data Mata Pelajaran</li>
                    <li>Mengedit Data Mata Pelajaran</li>
                    <li>Menghapus Data Mata Pelajaran</li>
                </ol>
            </dl>
            </dl>
            <dl>
                <dt> Kelola Peserta Ujian</dt>
                <dd>
                    Kelola Peserta Ujian Memiliki berbagai fungsi dan kegunaan diantaranya :
                    <ol>
                        <li>Menambah Data Peserta Ujian</li>
                        <li>Melihat Data Jenis Ujian</li>
                        <li>Mencari Data Peserta Ujian </li>
                        <li>Menampilkan, Melihat Serta Memberikan Informasi Mengenai Data Peserta Ujian</li>
                        <li>Melihat Data Mata Pelajaran</li>
                        <li>Mengedit Data Peserta Ujian</li>
                        <li>Menghapus Data Peserta Ujian</li>
                    </ol>
                </dd>
                <dd>
                    Data Jenis Ujian Yang Terdapat Didalam Fitur Kelola Peserta Ujian Memiliki Berbagai Fungsi dan
                    Kegunaan
                    diantaranya :
                </dd>
                <ol>
                    <li>Menambah Data Jenis Ujian</li>
                    <li>Mencari Data Jenis Ujian</li>
                    <li>Menampilkan, Melihat Serta Memberikan Iformasi Mengenai Data Jenis Ujian</li>
                    <li>Mengedit Data Jenis Ujian</li>
                    <li>Menghapus Data Jenis Ujian</li>
                </ol>
            </dl>
            <dl>
                <dt> Hasil Ujian</dt>
                <dd>
                    Hasil Ujian Memiliki berbagai fungsi dan kegunaan diantaranya :
                    <ol>
                        <li>Memilih Data Mata Pelajaran</li>
                        <li>Melihat Data Hasil Ujian</li>
                        <li>Mencari Data Hasil Ujian </li>
                        <li>Menampilkan, Melihat Serta Memberikan Informasi Mengenai Data Hasil Ujian</li>
                        <li>Mencetak Data Hasil Ujian</li>
                    </ol>
                </dd>
            </dl>
            <dl>
                <dt> Utilities</dt>
                <dd>
                    Utilities Berisi Tentang berbagai Macam Fitur Database diantaranya :
                    <ol>
                        <li>Backup Database</li>
                        <li>Reset Database</li>
                        <li>Restore Database</li>
                    </ol>
                </dd>
            </dl>
            <dl>
                <dt> Ganti Password</dt>
                <dd>
                    Ganti Password Berisi Tentang 2 Kegunaan diantaranya :
                    <ol>
                        <li>Password Baru</li>
                        <li>Ulangi Password</li>
                    </ol>
                </dd>
            </dl>
        </div>

</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">

    $(function () {
        $('#data-tables').dataTable();
    });

    $('.alert-message').alert().delay(3000).slideUp('slow');

</script>


<?php
$this->load->view('admin/foot');
?>