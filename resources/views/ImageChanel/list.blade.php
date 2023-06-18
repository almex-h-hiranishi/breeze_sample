<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>画像一覧</title>
    </head>
    <body>
        <div>
            <form action="" method="get">
                <label>
                    ユーザIDで絞り込み
                    <input type="text" name="user_id" value="{{ $user_id }}">
                </label>
                @csrf
                <input type="submit" value="検索">
            </form>
            <div>
                <a href="/image/upload">新規投稿</a>
            </div>
        </div>
        <table border='1'>
            <tr> 
                <th>ユーザ</th>
                <th>画像</th>
                <th>詳細</th>
            </tr>
            <tr>
                @foreach ($images as $image)
                    <td>{{ $image->user->name }}</td>
                    <td><img src='{{ "/".$image->filepath }}' width='200'></td>
                    <td><a href='{{"/image/".$image->id}}'>詳細情報</a></td>
                @endforeach
            </tr>
        </table>
    </body>
</html>
