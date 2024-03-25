@extends('admin.style.index')
@section('content')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample" action="{{route('product/update',$all_data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name"value="{{$all_data->name}}">
                        @error('name') <span>{{$message}}</span> @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Price</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Price" name="price"value="{{$all_data->price}}">
                        @error('price') <span>{{$message}}</span> @enderror

                    </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Sale</label>
                        <input type="=text" class="form-control" id="exampleInputPassword4" placeholder="Sale" name="sale"value="{{$all_data->sale}}">
                        @error('sale') <span>{{$message}}</span> @enderror

                    </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Count</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Count" name="count"value="{{$all_data->count}}">
                        @error('count') <span>{{$message}}</span> @enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" id="exampleSelectGender" name="cat">
                            @forelse($cat as $cat)
                            <option value="{{$cat->name }}" @selected($all_data->cat==$cat->name)>{{$cat->name}}</option>
                            @empty
                            @endforelse
                        </select>
                        @error("category") <span>{{$message}}</span> @enderror
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        @error('img') <span>{{$message}}</span> @enderror

                        <input type="file" name="img[]" class="file-upload-default" multiple>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection
