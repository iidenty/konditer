@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Новости
            <small><a href="{{ route('admin.blog.create') }}" class="btn btn-block btn-info btn-lg">Добавить новость</a></small>

        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Таблица</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="example2" class="table table-bordered dataTable mytable" role="grid"
                                               aria-describedby="example2_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    Название
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    Контент
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @php /** @var $item \App\Models\BlogPost */ @endphp
                                            @foreach($data as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{ $item->name }}</td>
                                                    <td>{{ $item->content }}</td>
                                                    <td>
                                                        <a class="btn btn-block btn-primary" href="{{ route('admin.blog.edit', ['blog' => $item->id]) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form method="post" action="{{ route('admin.blog.destroy', ['blog' => $item->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-block btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Название</th>
                                                <th rowspan="1" colspan="1">Контент</th>
                                                <th rowspan="1" colspan="1"></th>
                                                <th rowspan="1" colspan="1"></th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
