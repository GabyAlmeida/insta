@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <h2>Novo POST</h2>

            <form method="POST" enctype="multipart/form-data" action="/posts">



                @csrf

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição</label>
                    <textarea type="text" name="description" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea2">Filtro:</label>
                    <textarea type="text" name="filter" class="form-control" id="exampleFormControlTextarea2" rows="1"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Arquivo:</label>
                    <input type="file" name="image_path" class="form-control-file" id="exampleFormControlFile1">
                </div>



                <button type="submit" class="btn btn-primary">Publicar</button>

            </form>

        </div>

    </div>

</div>

@endsection