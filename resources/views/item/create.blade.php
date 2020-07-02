@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Ajouter un produit')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Produit') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('item.index') }}" class="btn btn-sm btn-primary">{{ __('Retourner à la liste') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/item" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Informations du produit') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nom') }} <b style="color: red">*</b></label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nom') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Catégorie') }}</label><br>
                                    <i class="fas fa-plus-square" id="category-btn" data-toggle="modal" data-target="#categoryModal"></i>
                                    <select name="category_id" id="" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" >
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Fournisseur') }}</label><br>
                                    <i class="fas fa-plus-square" id="supplier-btn" data-toggle="modal" data-target="#supplierModal"></i>
                                    <select name="supplier_id" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" id="">
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                    <textarea name="description"  class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"></textarea>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Image') }}</label>
                                    <input type="file" name="image">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Devise') }}</label><br>
                                    <select name="currency" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"  id="">
                                        <option value="">CFA</option>
                                        <option value="">Euro</option>
                                        <option value="">USD</option>
                                        <option value="">Pesos</option>
                                    </select>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Prix d\'achat') }}</label>
                                    <input type="text" name="purchase_price" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrez le prix d\'achat') }}" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Prix de vente gros') }} <b style="color: red">*</b></label>
                                    <input type="text" name="wholesale_price" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrez le prix de vente
                                    ') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Prix de vente détail') }} <b style="color: red">*</b></label>
                                    <input type="text" name="retail_price" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrez le prix de vente détail') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Quantité') }} <b style="color: red">*</b></label>
                                    <input type="number" name="quantity" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Quantité') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Quantité d\'alerte') }} <b style="color: red">*</b></label><br>
                                    <input type="number" name="threshold" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrez le seuil de quantité') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Quantité de gros') }} <b style="color: red">*</b></label><br>
                                    <input type="number" name="big_quantity" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Entrez la quantité de gros') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div style="color: gray; font-size: 11px">
                                    <b style="color: red">*</b> Champs obligatoires
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Enregistrer') }}</button>
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
       $('#categoryModal .btn-primary').click(function(){
            var data = {
                name: $('#categoryModal [name="name"]').val(),
                parent_id: $('#categoryModal [name="parent_id"]').val(),
                _token: "{{ csrf_token() }}"
            }
            $.post("{{ route('createCategoryAjax') }}", data, function(res){
                $('[name="category_id"]').append('<option name='+res.id+' selected>'+res.name+'</option>')
            })
       })

       $('#supplierModal .btn-primary').click(function(){
           var data = new FormData()
           data.processData = false
           data.contentType = false
           data.append('name', $('#supplierModal [name="name"]').val())
           data.append('email', $('#supplierModal [name="email"]').val())
           data.append('telephone', $('#supplierModal [name="telephone"]').val())
           data.append('address', $('#supplierModal [name="address"]').val())
           data.append('photo', $('#supplierModal [name="photo"]')[0].files[0])
           data.append('_token', "{{ csrf_token() }}")

           $.ajax({
               url: "{{ route('createSupplierAjax') }}",
               data: data,
               processData: false,
               contentType: false,
               type: 'POST',
               success:  function(res){
                   $('[name="supplier_id"]').append('<option name='+res.id+' selected>'+res.name+'</option>')
               }
           })
       })

       $('[name="threshold"], [name="big_quantity"], [name="quantity"]').on('keyup', 'change', function(){
           var threshold = $('[name="threshold"]')
           var big_quantity = $('[name="big_quantity"]')
           var quantity = $('[name="quantity"]')

           if(parseInt(big_quantity.val()) > parseInt(quantity.val())) big_quantity.val(quantity.val())
           if(parseInt(threshold.val()) > parseInt(quantity.val())) threshold.val(quantity.val())
       })
   </script>
@endpush

