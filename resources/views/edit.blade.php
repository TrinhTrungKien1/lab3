<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <h5 class="card-header bg-success">Edit Book</h5>
            <div class="card-body">
                <form method="POST" action="{{ route('book.update', $book->id) }}" class="form-control">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $book->id }}">
                    <div class="mb-3">
                        <label for="" class="form-label">Tiêu đề: </label>
                        <input type="text" class="form-control" name="title" value="{{ $book->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ảnh mô tả: </label>
                        <input type="text" class="form-control" name="thumbnail" value="{{ $book->thumbnail }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tác giả: </label>
                        <input type="text" class="form-control" name="author" value="{{ $book->author }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nhà xuất bản: </label>
                        <input type="text" class="form-control" name="publisher" value="{{ $book->publisher }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ngày xuất bản: </label>
                        <input type="datetime-local" class="form-control" name="Publication"
                            value="{{ $book->Publication }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giá bán: </label>
                        <input type="number" step="0.1" class="form-control" name="Price"
                            value="{{ $book->Price }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Số lượng: </label>
                        <input type="number" class="form-control" name="Quantity" value="{{ $book->Quantity }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tiêu đề: </label>
                        <select name="Category_id" id="" class="form-select">
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}" @if ($cate->id === $book->Category_id) selected @endif>
                                    {{ $cate->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('book.home') }}" class="btn btn-warning">Back</a>
                    </div>
                </form>
            </div>
        </div>



    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
