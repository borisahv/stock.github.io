@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        @if($errors->any())
                            <div class="msg" style="background: lightgreen; width: 100%; border-radius: 4px; padding: 0px 15px; margin: auto; ">
                                <p style="color: darkgreen; vertical-align: middle">
                                    {{ $errors->first() }}
                                </p>
                            </div><br>
                        @endif
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Produits') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('createItem') }}" class="btn btn-sm btn-primary">{{ __('Ajouter un produit') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div style="margin-left: 25px">
                        <span style="display: inline-block">
                            <div style="background: lightpink; border: none; width: 20px; height: 10px"></div>
                        </span>
                        <span style="display: inline-block; font-size: 14px">
                             <div>Alerte d'approvisionnement</div>
                        </span><br><br>
                    </div>


                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Image') }}</th>
                                <th scope="col">{{ __('Nom') }}</th>
                                <th scope="col">{{ __('Categorie') }}</th>
                                <th scope="col">{{ __('Fournisseur') }}</th>
                                <th scope="col">{{ __('Quantité') }}</th>
                                <th scope="col">{{ __('Quantité restante') }}</th>
                                <th scope="col">{{ __('Prix d\'achat') }}</th>
                                <th scope="col">{{ __('Prix de vente gros') }}</th>
                                <th scope="col">{{ __('Prix de vente détail') }}</th>
                                <th scope="col">{{ __('Date d\'ajout') }}</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr @if($item->remaining_quantity <= $item->threshold) style="background: lightpink" @endif>
                                    <td>
                                        @if($item->image)
                                            <a href="{{ url('uploads/items/'.$item->image) }}" target="_blank"><img src="{{ url('uploads/items/'.$item->image) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px"/></a>
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->remaining_quantity }}</td>
                                    <td>{{ $item->purchase_price }} {{ $item->currency }}</td>
                                    <td>{{ $item->wholesale_price }} {{ $item->currency }}</td>
                                    <td>{{ $item->retail_price }} {{ $item->currency }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->supplier->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="/edititem/{{ $item->id }}"><i class="fas fa-pencil-alt"></i></a>
                                        &nbsp
                                        <a href="/deleteitem/{{ $item->id }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
{{--                            {{ $users->links() }}--}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection