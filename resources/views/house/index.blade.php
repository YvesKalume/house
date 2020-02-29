@extends('layouts.main')
@section('content')
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Catalog Page</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-none d-md-block">
                                <div class="filters">
                                    <div class="filter-item">
                                        <h3>Trier Par</h3>
                                        <select class="border rounded border-primary custom-select custom-select-sm" name="trier">
                                            <option value="price">Prix</option>
                                            <option value="time">Recents</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="products">
                                <div class="row no-gutters">
                                    @foreach($houses as $house)
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="{{$house->picture}}"></a></div>
                                            <div class="product-name"><a href="#">{{$house->avenue}}</a></div>
                                            <div class="about">
                                                <div class="price">
                                                    <span class="text-danger">{{$house->price}}</span> Fc
                                                </div><a href="{{route('house.preview',compact('house'))}}" class="btn btn-primary">Détails</a></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <nav>
                                    {{$houses->links()}}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
