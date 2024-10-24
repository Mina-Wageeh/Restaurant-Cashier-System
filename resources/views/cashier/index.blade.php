@extends('layouts.app')

@section('content')

    <div class="cashier-container">

        {{--Left Side--}}
        <div class="left-side">

            <div class="orders-list col-12">
                @include('cashier.includes.empty-order-info')

            </div>

            <hr>

            <div class="total-price col-12 text-center">
                <h4 class="text-danger">0 $</h4>
            </div>

            <hr>

            <div class="order-submit">
                <button id="send-order" class="send-btn">Send</button>
            </div>
        </div>

        <!-- Right Panel: Menu Items -->
        <div class="right-side menu-panel">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" id="search-menu">
            </div>
            <div class="category-bar">
{{--                    <button class="category-btn col-2 active" data-category="all">All</button>--}}
                    <button class="category-btn col-2 active" data-category="all">All</button>

                    @foreach($allCategories as $category)
                        <button class="category-btn col-2" category_id="{{$category->id}}">{{$category->name}}</button>
                    @endforeach
            </div>
            @include('cashier.includes.empty-product')
            <div class="menu-items d-flex flex-wrap justify-content-center">

                @foreach($allProducts as $product)
                        <div class="product menu-card" product_id="{{$product->id}}">
                            <img src="{{asset('assets/img/F1.jpg')}}" alt="Restaurant">
                            <div class="menu-item-name">{{$product->name}}</div>
                            <div class="menu-item-price text-danger">{{$product->price}} $</div>
                        </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection


{{--Scripts--}}
@section('scripts')
<script>
    $(document).ready(function()
    {
        // Global
        var total_price = 0;
        // End Global

        $(document).on('click' , '.category-btn' , function(e)
        {
            e.preventDefault()
            var category_id = $(this).attr('category_id');
            var category_type = $(this).data('category');
            if(category_type == "all")
            {
                $.ajax({
                    type: 'get',
                    url: '{{route("get.all.products")}}',
                    data:
                        {
                            '_token' : '{{csrf_token()}}',
                        },
                    success : function(data)
                    {
                        $('.menu-items').empty();

                        $.each(data , function (key , value)
                        {

                            var cloned_product= $('.empty-product-card').clone();
                            cloned_product.appendTo('.menu-items');
                            cloned_product.removeClass('empty-product-card').removeClass('d-none');
                            // console.log(cloned_product);
                            cloned_product.find('.product').attr('product_id' , value.id);
                            cloned_product.find('.menu-item-name').text(value.name);
                            cloned_product.find('.menu-item-price').text(value.price + " $");
                        });
                    }
                })
            }
            else
            {
                $.ajax({
                    type: 'get',
                    url: '{{ route("get.products.by.category", ":id") }}'.replace(':id', category_id),
                    data:
                    {
                        '_token' : '{{csrf_token()}}',
                        'category_id' : category_id
                    },
                    success : function(data)
                    {
                        $('.menu-items').empty();

                        $.each(data , function (key , value)
                        {

                            var cloned_product= $('.empty-product-card').clone();
                            cloned_product.appendTo('.menu-items');
                            cloned_product.removeClass('empty-product-card').removeClass('d-none');
                            cloned_product.find('.product').attr('product_id' , value.id);
                            cloned_product.find('.menu-item-name').text(value.name);
                            cloned_product.find('.menu-item-price').text(value.price + " $");
                        });
                    }
                })
            }

        })


        $(document).on('click' , '.product' , function(e)
        {
            e.preventDefault()


            var product_id = $(this).attr('product_id');

                if(!$(this).hasClass('selected'))
                {
                    $.ajax({
                        type: 'get',
                        url: '{{route("get.product")}}',
                        data:
                            {
                                '_token' : '{{csrf_token()}}',
                                'product_id' : product_id,
                            },
                        success : function(data)
                        {

                            var cloned_order_info = $('.empty-order-info').clone();
                            cloned_order_info.appendTo('.orders-list');
                            cloned_order_info.removeClass('empty-order-info').removeClass('d-none');
                            cloned_order_info.find('.order-name').text(data.name);
                            cloned_order_info.find('.order-price').text(parseFloat(data.price) + " $");

                            total_price = parseFloat(total_price) + parseFloat(data.price);

                            $('.total-price').find('h4').text(total_price + " $")
                        }
                    })
                    $(this).addClass('selected')

                }

        })
    })
</script>
@endsection
