@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
    <h1>Produtos</h1>

    @can('create', App\Models\Product::class)
        <form action="{{ route('products.create') }}" method="get">
            <button type="submit">Criar produto</button>
        </form>
    @endcan

    @if (count($products) === 0)
        Nenhum produto encontrado
    @endif

    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a>
                - R$ {{ number_format($product->price, 2, ',', ' ') }}
            </li>
        @endforeach
    </ul>
@endsection
