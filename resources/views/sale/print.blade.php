
    <style>
            *{
                font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace !important;
            }
            .pl-lg-4{
                margin: auto !important;
                width: 100% !important;
                font-size: 16px !important;
                /*border: 1px solid gray*/
            }
            .img-bloc{
                text-align: center !important;
            }
            .img-bloc img{
                width: 10% !important;
            }
            .item-table th{
                width: 300px !important;
                text-align: left !important
            }
            .item-table{
                font-size: 16px !important;
            }
            .total{
                font-size: 24px !important;
            }
        </style>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body" style="margin: auto">
                        <br><br>
                        <div class="pl-lg-4">
                            <div class="img-bloc">
                                <img src="{{ asset('logo.jpg') }}" id="img" style="width: 30px">
                            </div>
                            <br><br>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name"><b>{{ __('Date') }}</b></label><br>
                                <span>{{ $sale->created_at->format('d-m-Y à H:i:s') }}</span>
                            </div>
                            <br>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name"><b>{{ __('Client') }}</b></label><br>
                                <span>{{ $sale->customer->name }}</span>
                            </div>
                            <br>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <table class="item-table">
                                    <thead>
                                    <tr>
                                        <th><label for="" class="form-control-label">Produit</label></th>
                                        {{--<th style="width: 150px"><label for="" class="form-control-label">Catégorie</label></th>--}}
                                        <th><label for="" class="form-control-label">Quantité</label></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sale->commands as $command)
                                        <tr>
                                            <td>{{ $command->item->name }}</td>
                                            {{--                                            <td>{{ $command->item->category->name }}</td>--}}
                                            <td>{{ $command->quantity }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name"><b>{{ __('Total') }}</b></label><br>
                                <span class="total">{{ $sale->total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.print()
    </script>

