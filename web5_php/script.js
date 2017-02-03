<html>

<script>	
	$('.crearLista').on('click', function () {
    var self = $(this),
        lista = self.data().lista;
 
    $.post( 'resultado_busqueda.php', { lista: lista } )
        .done(function() {
            self.prev('p').remove();
            self.remove();
        });
});
</script>