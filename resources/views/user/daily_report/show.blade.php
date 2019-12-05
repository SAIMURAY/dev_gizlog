@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      {{ $infos->reporting_time }} の日報
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text">{{ $infos->title }}</td>
          </tr>
          <tr>
            <th class="table-column">Content</th>
            <td class='td-text'>{{ $infos->content }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="btn-bottom-wrapper">
    <a class="btn btn-edit" href="{{ route('dailyreport.edit', $infos->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <div class="btn-delete">
      <form>
        <a class="btn btn-danger" href="{{ route('dailyreport.delete', $infos->id) }}" type="submit" ><i class="fa fa-trash-o"></i></a>
      </form>
    </div>
  </div>
</div>

@endsection
