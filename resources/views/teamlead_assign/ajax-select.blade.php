
<option>--- Select Teamlead ---</option>
@if(!empty($leads))
  @foreach($leads as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif


