<!DOCTYPE>
<html>
    <head>
        <meta charset="utf-8">
        <title>画像アップロード</title>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="image">
                    <p>アップロード画像</p>
                    <input id="image" type="file" name="image">
                </label>
            </div>
            <div>
                @csrf
                <button type="submit">アップロード</button>
            </div>
        </form>
    </body>
</html>
