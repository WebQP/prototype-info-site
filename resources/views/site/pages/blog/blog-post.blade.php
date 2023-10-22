@extends('site.layout')

@section('content')
    <section class="blog-post mt-20 mb-80">
        <div class="container">
            <div class="listing">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            {{$data['metaSeo']['name']}}
                        </h1>

                    <div class="preview">
                        <img src="{{$data['preview']}}">
                    </div>

                        {!! $data['content'] !!}

                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
