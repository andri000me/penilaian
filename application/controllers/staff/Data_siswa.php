<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends MY_Controller {
/*------------------------------------------------------------------*/
public function __construct() {
parent::__construct();
if ( $this->session->userdata('hak_akses') != 2 ) {
    $this->session->set_flashdata('error', "<script> alert('Anda Bukan Guru'); </script>");
    redirect( 'login' );
}

/* End Construct ------------------------------------------------------------------*/ }
// Function / Method Index
public function index() {
/***
 | Data Session
 | -----------------
 | Account Name
 | Mete Title
 | Parameter
 | -----------------
***/
$data['myAccount'] = $this->session->userdata('nama_awal');
$data['nip']       = $this->session->userdata('nip');

/***
 | Get Data Siswa in Kelas
 | By nip wali kelas
 | Select in siswa_table where kelas is same
***/
$var_a = $this->a_model->getMyClass($data['nip']);
if ($var_a == false) {
    $this->session->set_flashdata("notif_result",
    "<script type='text/javascript'>
              $('.result').css('height', '100px').html('Oppss... <br/> Menu Ini Hanya Untuk <br/> Wali Kelas')
                  .fadeIn(1000)
                  .delay(2000)
                  .fadeOut(1000)
    </script>");
    redirect( 'staff/dashboard' );
} else {
    foreach ($var_a as $value) {
      $var_class = $value['id_kelas'];
    }
    // Data As Wali Kelas
    $ndata = $this->a_model->showMydataAsWaliKelas($data['nip']);
    $data['wali_kelas'] = $ndata[0];

    // Get Siswa By $var_class
    $data['siswa_in_class'] = $this->db->query(" 
      SELECT a.*
    , b.nama_kelas
    , c.nama_jurusan
    , e.nama_tahun_ajaran as angkatan
    , d.nip
    , d.nama_pengajar as wali_kelas
    FROM tabel_siswa as a
    left join kelas as b on a.id_kelas =  b.id_kelas
    left join jurusan as c on b.id_jurusan = c.id_jurusan
    left join tabel_pengajar as d on b.wali_kelas = d.nip
    left join tahun_ajaran as e on a.angkatan = e.id_thn_ajaran WHERE b.id_kelas = '$var_class' ") -> result_array();
}

 
/***
 | -----------------
 | Parse All Data To template
 | -----------------
**/
$this->load->view('private/staff/view_data_siswa_kelas', $data);
/* End Index ------------------------------------------------------------------*/ }


/* End of file Data_siswa.php */
/* END Controller ---------------------------------------------------------------------*/  }
/* Location: ./application/controllers/staff/Data_siswa.php */