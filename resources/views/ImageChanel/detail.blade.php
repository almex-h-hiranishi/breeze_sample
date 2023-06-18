<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>画像詳細</title>
    </head>
    <body>
        <div>
            <table border='1'>
                <tr> 
                    <th>投稿者ID</th>
                    <th>投稿者</th>
                    <th>投稿日時</th>
                    <th>画像</th>
                </tr>
                <tr>
                    <td>{{ $image->user->id }}</td>
                    <td>{{ $image->user->name }}</td>
                    <td>{{ $image->createde_at }}</td>
                    <td><img src='{{ "/".$image->filepath }}'></td>
                </tr>
            </table>
        </div>
        @if ( $image->user->id == auth()->user()->id )
            <div>
                <form action="/image/edit/{{$image->id}}" method="get">
                    <button type="submit">編集</button>
                </form>
                <form action="/image/delete/{{$image->id}}" method="post">
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </div>
        @endif
    </body>
</html>
