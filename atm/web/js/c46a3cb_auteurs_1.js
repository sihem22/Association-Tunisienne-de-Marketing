var $collectionHolder;

// setup an "add a speaker" link
var $addAuteurLink = $('<a href="#" class="add_auteur_link">Ajouter un Co-Auteur</a>');
var $newLinkLi = $('<li></li>').append($addAuteurLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of speakers
    $collectionHolder = $('ul.auteurs');

    // add a delete link to all of the existing speaker form li elements
    $collectionHolder.find('li').each(function() {
        addAuteurFormDeleteLink($(this));
    });

    // add the "add a speaker" anchor and li to the speakers ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addAuteurLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new speaker form (see next code block)
        addAuteurForm($collectionHolder, $newLinkLi);
    });
});



function addAuteurForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a speaker" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}



function addAuteurFormDeleteLink($auteurFormLi) {
    var $removeFormA = $('<a href="#">delete this speaker</a>');
    $auteurFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the speaker form
        $auteurFormLi.remove();
    });
}
