<?php $this->load->view('admin/header');?>
  <div class="breadcrumbs">
  <div class="row-fluid clearfix">
  <i class="fa fa-home"></i> Partner CMS
  </div>
  </div>


  <div class="manage">
    <div class="row-fluid clearfix">
    <?php     
          if(isset($error)) { ?> 
           <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Oh! </strong><?php echo $error;?>.
          </div>
          <?php }?>     
          <?php 
           $success=$this->session->flashdata('success');                 
            if($success)  { ?> 
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success! </strong> <?php echo $success;?>.
          </div><?php }?>  
          <?php  $error=$this->session->flashdata('error');                   
            if($error)  { ?> 
           <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Oh! </strong><?php echo $error;?>.
          </div>
          <?php }?> 
       <?php 
          if($action== "add") $title ="Add Partner CMS" ;
          else if($action== "edit") $title ="Edit Partner CMS" ;
          else if($action== "view_single" || $action== "view") $title ="View Partner CMS";
        ?>
      <div class="col-md-12">
      <div class="table-responsive">
      <div class="cls_box">
      <h4><?php echo $title;?></h4>
      <br><br>
      <!-- view -->
<?php if($action== "view"){?>
      <table id="example" class="display table table-hover table-bordered" 
      cellspacing="0">
            <thead>
              <tr class="top-tr">
                <th>S.No.</th>  
                                            <th>Image</th>
                      <th>Content</th>
                      <th>Action</th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                             
                                        <?php
                      $i=0;
                foreach($users as $row)
                 {    
                  $i++;
                ?>
                <tr>
                <td><?php echo $i; ?> </td>
                <td><img src="<?php echo base_url(); ?>uploads/<?php echo $row->image; ?>" width="100px" height="100px" ></td>
                <td><?php echo $row->image_content; ?> </td>
                <?php
                echo "<td>";
        $value=array('class'=>'edit');
        echo anchor('admin/partner/edit/'.$row->id,'<i class="fa fa-pencil" title="edit"></i>',$value).'&nbsp;';
        
        //$value=array('class'=>'delete','onclick'=>'return delcon();');
        //echo anchor('admin/privacy/delete/'.$row->id,'<i class="fa fa-times" title="delete"></i>',$value);
          echo "</td>";
          echo "</tr>";
          }
          ?>
                        
                                
                            </tbody>
        </table>
        <?php
      }
      ?>
    <?php if($action== "edit"){?>
 <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
                    <?php echo form_open_multipart('admin/partner/update/'.$id); ?>
          <span class="error"><?php echo validation_errors();?></span>
                        <div class="form-group">
                            <label><font color="#CC0000">*</font>Title</label>
                            <input class="form-control" required name="title" value="<?php if(isset($title)){echo $title; }?>" type="text" >
              
              <!--input type="hidden" name="id" value="<?php echo $id;?>"/>-->
                        </div>
                        <div class="form-group">
                            <label><font color="#CC0000">*</font>Content</label>
                            <textarea class="form-control" id="privacy_content" required name="content"  ><?php if(isset($right_content)){
              echo $right_content; }
              ?></textarea>
              
                            </div>
                               <div class="form-group">
                            <label><font color="#CC0000">*</font>Image Content</label>
                            <textarea class="form-control" id="image_content" required name="image_content"  ><?php if(isset($image_content)){
              echo $image_content; }
              ?></textarea>
              
                            </div>
              <div class="form-group">
                            <label><font color="#CC0000"> </font>Image</label>
                            <input   name="image" type="file" value=""onChange="showimagepreview(this)" />   
               <div class="controls">
                  <!--<input type="text" name="hidimage" value="<?php echo $image; ?>" >-->
              <img src="<?php echo base_url(); ?>uploads/<?php echo $image; ?>" class="img_profile" width="150px" height="150px"><img class="img_profile_loading" src="<?php echo base_url(); ?>assets/img/loading.gif" style="position:absolute; top:40px; left:0;left: 60px; height: 30px;display: none; " />
                  </div>
                            </div>                  
          
            
                        <button type="submit"  name="add_service" class="btn btn-success">Save Changes</button>
                    <?php echo form_close(); ?>
                    <br>
                    <br>
                </div>
                <!-- /.col-lg-6 (nested) -->
               
                <!-- /.col-lg-6 (nested) -->
            </div>
            </div>
            <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
      <?php
      }
      ?>
       <?php if($action== "add"){?>
             <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12"><div class="col-lg-1"></div>
                        <div class="col-lg-6">
                    <div class="row">
            <?php $attributes=array('class'=>'form form-horizontal','id'=>'addservice');
                         echo  form_open_multipart('admin/privacy/add',$attributes); ?>   
            <span class="error"><?php echo validation_errors();?></span>
                    <div class="form-group">
                                    <label><font color="#CC0000">*</font>Title</label>
                                    <!--<input class="form-control validate[required]" required name="title" id="title" value="<?php //if(isset($title)){echo $title; }?> " >-->
                  <input class="form-control" required name="title" value="<?php if(isset($title)){echo $title; }?>" type="text" >
                  
                  </div>
                                <div class="form-group">
                                    <label><font color="#CC0000">*</font>Content</label>
                                    <textarea class="form-control " required name="content" id="content" type="text" ><?php if(isset($content)){ echo $content; } ?></textarea>
                  
                  </div>
                  <div class="form-group">
                                    <label><font color="#CC0000"> </font>Image</label>
                                    <input name="image" type="file" value="" onChange="showimagepreview(this)" />   
                      <?php echo form_error('image');  ?>
                      <!----><div class="controls">
                       <input type="hidden" name="hidimage" value="default.jpeg" >
                  <img src="<?php echo base_url(); ?>uploads/default.jpeg" class="img_profile" width="150px" height="150px">    <img class="img_profile_loading" src="<?php echo base_url(); ?>assets/img/loading.gif" style="position:absolute; top:40px; left:0;left: 60px; height: 30px;display: none; " />
                      </div>
                                    </div>
                  
                 <button type="submit" name="add_service" class="btn btn-success" value="Add Services">Add Partner CMS</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                       
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                        <!-- /.panel-body -->
            <?php
            }
            ?>
      </div>
     </div>
    </div>
  </div>
<?php $this->load->view('admin/footer');?>
    <script type="text/javascript" src="<?php echo base_url().'js/ckeditor/ckeditor.js'?>"></script>

     <script>
function delcon()
{
var del=confirm("Are you sure want to delete");
if(del)
{
return true;
}
else
{
return false;
}
}
</script>
<script>
$(document).ready(function(){
  $("#addservice").validationEngine();
  });
function showimagepreview(input) {
//alert('ss');
$("#img_profile img").css({"opacity":"0.3"});
$(".img_profile_loading").css("display","");
if (input.files && input.files[0]) {
var filerdr = new FileReader();
filerdr.onload = function(e) {
$(".img_profile_loading").css("display","none");
$('.img_profile').attr('src', e.target.result);
}
filerdr.readAsDataURL(input.files[0]);
}
}

$('INPUT[type="file"]').change(function () {
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
      
        case 'jpeg':
        case 'jpg':
        case 'png':
    
    case 'gif':
        case 'tiff':
        case 'bmp':
        $('.img_profile').show();
            $('#uploadButton').attr('disabled', false);
            break;
        default:
        $('#uploadButton').attr('disabled', true);
            alert('This is not an allowed file type.');
        $('.img_profile').hide();
            this.value = '';
    }
});

</script>

 <script src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
<script type="text/javascript">
CKEDITOR.replace('privacy_content' ,
{    
                      
filebrowserBrowseUrl : '<?php echo base_url()?>js/ckfinder/ckfinder.html',
filebrowserImageBrowseUrl : '<?php echo base_url()?>js/ckfinder/ckfinder.html?type=Images',
filebrowserFlashBrowseUrl : '<?php echo base_url()?>js/ckfinder/ckfinder.html?type=Flash',
filebrowserUploadUrl : '<?php echo base_url()?>js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?php echo base_url()?>js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=userfiles/',
filebrowserFlashUploadUrl : '<?php echo base_url()?>js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>    
<!-- jQuery Version 1.11.0 -->
