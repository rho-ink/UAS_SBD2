  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Kepegawaian
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Manajemen Kepegawaian</a></li>
        <li class="active">Add Staff</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif;?>

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Pegawai</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Staff/insert');?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="txtname" class="form-control" placeholder="Nama Lengkap">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Departemen</label>
                    <select class="form-control" name="slcdepartment">
                      <option value="">Pilih</option>
                      <?php
                      if(isset($department))
                      {
                        foreach($department as $cnt)
                        {
                          print "<option value='".$cnt['id']."'>".$cnt['department_name']."</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kelamin</label>
                    <select class="form-control" name="slcgender">
                      <option value="">Pilih</option>
                      <option value="Male">Laki-laki</option>
                      <option value="Female">Perempuan</option>
                      <option value="Others">Lainnya</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="txtemail" class="form-control" placeholder="Email">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="txtmobile" class="form-control" placeholder="Telepon">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="filephoto" class="form-control">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="txtdob" class="form-control" placeholder="DOB">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal masuk</label>
                    <input type="date" name="txtdoj" class="form-control" placeholder="DOJ">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kota</label>
                    <input type="text" name="txtcity" class="form-control" placeholder="Kota">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Provinsi</label>
                    <input type="text" name="txtstate" class="form-control" placeholder="Provinsi">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Negara</label>
                    <select class="form-control" name="slccountry">
                      <option value="">Pilih</option>
                      <?php
                        if(isset($country))
                        {
                          foreach ($country as $cnt1)
                          {
                            print "<option value='".$cnt1['country_name']."'>".$cnt1['country_name']."</option>";
                          }
                        }
                      ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="txtaddress"></textarea>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
