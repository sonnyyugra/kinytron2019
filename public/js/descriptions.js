$('#evaluarAlumnos').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var workshop = button.data('whatever');
    var criterio= button.data('criterio');
    var c1 = "C1";
    var c2 = "C2";
    var c3 = "C3";
    var c4 = "C4";
    // insertar valor al formulario
    $(".modal-body #workshop").val( workshop );
    $(".modal-body #criterio").val( criterio );


    //swtich para ver que descripcion pertenece a cada modal
    switch(criterio) {
        case 1:
            document.getElementById('texto').innerHTML = c1;
            break;
        case 2:
            document.getElementById('texto').innerHTML = c2;
            break;
        case 3:
            document.getElementById('texto').innerHTML = c3;
            break;
        case 4:
            document.getElementById('texto').innerHTML = c4;
            break;
    }
})

