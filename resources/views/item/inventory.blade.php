@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Inventaires') }}</h3>
                            </div>
                            {{--<div class="col-4 text-right">--}}
                                {{--<a href="{{ route('createItem') }}" class="btn btn-sm btn-primary">{{ __('Ajouter un produit') }}</a>--}}
                            {{--</div>--}}
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
                                <th scope="col">{{ __('Entrées') }}</th>
                                <th scope="col">{{ __('Total') }}</th>
                                <th scope="col">{{ __('Vente') }}</th>
                                <th scope="col">{{ __('Pertes') }}</th>
                                <th scope="col">{{ __('Final') }}</th>
                                @if(auth()->user()->isAdmin())
                                    <th scope="col">{{ __('Mettre à jour') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $item)
                                <tr @if($item->remaining_quantity <= $item->threshold) style="background: lightpink; height: 80px" @endif style="height: 80px">
                                    <td>
                                        @if($item->image)
                                            <a href="{{ url('uploads/items/'.$item->image) }}" target="_blank"><img src="{{ url('uploads/items/'.$item->image) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px"/></a>
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->entries }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>{{ $item->sales }}</td>
                                    <td>{{ $item->losses }} </td>
                                    <td>{{ $item->finals }}</td>
                                    @if(auth()->user()->isAdmin())
                                        <td><a href="/editinventory/{{ $item->id }}"><i class="fas fa-retweet"></i></a></td>
                                    @endif
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