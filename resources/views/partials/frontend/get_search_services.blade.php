@if($services->count() > 0)
  
  @foreach($services as $serviceCategory)

    @if($serviceCategory->t_15!=null)

        <tr class="border-bottom">
            <td>{{ ucwords($serviceCategory->name) }}</td>
            <td>15 Minutes</td>
            <td> ${{number_format(intval($serviceCategory->t_15)) }} (USD)</td>
            <td><a href="{{ route('appointment_request',encrypt($serviceCategory->id)) }}?time=15"
                    class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button">Book</a>
            </td>
        </tr>
    @endif
    @if($serviceCategory->t_30!=null)

        <tr class="border-bottom">
            <td>{{ ucwords($serviceCategory->name) }}</td>
            <td>30 Minutes</td>
            <td> ${{number_format(intval($serviceCategory->t_30)) }} (USD)</td>
            <td><a href="{{ route('appointment_request',encrypt($serviceCategory->id)) }}?time=30"
                    class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button">Book</a>
            </td>
        </tr>
    @endif
    @if($serviceCategory->t_45!=null)

        <tr class="border-bottom">
            <td>{{ ucwords($serviceCategory->name) }}</td>
            <td>45 Minutes</td>
            <td> ${{number_format(intval($serviceCategory->t_45)) }} (USD)</td>
            <td><a href="{{ route('appointment_request',encrypt($serviceCategory->id)) }}?time=45"
                    class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button">Book</a>
            </td>
        </tr>
    @endif
    @if($serviceCategory->t_60!=null)

        <tr class="border-bottom">
            <td>{{ ucwords($serviceCategory->name) }}</td>
            <td>60 Minutes</td>
            <td> ${{number_format(intval($serviceCategory->t_60)) }} (USD)</td>
            <td><a href="{{ route('appointment_request',encrypt($serviceCategory->id)) }}?time=60"
                    class="btn btn-outline-success my-2 my-sm-0 cl-ffffff bg-3ac574  pl-5 pr-5 login_button">Book</a>
            </td>
        </tr>
    @endif  

  @endforeach
@else
  <tr class="border-bottom">
    <td colspan="4" class="text-center">No Serivce Found</td>
  </tr>
@endif
