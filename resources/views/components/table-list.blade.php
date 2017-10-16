<table class="table table-striped table-hover templates__table">
    <thead>
        <tr>
            <th>Имя</th>
            <th class="text-right">Редактирование</th>
        </tr>
    </thead>
    <tbody>

        @foreach($list as $item)
            <tr>
                <td class="vert-aligned">{{ $item->name }}</td>
                <td class="text-right">
                    {{ Form::open(['url' => route($type.'.destroy', ['id' => $item->id]), 'method'=> 'delete' ]) }}
                        <a href="{{ route($type.'.edit', ['id' => $item->id ]) }}" class="btn btn-info btn-raised btn-xs">
                            <i class="material-icons">edit</i>
                        </a>
                        <button type="submit" class="btn btn-danger btn-raised btn-xs"><i class="material-icons">delete</i></button>
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
