  
  <!-- Main content -->
  <section class="content">
<br/> 
<div class="container-fluid">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Concours d'entree a L'ESMV</h3>
                <button style="float: right;" class="btn btn-success" onclick="add_test()" ><i class="fa fa-plus"></i> Ajouter</button>
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
                            <th>Concours</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Arrete</th>
                            <th>Fiche d'inscription</th>
                            <th>Resultat</th>
                            <th>Créer par</th>
                            <th width="50px">Modifier</th>
                            <th width="50px">Supprimer</th>
                          </thead>
                          <tbody>

                          </tbody>
                          <tfoot>
                            <th>Concours</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Arrete</th>
                            <th>Fiche d'inscription</th>
                            <th>Resultat</th>
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
                      <label class="control-label">Concours *:</label>
                      <input type="text" name="titre" class="form-control">
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Description *:</label>
                      <textarea  name="description" class="form-control"></textarea>
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Date *:</label>
                      <input type='date' name="date" class="form-control">
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Arrete *:</label>
                      <input type='file' name="arrete" accept=".pdf" class="form-control">
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group row" id="vue_arrete">
                        <div class="col-md-9">
                        (Aucun fichier)
                        <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Fiche d'inscription *:</label>
                      <input type='file' name="fiche_inscription" accept=".pdf" class="form-control">
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group row" id="vue_inscription">
                        <div class="col-md-9">
                        (Aucun fichier)
                        <span class="help-block text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label"> Resultat :</label>
                      <input type='file' name="resultat" accept=".pdf" class="form-control">
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group row" id="vue_resultat">
                        <div class="col-md-9">
                        (Aucun fichier)
                        <span class="help-block text-danger"></span>
                        </div>
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
                url:"<?php echo base_url() . 'admin/ajax_list_test'; ?>",  
                type:"POST",
           },  
           "columnDefs":[  
                {  
                  "targets":[0, 8, 8],  
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



function add_test()
{
    save_method = 'add';
    $('#form')[0].reset(); //  $('.help-block').empty(); // clear error string
    $('label').removeClass('text-danger');//remove red color from label
    $('input, select,textarea').removeClass('is-invalid');
    $('#vue_arrete').hide(); // hide photo preview modal
    $('#vue_inscription').hide(); // hide photo preview modal
    $('#vue_resultat').hide(); // hide photo preview modal
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Planification d\'un concours'); // Set Title to Bootstrap modal title

}

function edit_test(id)
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
        url : base_url + "admin/ajax_edit_test/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="titre"]').val(data.titre);
            $('[name="description"]').val(data.description);
            $('[name="date"]').val(data.date);
            if(data.arrete)
            {
              $('#vue_arrete').show(); 
              $('#vue_arrete div').html('<a href="'+base_url+'upload/'+data.arrete+'" class="text-success text-bold"><i class="fas fa-file-pdf"></i> Arrete du concours</a>'); // show photo
              $('#vue_arrete div').append('<p class="text-danger text-bold"><input type="checkbox" name="delete_arrete" value="'+data.arrete+'"/> Supprimer le fichier</p>'); // remove photo

            }
            else
            {
              $('#vue_arrete div').html(''); // show photo
            }
            if(data.fiche_inscription)
            {
              $('#vue_inscription').show(); 
              $('#vue_inscription div').html('<a href="'+base_url+'upload/'+data.fiche_inscription+'" class="text-bold text-success"><i class="fas fa-file-pdf"></i> Fiche d\'inscription</a>'); // show photo
              $('#vue_inscription div').append('<p class="text-danger text-bold"><input type="checkbox"  name="delete_fiche" value="'+data.fiche_inscription+'"/> Supprimer le fichier</p>'); // remove photo

            }
            else
            {
              $('#vue_inscription div').html(''); // show photo
            }
            if(data.resultat)
            {
              $('#vue_resultat').show(); 
              $('#vue_resultat div').html('<a href="'+base_url+'upload/'+data.resultat+'" class="text-bold text-success"><i class="fas fa-file-pdf"></i> Resultat du concours</a>'); // show photo
              $('#vue_resultat div').append('<p class="text-danger text-bold"><input type="checkbox"  name="delete_resultat" value="'+data.resultat+'"/> Supprimer le fichier</p>'); // remove photo

            }
            else
            {
              $('#vue_resultat div').html(''); // show photo
            }
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Modification de concours'); // Set title to Bootstrap modal title

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
        url = base_url + "admin/ajax_add_test/";
    } else {
        url = base_url + "admin/ajax_update_test/";
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
                    if (data.inputerror[i] == 'arrete')
                    {
                      $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
                      $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                    if (data.inputerror[i] == 'fiche_inscription')
                    {
                      $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
                      $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                    if (data.inputerror[i] == 'resultat')
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



function delete_test(id)
{

   Swal.fire({
      title: 'Suppression',
      text: 'Supprimer ce projet ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui',
      cancelButtonText: 'Non'
  }).then((result) => {
      if (result.value) {
        $.ajax({
          url: base_url + 'admin/ajax_delete_test/' + id,
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