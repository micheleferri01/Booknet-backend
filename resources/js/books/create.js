import TomSelect from 'tom-select';

new TomSelect('#author_id', {
    create: false,
    maxItems: 1,
    placeholder: 'Seleziona un autore',
    allowEmptyOption: false,
});


new TomSelect('#editor_id', {
    create: false,
    maxItems: 1,
    placeholder: 'Seleziona una casa editrice',
    allowEmptyOption: false,
});

new TomSelect('#genres', {
    create: false,
    placeholder: 'Seleziona generi',
    allowEmptyOption: false,
    maxItems: 5
});