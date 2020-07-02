@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-sales-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Ventes') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('createSale') }}" class="btn btn-sm btn-primary">{{ __('Enregistrer une vente') }}</a>
                            </div>
                        </div>
                    </div>

                    @if($errors->any())
                        <div class="msg">
                            <p>
                                <i class="fas fa-check"></i> {{$errors->first()}}
                            </p>
                        </div>
                    @endif

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

                    <div class="table-responsive">
                        <table class="table align-sales-center table-flush">
                            <thead class="thead-light">
                            <tr>
{{--                                <th scope="col">{{ __('Image') }}</th>--}}
                                <th scope="col">{{ __('Date d\'enregistrement') }}</th>
                                <th scope="col">{{ __('Client') }}</th>
                                <th scope="col">{{ __('Total') }}</th>
                                <th scope="col">{{ __('Payée') }}</th>
                                <th scope="col">{{ __('Détails') }}</th>
                                <th scope="col">{{ __('Imprimer') }}</th>
                                {{--<th scope="col"></th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    {{--<td></td>--}}
                                    <td>{{ $sale->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $sale->customer->name }}</td>
                                    <td>{{ $sale->total }}</td>
                                    <td>
                                        <label class="custom-toggle" style="color: green">
                                            <input type="checkbox" class="paid" data-id="{{ $sale->id }}" @if($sale->paid) checked @endif>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </td>
                                    <td><a href="/sale/{{ $sale->id }}"><i class="fas fa-info-circle"></i></a></td>
                                    <td><a href="/print/{{ $sale->id }}" target="_blank"><i class="fas fa-print"></i></a></td>
                                    {{--<td>--}}
                                        {{--<a href="/editsale/{{ $sale->id }}"><i class="ni ni-ruler-pencil"></i></a>--}}
                                        {{--<a href="/deletesale/{{ $sale->id }}"><i class="fas fa-trash"></i></a>--}}
                                    {{--</td>--}}
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

    @push('js')
        <script>
            $('.paid').each(function(){
                if($(this).prop('checked')){
                    $(this).attr('disabled', 'disabled')
                }
            })
            $('.paid').change(function(){
                $.post('{{ route('togglePaid') }}', { _token : "{{ csrf_token() }}", id : $(this).attr('data-id') }, function(rsp){
                    console.log(rsp)
                })
                if($(this).prop('checked')){
                    $(this).attr('disabled', 'disabled')
                }
            })
        </script>
    @endpush
@endsection