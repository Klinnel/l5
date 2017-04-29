@extends ('layout.app')

@section('title')
  Create Article
  @endSection

@section('content')
  <div class="content">

    <div class="title">
      <h1>Écrire un article</h1>
    </div>

    {!! Form::open(['url' => 'articles']) !!}

    <div class="form-group">
      {!! form::label('title', 'Title: ', ['class' => 'control-label']) !!}
      {!! form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! form::label('body', 'Body: ', ['class' => 'control-label']) !!}
      {!! form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
      {!! form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>


    {!! Form::close() !!}

  </div>
@endsection
 