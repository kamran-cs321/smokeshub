
        <table class="table table-responsive borderless text-nowrap table-hover">
            <thead>
            <tr>
                <th> Sr#</th>
                <th>Product</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total</th>
                
            </tr>
            </thead>
            <tbody>
                @php
                    $total =0;   
                @endphp
                @if (count($customer_orders) > 0)

                @foreach ($customer_orders as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> <img src='{{ URL::to("/products/$item->image_1") }}' alt="IMG-PRODUCT" style="width:70px;height: 70px;" />   </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->quantity * round($item->price,0) }}</td>

                    </tr>
                    @php
                        $total +=   ($item->quantity * round($item->price,0))
                    @endphp
                @endforeach
                <tr><td colspan="5" class="text-right"><b>Total = {{ $total }}</b></td></tr>
                
                @else
                    <tr><td colspan="5" class="text-center text-danger">No Products</td></tr>
                @endif
            </tbody>
        </table>
