<ul class="header-cart-wrapitem w-full">
    @php
        $sum = 0;
        $cart = array( );
		if(@session()->get('cart')){
			$cart = session()->get('cart');
			} 
    @endphp
    @if(count($cart) > 0)
    @foreach ($cart as $item)
        
    
    <li class="header-cart-item flex-w flex-t m-b-12">
        <div class="header-cart-item-img" onclick="delete_product({{ $item['product_id'] }})">
            @php
                $image = $item['image'];
                 $sum += round($item['price'],0) * $item['quantity'] ;
            @endphp
            
            <img  src='{{URL::asset("/products/$image")}}'  alt="IMG">
        </div>

        <div class="header-cart-item-txt p-t-8">
            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
            {{$item['name']}}
            </a>

            <span class="header-cart-item-info">
                {{round($item['price'],0)}}*{{ $item['quantity'] }} = {{ round($item['price'],0) * $item['quantity']  }}
            </span>
        </div>
    </li>
    @endforeach
    @else 
    <li class="text-center">No Products in the cart</li>
    @endif
 


</ul>
@if(count($cart) > 0)
<div class="w-full">
    <div class="header-cart-total w-full p-tb-40">
        Total: {{ $sum }} PKR
    </div>

    <div class="header-cart-buttons flex-w w-full">
        {{-- <a href="{{ url('/cart-detail-info') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
            View Cart
        </a> --}}

        <a href="{{ url('/checkout-details-info') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
            Check Out
        </a>
    </div>
</div>
@endif