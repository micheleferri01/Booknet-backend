@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Gestione Ordini</h1>
        <span class="badge bg-primary fs-6">
            {{ $orders->count() }} ordini
        </span>
    </div>

    @if($orders->isEmpty())

        <div class="alert alert-info">
            Nessun ordine presente.
        </div>

    @else

<!-- visualizzazione per desktop -->
        <div class="d-none d-md-block">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th class="d-none d-lg-table-cell">Email</th>
                            <th class="d-none d-lg-table-cell">Data</th>
                            <th>Status</th>
                            <th class="text-end">Totale</th>
                            <th width="120"></th>
                        </tr>

                    </thead>

                    <tbody>

                    @foreach($orders as $order)

                        <tr>

                            <td>{{ $order->id }}</td>

                            <td>
                                <strong>
                                    {{ $order->name }}
                                    {{ $order->surname }}
                                </strong>
                            </td>

                            <td class="d-none d-lg-table-cell">{{ $order->email }}</td>

                            <td class="d-none d-lg-table-cell">
                                {{ $order->created_at->format('d/m/Y H:i') }}
                            </td>

                            
                            <td>
                                <form action="{{ route('order.status', $order) }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <select 
                                        name="status"
                                        class="form-select form-select-sm"
                                        onchange="this.form.submit()">

                                        <option 
                                            value="pending"
                                            @selected($order->status == 'pending')>
                                            In attesa
                                        </option>

                                        <option 
                                            value="paid"
                                            @selected($order->status == 'paid')>
                                            Pagato
                                        </option>

                                        <option 
                                            value="cancelled"
                                            @selected($order->status == 'cancelled')>
                                            Cancellato
                                        </option>

                                    </select>

                                </form>
                            </td>
                            
                            <td class="text-end fw-bold">
                                {{ number_format($order->total_price,2) }} €
                            </td>

                            <td class="text-end">

                                <button
                                    class="btn btn-outline-primary btn-sm"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#desktopOrder{{ $order->id }}">
                                    Dettagli
                                </button>

                            </td>

                        </tr>

                        <tr class="collapse" id="desktopOrder{{ $order->id }}">

                            <td colspan="12">


                                <div class="border rounded p-3 bg-light">

                                <p class="d-lg-none"><span class="fw-semibold">Email:</span> {{$order->email}}</p>
                                <p class="d-lg-none"><span class="fw-semibold">Data:</span> {{$order->created_at->format('d/m/Y H:i')}}</p>

                                    <table class="table table-sm mb-0">

                                        <thead>

                                            <tr>
                                                <th>Libro</th>
                                                <th class="text-center">Qtà</th>
                                                <th class="text-end">Prezzo</th>
                                                <th class="text-end">Totale</th>
                                            </tr>

                                        </thead>

                                        <tbody>

                                        @foreach($order->books as $book)

                                            <tr>

                                                <td>{{ $book->title }}</td>

                                                <td class="text-center">
                                                    {{ $book->pivot->quantity }}
                                                </td>

                                                <td class="text-end">
                                                    {{ number_format($book->pivot->unit_price,2) }} €
                                                </td>

                                                <td class="text-end fw-bold">
                                                    {{ number_format($book->pivot->quantity * $book->pivot->unit_price,2) }} €
                                                </td>

                                            </tr>

                                        @endforeach

                                        </tbody>

                                    </table>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

<!-- visualizzazione per mobile -->
        <div class="d-md-none">

            @foreach($orders as $order)

                <div class="card mb-3 shadow-sm">

                    <div class="card-body">

                        <h5 class="card-title mb-3">
                            Ordine #{{ $order->id }}
                        </h5>

                        <p class="mb-1 d-flex flex-column">
                            <strong>Cliente:</strong>
                            {{ $order->name }} {{ $order->surname }}
                        </p>

                        <p class="mb-1 d-flex flex-column">
                            <strong>Email:</strong>
                            {{ $order->email }}
                        </p>

                        <p class="mb-1 d-flex flex-column">
                            <strong>Data:</strong>
                            {{ $order->created_at->format('d/m/Y H:i') }}
                        </p>

                        <p class="mb-1 d-flex flex-column">
                            <strong>Status:</strong>
                            <form action="{{ route('order.status', $order) }}" method="POST">

                            @csrf
                            @method('PATCH')

                            <select 
                                name="status"
                                class="form-select form-select-sm"
                                onchange="this.form.submit()">

                                <option 
                                    value="pending"
                                    @selected($order->status == 'pending')>
                                    In attesa
                                </option>

                                <option 
                                    value="paid"
                                    @selected($order->status == 'paid')>
                                    Pagato
                                </option>

                                <option 
                                    value="cancelled"
                                    @selected($order->status == 'cancelled')>
                                    Cancellato
                                </option>

                            </select>

                        </form>
                        </p>

                        <p class="mb-3">
                            <strong>Totale:</strong>
                            {{ number_format($order->total_price,2) }} €
                        </p>

                        <button
                            class="btn btn-primary w-100"
                            data-bs-toggle="collapse"
                            data-bs-target="#mobileOrder{{ $order->id }}">
                            Mostra dettagli
                        </button>

                        <div
                            class="collapse mt-3"
                            id="mobileOrder{{ $order->id }}">

                            @foreach($order->books as $book)

                                <div class="border rounded p-3 mb-2">

                                    <h6 class="mb-2">
                                        {{ $book->title }}
                                    </h6>

                                    <div class="d-flex justify-content-between">
                                        <span>Quantità</span>
                                        <strong>{{ $book->pivot->quantity }}</strong>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <span>Prezzo</span>
                                        <strong>
                                            {{ number_format($book->pivot->unit_price,2) }} €
                                        </strong>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <span>Totale</span>
                                        <strong>
                                            {{ number_format($book->pivot->quantity * $book->pivot->unit_price,2) }} €
                                        </strong>
                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection