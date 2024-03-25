@extends('admin.style.index')
@section('content')
<a href="{{route('product/add')}}" class="btn btn-gradient-dark btn-fw">ADD PRODUCTS</a>

<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Table with contextual classes</h4>
                    <p class="card-description"> Add class <code>.table-{color}</code>
                    </p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> NAME </th>
                          <th> PRICE </th>
                          <th> SALE </th>
                          <th> COUNT </th>
                          <th> CATEGORY </th>
                          <th> IMAGE </th>
                          <th> CONTROLLER </th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($all_data as $row)
                        <tr class="table-info">
                          <td> {{$id++}}</td>
                          <td> {{$row->name}}</td>
                          <td> {{$row->price}}</td>
                          <td> {{$row->sale}}</td>
                          <td> {{$row->count}}</td>
                          <td> {{$row->cat}}</td>

                          <td>

                              @forelse($row->images as $img )

                            <img src="{{asset('storage/images/'.$img->image)}}" alt="">

                            @empty
                            @endforelse

                        </td>

                         <td>
                            <a href="{{route('product/edite',$row->id)}}" class="btn btn-gradient-success btn-fw">EDITE</a>
                            <a href="{{route('product/delete',$row->id)}}" class="btn btn-gradient-danger btn-fw">DELETE</a>
                         </td>


                        </tr>
                         @empty     @endforelse

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection
