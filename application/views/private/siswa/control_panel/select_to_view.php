<!-- Start header -->
<?php $this->load->view('_templates/private/siswa/head'); ?>
<!-- End header -->


<!-- Start Sections -->

<?php echo form_open('siswa/data_nilai/nilai_siswa'); ?>
<div class="container">
  <div class="col-md-12">
    <legend>Pilih Data Yang ingin Dilihat</legend> 
    <form>
      <div class="form-group col-md-4">    
        <select class="form-control" name="tahun_ajaran" required="required">
        <option value="">--Pilih Tahun Ajaran--</option>
          <?php foreach ($tahun_ajaran as $ta): ?>
            <option value="<?php echo $ta['id_thn_ajaran']; ?>"><?php echo $ta['nama_tahun_ajaran']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>


      <div class="form-group col-md-4">    
        <select class="form-control" name="semester" required="required">
          <option value="">--Pilih Semester--</option>
          <option value="I">I (Pertama)</option>
          <option value="II">II (Kedua)</option>
        </select>
      </div>  
     </form>

     <button type="submit" class="btn btn-primary" style="margin-bottom: 20px;">Submit</button>
   </div>
</div>
<?php echo form_close(); ?>
<!-- Data Tables -->



<!-- End Sections -->


<!-- Start Footer -->
<?php $this->load->view('_templates/private/siswa/footer'); ?>
<!-- End Footer