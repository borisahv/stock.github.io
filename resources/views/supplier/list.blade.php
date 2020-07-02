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
                                <h3 class="mb-0">{{ __('Fournisseurs') }}</h3>
                            </div>
                            @if(auth()->user()->isAdmin())
                            <div class="col-4 text-right">
                                <a href="{{ route('createSupplier') }}" class="btn btn-sm btn-primary">{{ __('Ajouter un fournisseur') }}</a>
                            </div>
                            @endif
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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Photo') }}</th>
                                <th scope="col">{{ __('Nom') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Telephone') }}</th> 
                                <th scope="col">{{ __('Adresse') }}</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>
                                        @if($supplier->photo)
                                            <a href="{{ url('uploads/suppliers/'.$supplier->photo) }}" target="_blank"><img src="{{ url('uploads/suppliers/'.$supplier->photo) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px"/></a>
                                        @endif
                                    </td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->telephone }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>
                                        @if(auth()->user()->isAdmin())
                                        <a href="/editsupplier/{{ $supplier->id }}"><i class="fas fa-pencil-alt"></i></a>
                                        &nbsp;
                                        <a href="/deletesupplier/{{ $supplier->id }}"><i class="fas fa-trash"></i></a>
                                        @endif
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