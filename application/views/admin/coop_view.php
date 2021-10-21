  
  <!-- Main content -->
  <section class="content">
<br/> 
<div class="container-fluid">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Les cooperations de l'ESMV</h3>
                <button style="float: right;" class="btn btn-success" onclick="add_formation()" ><i class="fa fa-plus"></i> Ajouter</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="table-responsive">
                        <table id="users_table" class="table table-striped table-bordered" style="width:100%; font-size: 14px;">
                        <thead>
                            <th>Cooperation</th>
                            <th>Description</th>
                            <th>Date de creation</th>
                            <th>Créer par</th>
                            <th width="50px">Modifier</th>
                            <th width="50px">Supprimer</th>
                          </thead>
                          <tbody>

                          </tbody>
                          <tfoot>
                            <th>Cooperation</th>
                            <th>Description</th>
                            <th>Date de creation</th>
                            <th>Créer par</th>
                            <th width="50px">Modifier</th>
                            <th width="50px">Supprimer</th>
                          </tfoot>
                        </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    <!-- /.content -->

      
   

      <!-- The Modal -->
      <div class="modal fade" id="modal_form">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Formulaire</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body form">
                  <form id="form" action="#">
                    <input type="hidden" value="" name="id">
                    <div class="form-group">
                      <label class="control-label">Organe *:</label>
                      <input type="text" name="titre" class="form-control">
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Description *:</label>
                      <textarea  name="description" class="form-control"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Date de creation *:</label>
                      <input type='date' name="date" class="form-control">
                      <span class="help-block text-danger"></span>
                    </div>
                  </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                  <button type="button" id="btnSave" onclick="save()" class="btn btn-success">Enregistrer</button>
                </div>

              </div>
            </div>
          </div>
     



<script>
var save_method; //ajout ou mise a jour
var dataTable;
var base_url ="<?php echo base_url(); ?>";
$(document).ready(function() {

  
    //datatables
    dataTable = $('#users_table').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/ajax_list_cooperation'; ?>",  
                type:"POST",
           },  
           "columnDefs":[  
                {  
                  "targets":[0, 5, 5],  
                     "orderable":false,  
                },  
           ],  
      });  

     

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).removeClass('is-invalid');
        $(this).prev().removeClass('text-danger');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).removeClass('is-invalid');
        $(this).prev().removeClass('text-danger');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).removeClass('is-invalid');
        $(this).prev().removeClass('text-danger');
        $(this).next().empty();
    });

});



function add_formation()
{
    save_method = 'add';
    $('#form')[0].reset(); //  $('.help-block').empty(); // clear error string
    $('label').removeClass('text-danger');//remove red color from label
    $('input, select,textarea').removeClass('is-invalid');
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Ajout d\'un cooperation'); // Set Title to Bootstrap modal title

}

function edit_cooperation(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.test').remove('');//remove change_psw variable
    $('input, select,textarea').removeClass('is-invalid');
    $('label').removeClass('text-danger');//remove red color from label
    $('.form-group').removeClass('error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : base_url + "admin/ajax_edit_cooperation/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="titre"]').val(data.titre);
            $('[name="description"]').val(data.description);
            $('[name="date"]').val(data.date);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Modification d\'une cooperation'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Erreur dans l\'appel ajax');
        }
    });
}


function save()
{
    $('#btnSave').text('Enregistrement...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = base_url + "admin/ajax_add_cooperation/";
    } else {
        url = base_url + "admin/ajax_update_cooperation/";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                swal.fire({
                    title: 'Enregistrement',
                    text: 'Effectué',
                    icon: 'success',
                    timer: 2000
                });
                
                $('#form')[0].reset();
                $('#modal_form').modal('hide');
                dataTable.ajax.reload(); 
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                    if (data.inputerror[i] == 'fiche_prospection')
                    {
                      $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
                      $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
            }
            $('#btnSave').text('Enregistrer'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
    });
    
}



function delete_formation(id)
{

   Swal.fire({
      title: 'Suppression',
      text: 'Supprimer la cooperation ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui',
      cancelButtonText: 'Non'
  }).then((result) => {
      if (result.value) {
        $.ajax({
          url: base_url + 'admin/ajax_delete_cooperation/' + id,
          success: function(data){
            Swal.fire({
                title: 'Suppression',
                text: 'Suppression effectuée.',
                icon: 'success',
                timer: 2000
          });
          dataTable.ajax.reload();
        },
        error: function(){
          alert('erreur ajax');
      }
  });
    } 
});
}




</script>