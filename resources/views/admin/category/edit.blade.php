@extends('layouts.admin.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
        <div class="card shadow">
            <x-card.header title="Edit Category" url="category" />
            <!-- /.card-header -->
            <div class="card-body">
                <x-form.form :action="route('category.update',$category)" :edit="true">
                    <x-form.title :value="$category->title" />
                    <x-form.description :value="$category->description" />
                    <x-form.image />
                    <div class="mb-3">
                        <img src="{{asset('/storage/images/'.$category->image)}}" alt="" srcset="" class="img-fluid border" style="width:250px" id="img-preview">
                    </div>
                    <script>
                        $(document).ready(() => {
                            $("#image").change(function() {
                                const file = this.files[0];
                                if (file) {
                                    let reader = new FileReader();
                                    reader.onload = function(event) {
                                        $("#img-preview")
                                            .attr("src", event.target.result);
                                    };
                                    reader.readAsDataURL(file);
                                }
                            });
                        });
                    </script>
                </x-form.form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection