@extends('site.layout')

@section('content')
    <section class="blog mt-20 mb-80">
        <div class="container">
            <div class="listing">
                <div class="row">
                    <div class="col-12">
                        <h1>
                            {{$data['metaSeo']['name']}}
                        </h1>
                    </div>

                    @php $i = 1; @endphp
                    @foreach($data['listing'] as $item)
                        @if($i==1 || $i==4)
                            <a href="{{$item['slug']}}" class="col-md-6 position-relative width mt-20">
                                <img src="{{$item['preview']}}" alt="{{$item['name']}}">
                                <span class="name">{{$item['name']}}</span>
                                <span class="date">{{$item['date']}}</span>
                            </a>
                        @else
                            <a href="{{$item['slug']}}" class="col-md-3 position-relative height mt-20">
                                <img src="{{$item['preview']}}" alt="{{$item['name']}}">
                                <span class="name">{{$item['name']}}</span>
                                <span class="date">{{$item['date']}}</span>
                            </a>
                        @endif
                        @php $i ++; @endphp
                    @endforeach

                    <div class="col-12">
                        <div class="block-navigation">
                            <div class="row align-items-center">
                                @desktop
                                <div class="col-md-6">
                                    <strong>1-6</strong> из <strong>{{$data['paginateCount']}}</strong> новостей
                                </div>
                                <div class="col-md-6 text-end">
                                    <div class="navigation">
                                        {{ $data['paginate']->onEachSide(0)->links() }}
                                    </div>
                                </div>
                                @elsedesktop
                                <div class="col-12 text-center">
                                    <div class="navigation">
                                        {{ $data['paginate']->onEachSide(0)->links() }}
                                    </div>
                                </div>
                                @enddesktop
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
