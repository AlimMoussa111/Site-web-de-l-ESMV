  
  <!-- Main content -->
  <section class="content">
<br/> 
<div class="container-fluid">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Comptes d'utilisateurs</h3>
                <button style="float: right;" class="btn btn-success" onclick="add_user()" ><i class="fa fa-plus"></i> Ajouter</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                  </div>
                  <div class="row">
                    <div class="col-1"></div>
                    <div class="col-sm-10">
                      <div class="table-responsive">
                        <table id="users_table" class="table table-striped table-bordered" style="width:100%; font-size: 14px;">
                        <thead>
                            <th>Nom et prenom(s)</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Créer par</th>
                            <th>Activer/Desactiver</th>
                            <th width="50px">Modifier</th>
                            <th width="50px">Supprimer</th>
                          </thead>
                          <tbody>

                          </tbody>
                          <tfoot>
                            <th>Nom et prenom(s)</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Créer par</th>
                            <th>Activer/Desactiver</th>
                            <th width="50px">Modifier</th>
                            <th width="50px">Supprimer</th>
                          </tfoot>
                        </table>
                        </div>
                    </div>
                    <div class="col-1"></div>
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
                      <label class="control-label">Nom et prenom(s)*:</label>
                      <input type="text" name="nom" class="form-control">
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Email*:</label>
                      <input type="text" name="email" class="form-control">
                      <span class="help-block text-danger"></span>
                    </div>
                    <div class="psw_check">
                      <input type="checkbox" name="change_psw" onclick="psw_zone()" value="yes" /> Modifier le mot de passe</br></br></br>
                    </div>
                    <div id="password-zone">
                      <div class="form-group">
                        <label class="control-label">Mot de passe*:</label>
                        <input name="password" placeholder="Mot de passe*" class="form-control" type="password">
                        <span class="help-block text-danger"></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label">Confirmez le mot de passe:</label>
                        <input name="password_conf" placeholder="Confirmez le Mot de passe" class="form-control" type="password">
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
                url:"<?php echo base_url() . 'user/ajax_list'; ?>",  
                type:"POST",
           },  
           "columnDefs":[  
                {  
                  "targets":[0, 6, 6],  
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

});



function add_user()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('#password-zone').show(); // show password input by default
    $('.psw_check').hide();// hide checkbox for change password update
    $('#password-zone').before('<input class="test" type="hidden" name="change_psw" value="yes" />');//add change_psw variable
    $('.help-block').empty(); // clear error string
    $('label').removeClass('text-danger');//remove red color from label
    $('input, select').removeClass('is-invalid');
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Ajout d\'un utilisateur'); // Set Title to Bootstrap modal title

}

function edit_user(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.psw_check').show();//show change password for update
    $('.test').remove('');//remove change_psw variable
    $('input, select').removeClass('is-invalid');
    $('label').removeClass('text-danger');//remove red color from label
    $('#password-zone').hide(); // hide password input by default
    $('.form-group').removeClass('error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : base_url + "user/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id_utilisateur);
            $('[name="nom"]').val(data.nom);
            $('[name="email"]').val(data.email);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Modification d\'un utilisateur'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Erreur dans l\'appel ajax');
        }
    });
}


function save()
{
    $('#btnSave').text('enregistrement...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = base_url + "user/ajax_add/";
    } else {
        url = base_url + "user/ajax_update/";
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
                
                $('#modal_form').modal('hide');
                dataTable.ajax.reload();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class

                    if (data.inputerror[i] == 'photo')
                    {
                        $('[name="'+data.inputerror[i]+'"]').closest('.form-group').child('label').addClass('text-danger');
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                    }
                    else
                    {

                        $('[name="'+data.inputerror[i]+'"]').prev().addClass('text-danger');
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string

                    }
                }
            }
            $('#btnSave').text('Enregistrer'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Erreur d\'ajout / modification');
            $('#btnSave').text('Enregistrer'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}



function delete_user(id)
{
    var session_id = $('#session_id').attr('session_id');

    Swal.fire({
      title: 'Supprimer le compte',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui',
      cancelButtonText: 'Non'
  }).then((result) => {

    if (id == session_id) {
        Swal.fire(
          'Suppression',
          'Vous ne pouvez pas supprimer un compte ouvert.',
          'error'
          )
        return;
    }
    else
    {
        if (result.value) {
            $.ajax({
              url: base_url + 'user/ajax_delete/' + id,
              success: function(data){
                if(data == 'true')
                {
                  Swal.fire({
                    title: 'Suppression',
                    text: 'Suppression effectuée.',
                    icon: 'success',
                    timer: 2000
                });
              }
              if(data == 'false')
              {
                Swal.fire({
                    title: 'Suppression',
                    text: 'Vous ne pouvez pas supprimer un compte actif.',
                    icon: 'warning',
                    timer: 2000
                });
              }
              dataTable.ajax.reload();
            },
            error: function(){
              alert('erreur ajax');
          }
      });
        }
    }
})
}

// on or off user account
function unset_user(id)
{

   Swal.fire({
      title: 'Activation/Désactivation',
      text: 'Cette opération est irréversible.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui',
      cancelButtonText: 'Non'
  }).then((result) => {
      if (result.value) {
        $.ajax({
          url: base_url + 'user/ajax_unset/' + id,
          success: function(data){
            Swal.fire({
              title: 'Statut!',
              text: 'Compte Activé/Désactivé',
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

//show or hide password zone

function psw_zone()
{
    if($('[name="change_psw"]').is(':checked')){

        $('#password-zone').fadeIn(1500);
        $('#password-zone').val('yes'); 
    }else{
        $('#password-zone').fadeOut(1500); 
        $('#password-zone').val('no'); 
    }
    
}


</script>