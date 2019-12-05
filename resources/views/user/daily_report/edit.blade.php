@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['dailyreport.update', $infos->id], 'method' => 'PUT']) !!}
      <div class="form-group">
        {!! Form::hidden('user_id', $infos->user_id, ['id' => 'user_id']) !!}
        <div class="form-group form-size-small {{ $errors->has('reporting_time') ? 'has-error' : '' }}">
          {!! Form::date('reporting_time', $infos->reporting_time, ['class'=>'date', 'required', 'class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('reporting_time') }}</span>
        </div>
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
          {!! Form::input('text', 'title', $infos->title, ['required', 'class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('title') }}</span>
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
          {!! Form::textarea('content', $infos->content, ['required', 'class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('content') }}</span>
        </div>
      </div>
      {!! Form::submit('UPDATE', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection
