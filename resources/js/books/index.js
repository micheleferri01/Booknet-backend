// Recupero l'elemento con id search
const search = document.getElementById('search');

// aggiungo un controllore di eventi che si attiva ogni volta che un tasto viene rilasciato
search.addEventListener('keyup', function () {

    // Faccio una richiesta http al server
    fetch(`/books?search=${this.value}`, {
        headers: {
            // questo header permette a laravel di capire che la richiesta viene effettuata da un file Javascript e non da un click
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    // Trasforma la risposta in un testo
    .then(response => response.text())
    // Sostituisce il contenuto del div con l'id indicato
    .then(html => {
        document.getElementById('books-list').innerHTML = html;
    });

});