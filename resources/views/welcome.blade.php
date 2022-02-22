@extends('index')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="container mainAddBlock">
        <select class="form-control selInput" id="main" name="main" class="main_field" aria-required="true">
            <option value="first" selected="selected">
                Выберите тип фигуры
            </option>
            <option value="one">
                Круг
            </option>
            <option value="two">
                Квадрат
            </option>
            <option value="three">
                Прямоугольник
            </option>
            <option value="four">
                Треугольник
            </option>
        </select>
        <hr>
        <div class="hide first">
            <a type="button" href="{{route('index')}}" class="btn btn-success">Сбросить</a>
        </div>
        <div class="hide one">
            <form method="post" action="{{route("calculate")}}">
                @csrf
                <input type="hidden" name="type" value="CIRCLE">
                <input type="number" name="radius" class="form-control" placeholder="Введите радиус круга">
                <button type="submit" class="btn btn-success prodArea">Высчитать</button>
            </form>
        </div>
        <div class="hide two">
            <form method="post" action="{{route("calculate")}}">
                @csrf
                <input type="hidden" name="type" value="SQUARE">
                <input type="number" name="sideSquare" class="form-control" placeholder="Введите сторону квадрата">
                <button type="submit" class="btn btn-success prodArea">Высчитать</button>
            </form>
        </div>
        <div class="hide three">
            <form method="post" action="{{route("calculate")}}">
                @csrf
                <input type="hidden" name="type" value="RECTANGLE">
                <div class="row">
                    <div class="col-2">
                        <input type="number" name="x1" class="form-control" placeholder="Введите x1">
                        <input type="number" name="x2" class="form-control inputXY" placeholder="Введите x2">
                    </div>
                    <div class="col-2">
                        <input type="number" name="y1" class="form-control" placeholder="Введите y1">
                        <input type="number" name="y2" class="form-control inputXY" placeholder="Введите y2">
                    </div>
                </div>
                <button type="submit" class="btn btn-success prodArea">Высчитать</button>
            </form>
        </div>
        <div class="hide four ">
            <form method="post" action="{{route("calculate")}}">
                @csrf
                <input type="hidden" name="type" value="TRIANGLE">
                <input type="number" class="form-control firstInputRect" name="firstInputRect"
                       placeholder="Введите сторону а треугольника">
                <input type="number" class="form-control secondInputRect" name="secondInputRect"
                       placeholder="Введите сторону b треугольника">
                <input type="number" class="form-control thirdInputRect" name="thirdInputRect"
                       placeholder="Введите сторону c треугольника">
                <button type="submit" class="btn btn-success prodArea">Высчитать</button>
            </form>
        </div>
    </div>
    <div class="container figureTable">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Тип</th>
                <th scope="col">Площадь</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($figures as $figure)
                <tr>
                    <th scope="row">{{ $figure->id }}</th>
                    <td>@lang('messages.'. $figure->type)</td>
                    <td>{{ $figure->area }} см</td>
                    <td>
                        <button type="button" class="btn btn-danger confirmDelete" data-id="{{$figure->id}}"
                                data-toggle="modal" data-target="#exampleModal">
                            Удалить
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Подтверждение удаления</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('delete')}}">
                    @csrf
                    <div class="modal-body">
                        <p class="confirmLabel">Вы уверены, что хотите удалить эту запись?</p>
                        <input type="hidden" name="id" class="delete_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <canvas id="myChart"></canvas>
@endsection
