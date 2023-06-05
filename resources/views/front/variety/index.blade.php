<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Variety CRUD</title>
</head>

<body>
    <div class="container py-5">
        <h3 class="text-center">Varieties List</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-10">
                <div class="card shadow mb-5">
                    <div class="card-body">
                        <x-form.form :action="route('variety.store')" edit="">
                            <x-form.title :value="old('title')" />
                            <x-form.description :value="old('description')" />
                            <div class="form-group">
                                <label for="variety_id">Parent Cateogory</label>
                                <select class="form-control @error('variety_id') is-invalid @enderror" id="variety_id" name="variety_id">
                                    <option value="0" selected>Select</option>
                                    @foreach($varieties as $variety)
                                    <option value="{{$variety->id}}">{{$variety->title}}</option>
                                    @if($variety->children)
                                    @foreach($variety->children as $child)
                                    <option value="{{$child->id}}"> -- {{$child->title}}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </x-form.form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="variety-box">
                            @if($varieties->count() === 0)
                            <div class="alert alert-danger">No Varieties categories Please add new</div>
                            @else
                            @foreach($varieties as $parent)
                            <div class="alert alert-info shadow d-flex justify-content-between" style="width:30vw">{{$parent->title}} | Total Child : {{$parent->children->count()}} | ID :{{$parent->id}}
                                <div>
                                    <a href="{{route('variety.edit',$parent)}}" class="btn btn-outline-info btn-sm"><i class="bi bi-pencil"></i></a>
                                    <a href="#" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
                                </div>
                            </div>
                            <x-variety.child :children="$parent->children" :margin="$loop->iteration" />
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    </div>

    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>