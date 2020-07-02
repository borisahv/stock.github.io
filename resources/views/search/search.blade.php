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
                                <h3 class="mb-0">{{ __('Produits') }}</h3>
                            </div>
                            <div class="col-4 text-right">
{{--                                <a href="{{ route('createItem') }}" class="btn btn-sm btn-primary">{{ __('Ajouter un produit') }}</a>--}}
                            </div>
                        </div>
                    </div>

                    <div style="padding: 10px" class="input-daterange datepicker align-items-center">
                        <form action="{{ route('search') }}">
                            @csrf
                            &nbsp; Du
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input type="text" class="datepicker form-control" name="start" placeholder="Date début" style="width: 200px; display: inline-block">
                            </div>

                            &nbsp; Au
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input type="text" class="datepicker form-control" name="end" placeholder="Date fin" style="width: 200px; display: inline-block">
                            </div>

                            {{--<div class="input-group input-group-alternative">--}}
                                {{--<div class="input-group-prepend">--}}
                                    {{--<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>--}}
                                {{--</div>--}}
                                {{--<select name="category_id" id="">--}}
                                    {{--<option value="">Toutes</option>--}}
                                    {{--@foreach()--}}
                                        {{--<option value="{{ $category->id }}">{{ $category->name }}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>                            --}}
                            {{--</div>--}}
                            &nbsp; &nbsp; &nbsp;
                            <button type="submit" class="btn btn-success mt-4" style="margin-bottom: 20px">Rechercher</button>
                        </form>
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
                    {{--<div style="margin-left: 25px">--}}
                        {{--<span style="display: inline-block">--}}
                            {{--<div style="background: lightpink; border: none; width: 20px; height: 10px"></div>--}}
                        {{--</span>--}}
                        {{--<span style="display: inline-block; font-size: 14px">--}}
                             {{--<div>Alerte d'approvisionnement</div>--}}
                        {{--</span><br><br>--}}
                    {{--</div>--}}

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Date d\'enregistrement') }}</th>
                                <th scope="col">{{ __('Client') }}</th>
                                <th scope="col">{{ __('Total') }}</th>
                                <th scope="col">{{ __('Détails') }}</th>
                                <th scope="col">{{ __('Imprimer') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $sale->customer->name }}</td>
                                    <td>{{ $sale->total }}</td>
                                    <td><a href="/sale/{{ $sale->id }}"><i class="fas fa-info-circle"></i></a></td>
                                    <td><a href="/print/{{ $sale->id }}" target="_blank"><i class="fas fa-print"></i></a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">
                                        <div style="text-align: center; font-size: 14px">Aucune recherche ne correspond à votre demande</div>
                                    </td>
                                </tr>
                            @endforelse
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

@push('js')
    <script>
        @php
            $date = new DateTime();
            $date->sub(new DateInterval('P1D'));
        @endphp
        $('[name="start"]').val('{{ $date->format('Y-m-d H:i')  }}')
        $('[name="end"]').val('{{ date('Y-m-d H:i')  }}')
    </script>
@endpush