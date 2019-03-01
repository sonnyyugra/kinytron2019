$('#evaluarAlumnos').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var workshop = button.data('whatever');
    var criterio= button.data('criterio');
    var c1 = "<p>Muy bueno: Toma atención al tutor, siguiendo las instrucciones e indicaciones que dicta el docente.</p>" +
        "<p>Regular: Presenta dificultad en tomar atención al tutor, aunque se esfuerza en seguir instrucciones e indicaciones que dicta el docente.</p>" +
    "<p>Deficiente: Se presenta distraído en realizar la actividad, por consecuencia no sigue instrucciones ni indicaciones que dicta el docente.</p>";
    var c2 = "<p>Muy bueno: Participa de la actividad mencionada, poniendo de su disposición e iniciativa.</p>" +
        "<p>Regular: Participa de la actividad mencionada, pero con pocas disposición e iniciativa. </p>" +
        "<p>Deficiente: No quiere participar de la actividad mencionada. </p>";
    var c3 = "<p>Muy bueno: Presenta conducta positiva y comunicación asertiva, con la disposición de compartir ideas y solucionar conflictos. </p>" +
        "<p>Regular: Tiene disposición en utilizar conductas positivas y comunicación asertiva.</p>" +
        "<p>Deficiente: No presenta interés de utilizar conductas positivas y en comunicación asertiva. </p>";;
    var c4 = "<p>Muy bueno: Finaliza a tiempo la actividad y lo comparte o ayuda a los demás compañeros(as)de su clase. </p>" +
        "<p>Regular: Finaliza la actividad, pero incompleta, aun así, lo comparte o ayuda a los demás compañeros(as)de su clase. </p>" +
        "<p>Deficiente: No finaliza o está incompleta la actividad, pero no comparte ni ayuda a los demás compañeros(as) .</p>";;
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

