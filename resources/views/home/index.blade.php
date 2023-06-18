<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        {{-- <title>{{$user->display_name}}</title> --}}
        <title>Soliloquy</title>
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
            <div>
                <a href="/home/edit">プロフィール編集</a>
            </div>
        <table border='1'>
            <tr> 
                <th>投稿一覧</th>
            </tr>
            <tr>
                {{-- @foreach ($images as $image) --}}
                @foreach ($user->soliloquys as $soliloquy)
                    <td>
                        {{ $soliloquy->body }}
                        @if ($soliloquy->image != null)
                            <img src='{{ "/".$soliloquy->image->filepath }}' width='200'>
                        @endif
                    </td>
                    {{-- <td>{{ $soliloquy->image->filepath }}</td> --}}
                    {{-- <td><a href='{{"/image/".$image->id}}'>詳細情報</a></td> --}}
                @endforeach
            </tr>
        </table>
    </body>
</html>
