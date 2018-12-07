$('#add-ingredient').click(function(){
    // Je récupère le numéro des futurs champs que je vais créer
    const index = +$('#widgets-counter').val();

    // Je récupère le prototype des entrées
    const tmpl = $('#recette_ingredients').data('prototype').replace(/__name__/g, index);

    // J'injecte ce code au sein de la div
    $('#recette_ingredients').append(tmpl);

    $('#widgets-counter').val(index + 1);

    //Je gère le bouton supprimer
    handleDeleteButtons();
});

function handleDeleteButtons() {
    $('button[data-action="delete"]').click(function(){
        const target = this.dataset.target
        $(target).remove();
    })
}

function updateCounter(){
    const count = +$('#recette_ingredients div.form-group').length;
    $('#widgets-counter').val(count);
}



$('#add-etape').click(function(){
    // Je récupère le numéro des futurs champs que je vais créer
    const index = +$('#widgets-counter2').val();

    // Je récupère le prototype des entrées
    const tmpl = $('#recette_etapes').data('prototype').replace(/__name__/g, index);

    // J'injecte ce code au sein de la div
    $('#recette_etapes').append(tmpl);

    $('#widgets-counter2').val(index + 1);

    //Je gère le bouton supprimer
    handleDeleteButtons2();
});

function handleDeleteButtons2() {
    $('button[data-action="delete"]').click(function(){
        const target = this.dataset.target
        $(target).remove();
    })
}

function updateCounter2(){
    const count = +$('#recette_etapes div.form-group').length;
    $('#widgets-counter2').val(count);
}

updateCounter();
handleDeleteButtons();
updateCounter2();
handleDeleteButtons2();