@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Vente')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Imprimer une facture') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('sale.index') }}" class="btn btn-sm btn-primary">{{ __('Retourner à la liste') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/print/{{ $sale->id }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informations sur la vente') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Date') }}</label><br>
                                    <span>{{ $sale->created_at->format('d-m-Y H:i:s') }}</span>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Client') }}</label><br>
                                    <span>{{ $sale->customer->name }}</span>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th style="width: 150px"><label for="" class="form-control-label">Produit</label></th>
                                                <th style="width: 150px"><label for="" class="form-control-label">Catégorie</label></th>
                                                <th style="width: 150px"><label for="" class="form-control-label">Quantité</label></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sale->commands as $command)
                                            <tr>
                                                <td>{{ $command->item->name }}</td>
                                                <td>{{ $command->item->category->name }}</td>
                                                <td>{{ $command->quantity }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Total') }}</label><br>
                                    <span style="font-size: 24px">{{ $sale->total }}</span>
                                </div>

                                <div class="text-center">
                                    @if($sale->paid)
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Imprimer') }}</button>
                                    @else
                                        <input type="hidden" name="paid" value="1">
                                        <button type="submit" formtarget="_blank" class="btn btn-success mt-4">{{ __('Payer et Imprimer') }}</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script>
        $('#btn-command').click(function(){
            $('#command-bloc').append($('#command').html())
        })
    </script>
@endpush