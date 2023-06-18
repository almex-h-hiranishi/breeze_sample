<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$user->display_name}}</title>
    </head>
    <body>
        <div>
            <div>
                <img src='{{asset($user->icon_filepath)}}' width='50'>
            </div>
            <div>
                {{$user->display_name}}
            </div>
            <div>
                id: {{$user->id}}
            </div>
            <div>
                {{$user->account_message}}
            </div>
        <table border='1'>
            <tr> 
                <th>投稿一覧</th>
            </tr>
            <tr>
                @foreach ($user->soliloquys as $soliloquy)
                    <td>
                        {{ $soliloquy->body }}
                        @if ($soliloquy->image != null)
                            <img src='{{ "/".$soliloquy->image->filepath }}' width='200'>
                        @endif
                    </td>
                @endforeach
            </tr>
        </table>
    </body>
</html>
