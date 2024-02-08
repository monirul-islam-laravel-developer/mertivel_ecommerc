@extends('admin.master')
@section('title')
    Product Add | {{env('APP_NAME')}}
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                            <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-primary ms-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-primary ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Product Add</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-form-preview">
                            <form action="{{route('product.new')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}"  id="inputEmail3" placeholder="Product Name"/>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label"  >Select Category</label>
                                    <div class="col-md-10">
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" >
                                            <option selected disabled >--Select Category--</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" >{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label"  >Select Sub Category</label>
                                    <div class="col-md-10">
                                        <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" >
                                            <option selected disabled >--Select Sub Category--</option>
                                            @foreach($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}" >{{$subcategory->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label" >Select Brand</label>
                                    <div class="col-md-10">
                                        <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id" >
                                            <option selected disabled >--Select Brand--</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" >{{$brand->title}}</option>
                                            @endforeach

                                        </select>
                                        @error('brand_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label" >Select Unit</label>
                                    <div class="col-md-10">
                                        <select class="form-control @error('unit_id') is-invalid @enderror" name="unit_id" >
                                            <option selected disabled >--Select Unit--</option>
                                            @foreach($units as $unit)
                                            <option value="{{$unit->id}}" >{{$unit->name}}</option>
                                            @endforeach

                                        </select>
                                        @error('unit_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="size" class="col-md-2 col-form-label">Size</label>
                                    <div class="col-md-10">
                                        <select class="form-multi-select" id="choices-multiple-remove-button" name="size" multiple data-coreui-search="true" placeholder="Select Your Size" >
                                            @foreach($sizes as $size)
                                                <option value="{{$size->id}}">{{$size->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('size')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="size" class="col-md-2 col-form-label">Color</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="choices-multiple-remove-button" multiple data-coreui-search="true" name="color"  placeholder="Choice Your Product Color">
                                            @foreach($colors as $color)
                                                <option value="{{$color->id}}">{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('color')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="size" class="col-md-2 col-form-label">Condition</label>
                                    <div class="col-md-10">
                                        <select class="form-control"  name="condition">
                                            <option value="">--Nothing Selected--</option>
                                            <option value="hot">Hot</option>
                                            <option value="new">New</option>
                                        </select>
                                        @error('condition')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Regular Price</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control @error('regular_price') is-invalid @enderror" name="regular_price"   placeholder="Regular price">
                                        @error('regular_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Selling Price</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control @error('selling_price') is-invalid @enderror" name="selling_price"   placeholder="Selling price">
                                        @error('selling_price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="size" class="col-md-2 col-form-label">Product Code</label>
                                    <div class="col-md-10">
                                        <input type="text" name="code" class="form-control" placeholder="Enter Your Product Code">
                                        @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Stock Amount</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control @error('stock_amount') is-invalid @enderror" name="stock_amount"   placeholder="Stock Amount">
                                        @error('stock_amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Sort Description</label>
                                    <div class="col-md-10">
                                        <textarea  class="form-control @error('sort_description') is-invalid @enderror" name="sort_description"  id="summernote3" placeholder="Product Sort Description"></textarea>
                                        @error('sort_description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Details</label>
                                    <div class="col-md-10">
                                        <textarea  class="form-control @error('detail') is-invalid @enderror" name="detail"  id="summernote2" placeholder="Product Detail"></textarea>
                                        @error('detail')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">More Details</label>
                                    <div class="col-md-10">
                                        <textarea  class="form-control @error('more_detail') is-invalid @enderror" name="more_detail"  id="summernote" placeholder="Product More Detail"></textarea>
                                        @error('more_detail')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label">Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="image" id="imageInput" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <img id="imagePreview" class="mt-1" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;">
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-2 col-form-label">More Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="more_image[]" multiple id="imageInput" class="form-control @error('more_image') is-invalid @enderror">
                                        @error('more_image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-10">
                                        {{--                                        <input type="checkbox" id="switch1" name="status" @if($notice->status == 1) checked @endif data-switch="bool"/>--}}
                                        <input type="checkbox" id="switch1" value="1" name="status" class="form-control" data-switch="bool"/>
                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-md-2 col-form-label"></label>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <!-- end row -->
    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function(){
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }

        var imageInput = document.getElementById('imageInput');
        imageInput.addEventListener('change', previewImage);
    </script>
    <script>
        $(document).ready(function(){

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,

            });


        });
    </script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 300
        });
        $('#summernote2').summernote({
            tabsize: 2,
            height: 300
        });
        $('#summernote3').summernote({
            tabsize: 2,
            height: 150
        });
    </script>

@endsection





