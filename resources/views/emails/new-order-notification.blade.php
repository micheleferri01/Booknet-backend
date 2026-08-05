<!DOCTYPE html>
<html>

<head>
    <title>Nuovo ordine</title>
</head>


<body style="font-family: Arial, sans-serif;">

<h1>
    Nuovo ordine ricevuto
</h1>


<p>
    È stato effettuato un nuovo ordine.
</p>


<h3>Dati cliente</h3>

<ul>
    <li>
        Nome:
        {{ $order->name }}
    </li>

    <li>
        Cognome:
        {{ $order->surname }}
    </li>

    <li>
        Email:
        {{ $order->email }}
    </li>
</ul>


<h3>Prodotti acquistati</h3>


<table style="width:100%; border-collapse:collapse;">

    <thead>

        <tr>

            <th style="border:1px solid #ddd; padding:8px; text-align:left;">
                Libro
            </th>

            <th style="border:1px solid #ddd; padding:8px;">
                Quantità
            </th>

            <th style="border:1px solid #ddd; padding:8px;">
                Prezzo unitario
            </th>

            <th style="border:1px solid #ddd; padding:8px;">
                Totale
            </th>

        </tr>

    </thead>


    <tbody>


    @foreach($order->books as $book)

        <tr>

            <td style="border:1px solid #ddd; padding:8px;">
                {{ $book->title }}
            </td>


            <td style="border:1px solid #ddd; padding:8px; text-align:center;">
                {{ $book->pivot->quantity }}
            </td>


            <td style="border:1px solid #ddd; padding:8px; text-align:right;">
                {{ number_format($book->pivot->unit_price, 2) }} &euro;
            </td>


            <td style="border:1px solid #ddd; padding:8px; text-align:right;">
                {{ number_format($book->pivot->unit_price * $book->pivot->quantity, 2) }} &euro;
            </td>

        </tr>


    @endforeach


    </tbody>

</table>


<h3>
    <span style="font-weight: 800;">Totale ordine:</span>
    {{ number_format($order->total_price, 2) }} &euro;
</h3>


</body>

</html>