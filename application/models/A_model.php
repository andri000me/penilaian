<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_model extends CI_Model {

  // ------------------------------------------------------------
  // Create / Insert Data
  function QueryInsert ($tabelname, $data) {
    $query = $this -> db -> insert ($tabelname, $data);
    return $query;
  }

  // ------------------------------------------------------------
  // Update Data
  function QueryUpdate ($tabelname, $data, $where) {

    $query = $this -> db -> update ($tabelname, $data, $where);
    return $query;
  }


  // ------------------------------------------------------------
  // Delete Data
  function QueryDelete ($tabelname, $where) {

    $query = $this -> db-> delete ($tabelname, $where);
    return $query;
  }

  // ------------------------------------------------------------
  // Query Get Users
  function getUsers() {
    $query = $this -> db -> get ('users');
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Query Get By Users
  function get_by_Users($param) {
    $query = $this -> db -> where ('id_user', $param)
                         -> limit (1)
                         -> get   ('users');
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Query Get Pengajar
  function getPengajar() {
    $query = $this -> db -> get ('tabel_pengajar');
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Query Get Jabatan
  function getJabatan() {
    $query = $this -> db -> get ('jabatan');
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Query Get ByStaff
  function getByStaff($param) {
    $query = $this -> db -> select ('*')
                         -> from ('tabel_pengajar')
                         -> join ('jabatan', 'tabel_pengajar.id_jabatan = jabatan.id_jabatan', 'left')
                         -> join ('mata_pelajaran', 'tabel_pengajar.guru_bid_studi = mata_pelajaran.kode_mapel', 'left')
                         -> where ('nip', $param)
                         -> limit (1)
                         -> get   ();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Query Get Jabatan sebagai WaliKelas
  function getByWaliKelas() {
    $n = 6; // Ini Nama Jabatan
    $query = $this -> db -> where ('id_jabatan', $n)
                         -> get   ('tabel_pengajar');
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Query Get Siswa
  function getSiswa() {
    $query = $this->db->select ('*')
                      ->from   ('tabel_siswa')
                      ->join   ('kelas', 'tabel_siswa.id_kelas = kelas.id_kelas', 'left')
                      ->join   ('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan', 'left')
                      ->join   ('tahun_ajaran', 'tabel_siswa.id_thn_ajaran = tahun_ajaran.id_thn_ajaran', 'left')
                      ->join   ('users', 'users.id_user = tabel_siswa.id_user', 'left')
                      ->order_by ('nama_siswa', 'ASC')
                      ->get    ();
    return $query -> result_array();

  }

  // ------------------------------------------------------------
  // Query Get BySiswa
  function getBySiswa($param) {
    $query = $this -> db -> select ('*')
                         -> from ('tabel_siswa')
                         -> join ('kelas', 'tabel_siswa.id_kelas = kelas.id_kelas', 'left')
                         -> join   ('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan', 'left')
                         -> join   ('tahun_ajaran', 'tabel_siswa.id_thn_ajaran = tahun_ajaran.id_thn_ajaran', 'left')
                         -> where ('nis', $param)
                         -> limit (1)
                         -> get   ();                       
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Get Kelas
  function getKelas($nip = NULL) {
    // $query = $this->db->query('SELECT * FROM `kelas` ORDER BY `kelas`.`nama_kelas` ASC');
    // return $query->result_array();
      $query = $this->db->select ('*')
                      ->from   ('kelas')
                      ->join   ('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan', 'left')
                      ->join   ('tabel_pengajar', 'kelas.wali_kelas = tabel_pengajar.nip', 'left')
                      ->where ('kelas.wali_kelas', $nip)
                      ->order_by ('nama_jurusan', 'ASC')                      
                      ->get    ();
    return $query -> result_array();
  }

    function getKelasAll() {
    // $query = $this->db->query('SELECT * FROM `kelas` ORDER BY `kelas`.`nama_kelas` ASC');
    // return $query->result_array();
      $query = $this->db->select ('*')
                      ->from   ('kelas')
                      ->join   ('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan', 'left')
                      ->join   ('tabel_pengajar', 'kelas.wali_kelas = tabel_pengajar.nip', 'left')
                      ->order_by ('nama_jurusan', 'ASC')                      
                      ->get    ();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Get Kelas
  // function getMyClass($nip) {
  //   $query = $this->db->query("SELECT * FROM `kelas` WHERE wali_kelas = '$nip' ORDER BY `kelas`.`nama_kelas` ASC");
  //   return $query->result_array();
  // }

  function getMyClass($nip) {
       $query = $this->db->select ('*')
                      ->from   ('tabel_siswa')
                      ->join   ('kelas', 'tabel_siswa.id_kelas = kelas.id_kelas', 'left')
                      ->join ('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan', 'left')
                      ->join ('tabel_pengajar', 'kelas.wali_kelas = tabel_pengajar.nip', 'left')
                      ->join ('tahun_ajaran', 'tabel_siswa.id_thn_ajaran = tahun_ajaran.id_thn_ajaran')
                      ->where ('nip', $nip)
                      ->order_by ('nama_jurusan', 'ASC')
                      ->get    ();
       return $query -> result_array();
  }

  // ------------------------------------------------------------
  function getTabPengajar_join_kelas() {
    // Get Join Tabel Pengajar with tabel kelas

     $query = $this->db->select ('*')
                      ->from   ('kelas')
                      ->join   ('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan', 'left')
                      ->join   ('tabel_pengajar', 'kelas.wali_kelas = tabel_pengajar.nip', 'left')
                      // ->join   ('jabatan', 'tabel_pengajar.id_jabatan = jabatan.id_jabatan', 'left')
                      // ->where  ('id_jabatan', 6)
                      // ->order_by ('nama_jurusan', 'ASC')
                      ->get    ();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  function showMydataAsWaliKelas($nip) {
    // Get Join Tabel Pengajar with tabel kelas
    $query = $this->db->select ('*')
                      ->from   ('tabel_siswa')
                      ->join   ('kelas', 'tabel_siswa.id_kelas = kelas.id_kelas', 'left')
                      ->join   ('tabel_pengajar', 'kelas.wali_kelas = tabel_pengajar.nip')
                      ->join   ('jabatan', 'tabel_pengajar.id_jabatan = jabatan.id_jabatan', 'left')
                      ->where  ('nip', $nip)
                      ->get    ();
    return $query -> result_array();
  }



  // ------------------------------------------------------------
  // Get Nama Wali Kelas
  function getNama_Wali_Kelas($kelas) {
    $query = $this -> db  -> select ('*')
                          -> from   ('kelas')
                          -> join   ('tabel_pengajar', 'kelas.wali_kelas = tabel_pengajar.nip', 'left')
                          -> join   ('jurusan', 'jurusan.id_jurusan = kelas.id_jurusan', 'left')
                          -> where ('id_kelas', $kelas)
                          -> get   ();
    return $query -> result_array();
  }



  // ------------------------------------------------------------
  // Get Jurusan
  function getJurusan() {
    $query = $this->db->query(" SELECT * FROM `jurusan` ORDER BY `jurusan`.`nama_jurusan` ASC, `jurusan`.`group_jurusan` ASC ");
    return $query->result_array();
  }


  // ------------------------------------------------------------
  // Get Mapel
  function getMapel() {
    $query = $this->db->query('SELECT * FROM `mata_pelajaran` ORDER BY `mata_pelajaran`.`kode_mapel` ASC');
    return $query->result_array();
  }

  // ------------------------------------------------------------
  // Get Mapel by Guru Pengajar
  function getMapel_by_guru($nip = NULL) {

    $query = $this->db->select('*')
                      ->from('tabel_pengajar')
                      ->join('mata_pelajaran', 'mata_pelajaran.kode_mapel = tabel_pengajar.guru_bid_studi', 'left')
                      ->where('tabel_pengajar.nip', $nip)
                      ->get();

    return $query->result_array();
  }

  // ------------------------------------------------------------
  // Get Jadwal Mengajar
  function getJamMengajar() {
    $query = $this->db->query('SELECT * FROM `jam_mengajar` ORDER BY `jam_mengajar`.`jam_mengajar` ASC');
    return $query->result_array();
  }

  // ------------------------------------------------------------
  // Get Tahun Ajaran
  function getTahunAjaran() {
    $query = $this->db->query('SELECT * FROM `tahun_ajaran` ORDER BY `tahun_ajaran`.`nama_tahun_ajaran` ASC');
    return $query->result_array();
  }


  // ------------------------------------------------------------
  // Query Get Filter By Kelas dan Jurusan Data Siswa
  function getFilterSiswa($kelas) {

    $query = $this->db->select('*')
                      ->from('tabel_siswa')
                      ->where('tabel_siswa.kelas', $kelas)
                      ->get();
    return $query -> result_array();

  }

  // ------------------------------------------------------------
  function getNilai_to_pengajar($kelas = NULL, $mapel = NULL, $tahun_ajaran = NULL, $semester = NULL) {

    $query = $this->db->select('*')
                      ->from('tabel_siswa')
                      ->join('tabel_nilai', 'tabel_nilai.nis = tabel_siswa.nis', 'left')
                      ->where('tabel_siswa.kelas', $kelas)
                      ->where('tabel_nilai.mata_pelajaran', $mapel)
                      ->where('tabel_nilai.tahun_ajaran', $tahun_ajaran)
                      ->where('tabel_nilai.semester', $semester)
                      ->get();
    return $query -> result_array();

  }

  // ------------------------------------------------------------
  function getNilai_to_siswa($nis, $s_ta, $semester) {
    $query = $this->db->select('*')
                      ->from('tabel_nilai')
                      ->where('nis', $nis)
                      ->where('tahun_ajaran', $s_ta)
                      ->where('semester', $semester)
                      ->get();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  function getNilaiToEval($nis, $semester) {
    $query = $this->db->select('*')
                      ->from('tabel_nilai')
                      ->where('nis', $nis)
                      ->where('semester', $semester)
                      ->get();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  function getUsers_join_siswa() {
    $query = $this->db->select('*')
                      ->from('tabel_siswa')
                      ->join('users', 'users.id_user = tabel_siswa.id_user', 'left')
                      ->get();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  function getUsers_join_staff() {
    $query = $this->db->select('*')
                      ->from('tabel_pengajar')
                      ->join('jabatan', 'tabel_pengajar.id_jabatan = jabatan.id_jabatan', 'left')
                      ->join('mata_pelajaran', 'tabel_pengajar.guru_bid_studi = mata_pelajaran.kode_mapel', 'left')
                      ->join('users', 'users.id_user = tabel_pengajar.id_user', 'left')
                      ->get();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  function getNilai_join_tabPengajar($nis = NULL , $s_ta = NULL , $semester = NULL ) {
    $query = $this->db->select('*')
                      ->from('tabel_nilai')
                      ->join('tabel_pengajar', 'tabel_pengajar.nip = tabel_nilai.nip', 'left')
                      ->join('mata_pelajaran', 'tabel_nilai.mata_pelajaran = mata_pelajaran.kode_mapel')
                      ->where('tabel_nilai.nis', $nis)
                      ->where('tabel_nilai.tahun_ajaran', $s_ta)
                      ->where('tabel_nilai.semester', $semester)
                      ->get();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  function joinKelas_tabSiswa_tabPengajar($filter_tahun_ajaran = NULL) {
    // Report Data Siswa
    $query = $this->db->select('*')
                      ->from('kelas')
                      ->join('tabel_siswa', 'tabel_siswa.id_kelas = kelas.id_kelas', 'left')
                      ->join('tabel_pengajar', 'tabel_pengajar.nip = kelas.wali_kelas', 'left')
                      ->join('tahun_ajaran', 'tabel_siswa.id_thn_ajaran = tahun_ajaran.id_thn_ajaran', 'left')
                      ->join('jurusan', 'kelas.id_jurusan = jurusan.id_jurusan', 'left')
                      ->where('tabel_pengajar.id_jabatan', 6)
                      ->where('tabel_siswa.id_thn_ajaran', $filter_tahun_ajaran)
                      ->get();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Report Nilai Data Siswa #NIS and #tahun_ajaran
  function getNilai_for_report($nis, $tahun_ajaran) {
    $query = $this->db->select('*')
                      ->from('tabel_nilai')
                      ->where('nis', $nis)
                      ->where('tahun_ajaran', $tahun_ajaran)
                      ->get();
    return $query -> result_array();
  }
  // ------------------------------------------------------------
  // Get Data Jadwal Global
  function getJadwalGlobal($IDKelas, $tahun_ajaran, $semester) {
    $query = $this->db->select('*')
                      ->from('jadwal_global')
                      ->where('id_kelas', $IDKelas)
                      ->where('semester', $semester)
                      ->where('tahun_ajaran', $tahun_ajaran)
                      ->get();
    return $query -> result_array();
  }


  // ------------------------------------------------------------
  // Jadwal weekly join jadwal_global
  function getJadwalWeekly($global_ID_Key) {
    $query = $this->db->select('*')
                      ->from('jadwal_weekly')
                      ->join('jadwal_global', 'jadwal_global.id_key = jadwal_weekly.id_key', 'left')
                      ->where('jadwal_weekly.id_key', $global_ID_Key)
                      ->get();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Query Get By Kelas
  function getKelas10() {
    $query = $this->db->select('*')
                      ->from('kelas')
                      ->where('nama_kelas', '10')
                      ->get();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Query Get By Kelas
  function getKelas11() {
    $query = $this->db->select('*')
                      ->from('kelas')
                      ->where('nama_kelas', '11')
                      ->get();
    return $query -> result_array();
  }

  // ------------------------------------------------------------
  // Query Get By Kelas
  function getKelas12() {
    $query = $this->db->select('*')
                      ->from('kelas')
                      ->where('nama_kelas', '12')
                      ->get();
    return $query -> result_array();
  }

// ---------------------- END----------------------------
/* End of file a_model.php */
/* Location: ./application/models/a_model.php */
}

