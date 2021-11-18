@extends('layouts.sidebar')
@section('title','Products List')
@section('contents')

<div class="card card-rounded">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-start">
            <div>
                <h4 class="card-title card-title-dash">Products</h4>
            </div>
            <div id="performance-line-legend"> 
                <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#exampleModal">
                    Add Product
                </button>
            </div>
        </div>
        <table class="table" id="products">
            <thead>
                <tr>
                    <th>#INDEX</th>
                    <th>SI No</th>
                    <th>PRODUCT NAME</th>
                    <th>LOWEST PRICE</th>
                    <th>VARIATION & STOCK</th>
                    <th>LAST UPDATE</th>
                </tr>
            </thead>
            <tbody>
                @if($products->isNotEmpty())
                @foreach($products as $key=>$product)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_lowest_price}}</td>
                    <td>
                        <table class="table table-bordered">
                            <tr>
                                <th>Variation</th>
                                <th>Stock</th>
                            </tr>
                            <tbody>
                                @foreach($product->variation as $key2=>$variant)
                                <tr>
                                    <td>{{$variant->variation_text}}</td>
                                    <td>{{$variant->stock}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </td>
                    <td>{{$product->last_updated}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('importfile')}}" enctype="multipart/form-data"> 
                   @csrf
                    <input name="product_file" type="file"  accept=".xlsx, .xls" />
                    <input type="submit" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
            </div>
        </div>
    </div>
</div>

@endsection
<!-- Include css of drage style -->
@push('css')
<link rel="stylesheet" href="{{asset('dash/css/dragstyle.css')}}"> 
@endpush
<!-- Include js datatable-->
@push('scripts') 
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>  
@endpush
<!-- Include js drag file script-->
@push('scripts')  
<script type="text/javascript" src="{{asset('dash/js/dragescript.js')}}"> </script>
@endpush
