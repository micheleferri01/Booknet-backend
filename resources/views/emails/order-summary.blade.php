<!DOCTYPE html>
<html>
<head>
    <title>Conferma ordine</title>
</head>

<body>

<h1>Grazie per il tuo ordine {{ $order->name }}</h1>

<p>
    Abbiamo ricevuto il tuo ordine correttamente.
</p>

<p style="text-decoration: underline; font-size: 20px; color: blue;">
    Potrai venire a ritirare i tuoi articoli presso la nostra attività durante gli orari di apertura.
</p>


<h3>Riepilogo:</h3>


<table style="border-collapse: collapse; width:100%;">
    <thead>
        <tr>
            <th align="left">Libro</th>
            <th align="center">Quantità</th>
            <th align="right">Prezzo unitario</th>
        </tr>
    </thead>

    <tbody>

    @foreach($order->books as $book)

        <tr>
            <td>{{ $book->title }}</td>
            <td align="center">{{ $book->pivot->quantity }}</td>
            <td align="right">
                {{ number_format($book->price, 2) }} &euro;
            </td>
        </tr>

    @endforeach

    </tbody>
</table>


<p>
    <span style="font-weight: 800;">Totale ordine:</span>
    {{ number_format($order->total_price, 2) }} &euro;
</p>


<p>
    Grazie per aver acquistato da noi.
</p>


</body>
</html>