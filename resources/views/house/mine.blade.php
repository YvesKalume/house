@extends('layouts.main')
@section('content')
    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Vos Maisons</h2>
                </div>
                <div class="content">
                    <div class="items">
                        @foreach($houses as $house)
                        <div class="product">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-3">
                                    <div class="product-image"><img class="img-fluid d-block mx-auto image" src="/storage/{{$house->picture}}"></div>
                                </div>
                                <div class="col-md-5 product-info"><a class="product-name" href="{{route('house.preview',compact('house'))}}">{{$house->avenue}}</a>
                                    <div class="product-specs">
                                        <div><span>Quartier :&nbsp;</span><span class="value">{{$house->square}}</span></div>
                                        <div><span>Avenue :&nbsp;</span><span class="value">{{$house->avenue}}</span></div>
                                        <div><span>N° :&nbsp;</span><span class="value">{{$house->number}}</span></div>
                                        <div><span>Prix :&nbsp;</span><span class="value">{{$house->price}} Fc</span></div>
                                        <div><span>Status :&nbsp;</span><span class="value">{{$house->status->name}}</span></div>
                                        <div><span>Modifier :&nbsp;</span><span class="value">{{$house->created_at}}</span></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-auto btn-group">
                                    <a href="{{route('house.edit',compact('house'))}}"  class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i>Modifier</a>
                                    <a href="{{route('house.delete',compact('house'))}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Supprimer</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{$houses->links()}}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
