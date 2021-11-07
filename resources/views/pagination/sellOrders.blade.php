
@if($orders->count())
    @php $count = tableNumber(10) @endphp
    @foreach($orders as $order)
        <tr class='text-center'>
            <td>{{$count++}}</td>
            <td>{{number_format($order->price, 2)}}</td>
            <td>{{$order->min}}</td>
            <td>{{$order->amount}}</td>
            <td>{{$order->amount - $order->balance}}</td>
            <td>{{$order->coin}}</td>
            <td>{{$order->currency}}</td>
            <td>
                {{$order->newRequest()}}/<span class="text-success">{{$order->completedRequest()}}</span>
                <div>
                    <a href="" class="text-success">view</a>
                </div> 
            </td>
            <td>
                <button data-toggle="modal" data-target="#editSellOrder{{$order->id}}" class="btn btn-info btn-sm">Edit</button>
                <form action="{{route('market.deleteSellOrder', $order->id)}}" method="POST" style="display: inline-block">
                    @csrf 
                    @method('delete')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Do you wanna continue?')" @if($order->hasRequest()) disabled @endif>Delete</button>
                </form>

                <div class="modal" id="editSellOrder{{$order->id}}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-body text-left" >
                                <h4 class="mb-1">Update Order</h4>
                                <form class="updateSellOrder">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" name="price" required  class="form-control" value="{{number_format($order->price, 2)}}" placeholder="">
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{$order->id}}">
                                        @csrf
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price">Min.</label>
                                                <input type="text" name="min" required  class="form-control" value="{{$order->min}}" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="updateInfo"></div> 
                                    <div class="d-flex">
                                        <button id="updBtn" class="btn ripple btn-primary">Update</button>
                                        <button class="btn ripple btn-secondary ml-2" data-dismiss="modal" type="button">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
                
            </td> 
        </tr>      
    @endforeach
@endif

<script>
$(".updateSellOrder").on('submit', function(e){
    e.preventDefault();
    let form = this;
    let fmsg = $(form).find("#updateInfo");
    let btn  = $(form).find("#updBtn");

    btn.data('text',btn.text());
    btn.html(get_loader(''));
    btn.prop('disabled',true);
    fmsg.html("");

    $.ajax({
        url:"{{route('market.updateSellOrder')}}",
        type:"post",
        data:$(form).serialize(),
        success:function(data){
            if(data.success){
                fmsg.html("<div class='alert alert-success'><i class='fas fa-check-circle'></i> "+data.success+"</div>");
                setTimeout(function(){
                    window.location.reload();
                }, 2000);
            }
            btn.prop('disabled',false);
            btn.text(btn.data('text'));
        },
        error:function(xhr, status, error){
            fmsg.html("<div class='alert alert-danger'><i class='fas fa-info-circle'></i> "+error+"</div>");
            btn.prop('disabled',false);
            btn.text(btn.data('text'));
        }
    });
}); 
</script>