function deleteRegister(id,route){
    Swal.fire({
        title: 'Deseja excluir o registro ?',
        showDenyButton: true,
        confirmButtonText: '<i class="fas fa-trash-alt"></i> Excluir',
        denyButtonText: 'Cancelar',
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: route,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    if(response.status == 0)
                    {
                        $("#button_del_"+id).addClass("disabled");
                        $("#status_active_"+id).addClass("sr-only");
                        $("#status_inactive_"+id).removeClass("sr-only");

                        Swal.fire({
                            icon:  'success',
                            title: 'Status alterado.',
                        })
                    }



                }
            })
    } else if (result.isDenied) {
        Swal.fire('Operação cancelada pelo usuário', '', 'info')
    }
    })
}
