<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$user->display_name}}</title>
    </head>
    <body>
        <div>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="display_name" value="{{$user->display_name}}">
                </div>
                <div>
                    <textarea name="account_message">
                        {{$user->account_message}}
                    </textarea>
                </div>
                <div>
                    <label for="image">
                        <p>アップロード</p>
                        <input id="image" type="file" name="image">
                    </label>
                </div>
                @csrf
                <button type="submit">編集を確定する</button>
            </form>
        </div>
    </body>
</html>
