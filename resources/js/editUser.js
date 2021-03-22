$(document).ready(function() 
{
    if ($('#abrirmodalEditar'))
    {
       $('#abrirmodalEditar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id_user = button.data('id')
        var name = button.data('name')
        var phone = button.data('phone')
        var birthdate = button.data('birthdate')
        var country = button.data('country')
        var state = button.data('state')
        var city = button.data('city')
        
        
        /* var descripcion_modal_editar = button.data('descripcion')
         */
        var modal = $(this)
       
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #id_user').val(id_user);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #phone').val(phone);
        modal.find('.modal-body #birthdate').val(birthdate);
        modal.find('.modal-body #id_user').val(id_user);
        modal.find('.modal-body #country_id').val(country);
        modal.find('.modal-body #state_id').val(state);
        modal.find('.modal-body #city_id').val(city);
        
         
         })
    }    
})