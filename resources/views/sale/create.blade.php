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
                                <h3 class="mb-0">{{ __('Enregistrer une vente') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('sale.index') }}" class="btn btn-sm btn-primary">{{ __('Retourner à la liste') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/sale" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informations sur la vente') }}</h6>
                            <div class="pl-lg-4">
                                @if($errors->any())
                                <div class="msg">
                                    <p>
                                        <i class="fas fa-check"></i> {{$errors->first()}}
                                    </p>
                                </div>
                                @endif
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Client') }}</label><br>
                                    <select name="customer_id" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"  id="">
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" @if($customer == $customerOnly) selected @endif>{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div style="display: inline-block;">
                                        <label class="form-control-label" for="input-name">{{ __('Produit') }}</label><br>
                                        <select name="item_id[]" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"  id="">
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    &nbsp; &nbsp;
                                    <div style="display: inline-block; vertical-align: top">
                                        <label class="form-control-label" for="input-name">{{ __('Quantité') }}</label>
                                        <input type="number" class="form-control form-control-alternative" name="quantity[]" value="1"/>
                                    </div>

                                </div>
                                <div id="command-bloc">

                                </div>

                                <button class="btn btn-primary" id="btn-command" type="button">Ajouter un produit <i class="ni ni-fat-add" style="font-size: 1em"></i></button>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Enregistrer') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <template id="command">
            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <div style="display: inline-block;">
                    <label class="form-control-label" for="input-name">{{ __('Produit') }}</label><br>
                    <select name="item_id[]" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"  id="">
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->category->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                &nbsp; &nbsp;
                <div style="display: inline-block; vertical-align: top">
                    <label class="form-control-label" for="input-name">{{ __('Quantité') }}</label>
                    <input type="number" class="form-control form-control-alternative" name="quantity[]" value="1"/>
                </div>

            </div>
        </template>

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