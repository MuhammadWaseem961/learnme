@if($bookingPaymentDetail->count()>0)
    @foreach ($bookingPaymentDetail as $key=>$detail)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $detail->payment_method }}</td>
            <td>${{ $detail->amount }}</td>
            <td>{{ date('d/m/Y h:i a',strtotime($detail->created_at)) }}</td>
            <td><span class="badge badge-success">Succeeded</span></td>
        </tr>
    @endforeach
    
@endif